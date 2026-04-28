@extends('backend.layout')

@section('content')
<div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">
    
    <div class="mb-8">
        <h1 class="text-2xl font-normal text-slate-800">จัดการเกมเติมเงิน</h1>
        <p class="text-slate-500 text-sm mt-1">ระบบจัดการรายการเกม, API และคำโปรยดึงดูดลูกค้า</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 text-emerald-700 rounded-xl border border-emerald-200">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl border border-red-200">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <div class="xl:col-span-1 bg-white p-8 rounded-xl border border-slate-200 h-fit shadow-sm">
            <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-purple-600"></i> เพิ่มเกมใหม่
            </h2>
            <form action="{{ route('backend.game.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อเกม</label>
                        <input type="text" name="name" required class="w-full h-12 px-4 rounded-xl border border-slate-300 outline-none focus:ring-2 focus:ring-[#7C3AED]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">คําอธิบาย</label>
                        <input type="text" name="description" placeholder="ใส่ข้อความ" class="w-full h-12 px-4 rounded-xl border border-slate-300 outline-none focus:ring-2 focus:ring-[#7C3AED]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">API Key</label>
                        <input type="text" name="api_key" placeholder="ใส่รหัสเชื่อมต่อ API" class="w-full h-12 px-4 rounded-xl border border-slate-300 outline-none focus:ring-2 focus:ring-[#7C3AED]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">รูปภาพหน้าปก</label>
                        <input type="file" name="image" required class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะการเปิดบริการ</label>
                        <select name="status" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white">
                            <option value="active">เปิดใช้งาน</option>
                            <option value="inactive">ปิดใช้งาน</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-[#7C3AED] text-white py-3 rounded-xl font-bold hover:bg-violet-700 transition">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>

        <div class="xl:col-span-2 bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">เกม</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">สถานะ API</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">คำอธิบาย</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($games as $game)
                    <tr>
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="{{ asset($game->image) }}" class="w-12 h-12 rounded-lg object-cover border border-slate-200">
                            <span class="font-bold text-slate-800">{{ $game->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if(!empty($game->api_key))
                                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-bold flex w-max items-center gap-1">
                                    <i class="fa-solid fa-check-circle"></i> เชื่อมต่อแล้ว
                                </span>
                            @else
                                <a href="https://line.me/ti/p/YourLineID" target="_blank" class="px-2 py-1 bg-amber-500 text-white rounded-lg text-xs font-bold hover:bg-amber-600 flex w-max items-center gap-1">
                                    <i class="fa-solid fa-headset"></i> ติดต่อแอดมิน
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-slate-500 italic max-w-[150px] truncate">
                                "{{ $game->description ?? 'ไม่มีคำโปรย' }}"
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('backend.game.destroy', $game->id) }}" method="POST" onsubmit="return confirm('ยืนยันการลบเกมนี้?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                            <i class="fa-solid fa-ghost text-4xl text-slate-200 mb-3"></i>
                            <p>ยังไม่มีเกมในระบบ เพิ่มเกมใหม่ที่ฟอร์มด้านข้างเลยครับ!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection