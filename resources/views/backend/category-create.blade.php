@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">เพิ่มสต็อก</h1>
        </div>

        @if (session('success'))
            <div class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="mx-auto grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">

            <form action="{{ route('backend.category.store') }}" method="POST" class="xl:col-span-2 space-y-6">
                @csrf

                <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                    <h2 class="text-xl font-bold text-slate-800"><i class="fa-solid fa-folder-plus text-[#7C3AED] mr-2"></i>
                        ข้อมูลหลัก</h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อหมวดหมู่</label>
                        <input type="text" name="name" required
                            class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">คำอธิบาย</label>
                        <textarea name="description" rows="5"
                            class="w-full px-5 py-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะการแสดงผล</label>
                        <select name="is_visible" class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50">
                            <option value="1">แสดงผลทันที</option>
                            <option value="0">ซ่อนหมวดหมู่</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('backend.category.index') }}"
                        class="px-8 py-3.5 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition">ยกเลิก</a>
                    <button type="submit"
                        class="bg-[#7C3AED] hover:bg-violet-700 text-white px-12 py-3.5 rounded-xl font-medium transition">
                        บันทึกหมวดหมู่ใหม่
                    </button>
                </div>
            </form>

            <div class="bg-white p-8 rounded-xl border border-slate-200 xl:h-[565px] flex flex-col">
                <h2 class="text-lg font-bold text-slate-700 mb-6"><i
                        class="fa-solid fa-folder-tree text-[#7C3AED] mr-2"></i> หมวดหมู่ทั้งหมด</h2>

                <div class="space-y-3 flex-1 overflow-y-auto pr-2">
                    @forelse($categories as $cat)
                        <div
                            class="flex items-center justify-between gap-3 p-4 border border-slate-100 rounded-xl bg-slate-50">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-lg bg-violet-100 text-[#7C3AED] flex items-center justify-center">
                                    <i class="fa-solid fa-folder"></i>
                                </div>
                                <p class="font-medium text-slate-800">{{ $cat->name }}</p>
                            </div>
                            @if ($cat->is_visible)
                                <span class="text-emerald-500"><i class="fa-solid fa-circle-check"></i></span>
                            @endif
                        </div>
                    @empty
                        <p class="text-center text-slate-400 py-10">ยังไม่มีหมวดหมู่</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
