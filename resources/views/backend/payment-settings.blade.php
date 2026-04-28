@extends('backend.layout')

@section('content')
<div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">
    
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-normal text-slate-800">จัดการช่องทางชำระเงิน</h1>
            <p class="text-slate-500 text-sm mt-1">ตั้งค่าบัญชีรับเงิน ทรูมันนี่วอลเล็ท และ บัญชีธนาคาร</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 text-emerald-700 rounded-xl border border-emerald-200 font-medium">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('backend.payment.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white p-8 rounded-xl border border-slate-200 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-8 border-b border-slate-100 pb-6">
                    <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center text-2xl shrink-0">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">ตั้งค่า TrueMoney Wallet</h2>
                        <p class="text-xs text-slate-500">สำหรับรับเงินผ่านระบบซองอั่งเปา</p>
                    </div>
                </div>

                <div class="space-y-6 flex-grow">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะการใช้งาน</label>
                        <select name="truemoney_status" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-[#7C3AED] outline-none">
                            <option value="active" {{ ($settings->truemoney_status ?? '') == 'active' ? 'selected' : '' }}>เปิดใช้งาน (Active)</option>
                            <option value="inactive" {{ ($settings->truemoney_status ?? '') == 'inactive' ? 'selected' : '' }}>ปิดใช้งาน (Inactive)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">เบอร์โทรศัพท์ (TrueMoney)</label>
                        <input type="text" name="truemoney_phone" placeholder="เช่น 0812345678" 
                            value="{{ $settings->truemoney_phone ?? '' }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                        <p class="text-xs text-slate-400 mt-2">* เบอร์นี้จะใช้สำหรับอ้างอิงและรับยอดเงินเข้าระบบ</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl border border-slate-200 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-8 border-b border-slate-100 pb-6">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl shrink-0">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">ตั้งค่าบัญชีธนาคาร</h2>
                        <p class="text-xs text-slate-500">สำหรับการโอนเงินและแนบสลิป</p>
                    </div>
                </div>

                <div class="space-y-6 flex-grow">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะการใช้งาน</label>
                        <select name="bank_status" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-[#7C3AED] outline-none">
                            <option value="active" {{ ($settings->bank_status ?? '') == 'active' ? 'selected' : '' }}>เปิดใช้งาน (Active)</option>
                            <option value="inactive" {{ ($settings->bank_status ?? '') == 'inactive' ? 'selected' : '' }}>ปิดใช้งาน (Inactive)</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ธนาคาร</label>
                            <select name="bank_name" class="w-full h-12 px-4 rounded-xl border border-slate-300 bg-white focus:ring-2 focus:ring-[#7C3AED] outline-none">
                                @php $banks = ['kbank' => 'กสิกรไทย (KBank)', 'scb' => 'ไทยพาณิชย์ (SCB)', 'bbl' => 'กรุงเทพ (BBL)', 'ktb' => 'กรุงไทย (KTB)']; @endphp
                                @foreach($banks as $key => $name)
                                    <option value="{{ $key }}" {{ ($settings->bank_name ?? '') == $key ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">เลขบัญชี</label>
                            <input type="text" name="bank_account_number" placeholder="เช่น 012-3-45678-9" 
                                value="{{ $settings->bank_account_number ?? '' }}"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อบัญชี</label>
                        <input type="text" name="bank_account_name" placeholder="ชื่อ-นามสกุล" 
                            value="{{ $settings->bank_account_name ?? '' }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#7C3AED] transition outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">อัปโหลดรูป QR Code รับเงิน (ทางเลือก)</label>
                        <div class="w-full flex items-center gap-4">
                            <div class="w-20 h-20 bg-slate-100 border border-slate-300 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                                @if(isset($settings->bank_qr_code) && $settings->bank_qr_code)
                                    <img src="{{ asset($settings->bank_qr_code) }}" alt="QR Code" class="w-full h-full object-cover">
                                @else
                                    <i class="fa-solid fa-qrcode text-3xl text-slate-400"></i>
                                @endif
                            </div>
                            <input type="file" name="bank_qr_code" accept="image/*"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition cursor-pointer">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-8 pt-6 border-t border-slate-200">
            <button type="submit" class="w-full md:w-auto md:min-w-[250px] bg-[#7C3AED] hover:bg-violet-700 text-white px-8 py-3.5 rounded-xl font-bold transition block ml-auto">
                บันทึกการตั้งค่าทั้งหมด
            </button>
        </div>

    </form>
</div>
@endsection