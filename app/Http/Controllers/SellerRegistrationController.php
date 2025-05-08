<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerRegistrationController extends Controller
{
    public function create()
    {
        return view('seller.register');
    }

    public function store(Request $request)
{
    $request->validate([
        'company_name' => 'required',
        'company_address' => 'nullable',
        'phone' => 'nullable',
    ]);

    $user = Auth::user();

    Seller::create([
        'user_id' => $user->id,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'phone' => $request->phone,
    ]);

    $user->role = 'penjual';
    $user->is_seller = true;
    $user->save();

    $user = $user->fresh();
    Auth::logout();
    Auth::login($user);


    return redirect()->route('seller.dashboard')->with('success','Berhasil daftar jadi penjual');
}


}