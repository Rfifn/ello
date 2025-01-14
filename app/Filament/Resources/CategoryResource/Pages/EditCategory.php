<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\EditRecordAndRedirectToIndex;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;

class EditCategory extends EditRecordAndRedirectToIndex
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
