<footer class="bg-white pt-16 pb-8 font-mitr border-t border-gray-100">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            <div class="flex flex-col gap-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('/assets/img/logo/na-logo.png') }}" alt="NaHost Logo"
                            class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl text-purple-600 leading-none">NaHost</span>
                        <span class="text-[10px] text-gray-400 tracking-[0.2em] uppercase mt-1">Website Service</span>
                    </div>
                </div>

                <p class="text-gray-500 text-sm leading-relaxed">
                    ผู้นำด้านบริการเช่าเว็บไซต์อัตโนมัติ ครบวงจร มั่นใจในความปลอดภัยและความรวดเร็วด้วยระบบ Patch V1.0.0
                    ที่ดีที่สุดสำหรับคุณ
                </p>

                <div class="flex gap-3">
                    <a href="#"
                        class="w-9 h-9 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 hover:bg-purple-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-9 h-9 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 hover:bg-purple-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                    <a href="#"
                        class="w-9 h-9 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 hover:bg-purple-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-line"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-gray-800 mb-6">บริการของเรา</h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="#"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">แอพพรีเมี่ยม</a></li>
                    <li><a href="#"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">รับออกแบบระบบ</a></li>
                    <li><a href="#"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">บริการเติมเงินเกม</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">ไอดีเกม</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-gray-800 mb-6">เมนูแนะนำ</h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="{{ route('home') }}"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">หน้าแรก</a></li>
                    <li><a href="{{ route('frontend.products') }}"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">สินค้าหลัก</a></li>
                    <li><a href="{{ route('frontend.game.index') }}"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">เติมเกม</a></li>
                    <li><a href="{{ route('frontend.topup') }}"
                            class="text-gray-500 text-sm hover:text-purple-600 transition-colors">เติมเงิน</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-gray-800 mb-6">ติดต่อเรา</h4>
                <div class="flex flex-col gap-4">
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-clock text-purple-600 mt-1"></i>
                        <span class="text-gray-500 text-sm">เปิดให้บริการตลอด 24/7</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-envelope text-purple-600 mt-1"></i>
                        <span class="text-gray-500 text-sm">support@nahost.com</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-headset text-purple-600 mt-1"></i>
                        <span class="text-gray-500 text-sm">ติดต่อแอดมินผ่าน Fanpage</span>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-gray-100 mb-8">

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-center">
            <p class="text-gray-400 text-xs">
                © 2026 <span class="text-purple-600 font-medium">NaHost</span>. All Rights Reserved.
            </p>
            <div class="flex gap-6">
                <a href="#"
                    class="text-gray-400 text-xs hover:text-purple-600 transition-colors">นโยบายความเป็นส่วนตัว</a>
                <a href="#"
                    class="text-gray-400 text-xs hover:text-purple-600 transition-colors">ข้อกำหนดการใช้งาน</a>
            </div>
        </div>
    </div>
</footer>
