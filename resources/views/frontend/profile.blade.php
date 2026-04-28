@extends('layout')

@section('content')
<section class="py-16 md:py-24 bg-gray-50 min-h-screen font-mitr">
    <div class="max-w-screen-sm mx-auto px-4">
        
        <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
            {{-- หัวข้อ --}}
            <div class="flex items-center gap-4 mb-10">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-user-edit"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-medium text-gray-800">แก้ไขข้อมูลส่วนตัว</h2>
                    <p class="text-gray-400 text-sm">อัปเดตข้อมูลบัญชีผู้ใช้งานของคุณ</p>
                </div>
            </div>

            {{-- แจ้งเตือน --}}
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 text-green-700 rounded-xl border border-green-100 text-sm font-medium">
                    <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
                </div>
            @endif

            {{-- ฟอร์ม --}}
            <form action="{{ route('frontend.profile.update') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">ชื่อ - นามสกุล</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" 
                            class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">อีเมล</label>
                        <input type="email" value="{{ auth()->user()->email }}" disabled
                            class="w-full px-4 py-3.5 bg-gray-100 border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-100 pt-8">
                    <h3 class="font-medium text-gray-800 flex items-center gap-2">
                        <i class="fa-solid fa-lock text-gray-400"></i> เปลี่ยนรหัสผ่านใหม่
                    </h3>
                    <div class="space-y-4">
                        <input type="password" name="password" placeholder="รหัสผ่านใหม่" 
                            class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition">
                        <input type="password" name="password_confirmation" placeholder="ยืนยันรหัสผ่านใหม่" 
                            class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-4 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-xl transition shadow-lg shadow-purple-200 active:scale-[0.98]">
                        บันทึกการเปลี่ยนแปลง
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</section>
@endsection