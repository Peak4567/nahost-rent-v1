@extends('layout')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center relative overflow-hidden bg-slate-50 font-mitr selection:bg-[#C084FC] selection:text-white py-10">

        <div class="absolute inset-0 z-0 opacity-[0.4]"
            style="background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px); background-size: 32px 32px;"></div>

        <div
            class="absolute top-[-10%] left-[-10%] w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-purple-200/50 rounded-full filter blur-[100px] z-0 animate-pulse">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-blue-100/60 rounded-full filter blur-[100px] z-0">
        </div>

        <div
            class="relative z-10 w-full max-w-md px-8 py-10 bg-white rounded-3xl  border border-slate-100 mx-4">

            <div class="text-center mb-8">
                <a href="{{ url('/') }}"
                    class="inline-block text-3xl font-bold tracking-tight text-slate-800 mb-2 transition-transform hover:scale-105">
                    <span class="text-[#7C3AED]">Rent</span>
                </a>
                <p class="text-slate-500 text-sm font-light">สร้างบัญชีใหม่เพื่อเริ่มต้นใช้งานเซิร์ฟเวอร์</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">ชื่อ-นามสกุล</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-slate-400"></i>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#7C3AED] focus:border-[#7C3AED] transition-all bg-slate-50 hover:bg-white outline-none @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                            placeholder="John Doe">
                    </div>
                    @error('name')
                        <span class="text-red-500 text-xs mt-1.5 block font-medium"><i
                                class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">อีเมล</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-slate-400"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#7C3AED] focus:border-[#7C3AED] transition-all bg-slate-50 hover:bg-white outline-none @error('email') border-red-500 ring-1 ring-red-500 @enderror"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1.5 block font-medium"><i
                                class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">รหัสผ่าน</label>
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

                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-slate-700 mb-1.5">ยืนยันรหัสผ่าน</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-shield-check text-slate-400"></i>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#7C3AED] focus:border-[#7C3AED] transition-all bg-slate-50 hover:bg-white outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-start pt-2">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required
                            class="w-4 h-4 text-[#7C3AED] bg-slate-50 border-slate-300 rounded focus:ring-[#7C3AED] focus:ring-2 cursor-pointer transition-colors">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="terms" class="font-light text-slate-500 cursor-pointer">
                            ฉันยอมรับ <a href="#"
                                class="font-medium text-[#7C3AED] hover:underline">เงื่อนไขการให้บริการ</a> และ <a
                                href="#" class="font-medium text-[#7C3AED] hover:underline">นโยบายความเป็นส่วนตัว</a>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full flex justify-center items-center gap-2 py-3.5 px-4 mt-2 border border-transparent rounded-xl text-sm text-white bg-gradient-to-r from-[#7C3AED] to-[#8B5CF6] hover:from-[#6D28D9] hover:to-[#7C3AED] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7C3AED] transition-all transform active:scale-[0.98]">
                    สมัครสมาชิก <i class="fa-solid fa-user-plus text-lg"></i>
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-slate-500">
                มีบัญชีอยู่แล้วใช่หรือไม่?
                <a href="{{ route('login') }}"
                    class="font-bold text-[#7C3AED] hover:text-[#5B21B6] transition-colors relative after:content-[''] after:absolute after:-bottom-0.5 after:left-0 after:w-full after:h-[1px] after:bg-[#7C3AED] after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:duration-300">
                    เข้าสู่ระบบที่นี่
                </a>
            </div>

        </div>
    </div>
@endsection
