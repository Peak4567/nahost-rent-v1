@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-medium text-slate-800">จัดการผู้ใช้งาน</h1>
                <p class="text-sm text-slate-500">ตรวจสอบและจัดการสมาชิกในระบบของคุณ</p>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-slate-600 text-sm">
                            <th class="px-6 py-4">ลำดับ</th>
                            <th class="px-6 py-4">ชื่อผู้ใช้</th>
                            <th class="px-6 py-4">อีเมล</th>
                            <th class="px-6 py-4 text-center">สิทธิ์</th>
                            <th class="px-6 py-4">วันที่สมัคร</th>
                            <th class="px-6 py-4 text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                        @forelse ($users as $user)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-slate-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-bold text-slate-800">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold 
                                    {{ $user->level ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600' }}">
                                        {{ $user->level ? 'ADMIN' : 'USER' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 flex justify-center gap-2">
                                    <a href="{{ route('backend.users.edit', $user->id) }}"
                                        class="text-blue-500 hover:text-blue-700 p-2 bg-blue-50 rounded-lg transition">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @if ($user->id !== auth()->id())
                                        <form action="{{ route('backend.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('ลบผู้ใช้นี้ถาวร?');">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-rose-500 hover:text-rose-700 p-2 bg-rose-50 rounded-lg transition">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button disabled
                                            class="text-slate-300 p-2 bg-slate-50 rounded-lg cursor-not-allowed">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-400 italic">ไม่พบข้อมูลผู้ใช้งาน
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
