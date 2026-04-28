<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_visible', 1)->orderBy('name', 'asc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        
        $stocks = Stock::whereNull('product_id')->get();

        return view('backend.product-create', compact('categories', 'products', 'stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'main_price' => 'required|numeric|min:0',
            'agent_price' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'product_code' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ], [
            'image.required' => 'กรุณาอัปโหลดรูปภาพสินค้า',
            'image.image' => 'ไฟล์ที่อัปโหลดต้องเป็นรูปภาพเท่านั้น',
            'image.max' => 'ขนาดรูปภาพต้องไม่เกิน 2MB',
            'product_name.required' => 'กรุณากรอกชื่อแพ็กเกจ',
            'main_price.required' => 'กรุณากรอกราคาปกติ'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $imagePath = 'uploads/products/' . $filename;
        }

        $productCode = $request->product_code;
        if (empty($productCode)) {
            $productCode = 'NAHOST-' . strtoupper(Str::random(6));
        }

        $product = Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price' => $request->agent_price,
            'status' => $request->status,
            'product_code' => $productCode,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        if ($request->has('stock_ids')) {
            Stock::whereIn('id', $request->stock_ids)->update(['product_id' => $product->id]);
        }

        return back()->with('success', 'บันทึกสินค้าใหม่เรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $product = Product::with('stocks')->findOrFail($id);
        $categories = Category::where('is_visible', 1)->get();

        $stocks = Stock::whereNull('product_id')
            ->orWhere('product_id', $product->id)
            ->get();


        return view('backend.product-edit', compact('product', 'categories', 'stocks'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'main_price' => 'required|numeric|min:0',
            'agent_price' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string'
        ]);

        $imagePath = $product->image;
        
        if ($request->hasFile('image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $imagePath = 'uploads/products/' . $filename;
        }

        $product->update([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price' => $request->agent_price,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        Stock::where('product_id', $product->id)->update(['product_id' => null]);
        if ($request->has('stock_ids')) {
            Stock::whereIn('id', $request->stock_ids)->update(['product_id' => $product->id]);
        }

        return back()->with('success', 'อัปเดตข้อมูลสินค้าเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        Stock::where('product_id', $product->id)->update(['product_id' => null]);

        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();
        return back()->with('success', 'ลบสินค้าสำเร็จ');
    }
}