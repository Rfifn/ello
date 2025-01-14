<?php

namespace App\Filament\Resources\RentalResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\RentalResource;
use Filament\Actions;

class CreateRental extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = RentalResource::class;
}
