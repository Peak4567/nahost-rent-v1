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
        </div>

        {{-- ระบบค้นหา --}}
        <form action="{{ route('frontend.game.index') }}" method="GET" class="bg-white p-3 rounded-2xl border border-gray-100 mb-10 flex flex-col md:flex-row gap-3">
            <div class="relative flex-grow">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-purple-600/20 focus:bg-white transition-all text-sm"
                    placeholder="ค้นหาเกมที่คุณต้องการเติม...">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-medium hover:bg-purple-700 transition-all active:scale-95">ค้นหา</button>
            </div>
        </form>

        {{-- แสดงรายการเกม --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @forelse($games as $game)
                <a href="#" class="group relative bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:border-purple-200">
                    <div class="relative aspect-square rounded-2xl overflow-hidden mb-4 border-2 border-gray-50">
                        <img src="{{ asset($game->image) }}" alt="{{ $game->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-center">
                        <h3 class="text-gray-800 text-base group-hover:text-purple-600 transition-colors truncate">{{ $game->name }}</h3>
                        <p class="text-gray-400 text-[11px] mb-3 italic">"{{ $game->description ?? 'เติมง่าย ปลอดภัย 100%' }}"</p>
                        <div class="bg-purple-50 text-purple-600 py-2 rounded-xl text-xs group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            เลือกแพ็กเกจ
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center text-gray-400">
                    <i class="fa-solid fa-ghost text-5xl mb-4"></i>
                    <p>ไม่พบเกมที่คุณค้นหา</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection