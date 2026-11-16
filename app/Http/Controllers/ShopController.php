<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Homepage: hero + latest products that are still in stock
    public function home()
    {
        $latest = Product::where('quantity', '>', 0)->latest()->take(8)->get();

        return view('home', compact('latest'));
    }

    // Full catalog with search / size filter / sorting
    public function catalog(Request $request)
    {
        $products = Product::query()
            ->when($request->q, fn ($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->when($request->size, fn ($q, $s) => $q->where('size', $s))
            ->when($request->boolean('in_stock'), fn ($q) => $q->where('quantity', '>', 0));

        match ($request->sort) {
            'price_asc'  => $products->orderBy('price'),
            'price_desc' => $products->orderByDesc('price'),
            'name'       => $products->orderBy('name'),
            default      => $products->latest(),
        };

        $products = $products->paginate(12)->withQueryString();

        return view('products.index', compact('products'));
    }

    // Product detail page
    public function show(Product $product)
    {
        // same product name in other sizes
        $variants = Product::where('name', $product->name)
            ->where('id', '!=', $product->id)
            ->get();

        $related = Product::where('id', '!=', $product->id)
            ->where('quantity', '>', 0)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'variants', 'related'));
    }
}
