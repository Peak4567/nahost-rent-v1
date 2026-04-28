@extends('layout')

@section('content')
    <section class="py-16 md:py-24 bg-gray-50/50 font-mitr min-h-screen">
        <div class="max-w-screen-xl mx-auto px-4">
            @if(session('error'))
                <div class="bg-red-100 border border-red-200 text-red-600 p-4 rounded-xl mb-6 font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-lg"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-xl border border-gray-200 p-6 md:p-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
                    
                    <div class="w-full aspect-[4/3] bg-gray-100 rounded-xl overflow-hidden border border-gray-100 relative flex items-center justify-center">
                        <img src="{{ $product->image ? asset($product->image) : asset('/assets/img/Rent.png') }}" 
                             alt="{{ $product->product_name }}"
                             class="w-full h-full object-cover">
                        
                        <div class="absolute top-4 left-4">
                            <div class="bg-red-500 text-white text-[12px] px-4 py-1.5 rounded-lg font-medium tracking-wide">
                                <i class="fa-solid fa-fire mr-1"></i> สินค้าแนะนำ
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-col h-full">
                        
                        <div class="flex items-center gap-4 mb-4">
                            <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-lg text-sm font-semibold uppercase tracking-wider">
                                {{ $product->category ? $product->category->name : 'ไม่มีหมวดหมู่' }}
                            </span>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-medium text-gray-800 mb-4 leading-tight">
                            {{ $product->product_name }}
                        </h1>

                        <div class="mb-6">
                            <span class="text-4xl font-medium text-purple-600">฿{{ number_format($product->main_price, 2) }}</span>
                            <span class="text-gray-400 ml-2">/ รายการ</span>
                        </div>

                        <hr class="border-gray-100 mb-6">

                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">รายละเอียดสินค้า</h3>
                            <p class="text-gray-500 leading-relaxed min-h-[100px]">
                                {{ $product->description ?? 'ผู้ขายยังไม่ได้ระบุรายละเอียดสำหรับสินค้านี้...' }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3 mb-8 bg-gray-50 p-4 rounded-xl border border-gray-100">
                            @if($product->stocks && $product->stocks->count() > 0)
                                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-lg">
                                    <i class="fa-solid fa-box-open"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">สถานะสินค้า</p>
                                    <p class="font-medium text-gray-800">มีพร้อมส่ง ({{ $product->stocks->count() }} ชิ้น)</p>
                                </div>
                            @else
                                <div class="w-10 h-10 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-lg">
                                    <i class="fa-solid fa-box-archive"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">สถานะสินค้า</p>
                                    <p class="font-medium text-red-500">สินค้าหมดชั่วคราว</p>
                                </div>
                            @endif
                        </div>

                        <div class="mt-auto">
                            @if($product->stocks && $product->stocks->count() > 0)
                                <form action="{{ route('frontend.cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                        class="w-full md:w-auto px-10 py-4 bg-purple-600 text-white rounded-xl font-medium text-lg hover:bg-purple-700 transition-all active:scale-95 flex items-center justify-center gap-3 shadow-md shadow-purple-200">
                                        <i class="fa-solid fa-cart-plus text-xl"></i>
                                        เพิ่มลงตะกร้าเลย
                                    </button>
                                </form>
                            @else
                                <button disabled 
                                    class="w-full px-10 py-4 bg-gray-200 text-gray-400 rounded-xl font-medium text-lg cursor-not-allowed flex items-center justify-center gap-3">
                                    <i class="fa-solid fa-ban text-xl"></i>
                                    สินค้าหมด
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection