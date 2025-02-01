<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rental extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(RentalDetail::class);
    }
    public function rentalDetails(): HasMany
    {
        return $this->HasMany(RentalDetail::class);
    }
    
}
