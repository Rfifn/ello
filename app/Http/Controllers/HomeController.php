<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function getProductHome(Request $request) {
        $products = Product::all();
        
        return view('dashboard', compact(['products']));
    }
}
