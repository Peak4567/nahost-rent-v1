@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-slate-50 font-mitr selection:bg-[#C084FC] selection:text-white">

    <div class="absolute inset-0 z-0 opacity-[0.4]"
        style="background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px); background-size: 32px 32px;"></div>

    <div class="absolute top-[-10%] left-[-10%] w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-purple-200/50 rounded-full filter blur-[100px] z-0 animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-blue-100/60 rounded-full filter blur-[100px] z-0"></div>

    <div class="relative z-10 w-full max-w-md px-8 py-10 bg-white rounded-3xl border border-slate-100 mx-4">

        <div class="text-center mb-8">
            <a href="{{ url('/') }}"
                class="inline-block text-3xl font-bold tracking-tight text-slate-800 mb-2 transition-transform hover:scale-105">
                <span class="text-[#7C3AED]">Rent</span>
            </a>
            <p class="text-slate-500 text-sm font-light">เข้าสู่ระบบเพื่อจัดการเซิร์ฟเวอร์ของคุณ</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf 
            
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">อีเมล</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-slate-400"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#7C3AED] focus:border-[#7C3AED] transition-all bg-slate-50 hover:bg-white outline-none @error('email') border-red-500 ring-1 ring-red-500 @enderror"
                        placeholder="name@example.com">
                </div>
                @error('email')
                    <span class="text-red-500 text-xs mt-1.5 block font-medium"><i
                            class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-sm font-medium text-slate-700">รหัสผ่าน</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-xs font-bold text-[#7C3AED] hover:text-[#5B21B6] transition-colors">
                            ลืมรหัสผ่าน?
                        </a>
                    @endif
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-lock text-slate-400"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                        class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#7C3AED] focus:border-[#7C3AED] transition-all bg-slate-50 hover:bg-white outline-none @error('password') border-red-500 ring-1 ring-red-500 @enderror"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <span class="text-red-500 text-xs mt-1.5 block font-medium"><i
                            class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center pt-1">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 text-[#7C3AED] bg-slate-50 border-slate-300 rounded focus:ring-[#7C3AED] focus:ring-2 cursor-pointer transition-colors">
                <label for="remember_me" class="ml-2 block text-sm text-slate-600 cursor-pointer select-none">
                    จดจำฉันไว้ในระบบ
                </label>
            </div>

            <button type="submit"
                class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl text-sm text-white bg-gradient-to-r from-[#7C3AED] to-[#8B5CF6] hover:from-[#6D28D9] hover:to-[#7C3AED] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7C3AED] transition-all transform active:scale-[0.98]">
                เข้าสู่ระบบ <i class="fa-solid fa-arrow-right-to-bracket text-lg"></i>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-slate-500">
            ยังไม่มีบัญชีใช่หรือไม่?
            <a href="{{ route('register') }}"
                class="font-bold text-[#7C3AED] hover:text-[#5B21B6] transition-colors relative after:content-[''] after:absolute after:-bottom-0.5 after:left-0 after:w-full after:h-[1px] after:bg-[#7C3AED] after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:duration-300">
                สมัครสมาชิกที่นี่
            </a>
        </div>

    </div>
</div>
@endsection