<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();
        
        $stats = [
            'total_products' => Product::count(),
            'total_users'    => User::count(),
            'total_sales'    => Order::count(),
            'avg_rating'     => Product::avg('rating') ?? 5.0,
        ];

        return view('home', compact('products', 'stats'));
    }
}