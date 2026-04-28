<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'stocks' => function($q) {
            $q->where('status', '!=', 'ขายแล้ว')->orWhereNull('status');
        }])->where('status', 'active');

        if ($request->filled('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        $products = $query->orderBy('id', 'desc')->get();

        $categories = Category::where('is_visible', 1)->get();

        return view('frontend.products', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'stocks' => function($q) {
            $q->where('status', '!=', 'ขายแล้ว')->orWhereNull('status');
        }])->findOrFail($id);

        return view('frontend.product-detail', compact('product'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::with(['stocks' => function($q) {
            $q->where('status', '!=', 'ขายแล้ว')->orWhereNull('status');
        }])->findOrFail($id);
        
        $availableStock = $product->stocks ? $product->stocks->count() : 0;

        if ($availableStock <= 0) {
            return redirect()->back()->with('error', 'ขออภัย สินค้านี้หมดชั่วคราว');
        }

        $cart = session()->get('cart', []);
        $currentCartQty = isset($cart[$id]) ? $cart[$id]['quantity'] : 0;

        if ($currentCartQty >= $availableStock) {
            return redirect()->back()->with('error', 'ไม่สามารถเพิ่มจำนวนได้มากกว่าสต็อกที่มีอยู่ (จำนวนสูงสุด: ' . $availableStock . ' ชิ้น)');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->main_price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('frontend.cart.index')->with('success', 'เพิ่มสินค้าลงตะกร้าเรียบร้อยแล้ว!');
    }
}