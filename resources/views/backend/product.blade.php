@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">รายการสินค้า</h1>
                <p class="text-slate-500 mt-1">จัดการรายการสินค้าทั้งหมดในระบบของคุณ</p>
            </div>
            <a href="{{ route('backend.product.create') }}"
                class="bg-[#7C3AED] hover:bg-violet-700 text-white px-6 py-3 rounded-xl font-medium transition flex items-center justify-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus"></i> เพิ่มสินค้าใหม่
            </a>
        </div>

        @if (session('success'))
            <div class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200 flex items-center">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-slate-600 text-sm">
                            <th class="px-6 py-4 font-semibold">#</th>
                            <th class="px-6 py-4 font-semibold text-center w-24">รูปภาพ</th>
                            <th class="px-6 py-4 font-semibold">ชื่อสินค้า / แพ็กเกจ</th>
                            <th class="px-6 py-4 font-semibold">ราคาขาย</th>
                            <th class="px-6 py-4 font-semibold text-center">สถานะ</th>
                            <th class="px-6 py-4 font-semibold text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                        @forelse ($products as $product)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-slate-500">{{ $loop->iteration }}</td>
                                
                                <td class="px-6 py-4">
                                    <div class="w-14 h-14 bg-slate-100 rounded-xl flex items-center justify-center overflow-hidden border border-slate-200 mx-auto shadow-sm">
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-image text-slate-300 text-lg"></i>
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 font-medium text-slate-800">
                                    {{ $product->product_name }}
                                    @if($product->product_code)
                                        <div class="text-xs text-slate-400 font-normal mt-0.5"><i class="fa-solid fa-barcode mr-1"></i>{{ $product->product_code }}</div>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-[#57C84D] font-bold">
                                    {{ number_format($product->main_price, 2) }} ฿
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    @if($product->status === 'active')
                                        <span class="inline-flex items-center px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-full text-xs font-medium">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5"></span> วางจำหน่าย
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-slate-100 text-slate-500 border border-slate-200 rounded-full text-xs font-medium">
                                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full mr-1.5"></span> ปิดการขาย
                                        </span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('backend.product.edit', $product->id) }}"
                                            class="w-9 h-9 flex items-center justify-center text-blue-500 hover:text-white hover:bg-blue-500 bg-blue-50 rounded-xl transition-all" title="แก้ไข">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('backend.product.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบสินค้า {{ $product->product_name }} ?');" class="inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center text-rose-500 hover:text-white hover:bg-rose-500 bg-rose-50 rounded-xl transition-all" title="ลบ">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-slate-500">
                                    <i class="fa-solid fa-box-open text-5xl text-slate-300 mb-4 block"></i>
                                    <p class="text-lg font-medium text-slate-600">ยังไม่มีรายการสินค้าในระบบ</p>
                                    <p class="text-sm mt-1">คลิกปุ่ม "เพิ่มสินค้าใหม่" เพื่อเริ่มต้นขายแพ็กเกจของคุณ</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if(method_exists($products, 'links') && $products->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection