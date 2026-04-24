@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">จัดการหมวดหมู่</h1>
            </div>
            <a href="{{ route('backend.category.create') }}"
                class="bg-[#7C3AED] hover:bg-violet-700 text-white px-6 py-3 rounded-xl font-medium transition flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> เพิ่มหมวดหมู่ใหม่
            </a>
        </div>

        @if (session('success'))
            <div
                class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200 flex items-center">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mx-auto mb-6 p-4 bg-red-50 text-red-600 rounded-xl border border-red-200 flex items-center">
                <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                <ul class="list-none text-sm font-medium">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm uppercase tracking-wider">
                            <th class="px-6 py-4 font-semibold text-center w-20">ลำดับ</th>
                            <th class="px-6 py-4 font-semibold">ชื่อหมวดหมู่</th>
                            <th class="px-6 py-4 font-semibold">คำอธิบาย</th>
                            <th class="px-6 py-4 font-semibold text-center">สถานะ</th>
                            <th class="px-6 py-4 font-semibold text-center w-40">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($categories as $cat)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-center text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium text-slate-800">{{ $cat->name }}</td>
                                <td class="px-6 py-4 text-slate-500 text-sm max-w-xs truncate"
                                    title="{{ $cat->description }}">
                                    {{ $cat->description ?: '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($cat->is_visible)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5"></span> แสดงผล
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full mr-1.5"></span> ซ่อนอยู่
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- ปุ่มแก้ไข --}}
                                        <a href="{{ route('backend.category.edit', $cat->id) }}"
                                            class="w-9 h-9 flex items-center justify-center rounded-xl bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white transition-all"
                                            title="แก้ไข">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- ปุ่มลบ --}}
                                        <form action="{{ route('backend.category.destroy', $cat->id) }}" method="POST"
                                            onsubmit="return confirm('ยืนยันการลบหมวดหมู่ {{ $cat->name }} ใช่หรือไม่?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all"
                                                title="ลบ">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-slate-400">
                                    <i class="fa-solid fa-folder-open text-5xl mb-4 text-slate-200"></i>
                                    <p class="text-lg">ยังไม่มีข้อมูลหมวดหมู่</p>
                                    <p class="text-sm mt-1">คลิกปุ่ม "เพิ่มหมวดหมู่ใหม่" เพื่อเริ่มต้น</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($categories, 'links') && $categories->hasPages())
                <div class="p-4 border-t border-slate-200 bg-slate-50">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
