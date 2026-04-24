<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category', compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_visible' => 'required|boolean'
        ], [
            'name.required' => 'กรุณากรอกชื่อหมวดหมู่'
        ]);

        Category::create($request->except(['_token']));

        return back()->with('success', 'บันทึกหมวดหมู่ใหม่สำเร็จเรียบร้อย');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->get();

        return view('backend.category-edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_visible' => 'required|boolean'
        ], [
            'name.required' => 'กรุณากรอกชื่อหมวดหมู่'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->except(['_token', '_method']));

        return back()->with('success', 'อัปเดตข้อมูลหมวดหมู่สำเร็จ');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $isUsed = Stock::where('category_id', $category->description)->exists();

        if ($isUsed) {
            return back()->withErrors(['error' => 'ไม่สามารถลบหมวดหมู่ "' . $category->name . '" ได้ เนื่องจากกำลังถูกใช้งานอยู่ในระบบสต็อกสินค้า']);
        }

        $category->delete();

        return back()->with('success', 'ลบหมวดหมู่สำเร็จแล้ว');
    }
}
