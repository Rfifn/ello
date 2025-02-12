<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Product;
use App\Models\Category;
use App\Models\RentalDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function create()
    {   
        $products = Product::where('status', 0)
                          ->where('stock', '>', 0)
                          ->get();
        $categories = Category::all();
        // dd($products);
        return view('form', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'description' => 'required|string',
            'rentalDetails' => 'required|array|min:1',
            'rentalDetails.*.product_id' => 'required|exists:products,id',
            'rentalDetails.*.quantity' => 'required|integer|min:1'
        ]);

        // Calculate total price
        $totalPrice = 0;
        foreach ($request->rentalDetails as $detail) {
            $product = Product::find($detail['product_id']);
            if ($product->stock < $detail['quantity']) {
                return back()->withErrors(['message' => "Insufficient stock for {$product->name}"]);
            }
            $days = Carbon::parse($request->start_time)->diffInDays(Carbon::parse($request->end_time)) + 1;
            $totalPrice += $product->price * $detail['quantity'] * $days;
        }

        // Create rental
        $rental = Rental::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            // 'user_id' => auth()->id(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 0, // Unconfirmed
            'description' => $request->description,
            'price' => $totalPrice
        ]);

        // Create rental details and update stock
        foreach ($request->rentalDetails as $detail) {
            $rental->details()->create([
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity']
            ]);
            
            // Update product stock
            Product::where('id', $detail['product_id'])
                  ->decrement('stock', $detail['quantity']);
        }

        return redirect()->route('rentals.show', $rental)
                        ->with('success', 'Rental created successfully');
    }

    public function show(Rental $rental)
{
    // Load the relationships to avoid N+1 queries
    $rental->load(['details.product', 'user']);

    // Calculate rental duration in days
    $startDate = Carbon::parse($rental->start_time);
    $endDate = Carbon::parse($rental->end_time);
    $duration = $startDate->diffInDays($endDate) + 1;
    $rentals = Rental::with(['details.product', 'user'])->get();

    return view('show', compact('rental', 'rentals', 'duration'));
}
}