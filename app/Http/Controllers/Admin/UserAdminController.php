<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->latest()->take(15)->get();
        return view('admin.users.index', compact('users'));
    }
}
