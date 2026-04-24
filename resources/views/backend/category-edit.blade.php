@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">แก้ไขหมวดหมู่: <span class="text-[#7C3AED]">{{ $category->name }}</span></h1>
        </div>

        @if (session('success'))
            <div class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200 flex items-center">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-auto mb-6 p-4 bg-red-50 text-red-600 rounded-xl border border-red-200">
                <ul class="list-disc list-inside text-sm font-medium">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mx-auto grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
            
            <form action="{{ route('backend.category.update', $category->id) }}" method="POST" class="xl:col-span-2 space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                    <h2 class="text-xl font-bold text-slate-800"><i class="fa-solid fa-pen-to-square text-[#7C3AED] mr-2"></i>
                        แก้ไขข้อมูลหลัก</h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อหมวดหมู่ <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                            class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">คำอธิบาย</label>
                        <textarea name="description" rows="5"
                            class="w-full px-5 py-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะการแสดงผล</label>
                        <select name="is_visible" class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50">
                            <option value="1" {{ old('is_visible', $category->is_visible) == 1 ? 'selected' : '' }}>แสดงผลทันที</option>
                            <option value="0" {{ old('is_visible', $category->is_visible) == 0 ? 'selected' : '' }}>ซ่อนหมวดหมู่</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('backend.category.index') }}"
                        class="px-8 py-3.5 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition">ยกเลิก</a>
                    <button type="submit"
                        class="bg-[#7C3AED] hover:bg-violet-700 text-white px-12 py-3.5 rounded-xl font-medium transition">
                        บันทึกการเปลี่ยนแปลง
                    </button>
                </div>
            </form>

            <div class="bg-white p-8 rounded-xl border border-slate-200 xl:h-[565px] flex flex-col">
                <h2 class="text-lg font-bold text-slate-700 mb-6"><i
                        class="fa-solid fa-folder-tree text-[#7C3AED] mr-2"></i> หมวดหมู่ทั้งหมด</h2>

                <div class="space-y-3 flex-1 overflow-y-auto pr-2">
                    @forelse($categories as $cat)
                        <div class="flex items-center justify-between gap-3 p-4 border rounded-xl transition-all 
                                {{ $cat->id == $category->id ? 'bg-violet-50 border-violet-200' : 'border-slate-100 bg-slate-50' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center
                                    {{ $cat->id == $category->id ? 'bg-[#7C3AED] text-white' : 'bg-violet-100 text-[#7C3AED]' }}">
                                    <i class="fa-solid fa-folder"></i>
                                </div>
                                <p class="font-medium {{ $cat->id == $category->id ? 'text-[#7C3AED]' : 'text-slate-800' }}">
                                    {{ $cat->name }}
                                </p>
                            </div>
                            @if ($cat->is_visible)
                                <span class="{{ $cat->id == $category->id ? 'text-violet-500' : 'text-emerald-500' }}">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
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