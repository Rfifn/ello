<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Product;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function show()
{
    $rentals = Rental::with(['details.product', 'user'])
        ->where('user_id', auth()->id())
        ->get();
    return view('show', compact('rentals')); // Use plural 'rentals'
}

    public function cancel($id)
    {
        try {
            $rental = Rental::findOrFail($id);
            
            // Check if the rental belongs to the authenticated user
            if ($rental->user_id !== Auth::id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk membatalkan pesanan ini.');
            }
            
            // Check if the rental can be cancelled (not already completed or cancelled)
            if ($rental->status == 2 || $rental->status == 3 || $rental->status == 4) {
                return redirect()->back()
                    ->with('error', 'Pesanan tidak dapat dibatalkan karena status saat ini.');
            }
            
            // Update the rental status to cancelled (4)
            $rental->status = 4;
            $rental->save();
            
            return redirect()->back()
                ->with('success', 'Pesanan berhasil dibatalkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat membatalkan pesanan.');
        }
    }
}