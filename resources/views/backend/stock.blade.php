@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-medium text-slate-800">จัดการสต็อกสินค้า</h1>
                <p class="text-sm text-slate-500">คุณมีสินค้าทั้งหมด 12 รายการในสต็อก</p>
            </div>
            <a href="{{ route('backend.stock.create') }}"
                class="bg-[#7C3AED] hover:bg-violet-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                <i class="fa-solid fa-plus mr-2"></i> เพิ่มสินค้าใหม่
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-slate-600 text-sm">
                            <th class="px-6 py-4">ชื่อสินค้า</th>
                            <th class="px-6 py-4">หมวดหมู่</th>
                            <th class="px-6 py-4">ราคา (฿)</th>
                            <th class="px-6 py-4 text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                        @forelse ($stocks as $stock)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-slate-500">{{ $loop->iteration }}</td>

                                <td class="px-6 py-4 font-medium">{{ $stock->item_name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-xl text-xs font-medium">
                                        {{ $stock->category_id ?? 'ไม่ได้ระบุ' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ number_format($stock->price, 2) }}</td>
                                <td class="px-6 py-4 flex justify-center gap-2">
                                    <a href="{{ route('backend.stock.edit', $stock->id) }}"
                                        class="text-blue-500 hover:text-blue-700 p-2 bg-blue-50 rounded-xl transition inline-block">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('backend.stock.destroy', $stock->id) }}" method="POST"
                                        onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบรายการนี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-rose-500 hover:text-rose-700 p-2 bg-rose-50 rounded-xl transition">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                    <div class="flex flex-col items-center">
                                        <i class="fa-solid fa-box-open text-3xl text-slate-300 mb-3"></i>
                                        <p>ยังไม่มีรายการสินค้าในสต็อก</p>
                                        <a href="{{ route('backend.stock.create') }}"
                                            class="text-[#7C3AED] font-semibold mt-1">เพิ่มสินค้าใหม่ตอนนี้</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
