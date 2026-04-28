@extends('layout')
@section('content')
    <section class="py-30 bg-gray-50/50 font-mitr">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="bg-purple-600 p-2.5 rounded-lg text-white shadow-lg">
                            <i class="fa-solid fa-wallet text-2xl"></i>
                        </div>
                        <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">เติมเงินเข้าระบบ</h2>
                    </div>
                    <p class="text-gray-500">เติมเงินเพื่อใช้สำหรับเช่าเว็บไซต์และซื้อสินค้าต่างๆ ในร้านค้า</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white p-6 md:p-8 rounded-xl border border-gray-100">
                        <h3 class="text-lg text-gray-800 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-grid-2 text-purple-600"></i> เลือกช่องทางที่ต้องการ
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <label
                                class="relative flex items-center p-4 cursor-pointer rounded-md border-2 border-gray-50 hover:border-purple-200 transition-all group has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50/30">
                                <input type="radio" name="method" value="wallet" class="hidden peer" checked
                                    onchange="toggleMethod('wallet')">
                                <div
                                    class="w-12 h-12 shrink-0 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-gray-100">
                                    <img src="{{ asset('assets/img/truemoney.png') }}" class="w-8" alt="TrueMoney">
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-800">TrueMoney Wallet</p>
                                    <p class="text-xs text-gray-400">ซองของขวัญ (Gift)</p>
                                </div>
                            </label>

                            <label
                                class="relative flex items-center p-4 cursor-pointer rounded-md border-2 border-gray-50 hover:border-purple-200 transition-all group has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50/30">
                                <input type="radio" name="method" value="promptpay" class="hidden peer"
                                    onchange="toggleMethod('promptpay')">
                                <div
                                    class="w-12 h-12 shrink-0 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-gray-100">
                                    <img src="{{ asset('assets/img/pay.png') }}" class="w-10" alt="PromptPay">
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-800">PromptPay QR</p>
                                    <p class="text-xs text-gray-400">อัปโหลดสลิปโอนเงิน</p>
                                </div>
                            </label>
                        </div>

                        <div id="section-wallet"
                            class="mt-10 p-6 bg-gray-50 rounded-md border border-dashed border-gray-200">
                            <h4 class="text-gray-700 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-link text-purple-600"></i> ลิงก์ซองของขวัญ
                            </h4>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <input type="text" id="voucherInput"
                                    class="flex-grow px-5 py-3.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 outline-none transition-all text-sm"
                                    placeholder="https://gift.truemoney.com/campaign/?v=xxxx" disabled>
                                <button id="submitWalletBtn"
                                    class="bg-purple-600 text-white px-8 py-3.5 rounded-xl hover:bg-purple-700 transition-all shadow-md active:scale-95">ยืนยันการเติมเงิน</button>
                            </div>
                        </div>

                        <div id="section-promptpay"
                            class="mt-10 p-6 bg-gray-50 rounded-md border border-dashed border-gray-200 hidden">
                            <div class="text-center mb-6">
                                <p class="text-gray-600">โอนเงินเข้าบัญชีนี้:</p>
                                <p class="text-2xl font-bold text-purple-700">
                                    {{ $paymentSetting->bank_account_number ?? 'ไม่ได้ระบุเลขบัญชี' }}
                                </p>
                                <p class="text-gray-600">
                                    ชื่อบัญชี: {{ $paymentSetting->bank_account_name ?? 'ไม่ได้ระบุชื่อบัญชี' }}
                                </p>
                                <p class="text-sm text-gray-500 mt-1">ธนาคาร:
                                    {{ strtoupper($paymentSetting->bank_name ?? '-') }}</p>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="block text-sm font-medium text-gray-700">อัปโหลดสลิปโอนเงิน (รูปภาพ):</label>
                                <input type="file" id="slipInput" accept="image/*"
                                    class="w-full px-3 py-3 bg-white border border-gray-200 rounded-xl">
                                <button id="submitSlipBtn"
                                    class="bg-purple-600 text-white px-8 py-3.5 rounded-xl hover:bg-purple-700 transition-all shadow-md active:scale-95">แจ้งโอนเงิน/ตรวจสอบสลิป</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100">
                        <h3 class="text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-lightbulb text-yellow-500"></i> คำแนะนำ
                        </h3>
                        <ul class="space-y-4 text-sm text-gray-500">
                            <li>1. เลือกช่องทางที่ต้องการเติมเงินให้ถูกต้อง</li>
                            <li>2. กรณี Wallet ให้วางลิงก์ซองของขวัญ</li>
                            <li>3. กรณี PromptPay ให้อัปโหลดรูปสลิปที่ชัดเจน เพื่อให้ระบบตรวจสอบอัตโนมัติ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{asset('assets/js/topup.js')}}"></script>
@endsection
