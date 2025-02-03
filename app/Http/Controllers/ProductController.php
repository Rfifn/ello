<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function getProduct(Request $request) {
        // dd($request->input('category_id'));
        $category_id = $request->input('category_id');
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            // dd($request->input('category_id'));
        } else {
            $products = Product::all();
        }

        $categories = Category::all();
        return view('product', compact(['products', 'categories']));
    }
    
    public function detail(Product $product)
{
    return view('detail', compact('product'));
}
}
