<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\ProductResource;
use Filament\Actions;

class CreateProduct extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = ProductResource::class;
}
