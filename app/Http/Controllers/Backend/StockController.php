<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Category;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('backend.stock', compact('stocks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.stock-create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name'   => 'required|string|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
        ]);

        Stock::create([
            'item_name'   => $request->item_name,
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'status'      => $request->status ?? 'draft',
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'description' => $request->description,
        ]);

        return redirect()->route('backend.stock')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function edit(Stock $stock)
    {
        $categories = Category::all();
        return view('backend.stock-edit', compact('stock', 'categories'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'item_name'   => 'required|string|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
        ]);

        $stock->update([
            'item_name'   => $request->item_name,
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'status'      => $request->status,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'description' => $request->description,
        ]);

        return redirect()->route('backend.stock')->with('success', 'แก้ไขสินค้าสำเร็จ');
    }
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('backend.stock')->with('success', 'ลบรายการสำเร็จแล้ว');
    }
}
