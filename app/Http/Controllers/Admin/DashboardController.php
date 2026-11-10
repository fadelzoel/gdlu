<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan memanggil view admin.dashboard
        return view('admin.dashboard');
    }
}