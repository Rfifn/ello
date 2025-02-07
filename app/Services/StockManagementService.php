<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Rental;
use App\Models\RentalDetail;

class StockManagementService
{
    /**
     * Mengurangi stok produk saat disewa
     */
    public function decreaseStock(Rental $rental): void
    {
        foreach ($rental->rentalDetails as $detail) {
            $product = Product::find($detail->product_id);
            if ($product) {
                $product->stock -= $detail->quantity;
                $product->save();
            }
        }
    }

    /**
     * Menambah stok produk saat dikembalikan
     */
    public function increaseStock(Rental $rental): void
    {
        foreach ($rental->rentalDetails as $detail) {
            $product = Product::find($detail->product_id);
            if ($product) {
                $product->stock += $detail->quantity;
                $product->save();
            }
        }
    }

    /**
     * Mengecek ketersediaan stok
     */
    public function checkStock(array $rentalDetails): bool
    {
        foreach ($rentalDetails as $detail) {
            $product = Product::find($detail['product_id']);
            if (!$product || $product->stock < $detail['quantity']) {
                return false;
            }
        }
        return true;
    }
}