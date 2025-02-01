<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use App\Models\Rental;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function show()
{
    $rentals = Rental::with(['details.product', 'user'])->get();
    return view('show', compact('rentals')); // Use plural 'rentals'
}

}