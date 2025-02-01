<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use App\Models\Rental;
use Carbon\Carbon;

class RentController extends Controller
{
    public function index(Request $request) {
    
        return view('rent');
    }
}
