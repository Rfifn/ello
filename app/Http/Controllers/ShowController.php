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
    $rentals = Rental::with(['details.product', 'user'])
        ->where('user_id', auth()->id())
        ->get();
    return view('show', compact('rentals')); // Use plural 'rentals'
}

public function destroy(Rental $rental)
{
    try {
        // Check if user has permission to delete
        if (!auth()->user()->can('delete', $rental)) {
            return response()->json([
                'message' => 'Unauthorized action.'
            ], 403);
        }

        // Delete the rental
        $rental->delete();

        return response()->json([
            'message' => 'Rental deleted successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error deleting rental'
        ], 500);
    }
}


}