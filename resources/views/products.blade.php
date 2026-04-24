@extends('layout')
@section('content')
    <section class="py-30 bg-gray-50/50 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="bg-purple-600 p-2 rounded-lg text-white shadow-lg">
                            <i class="fa-solid fa-layer-group text-xl"></i>
                        </div>
                        <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">เลือกซื้อสินค้าหลัก</h2>
                    </div>
                    <p class="text-gray-500">ค้นหาและเลือกชมสินค้าคุณภาพสูงที่เราคัดสรรมาเพื่อคุณ</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <div class="relative flex-grow sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text"
                            class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 transition-all text-sm"
                            placeholder="ค้นหาชื่อสินค้า...">
                    </div>

                    <div class="relative sm:w-48">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-purple-600">
                            <i class="fa-solid fa-filter"></i>
                        </span>
                        <select
                            class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 transition-all text-sm appearance-none cursor-pointer text-gray-600">
                            <option value="">ทุกหมวดหมู่</option>
                            <option value="web">เว็บไซต์สำเร็จรูป</option>
                            <option value="script">สคริปต์ระบบ</option>
                            <option value="id">พรีเมียมไอดี</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>

                    <button
                        class="px-6 py-2.5 bg-purple-600 text-white rounded-xl font-medium hover:bg-purple-700 transition-all shadow-md shadow-purple-100 active:scale-95">
                        ค้นหา
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
                            <img src="{{ asset('/assets/img/Rent.png') }}" alt="Product"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div
                                    class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-md whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div
                                class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-lg text-sm">
                                ฿45.00
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider">
                                แอพพรีเมี่ยม
                            </span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-gray-200"></i>
                            </div>
                        </div>

                        <h3
                            class="text-gray-800 text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate">
                            NETFLIX PREMIUM
                        </h3>

                        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">
                            บริการรับชมความบันเทิงระดับพรีเมียม คมชัดระดับ 4K ใช้งานได้ยาวนาน รับประกันตลอดอายุการใช้งาน...
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-gray-700">99+ ชิ้น</span>
                            </div>

                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center hover:bg-purple-700 transition-all shadow-md active:scale-90">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
                            <img src="{{ asset('/assets/img/Rent.png') }}" alt="Product"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div
                                    class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-md whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div
                                class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-lg text-sm">
                                ฿45.00
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider">
                                แอพพรีเมี่ยม
                            </span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-gray-200"></i>
                            </div>
                        </div>

                        <h3
                            class="text-gray-800 text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate">
                            NETFLIX PREMIUM
                        </h3>

                        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">
                            บริการรับชมความบันเทิงระดับพรีเมียม คมชัดระดับ 4K ใช้งานได้ยาวนาน รับประกันตลอดอายุการใช้งาน...
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-gray-700">99+ ชิ้น</span>
                            </div>

                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center hover:bg-purple-700 transition-all shadow-md active:scale-90">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
                            <img src="{{ asset('/assets/img/Rent.png') }}" alt="Product"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div
                                    class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-md whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div
                                class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-lg text-sm">
                                ฿45.00
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider">
                                แอพพรีเมี่ยม
                            </span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-gray-200"></i>
                            </div>
                        </div>

                        <h3
                            class="text-gray-800 text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate">
                            NETFLIX PREMIUM
                        </h3>

                        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">
                            บริการรับชมความบันเทิงระดับพรีเมียม คมชัดระดับ 4K ใช้งานได้ยาวนาน รับประกันตลอดอายุการใช้งาน...
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-gray-700">99+ ชิ้น</span>
                            </div>

                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center hover:bg-purple-700 transition-all shadow-md active:scale-90">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
                            <img src="{{ asset('/assets/img/Rent.png') }}" alt="Product"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div
                                    class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-md whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div
                                class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-lg text-sm">
                                ฿45.00
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider">
                                แอพพรีเมี่ยม
                            </span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-gray-200"></i>
                            </div>
                        </div>

                        <h3
                            class="text-gray-800 text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate">
                            NETFLIX PREMIUM
                        </h3>

                        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">
                            บริการรับชมความบันเทิงระดับพรีเมียม คมชัดระดับ 4K ใช้งานได้ยาวนาน รับประกันตลอดอายุการใช้งาน...
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-gray-700">99+ ชิ้น</span>
                            </div>

                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center hover:bg-purple-700 transition-all shadow-md active:scale-90">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
                            <img src="{{ asset('/assets/img/Rent.png') }}" alt="Product"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div
                                    class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium shadow-md whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div
                                class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-lg shadow-lg text-sm">
                                ฿45.00
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-md uppercase tracking-wider">
                                แอพพรีเมี่ยม
                            </span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-gray-200"></i>
                            </div>
                        </div>

                        <h3
                            class="text-gray-800 text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate">
                            NETFLIX PREMIUM
                        </h3>

                        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">
                            บริการรับชมความบันเทิงระดับพรีเมียม คมชัดระดับ 4K ใช้งานได้ยาวนาน รับประกันตลอดอายุการใช้งาน...
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-gray-700">99+ ชิ้น</span>
                            </div>

                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center hover:bg-purple-700 transition-all shadow-md active:scale-90">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
