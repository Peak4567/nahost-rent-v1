@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">รายการสินค้า</h1>
                <p class="text-slate-500 mt-1">จัดการรายการสินค้าทั้งหมดในระบบของคุณ</p>
            </div>
            <a href="{{ route('backend.product.create') }}"
                class="bg-[#7C3AED] hover:bg-violet-700 text-white px-6 py-3 rounded-xl font-medium transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-plus"></i> เพิ่มสินค้าใหม่
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-slate-600 text-sm">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">รูปภาพ</th>
                            <th class="px-6 py-4">ชื่อสินค้า</th>
                            <th class="px-6 py-4">ราคาขาย</th>
                            <th class="px-6 py-4">สถานะ</th>
                            <th class="px-6 py-4 text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                        @forelse ($products as $product)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div
                                        class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center overflow-hidden">
                                        <i class="fa-solid fa-image text-slate-300"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                                <td class="px-6 py-4">{{ number_format($product->price, 2) }} ฿</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 {{ $product->is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-100 text-slate-500' }} rounded-xl text-xs font-medium">
                                        {{ $product->is_active ? 'วางจำหน่าย' : 'ปิดการขาย' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 flex justify-center gap-2">
                                    <a href="{{ route('backend.product.edit', $product->id) }}"
                                        class="text-blue-500 hover:text-blue-700 p-2 bg-blue-50 rounded-xl transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('backend.product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('ยืนยันการลบสินค้า?');">
                                        @csrf @method('DELETE')
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
                                    <i class="fa-solid fa-box-open text-3xl text-slate-300 mb-3 block"></i>
                                    ยังไม่มีรายการสินค้าเพิ่มในระบบ
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
