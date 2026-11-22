<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    // Single-page store: hero + every product from the database
    public function home()
    {
        // in-stock first, newest first
        $products = Product::query()
            ->orderByRaw('CASE WHEN quantity > 0 THEN 0 ELSE 1 END')
            ->latest()
            ->get();

        return view('home', compact('products'));
    }
}
