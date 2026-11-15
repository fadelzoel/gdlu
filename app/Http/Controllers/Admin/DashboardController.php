<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalProducts' => Product::count(),
            'lowStockCount' => Product::where('quantity', '<=', Product::LOW_STOCK)->count(),
            'totalRevenue'  => Sale::sum('total_price'),
            'totalSales'    => Sale::count(),
            'totalUsers'    => User::count(),
            'recentSales'   => Sale::latest('sold_at')->take(5)->get(),
            'lowStock'      => Product::where('quantity', '<=', Product::LOW_STOCK)
                                ->orderBy('quantity')->take(5)->get(),
        ]);
    }
}
