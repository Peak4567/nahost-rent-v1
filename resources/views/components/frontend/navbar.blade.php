<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm border-b border-gray-50 font-mitr w-full h-[70px]"
    id="nav1">

    <div class="w-full h-full max-w-5xl mx-auto px-4 lg:px-8 flex items-center justify-between relative">

        <a href="#" class="text-[20px] font-medium tracking-tight text-slate-800 logo shrink-0 relative z-10">
            RENT
        </a>

        <input type="checkbox" id="mobile-menu-toggle" class="peer hidden">
        <label for="mobile-menu-toggle"
            class="lg:hidden p-2 text-gray-500 cursor-pointer relative z-20 transition-colors hover:bg-gray-50 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </label>

        <div
            class="fixed inset-y-0 right-0 z-50 w-72 bg-white shadow-xl transform translate-x-full peer-checked:translate-x-0 transition-transform duration-300 lg:flex lg:w-auto lg:shadow-none lg:bg-transparent items-center lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:top-0 lg:h-full">

            <div class="flex items-center justify-between p-5 border-b border-gray-50 lg:hidden">
                <span class="font-bold text-slate-800">MENU</span>
                <label for="mobile-menu-toggle"
                    class="text-gray-400 cursor-pointer italic text-xs px-2 py-1 hover:bg-gray-100 rounded">ปิด</label>
            </div>

            <ul
                class="flex flex-col lg:flex-row items-center justify-center w-full h-full list-none m-0 p-6 lg:p-0 gap-2 lg:gap-1">
                <li>
                    <a href="{{ route('home') }}"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 block text-center w-full text-gray-500 hover:text-purple-600 hover:bg-purple-50">
                        หน้าหลัก
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 block text-center w-full text-gray-500 hover:text-purple-600 hover:bg-purple-50">
                        สินค้าหลัก
                    </a>
                </li>
                <li>
                    <a href="{{ route('game-topup') }}"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 block text-center w-full text-gray-500 hover:text-purple-600 hover:bg-purple-50">
                        เติมเกม
                    </a>
                </li>
                <li>
                    <a href="{{ route('topup') }}"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 block text-center w-full text-gray-500 hover:text-purple-600 hover:bg-purple-50">
                        เติมเงิน
                    </a>
                </li>

                @guest
                    <li class="lg:hidden w-full mt-4 border-t border-gray-100 pt-4">
                        <a href="{{ route('login') }}"
                            class="px-5 py-2 mb-2 rounded-full text-sm block text-center w-full text-purple-600 bg-purple-50">เข้าสู่ระบบ</a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 rounded-full text-sm block text-center w-full text-white bg-purple-600">สมัครสมาชิก</a>
                    </li>
                @endguest

                @auth
                    <li class="lg:hidden w-full mt-4 border-t border-gray-100 pt-4 text-center">
                        <div class="mb-3 bg-slate-50 p-3 rounded-xl border border-slate-100">
                            <span class="block text-sm text-slate-700 font-bold mb-1">คุณ {{ Auth::user()->name }}</span>
                            <span class="block text-sm font-bold text-purple-600 bg-purple-100 py-1 rounded-lg">ยอดเงิน: ฿
                                {{ number_format(Auth::user()->points, 2) }}</span>

                            <div class="mt-3 flex flex-col gap-2 text-left">
                                @if (Auth::user()->level == 'admin')
                                    <a href="#"
                                        class="text-sm text-slate-600 hover:text-purple-600 p-2 rounded-lg hover:bg-white transition-colors"><i
                                            class="fa-regular fa-gauge mr-2"></i> ระบบหลังบ้าน</a>
                                @endif
                                <a href="#"
                                    class="text-sm text-slate-600 hover:text-purple-600 p-2 rounded-lg hover:bg-white transition-colors"><i
                                        class="fa-regular fa-user-pen mr-2"></i> แก้ไขโปรไฟล์</a>
                                <a href="#"
                                    class="text-sm text-slate-600 hover:text-purple-600 p-2 rounded-lg hover:bg-white transition-colors"><i
                                        class="fa-regular fa-bag-shopping mr-2"></i> ประวัติการซื้อ</a>
                                <a href="#"
                                    class="text-sm text-slate-600 hover:text-purple-600 p-2 rounded-lg hover:bg-white transition-colors"><i
                                        class="fa-regular fa-money-bill-transfer mr-2"></i> ประวัติเติมเงิน</a>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="w-full mt-2">
                            @csrf
                            <button type="submit"
                                class="px-5 py-2.5 rounded-xl text-sm font-bold block text-center w-full text-red-500 bg-red-50 hover:bg-red-100 transition-colors">
                                <i class="fa-solid fa-power-off mr-1"></i> ออกจากระบบ
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="hidden lg:flex items-center gap-4 shrink-0 relative z-10 h-full">
            <div class="w-px h-5 bg-gray-200 mx-1"></div>

            @guest
                <a href="{{ route('login') }}" class="text-sm text-slate-600 hover:text-purple-600 transition-colors px-2">
                    เข้าสู่ระบบ
                </a>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center px-4 py-2 text-sm text-white bg-purple-600 border border-purple-600 rounded-xl hover:bg-purple-700 hover:border-purple-700 transition-all hover:shadow-lg hover:shadow-purple-200/50">
                    สมัครสมาชิก
                </a>
            @endguest

            @auth
                <div class="relative group h-full flex items-center cursor-pointer">

                    <div class="flex items-center gap-3 px-2 py-1 rounded-lg transition-colors group-hover:bg-slate-50">
                        <div class="text-right flex flex-col justify-center">
                            <span class="text-[13px] text-slate-700 leading-tight">{{ Auth::user()->name }}</span>
                            <span class="text-[12px] font-bold text-purple-600 leading-tight">฿
                                {{ number_format(Auth::user()->points, 2) }}</span>
                        </div>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-purple-600 transition-colors"></i>
                    </div>

                    <div
                        class="absolute top-full right-0 mt-0 w-48 bg-white border border-slate-100 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right group-hover:translate-y-1">
                        <div class="p-2 flex flex-col gap-1">
                            @if (Auth::user()->level == 'admin')
                                <a href="{{ route('backend.home') }}"
                                    class="px-3 py-2 text-sm text-slate-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors">
                                    <i class="fa-regular fa-gauge w-5 text-center mr-1"></i> ระบบหลังบ้าน
                                </a>
                            @endif
                            <a href="#"
                                class="px-3 py-2 text-sm text-slate-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors">
                                <i class="fa-regular fa-user-pen w-5 text-center mr-1"></i> แก้ไขโปรไฟล์
                            </a>
                            <a href="#"
                                class="px-3 py-2 text-sm text-slate-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors">
                                <i class="fa-regular fa-bag-shopping w-5 text-center mr-1"></i> ประวัติการซื้อ
                            </a>
                            <a href="#"
                                class="px-3 py-2 text-sm text-slate-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors">
                                <i class="fa-regular fa-money-bill-transfer w-5 text-center mr-1"></i> ประวัติเติมเงิน
                            </a>

                            <div class="h-px bg-slate-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                    <i class="fa-solid fa-power-off w-5 text-center mr-1"></i> ออกจากระบบ
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @endauth

        </div>

        <label for="mobile-menu-toggle"
            class="fixed inset-0 bg-slate-900/20 backdrop-blur-sm z-40 hidden peer-checked:block lg:hidden cursor-default"></label>
    </div>
</nav>
