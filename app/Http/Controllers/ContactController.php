<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index(Request $request) {
    
        return view('contact');
    }
}
