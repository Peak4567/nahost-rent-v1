@extends('backend.layout')

@section('content')
<div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">
    
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-normal text-slate-800">ตั้งค่าเว็บไซต์</h1>
            <p class="text-slate-500 text-sm mt-1">จัดการข้อมูลพื้นฐาน โลโก้ และช่องทางการติดต่อของเว็บไซต์</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 text-emerald-700 rounded-xl border border-emerald-200 font-medium">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('backend.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- กล่องที่ 1: ข้อมูลทั่วไป --}}
            <div class="bg-white p-8 rounded-xl border border-slate-200 flex flex-col">
                <div class="flex items-center gap-4 mb-8 border-b border-slate-100 pb-6">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-2xl shrink-0">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">ข้อมูลทั่วไป (General)</h2>
                        <p class="text-xs text-slate-500">ชื่อและคำอธิบายของเว็บไซต์</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อเว็บไซต์ (Site Name)</label>
                        <input type="text" name="site_name" placeholder="เช่น NaHost Rent" 
                            value="{{ $settings->site_name ?? '' }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">คำอธิบายเว็บไซต์ (Description)</label>
                        <textarea name="site_description" rows="3" placeholder="ข้อความต้อนรับหรือสโลแกน..."
                            class="w-full p-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none resize-none">{{ $settings->site_description ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะเว็บไซต์</label>
                        <select name="maintenance_mode" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-[#7C3AED] outline-none">
                            <option value="0" {{ ($settings->maintenance_mode ?? '0') == '0' ? 'selected' : '' }}>เปิดให้บริการปกติ (Online)</option>
                            <option value="1" {{ ($settings->maintenance_mode ?? '0') == '1' ? 'selected' : '' }}>ปิดปรับปรุง (Maintenance)</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- กล่องที่ 2: โลโก้ & โซเชียล --}}
            <div class="flex flex-col gap-8">
                
                {{-- โลโก้ --}}
                <div class="bg-white p-8 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-4 mb-8 border-b border-slate-100 pb-6">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl shrink-0">
                            <i class="fa-solid fa-image"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">โลโก้เว็บไซต์ (Logo)</h2>
                            <p class="text-xs text-slate-500">อัปโหลดรูปภาพโลโก้หลักของเว็บ</p>
                        </div>
                    </div>

                    <div>
                        <div class="w-full flex items-center gap-4">
                            <div class="w-20 h-20 bg-slate-100 border border-slate-300 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                                @if(isset($settings->site_logo) && $settings->site_logo)
                                    <img src="{{ asset($settings->site_logo) }}" class="w-full h-full object-contain p-1">
                                @else
                                    <i class="fa-solid fa-camera text-3xl text-slate-400"></i>
                                @endif
                            </div>
                            <input type="file" name="site_logo" accept="image/*"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition cursor-pointer">
                        </div>
                    </div>
                </div>

                {{-- โซเชียลมีเดีย --}}
                <div class="bg-white p-8 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-4 mb-8 border-b border-slate-100 pb-6">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-2xl shrink-0">
                            <i class="fa-brands fa-line"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">ช่องทางติดต่อ (Contact)</h2>
                            <p class="text-xs text-slate-500">สำหรับปุ่มติดต่อแอดมิน</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Facebook Page URL</label>
                            <input type="text" name="facebook_url" placeholder="https://facebook.com/..." 
                                value="{{ $settings->facebook_url ?? '' }}"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">LINE OA / LINE ID</label>
                            <input type="text" name="line_id" placeholder="@nahost" 
                                value="{{ $settings->line_id ?? '' }}"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="mt-8 pt-6 border-t border-slate-200 text-right">
            <button type="submit" class="w-full md:w-auto md:min-w-[250px] bg-[#7C3AED] hover:bg-violet-700 text-white px-8 py-3.5 rounded-xl font-bold transition">
                บันทึกการตั้งค่าเว็บไซต์
            </button>
        </div>

    </form>
</div>
@endsection