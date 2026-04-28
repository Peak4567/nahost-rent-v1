@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">แก้ไขข้อมูลผู้ใช้งาน</h1>
                <p class="text-slate-500 text-sm">จัดการข้อมูลสมาชิกและสิทธิ์การเข้าถึงระบบ</p>
            </div>
            <div class="flex gap-2">
                <span
                    class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm text-slate-600 font-medium tracking-wider">
                    ID: {{ 'USR-' . strtoupper(substr(md5($user->id), 0, 8)) }}
                </span>
            </div>
        </div>

        <form action="{{ route('backend.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-8 rounded-xl border border-slate-200 ">
                        <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-user-circle text-[#7C3AED]"></i> ข้อมูลโปรไฟล์
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อผู้ใช้</label>
                                <input type="text" name="name" value="{{ $user->name }}" required
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">อีเมล</label>
                                <input type="email" name="email" value="{{ $user->email }}" required
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-xl border border-slate-200 ">
                        <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-lock text-[#7C3AED]"></i> ตั้งค่าความปลอดภัย
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">รหัสผ่านใหม่</label>
                                <input type="password" name="password" placeholder="ปล่อยว่างหากไม่ต้องการเปลี่ยน"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ยืนยันรหัสผ่านใหม่</label>
                                <input type="password" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-8 rounded-xl border border-slate-200 ">
                        <h2 class="text-lg font-bold text-slate-800 mb-6">ตั้งค่าสถานะ</h2>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ระดับสมาชิก</label>
                                <select name="level" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white">
                                    <option value="member" {{ $user->level == 'member' ? 'selected' : '' }}>Member</option>
                                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">คะแนนคงเหลือ</label>
                                <input type="number" name="points" value="{{ $user->points ?? 0 }}" step="0.01"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl border border-slate-200 ">
                        <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">ข้อมูลล่าสุด</h2>
                        <ul class="space-y-4 text-sm text-slate-600">
                            <li class="flex justify-between"><span>สมัครสมาชิก</span>
                                <span>{{ $user->created_at->format('d/m/Y') }}</span>
                            </li>
                            <li class="flex justify-between"><span>เข้าสู่ระบบล่าสุด</span>
                                <span>{{ $user->updated_at->diffForHumans() }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit"
                    class="bg-[#7C3AED] hover:bg-violet-700 text-white px-10 py-3 rounded-xl font-bold transition shadow-lg shadow-violet-200">บันทึกข้อมูลทั้งหมด</button>
                <a href="{{ route('backend.users') }}"
                    class="px-8 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold transition">ยกเลิก</a>
            </div>
        </form>
    </div>
@endsection
