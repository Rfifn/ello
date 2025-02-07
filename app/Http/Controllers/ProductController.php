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
        $query = Product::query();
    
        // Filter by category if selected
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
    
        // Additional filtering options can be added here
        // For example, filtering by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
    
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
    
        // Filter by availability status
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
    
        $products = $query->get();
        $categories = Category::all();
    
        return view('product', compact('products', 'categories'));
    }
    public function detail(Product $product)
{
    return view('detail', compact('product'));
}
}
