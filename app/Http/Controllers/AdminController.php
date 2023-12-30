<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index',
            [
                'count_products' => Product::count(),
                'count_products_active' => Product::where('status', 'active')->count(),
                'count_users' => User::count(),
                'count_users_active' => User::where('is_active', true)->count(),
            ]);
    }
}
