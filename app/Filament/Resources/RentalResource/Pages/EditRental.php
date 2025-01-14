<?php

namespace App\Filament\Resources\RentalResource\Pages;

use App\Filament\EditRecordAndRedirectToIndex;
use App\Filament\Resources\RentalResource;
use Filament\Actions;

class EditRental extends EditRecordAndRedirectToIndex
{
    protected static string $resource = RentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
