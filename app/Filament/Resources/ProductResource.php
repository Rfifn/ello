<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $navigationGroup = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->required()
                    ->label('Nama Barang'),
                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->preload()
                    ->searchable(),
                TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->required()
                    ->label('Deskripsi'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->step(100)
                    ->label('Harga Barang (per-satuan dalam bentuk rupiah)'),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->label('Stok Barang'),
                Select::make('status')
                    ->required()
                    ->options([
                        0 => 'Tersedia',
                        1 => 'Tidak Tersedia',
                    ]),
                FileUpload::make('images')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->label('Tambahkan Gambar'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->limit(30) // Batasi jumlah karakter yang ditampilkan
                    ->tooltip(fn(Product $record): string => $record->name) // Tampilkan teks lengkap saat dihover
                    ->description(fn(Product $record): string => Str::limit($record->description, 50)) // Batasi deskripsi juga
                    ->tooltip(fn(Product $record): string => $record->description),
                TextColumn::make('price')
                    ->money('IDR'),
                TextColumn::make('stock')
                    ->searchable(),
                ImageColumn::make('images')
                    ->disk('public')
                    ->circular()
                    ->stacked(),
                SelectColumn::make('status')
                    ->options([
                        '0' => 'Tersedia',
                        '1' => 'Tidak Tersedia',
                    ]),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'name')
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
                // ...
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
