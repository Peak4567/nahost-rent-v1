<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.product', compact('products'));
    }
    public function edit(Product $product)
    {
        return view('backend.product-edit', compact('product'));
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'ลบสินค้าสำเร็จ');
    }
}
