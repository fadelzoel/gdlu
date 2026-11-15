<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::query()
            ->when($request->search, function ($q, $s) {
                $q->where(function ($q) use ($s) {
                    $q->where('invoice_no', 'like', "%{$s}%")
                      ->orWhere('customer_name', 'like', "%{$s}%")
                      ->orWhere('product_name', 'like', "%{$s}%");
                });
            })
            ->when($request->from, fn ($q, $d) => $q->whereDate('sold_at', '>=', $d))
            ->when($request->to, fn ($q, $d) => $q->whereDate('sold_at', '<=', $d));

        $totals = [
            'transactions' => (clone $query)->count(),
            'items'        => (clone $query)->sum('quantity'),
            'revenue'      => (clone $query)->sum('total_price'),
        ];

        $sales = $query->latest('sold_at')->paginate(10)->withQueryString();

        return view('admin.sales.index', compact('sales', 'totals'));
    }
}
