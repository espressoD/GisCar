<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $produk = Product::latest()->take(5)->get();
        $sellers = Seller::with('user')->latest()->take(5)->get();
        $users = User::where('role', '!=', 'admin')->latest()->take(5)->get();

        return view('admin.dashboard', compact('produk', 'sellers', 'users'));
    }
}
