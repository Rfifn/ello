<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Filament\Resources\RentalResource\RelationManagers;
use App\Models\Rental;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use App\Services\StockManagementService;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-s-calendar';

    protected static ?string $navigationLabel = 'Rental';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama'),
                TextInput::make('phone_number')
                    ->tel()
                    ->label('Telepon'),
                TextInput::make('address')
                    ->label('Alamat'),
                DatePicker::make('return_date')
                    ->label('Tanggal Pengembalian')
                    ->seconds(false)
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::updatePrice($get, $set);
                    })
                    ->required(),
                TextInput::make('late_fee')
                    ->disabled()
                    ->visible(fn (Get $get): bool => $get('status') == 3)
                    ->label('Denda Keterlambatan'),
                Select::make('user_id')
                    ->relationship(name: 'user', titleAttribute: 'name'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Harga Barang (per-satuan dalam bentuk rupiah)'),
                DatePicker::make('start_time')
                    ->seconds(false)
                    ->required()
                    ->label('Waktu mulai'),
                Select::make('status')
                    ->required()    
                    ->options([
                        0 => 'Belum Dikonfirmasi',
                        1 => 'Dikonfirmasi',
                        2 => 'Disewa',
                        3 => 'Dikembalikan',
                        4 => 'Dibatalkan',
                        5 => 'Belum Diselesaikan'
                    ])
                    ->label('Status'),
                DatePicker::make('end_time')
                    ->seconds(false)
                    ->required()
                    ->label('Waktu akhir'),
                Repeater::make('rentalDetails')
                    ->relationship('rentalDetails')
                    ->schema([
                        Select::make('product_id')
                            ->relationship(name: 'product', titleAttribute: 'name')
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                            ->label('Nama Barang'),
                        TextInput::make('quantity')
                            ->numeric()
                            ->label('Jumlah'),
                    ])
                    ->required()
                    ->live()
                    ->label('Barang yang disewa')
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::updatePrice($get, $set);
                    }),
                    
                TextInput::make('description')
                    ->required()
                    ->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('name')
    ->searchable()
    ->description(fn (Rental $record): string =>$record->rentalDetails->pluck('product.name')->join(', ')),
                    TextColumn::make('price')
                        ->money('IDR'),
                        Stack::make([
                        TextColumn::make('start_time')
                        ->dateTime('d-m-Y'),
                        TextColumn::make('end_time')
                        ->dateTime('d-m-Y'),
                        ]),
                    TextColumn::make('status')
                        ->badge()
                        ->formatStateUsing(fn (string $state): string => match ($state) {
                            '0' => 'Belum Dikonfirmasi',
                            '1' => 'Dikonfirmasi',
                            '2' => 'Disewa',
                            '3' => 'Dikembalikan',
                            '4' => 'Dibatalkan',
                            '5' => 'Belum Diselesaikan',
                        })
                        ->color(fn (string $state): string => match ($state) {
                            '0' => 'gray',
                            '1' => 'info',
                            '2' => 'primary',
                            '3' => 'success',
                            '4' => 'warning',
                            '5' => 'danger',
                        }),
                    TextColumn::make('description')
                ]),
                ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('show')
                        ->icon('heroicon-o-eye')
                        ->label('Lihat'),
                    EditAction::make(),
                    DeleteAction::make()
                        ->label('Hapus')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function updatePrice(Get $get, Set $set): void
{
    // Ambil data produk yang valid
    $selectedProducts = collect($get('rentalDetails'))->filter(fn($item) => !empty($item['product_id']) && !empty($item['quantity']));
    
    // Ambil harga produk dari database
    $prices = DB::table('products')->whereIn('id', $selectedProducts->pluck('product_id'))->pluck('price', 'id');

    // Ambil start_time, end_time, dan return_date dari input
    $startTime = $get('start_time');
    $endTime = $get('end_time');
    $returnDate = $get('return_date');
    $status = $get('status');

    // Periksa jika tanggal tidak valid
    if (!$startTime || !$endTime) {
        $set('price', 0);
        return;
    }

    // Convert dates to Carbon instances
    $startDate = Carbon::parse($startTime);
    $endDate = Carbon::parse($endTime);
    
    // Hitung jumlah hari sewa, minimal 1 hari
    $days = max(1, $startDate->diffInDays($endDate));

    // Hitung total harga sewa dasar
    $baseTotal = $selectedProducts->reduce(function ($total, $product) use ($prices) {
        return $total + ($prices[$product['product_id']] * $product['quantity']);
    }, 0);

    // Hitung total harga berdasarkan jumlah hari
    $rentalPrice = $baseTotal * $days;

    // Hitung late fee jika status adalah Dikembalikan (3) dan ada tanggal pengembalian
    $lateFee = 0;
    if ($status == 3 && $returnDate) {
        $returnDateTime = Carbon::parse($returnDate);
        
        // Hitung berapa hari terlambat setelah 2 minggu
        $twoWeeksAfterEnd = $endDate->copy()->addWeeks(2);
        
        // Hanya hitung late fee jika lebih dari 2 minggu terlambat
        if ($returnDateTime->gt($twoWeeksAfterEnd)) {
            $lateDays = $twoWeeksAfterEnd->diffInDays($returnDateTime);
            
            // Hitung late fee untuk setiap produk
            $lateFee = $selectedProducts->reduce(function ($total, $product) use ($prices, $lateDays) {
                $productPrice = $prices[$product['product_id']] ?? 0;
                // Late fee adalah harga produk × jumlah × hari terlambat (setelah 2 minggu)
                return $total + ($productPrice * $product['quantity'] * $lateDays);
            }, 0);
        }
    }

    // Set total harga termasuk late fee
    $totalPrice = $rentalPrice + $lateFee;
    $set('late_fee', $lateFee);
    $set('price', $totalPrice);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
