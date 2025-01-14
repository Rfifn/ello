<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;

class CreateCategory extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = CategoryResource::class;
}
