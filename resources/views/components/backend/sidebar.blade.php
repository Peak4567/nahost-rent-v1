<aside
    class="w-64 h-screen bg-white border-r border-slate-100 flex flex-col font-mitr fixed left-0 top-0 transition-all duration-300 z-40">

    <button
        class="absolute -right-3.5 top-8 bg-white border border-slate-200 text-slate-400 hover:text-[#7C3AED] w-7 h-7 rounded-full flex items-center justify-center shadow-sm transition-colors z-50">
        <i class="fa-solid fa-chevron-left text-xs"></i>
    </button>

    <div class="p-6 border-b border-slate-100 flex flex-col items-center text-center">
        <div class="relative">
            <img src="https://ui-avatars.com/api/?name=Admin+NaHost&background=7C3AED&color=fff&size=128"
                alt="Admin Avatar" class="w-20 h-20 rounded-full border-4 border-purple-50 object-cover">
            <div class="absolute bottom-1 right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
        </div>
        <h2 class="mt-4 text-slate-800 text-[15px] tracking-wide">NAHOST BACKEND</h2>
        <span
            class="mt-1 px-3 py-1 text-[11px] text-[#7C3AED] bg-purple-50 rounded-full border border-purple-100 tracking-wider">
            ADMINISTRATOR
        </span>
    </div>

    <div class="flex-1 overflow-y-auto py-5 px-4 space-y-1.5 custom-scrollbar" x-data="{ openStock: false }">

        <a href="{{ route('backend.home') }}"
            class="flex items-center justify-between px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <div class="flex items-center">
                <i
                    class="fa-solid fa-grid-2 w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
                <span class="text-sm">ภาพรวม</span>
            </div>
        </a>


        <a href="{{ route('backend.stock') }}"
            class="flex items-center justify-between px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <div class="flex items-center">
                <i
                    class="fa-solid fa-basket-shopping w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
                <span class="text-sm">สต็อค</span>
            </div>
        </a>

        <div class="relative">
            <button @click="openStock = !openStock"
                class="w-full flex items-center justify-between px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
                <div class="flex items-center">
                    <i
                        class="fa-solid fa-box-open w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
                    <span class="text-sm">จัดการสินค้า</span>
                </div>
                <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-[#7C3AED] transition-transform"
                    :class="openStock ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="openStock" class="flex flex-col pl-12 pr-4 py-2 space-y-2">
                <a href="{{ route('backend.product.index') }}"
                    class="text-sm text-slate-500 hover:text-[#7C3AED]">เพิ่มสินค้าใหม่</a>
                <a href="{{ route('backend.category.index') }}"
                    class="text-sm text-slate-500 hover:text-[#7C3AED]">จัดการหมวดหมู่</a>
                <a href="{{ route('backend.game.index') }}"
                    class="text-sm text-slate-500 hover:text-[#7C3AED]">จัดการเกมเติมเงิน</a>
            </div>
        </div>

        <a href="{{ route('backend.users') }}"
            class="flex items-center px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <i
                class="fa-solid fa-users w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
            <span class="text-sm">จัดการผู้ใช้</span>
        </a>

        <a href="{{ route('backend.payment.edit') }}"
            class="flex items-center px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <i
                class="fa-solid fa-credit-card w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
            <span class="text-sm">ช่องทางชำระ</span>
        </a>

        <div class="h-px bg-slate-100 my-4 mx-4"></div>

        <a href="{{ route('backend.settings.edit') }}"
            class="flex items-center px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <i
                class="fa-solid fa-gear w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
            <span class="text-sm">ตั้งค่าเว็บ</span>
        </a>

        <a href="#"
            class="flex items-center px-4 py-3 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-[#7C3AED] transition-colors group">
            <i
                class="fa-solid fa-circle-question w-5 text-center mr-3 text-lg text-slate-400 group-hover:text-[#7C3AED] transition-colors"></i>
            <span class="text-sm">ช่วยเหลือ</span>
        </a>

    </div>

    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit"
                class="flex items-center justify-center w-full px-4 py-3 text-red-500 bg-white border border-red-100 rounded-xl hover:bg-red-50 hover:border-red-200 transition-all group">
                <i class="fa-solid fa-power-off w-5 text-center mr-2"></i>
                <span class="text-sm">ออกจากระบบ</span>
            </button>
        </form>
    </div>

</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #e2e8f0;
        border-radius: 20px;
    }
</style>
