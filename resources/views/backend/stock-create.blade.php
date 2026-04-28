@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">เพิ่มสต็อก</h1>
        </div>

        <form action="{{ route('backend.stock.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                <div class="lg:col-span-2 bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                    <h2 class="text-lg font-bold text-slate-700 flex items-center gap-2">
                        <i class="fa-solid fa-box-open text-[#7C3AED]"></i> ข้อมูลสินค้า
                    </h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">หมวดหมู่สินค้า</label>
                        <select name="category_id" required
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                            <option value="">เลือกหมวดหมู่...</option>

                            @foreach ($categories as $category)
                                @if ($category->is_visible == 1)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                        </select>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ข้อมูลไอดี / รหัสสินค้า (Item
                            Name)</label>
                        <input type="text" name="item_name" required
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition"
                            placeholder="เช่น Netflix 30 Day">
                    </div>
                </div>

                <div class="lg:col-span-1 h-full">
                    <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6 h-full">
                        <h2 class="text-lg font-bold text-slate-700 flex items-center gap-2">
                            <i class="fa-solid fa-gear text-[#7C3AED]"></i> สถานะรายการ
                        </h2>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะปัจจุบัน</label>
                            <select name="status"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                                <option value="พร้อมขาย">พร้อมขาย</option>
                                <option value="ขายแล้ว">ขายแล้ว</option>
                                <option value="ระงับการขาย">ระงับการขาย</option>
                            </select>
                        </div>

                        <label
                            class="flex items-center gap-3 p-4 border border-slate-200 rounded-xl bg-slate-50 cursor-pointer hover:bg-slate-100 transition">
                            <input type="checkbox" name="is_featured" value="1"
                                class="w-5 h-5 rounded border-slate-300 text-[#7C3AED] focus:ring-[#7C3AED]">
                            <span class="text-sm font-medium text-slate-700">ตั้งเป็นรายการเด่น</span>
                        </label>
                    </div>
                </div>

                <div class="lg:col-span-3 bg-white p-8 rounded-xl border border-slate-200">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">รายละเอียดข้อมูลไอดี / รหัสผ่าน</label>
                    <textarea name="description" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition"
                        placeholder="ระบุไอดีและรหัสผ่าน หรือลิงก์..."></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-2">
                <a href="{{ route('backend.stock') }}"
                    class="px-8 py-3 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition flex items-center">ยกเลิก</a>
                <button type="submit"
                    class="bg-[#7C3AED] hover:bg-violet-700 text-white px-10 py-3 rounded-xl font-medium transition">เพิ่มสต็อก</button>
            </div>
        </form>
    </div>
@endsection
