@extends('layout')

@section('content')
    <section class="py-16 md:py-30 bg-gray-50/50 font-mitr min-h-screen">
        <div class="max-w-screen-xl mx-auto px-4">

            {{-- Header Section --}}
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="bg-purple-600 p-2 rounded-lg text-white shadow-sm">
                            <i class="fa-solid fa-layer-group text-xl"></i>
                        </div>
                        <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">เลือกซื้อสินค้าหลัก</h2>
                    </div>
                    <p class="text-gray-500">ค้นหาและเลือกชมสินค้าคุณภาพสูงที่เราคัดสรรมาเพื่อคุณ</p>
                </div>

                {{-- Search Form --}}
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <div class="relative flex-grow sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full pl-10 pr-10 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 transition-all text-sm"
                            placeholder="ค้นหาชื่อสินค้า...">
                    </div>

                    <div class="relative sm:w-48">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-purple-600">
                            <i class="fa-solid fa-filter"></i>
                        </span>
                        <select name="category" onchange="this.form.submit()"
                            class="w-full pl-10 pr-8 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 transition-all text-sm appearance-none cursor-pointer text-gray-600">
                            <option value="">ทุกหมวดหมู่</option>
                            @foreach($categories ?? [] as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-xl font-medium hover:bg-purple-700 transition active:scale-95 flex items-center justify-center gap-2">
                        <span>ค้นหา</span>
                    </button>
                </form>
            </div>

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @forelse($products ?? [] as $product)
                    {{-- ลบ hover:shadow-lg และ translate ออก --}}
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                        <div class="relative p-3">
                            <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-100 flex items-center justify-center">
                                {{-- ลบ group-hover:scale-110 ออก --}}
                                <img src="{{ $product->image ? asset($product->image) : asset('/assets/img/Rent.png') }}" 
                                     alt="{{ $product->product_name }}"
                                     class="w-full h-full object-cover">

                                <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                    <div class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-sm whitespace-nowrap">
                                        <i class="fa-solid fa-fire text-[10px] mr-1"></i>สินค้าแนะนำ
                                    </div>
                                </div>
                                <div class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-sm text-sm font-medium">
                                    ฿{{ number_format($product->main_price, 2) }}
                                </div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider font-semibold">
                                    {{ $product->category ? $product->category->name : 'ไม่มีหมวดหมู่' }}
                                </span>
                            </div>

                            {{-- ลบ group-hover:text-purple-600 ออก --}}
                            <h3 class="text-gray-800 text-lg mb-2 font-semibold uppercase truncate">
                                {{ $product->product_name }}
                            </h3>

                            <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2 min-h-[36px]">
                                {{ $product->description ?? 'ไม่มีรายละเอียดระบุไว้...' }}
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                    <span class="text-sm text-gray-700 font-bold">
                                        {{ $product->stocks ? $product->stocks->count() : 0 }} ชิ้น
                                    </span>
                                </div>

                                <div class="flex gap-2">
                                    {{-- ลบ group-hover:bg-purple-700 ออก --}}
                                    <a href="{{ route('product.detail', $product->id) }}" class="px-4 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center gap-2 hover:bg-purple-700 transition text-sm font-medium">
                                        <i class="fa-regular fa-eye"></i> รายละเอียด
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16 text-gray-400">
                        <i class="fa-solid fa-box-open text-6xl mb-4 text-gray-200"></i>
                        <p class="text-lg font-medium">ไม่พบสินค้าที่คุณค้นหา</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection