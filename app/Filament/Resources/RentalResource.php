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

                    TextColumn::make('name')
                        ->searchable(),
                    TextColumn::make('price'),
                        TextColumn::make('start_time'),
                        TextColumn::make('end_time'),
                    
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
                            '2' => 'warning',
                            '3' => 'success',
                            '4' => 'dark',
                            '5' => 'danger',
                        }),
                    TextColumn::make('description')
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    // Ambil start_time dan end_time dari input
    $startTime = $get('start_time');
    $endTime = $get('end_time');

    // Periksa jika tanggal tidak valid
    if (!$startTime || !$endTime) {
        $set('price', 0); // Jika tanggal tidak ada, total harga direset ke 0
        return;
    }

    // Hitung jumlah hari sewa, minimal 1 hari
    $days = max(1, \Carbon\Carbon::parse($startTime)->diffInDays(\Carbon\Carbon::parse($endTime)));

    // Hitung total harga tanpa memperhatikan durasi
    $baseTotal = $selectedProducts->reduce(function ($total, $product) use ($prices) {
        return $total + ($prices[$product['product_id']] * $product['quantity']);
    }, 0);

    // Hitung total harga berdasarkan jumlah hari
    $totalPrice = $baseTotal * $days;

    // Set hasil total ke state 'price'
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
