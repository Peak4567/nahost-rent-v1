@extends('layout')
@section('content')
    <section class="py-30 bg-gray-50/50 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="bg-purple-600 p-2 rounded-lg text-white shadow-lg">
                            <i class="fa-solid fa-gamepad-modern text-2xl"></i>
                        </div>
                        <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">บริการเติมเกมอัตโนมัติ</h2>
                    </div>
                    <p class="text-gray-500">เติมง่าย ได้ไว ปลอดภัย 100% ด้วยระบบอัตโนมัติ 24 ชั่วโมง</p>
                </div>

                <div class="flex items-center gap-2 bg-red-50 border border-red-100 px-4 py-2 rounded-2xl shadow-sm">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                    <span class="text-red-600 text-sm uppercase tracking-wide">ปิดเติมเกม</span>
                </div>
            </div>

            <div class="bg-white p-3 rounded-2xl border border-gray-100 mb-10 flex flex-col md:flex-row gap-3">
                <div class="relative flex-grow">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-purple-600/20 focus:bg-white transition-all text-sm"
                        placeholder="ค้นหาเกมที่คุณต้องการเติม...">
                </div>

                <div class="flex gap-2">
                    <button
                        class="px-5 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-medium hover:bg-purple-700 transition-all active:scale-95 whitespace-nowrap">
                        ค้นหา
                    </button>
                    <button
                        class="px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl text-sm font-medium hover:bg-gray-200 transition-all whitespace-nowrap">
                        ยอดนิยม
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">

                <a href="#"
                    class="group relative bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:border-purple-200">
                    <div class="relative aspect-square rounded-2xl overflow-hidden mb-4 border-2 border-gray-50">
                        <img src="{{ asset('assets/img/valo.png') }}" alt="Valorant"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute top-2 right-2 bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-lg shadow-lg flex items-center gap-1">
                            <i class="fa-solid fa-fire text-[8px]"></i> HOT
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="text-gray-800 text-base group-hover:text-purple-600 transition-colors truncate">
                            VALORANT</h3>
                        <p class="text-gray-400 text-[11px] mb-3">เติมแต้ม VP อัตโนมัติ</p>

                        <div
                            class="bg-purple-50 text-purple-600 py-2 rounded-xl text-xs group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            เลือกแพ็กเกจ
                        </div>
                    </div>
                </a>

                <a href="#"
                    class="group relative bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:border-purple-200">
                    <div class="relative aspect-square rounded-2xl overflow-hidden mb-4 border-2 border-gray-50">
                        <img src="{{ asset('assets/img/rov.png') }}" alt="ROV"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-center">
                        <h3 class="text-gray-800 text-base group-hover:text-purple-600 transition-colors truncate">
                            ROV</h3>
                        <p class="text-gray-400 text-[11px] mb-3">เติมคูปอง ราคาถูก</p>
                        <div
                            class="bg-purple-50 text-purple-600 py-2 rounded-xl text-xs group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            เลือกแพ็กเกจ
                        </div>
                    </div>
                </a>

                <a href="#"
                    class="group relative bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:border-purple-200">
                    <div class="relative aspect-square rounded-2xl overflow-hidden mb-4 border-2 border-gray-50">
                        <img src="{{ asset('assets/img/genshin.png') }}" alt="Genshin"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-center">
                        <h3 class="text-gray-800 text-base group-hover:text-purple-600 transition-colors truncate">
                            GENSHIN IMPACT</h3>
                        <p class="text-gray-400 text-[11px] mb-3">เติมคริสตัล ปลอดภัย</p>
                        <div
                            class="bg-purple-50 text-purple-600 py-2 rounded-xl text-xs group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            เลือกแพ็กเกจ
                        </div>
                    </div>
                </a>

            </div>

            <div
                class="mt-16 bg-white p-6 rounded-3xl border border-dashed border-purple-200 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="bg-purple-100 p-3 rounded-2xl text-purple-600">
                        <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-gray-800">ไม่พบเกมที่คุณต้องการ?</h4>
                        <p class="text-gray-500 text-sm">เรากำลังอัปเดตเกมใหม่ๆ เข้าสู่ระบบอย่างต่อเนื่อง</p>
                    </div>
                </div>
                <a href="#" class="text-purple-600 hover:underline decoration-2 underline-offset-4">
                    แจ้งเพิ่มเกมใหม่ <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </section>
@endsection
