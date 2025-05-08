<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerAdminController extends Controller
{
    public function index()
    {
        $sellers = Seller::with('user')->latest()->take(15)->get();
        return view('admin.sellers.index', compact('sellers'));
    }
}
