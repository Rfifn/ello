<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function getDetail(Request $request, $productId) {
        // dd($request->input('category_id'));
        $product = Product::find($productId);

        return view('detail', compact(['product']));
    }
}
