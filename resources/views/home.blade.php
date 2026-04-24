@extends('layout')
@section('content')
    <section
        class="relative font-mitr w-full min-h-[600px] md:min-h-[600px] flex items-center justify-center overflow-hidden py-20 my-0">

        <div class="absolute inset-0 bg-purple-500 z-0"></div>

        <div class="stars-container">
            <div class="stars"></div>
            <div class="stars-2"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 flex flex-col items-center justify-center">
            <div class="text-center text-white w-full max-w-3xl mx-auto">

                <div class="inline-flex items-center gap-3 bg-white px-5 py-2 rounded-full mb-2 border border-purple-200">
                    <span class="text-sm font-medium text-black">
                        <span class="text-purple-600">NaHost</span> เช่าเว็บไซต์ Version V1.0.0
                    </span>
                    <div class="bg-purple-100 p-1.5 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-bookmark text-purple-600 text-xs"></i>
                    </div>
                </div>

                <h1 class="text-[2.8rem] md:text-6xl font-medium tracking-tight mb-6 leading-tight">
                    Rent ยินดีต้อนรับ
                </h1>

                <p class="text-[1.1rem] md:text-xl opacity-90 leading-relaxed mb-10 max-w-2xl mx-auto">
                    ประสบการณ์การเช่าเว็บไซต์ที่มีประสิทธิภาพ <br class="hidden md:block" />
                    และการใช้งานที่เรียบง่าย ตอบโจทย์ผู้ใช้บริการ!
                </p>

                <hr class="border-white/15 mb-10 w-3/4 max-w-md mx-auto">

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full max-w-lg mx-auto">
                    <a href="#"
                        class="flex items-center justify-center gap-3 w-full py-3 px-8 bg-white rounded-xl text-lg text-purple-600 transition-all duration-300 hover:bg-purple-50 active:scale-[0.98]">
                        <i class="fa-duotone fa-rocket text-xl"></i>
                        เริ่มต้นใช้งาน
                    </a>

                    <a href="#"
                        class="flex items-center justify-center gap-3 w-full py-3 px-8 bg-white/20 rounded-xl text-lg text-white transition-all duration-300 hover:bg-white/30 active:scale-[0.98] border border-white/20">
                        <i class="fa-duotone fa-headset text-xl"></i>
                        ติดต่อแอดมิน
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full z-0 leading-[0] translate-y-px">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                class="block w-full h-[120px] md:h-[180px] lg:h-[240px] -mt-[1px]" preserveAspectRatio="none">
                <path fill="#FEFFFF" fill-opacity="1" stroke="none"
                    d="M0,224 C400,288 500,160 1440,192 L1440,320 L0,320 Z"></path>
            </svg>
        </div>
    </section>

    <section class="py-12 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-2xl">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div>
                    <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">สินค้าแนะนำ!</h2>
                    <p class="text-gray-400 text-sm md:text-base mt-1">เป็นสินค้าแนะนำหรือขายดีที่สุดภายในร้านค้าของเราเอง!
                    </p>
                </div>
            </div>

            <hr class="border-gray-200 mb-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <div
                    class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div
                            class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
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


                
                <div
                    class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div
                            class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
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
                <div
                    class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div
                            class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
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
                <div
                    class="group bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col">

                    <div class="relative p-3">
                        <div
                            class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-900">
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


    <section class="py-12 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-xl shadow-md">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                    <h2 class="text-black font-medium text-2xl leading-none">ข้อมูลเว็บไซต์</h2>
                    <p class="text-gray-400 text-sm mt-1">เกี่ยวกับข้อมูลเว็บไซต์ของเรา!</p>
                </div>
            </div>

            <hr class="border-gray-200 mb-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white p-6 rounded-xl border-2 border-gray-50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-16 h-16 shrink-0 bg-purple-500 rounded-xl flex items-center justify-center text-white text-3xl shadow-sm shadow-purple-100">
                            <i class="fa-duotone fa-box-open"></i>
                        </div>
                        <div class="flex-grow text-center">
                            <h3 class="text-purple-500 font-medium text-lg">สินค้าทั้งหมด</h3>
                            <p class="text-gray-400 text-[10px] mb-2 uppercase tracking-wide">รวมสินค้าในระบบทั้งสิ้น</p>
                            <div class="bg-purple-500 text-white font-medium py-1.5 px-4 rounded-full text-lg">
                                157 ชิ้น
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-xl border-2 border-gray-50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-16 h-16 shrink-0 bg-purple-600 rounded-xl flex items-center justify-center text-white text-3xl shadow-sm shadow-purple-100">
                            <i class="fa-duotone fa-users"></i>
                        </div>
                        <div class="flex-grow text-center">
                            <h3 class="text-purple-600 font-medium text-lg">ผู้ใช้งานระบบ</h3>
                            <p class="text-gray-400 text-[10px] mb-2 uppercase tracking-wide">รวมผู้ใช้งานในระบบทั้งสิ้น
                            </p>
                            <div class="bg-purple-600 text-white font-medium py-1.5 px-4 rounded-full text-lg">
                                1626 คน
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-xl border-2 border-gray-50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-16 h-16 shrink-0 bg-purple-700 rounded-xl flex items-center justify-center text-white text-3xl shadow-sm shadow-purple-100">
                            <i class="fa-duotone fa-cart-shopping-fast"></i>
                        </div>
                        <div class="flex-grow text-center">
                            <h3 class="text-purple-700 font-medium text-lg">จำหน่ายแล้ว</h3>
                            <p class="text-gray-400 text-[10px] mb-2 uppercase tracking-wide">รวมการจำหน่ายสินค้าทั้งสิ้น
                            </p>
                            <div class="bg-purple-700 text-white font-medium py-1.5 px-4 rounded-full text-lg">
                                29815 ชิ้น
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-xl border-2 border-gray-50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-16 h-16 shrink-0 bg-purple-600 rounded-xl flex items-center justify-center text-white text-3xl shadow-sm shadow-purple-100">
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="flex-grow text-center">
                            <h3 class="text-purple-600 font-medium text-lg">คะแนนรีวิว</h3>
                            <p class="text-gray-400 text-[10px] mb-2 uppercase tracking-wide">ความพึงพอใจจากลูกค้า</p>
                            <div class="bg-purple-600 text-white font-medium py-1.5 px-4 rounded-full text-lg">
                                5.0 / 5.0
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="py-12 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-xl shadow-md">
                    <i class="fa-solid fa-star-sharp"></i>
                </div>
                <div>
                    <h2 class="text-black font-medium text-2xl leading-none">ทำไมต้องซื้อกับเรา?</h2>
                    <p class="text-gray-400 text-sm mt-1">เหตุผลที่ลูกค้าไว้วางใจเลือกใช้บริการ Rent!</p>
                </div>
            </div>

            <hr class="border-gray-200 mb-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-2xl border-2 border-purple-50 transition-all duration-300 group">
                    <div class="flex flex-col items-center text-center gap-4">
                        <div
                            class="w-20 h-20 shrink-0 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-4xl ">
                            <i class="fa-duotone fa-tags"></i>
                        </div>
                        <div>
                            <h3 class="text-purple-600 text-xl mb-2">ราคาคุ้มค่า</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">
                                เรานำเสนอแพ็กเกจที่ราคาสบายกระเป๋าที่สุด แต่ยังคงไว้ซึ่งคุณภาพระดับพรีเมียม
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border-2 border-purple-50 transition-all duration-300 group">
                    <div class="flex flex-col items-center text-center gap-4">
                        <div
                            class="w-20 h-20 shrink-0 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-4xl ">
                            <i class="fa-duotone fa-bolt-auto"></i>
                        </div>
                        <div>
                            <h3 class="text-purple-600 text-xl mb-2">จัดส่งรวดเร็ว</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">
                                ระบบจัดการอัตโนมัติช่วยให้คุณได้รับสินค้าและเริ่มต้นใช้งานได้ทันทีหลังการชำระเงิน
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border-2 border-purple-50 transition-all duration-300 group">
                    <div class="flex flex-col items-center text-center gap-4">
                        <div
                            class="w-20 h-20 shrink-0 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-4xl ">
                            <i class="fa-duotone fa-shield-check"></i>
                        </div>
                        <div>
                            <h3 class="text-purple-600 text-xl mb-2">ปลอดภัย 100%</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">
                                เราคัดสรรสินค้าที่มีคุณภาพและปลอดภัยต่อผู้ใช้งาน ไร้กังวลเรื่องปัญหาหลังการขาย
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border-2 border-purple-50 transition-all duration-300 group">
                    <div class="flex flex-col items-center text-center gap-4">
                        <div
                            class="w-20 h-20 shrink-0 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-4xl ">
                            <i class="fa-duotone fa-headset"></i>
                        </div>
                        <div>
                            <h3 class="text-purple-600 text-xl mb-2">ซัพพอร์ต 24 ชม.</h3>
                            <p class="text-gray-500 text-[13px] leading-relaxed">
                                ทีมงานแอดมินพร้อมดูแลและให้คำปรึกษาตลอดเวลา ไม่ทิ้งลูกค้าแน่นอน
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="py-12 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-xl shadow-md">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <div>
                    <h2 class="text-black font-medium text-2xl leading-none">ประกาศจากเว็บไซต์</h2>
                    <p class="text-gray-400 text-sm mt-1">อัปเดตข่าวสารและโปรโมชั่นล่าสุดจาก NaHost!</p>
                </div>
            </div>

            <div class="relative overflow-hidden bg-purple-600 rounded-2xl p-6 md:p-8 shadow-xl border border-white/10">
                <div class="absolute top-0 right-0 opacity-10 translate-x-10 -translate-y-10">
                    <i class="fa-solid fa-bullhorn text-[12rem]"></i>
                </div>

                <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                    <div class="flex-grow text-center md:text-left text-white">
                        <div
                            class="inline-block bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-xs mb-3 uppercase tracking-widest font-medium">
                            New Update
                        </div>
                        <h3 class="text-2xl md:text-3xl font-medium mb-3">ยินดีต้อนรับสู่ NaHost Patch V1.0.0</h3>
                        <p class="opacity-80 text-sm md:text-base max-w-2xl leading-relaxed">
                            ขณะนี้ระบบเปิดให้บริการเติมเงินและเช่าซื้อเว็บไซต์อัตโนมัติ 24 ชั่วโมงแล้ว!
                            พบกับดีไซน์ใหม่ที่ใช้งานง่ายกว่าเดิม และระบบความปลอดภัยที่อัปเกรดขึ้น 100%
                        </p>
                    </div>

                    <div class="shrink-0">
                        <button
                            class="bg-white text-purple-600 px-8 py-3.5 rounded-xl font-medium hover:bg-purple-50 transition-all duration-300 shadow-lg active:scale-95">
                            อ่านรายละเอียดเพิ่มเติม
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-12 font-mitr bg-gray-50/50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-xl shadow-md">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h2 class="text-black font-medium text-2xl leading-none">FAQ (คำถามที่พบบ่อย)</h2>
                    <p class="text-gray-400 text-sm mt-1">ตอบข้อสงสัยที่ลูกค้ามักจะสอบถามเข้ามาบ่อยครั้ง</p>
                </div>
            </div>

            <hr class="border-gray-200 mb-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                <div
                    class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm transition-all duration-300 hover:border-purple-200">
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 shrink-0 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                            1</div>
                        <div>
                            <h4 class="text-gray-800 text-lg mb-2">หลังชำระเงินแล้วจะได้รับสินค้าตอนไหน?</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                ระบบของเราเป็นระบบอัตโนมัติทั้งหมด เมื่อท่านชำระเงินสำเร็จ
                                ระบบจะจัดส่งข้อมูลการใช้งานให้ทันทีผ่านหน้าเว็บและอีเมลครับ
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm transition-all duration-300 hover:border-purple-200">
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 shrink-0 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                            2</div>
                        <div>
                            <h4 class="text-gray-800 text-lg mb-2">มีการรับประกันสินค้าหรือไม่?</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                สินค้าทุกชิ้นมีการรับประกันตลอดอายุการใช้งาน (ตามแพ็กเกจที่เช่าซื้อ)
                                หากเกิดปัญหาสามารถแจ้งแอดมินเพื่อแก้ไขได้ทันที 24 ชม.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm transition-all duration-300 hover:border-purple-200">
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 shrink-0 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                            3</div>
                        <div>
                            <h4 class="text-gray-800 text-lg mb-2">สามารถชำระเงินผ่านช่องทางใดได้บ้าง?</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                เรารองรับทั้ง TrueMoney Wallet (Gift), พร้อมเพย์ (PromptPay QR),
                                และการโอนเงินผ่านธนาคารชั้นนำทั่วไปครับ
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm transition-all duration-300 hover:border-purple-200">
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 shrink-0 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                            4</div>
                        <div>
                            <h4 class="text-gray-800 text-lg mb-2">หากใช้งานไม่เป็น มีทีมงานสอนไหม?</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                ทางเรามีคู่มือการใช้งานเบื้องต้นให้ และหากติดปัญหาตรงไหน
                                สามารถทักแชทหาแอดมินเพื่อขอรีโมทไปช่วยเหลือได้โดยไม่มีค่าใช้จ่ายครับ
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="py-12 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex items-start gap-3 mb-6">
                <div class="bg-purple-600 p-2.5 rounded-lg text-white text-xl shadow-md">
                    <i class="fa-solid fa-award"></i>
                </div>
                <div>
                    <h2 class="text-black font-medium text-2xl leading-none">รีวิวจากลูกค้า</h2>
                    <p class="text-gray-400 text-sm mt-1">เสียงตอบรับและความประทับใจจากผู้ใช้งานจริงของเรา!</p>
                </div>
            </div>

            <hr class="border-gray-200 mb-10">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm transition-all duration-300 hover:shadow-md relative group">
                    <div
                        class="absolute top-4 right-6 text-purple-100 text-5xl transition-colors group-hover:text-purple-200">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>

                    <div class="relative z-10">
                        <div class="flex text-yellow-400 text-sm mb-4">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">
                            "ประทับใจมากครับ ระบบเช่าเว็บไซต์ NaHost ใช้งานง่ายจริง ๆ จ่ายเงินปุ๊บได้ระบบปั๊บ
                            แอดมินดูแลดีมาก ตอบไวสุด ๆ แนะนำเลยครับสำหรับใครที่มองหาโฮสดี ๆ"
                        </p>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-purple-100">
                                <img src="https://ui-avatars.com/api/?name=Saran&background=7C3AED&color=fff"
                                    alt="User" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-sm">คุณตัวอย่างที่ 1</h4>
                                <p class="text-gray-400 text-[11px]">ผู้ใช้งานระบบเช่า V.1</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm transition-all duration-300 hover:shadow-md relative group">
                    <div
                        class="absolute top-4 right-6 text-purple-100 text-5xl transition-colors group-hover:text-purple-200">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="flex text-yellow-400 text-sm mb-4">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">
                            "ตอนแรกกังวลว่าจะติดตั้งยาก แต่ระบบ Patch V1.0.0 ทำออกมาดีมากครับ
                            กดไม่กี่ทีเว็บไซต์ก็ออนไลน์แล้ว คุ้มค่าเงินที่จ่ายไปมากครับ"
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-purple-100">
                                <img src="https://ui-avatars.com/api/?name=Peak&background=7C3AED&color=fff"
                                    alt="User" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-sm">คุณตัวอย่างที่ 2</h4>
                                <p class="text-gray-400 text-[11px]">ลูกค้าประจำ</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm transition-all duration-300 hover:shadow-md relative group">
                    <div
                        class="absolute top-4 right-6 text-purple-100 text-5xl transition-colors group-hover:text-purple-200">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="flex text-yellow-400 text-sm mb-4">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">
                            "ราคาเป็นกันเองมากเมื่อเทียบกับสิ่งที่ได้รับ ความปลอดภัยของระบบคือยืนหนึ่งจริงๆ
                            สบายใจเวลาทำธุรกรรมผ่านหน้าเว็บครับ"
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-purple-100">
                                <img src="https://ui-avatars.com/api/?name=User3&background=7C3AED&color=fff"
                                    alt="User" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-sm">คุณตัวอย่างที่ 3</h4>
                                <p class="text-gray-400 text-[11px]">เจ้าของเว็บไซต์ร้านค้า</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
