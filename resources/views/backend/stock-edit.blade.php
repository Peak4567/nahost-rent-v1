@extends('backend.layout')

@section('content')
<div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">แก้ไขสต็อก: {{ $stock->item_name }}</h1>
    </div>

    <form action="{{ route('backend.stock.update', $stock->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

            <div class="lg:col-span-2 bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                <h2 class="text-lg font-bold text-slate-700 flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-[#7C3AED]"></i> แก้ไขข้อมูลสินค้า
                </h2>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">หมวดหมู่สินค้า</label>
                    <select name="category_id" required class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                        <option value="">เลือกหมวดหมู่...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" {{ $stock->category_id == $category->name ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อรายการ / รหัสสินค้า</label>
                    <input type="text" name="item_name" value="{{ old('item_name', $stock->item_name) }}" required
                        class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">ราคาต่อหน่วย (บาท)</label>
                    <input type="number" name="price" value="{{ old('price', $stock->price) }}" step="0.01" required
                        class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                </div>
            </div>

            <div class="lg:col-span-1 h-full">
                <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6 h-full">
                    <h2 class="text-lg font-bold text-slate-700 flex items-center gap-2">
                        <i class="fa-solid fa-gear text-[#7C3AED]"></i> สถานะรายการ
                    </h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะปัจจุบัน</label>
                        <select name="status" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                            <option value="draft" {{ $stock->status == 'draft' ? 'selected' : '' }}>ร่างบันทึก</option>
                            <option value="active" {{ $stock->status == 'active' ? 'selected' : '' }}>ใช้งานปกติ</option>
                            <option value="closed" {{ $stock->status == 'closed' ? 'selected' : '' }}>ปิดการขาย</option>
                        </select>
                    </div>

                    <label class="flex items-center gap-3 p-4 border border-slate-200 rounded-xl bg-slate-50 cursor-pointer hover:bg-slate-100 transition">
                        <input type="checkbox" name="is_featured" value="1" {{ $stock->is_featured ? 'checked' : '' }} class="w-5 h-5 rounded border-slate-300 text-[#7C3AED] focus:ring-[#7C3AED]">
                        <span class="text-sm font-medium text-slate-700">ตั้งเป็นรายการเด่น</span>
                    </label>
                </div>
            </div>

            <div class="lg:col-span-3 bg-white p-8 rounded-xl border border-slate-200">
                <label class="block text-sm font-semibold text-slate-700 mb-2">รายละเอียดเพิ่มเติม</label>
                <textarea name="description" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">{{ old('description', $stock->description) }}</textarea>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-2">
            <a href="{{ route('backend.stock') }}" class="px-8 py-3 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition">ยกเลิก</a>
            <button type="submit" class="bg-[#7C3AED] hover:bg-violet-700 text-white px-10 py-3 rounded-xl font-medium transition">บันทึกการแก้ไข</button>
        </div>
    </form>
</div>
@endsection