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

                <div class="bg-white px-6 py-3 rounded-md border border-purple-100 flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-gray-400 text-xs uppercase tracking-wider">ยอดเงินปัจจุบัน</p>
                        <p class="text-purple-600 text-2xl font-bold">
                            ฿ {{ Auth::check() ? number_format(Auth::user()->points, 2) : '0.00' }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 text-xl">
                        <i class="fa-solid fa-coins"></i>
                    </div>
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
                                <input type="radio" name="method" class="hidden peer" checked>
                                <div
                                    class="w-12 h-12 shrink-0 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-gray-100">
                                    <img src="{{asset('assets/img/truemoney.png')}}"
                                        class="w-8" alt="TrueMoney">
                                </div>
                                <div class="ml-4">
                                    <p class=" text-gray-800">TrueMoney Wallet</p>
                                    <p class="text-xs text-gray-400">ซองของขวัญ (Gift)</p>
                                </div>
                                <div class="ml-auto opacity-0 peer-checked:opacity-100 text-purple-600">
                                    <i class="fa-solid fa-circle-check text-xl"></i>
                                </div>
                            </label>

                            <label
                                class="relative flex items-center p-4 cursor-pointer rounded-md border-2 border-gray-50 hover:border-purple-200 transition-all group has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50/30">
                                <input type="radio" name="method" class="hidden peer">
                                <div
                                    class="w-12 h-12 shrink-0 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-gray-100">
                                    <img src="{{asset('assets/img/pay.png')}}"
                                        class="w-10" alt="PromptPay">
                                </div>
                                <div class="ml-4">
                                    <p class=" text-gray-800">PromptPay QR</p>
                                    <p class="text-xs text-gray-400">สแกนจ่ายทันที</p>
                                </div>
                                <div class="ml-auto opacity-0 peer-checked:opacity-100 text-purple-600">
                                    <i class="fa-solid fa-circle-check text-xl"></i>
                                </div>
                            </label>
                        </div>

                        <div class="mt-10 p-6 bg-gray-50 rounded-md border border-dashed border-gray-200">
                            <h4 class=" text-gray-700 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-link text-purple-600"></i> ลิงก์ซองของขวัญ
                            </h4>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <input type="text" id="voucherInput"
                                    class="flex-grow px-5 py-3.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-600/20 focus:border-purple-600 outline-none transition-all text-sm"
                                    placeholder="https://gift.truemoney.com/campaign/?v=xxxx">
                                
                                <button id="submitBtn"
                                    class="bg-purple-600 text-white px-8 py-3.5 rounded-xl hover:bg-purple-700 transition-all shadow-md shadow-purple-100 active:scale-95">
                                    ยืนยันการเติมเงิน
                                </button>
                            </div>
                            <p class="mt-3 text-xs text-gray-400">
                                * กรุณาตรวจสอบลิงก์ซองของขวัญให้ถูกต้องก่อนทำรายการ
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100">
                        <h3 class=" text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-lightbulb text-yellow-200"></i> คำแนะนำ
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex gap-3 text-sm text-gray-500 leading-relaxed">
                                <div
                                    class="w-5 h-5 bg-purple-100 text-purple-600 rounded-full shrink-0 flex items-center justify-center text-[10px]">
                                    1</div>
                                สร้างซองของขวัญผ่านแอป TrueMoney Wallet ให้เรียบร้อย
                            </li>
                            <li class="flex gap-3 text-sm text-gray-500 leading-relaxed">
                                <div
                                    class="w-5 h-5 bg-purple-100 text-purple-600 rounded-full shrink-0 flex items-center justify-center text-[10px]">
                                    2</div>
                                คัดลอกลิงก์ที่ได้รับมาวางในช่องกรอกข้อมูลด้านซ้าย
                            </li>
                            <li class="flex gap-3 text-sm text-gray-500 leading-relaxed">
                                <div
                                    class="w-5 h-5 bg-purple-100 text-purple-600 rounded-full shrink-0 flex items-center justify-center text-[10px]">
                                    3</div>
                                กดปุ่ม "ยืนยันการเติมเงิน" และรอรับยอดเงินได้ทันที
                            </li>
                        </ul>
                    </div>

                    <div
                        class="bg-purple-600 p-6 rounded-xl shadow-lg text-white border border-white/10 relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-10 rotate-12">
                            <i class="fa-solid fa-headset text-7xl"></i>
                        </div>

                        <div class="relative z-10">
                            <h4 class="font-medium mb-2">พบปัญหาการเติมเงิน?</h4>
                            <p class="text-xs opacity-80 mb-4 leading-relaxed">
                                หากยอดเงินไม่เข้าภายใน 5 นาที หรือทำรายการผิดพลาด<br>
                                กรุณาติดต่อแอดมินเพื่อตรวจสอบ
                            </p>
                            <a href="#"
                                class="inline-block bg-white text-purple-600 px-5 py-2 rounded-xl text-xs font-medium transition-all hover:bg-purple-50 shadow-sm active:scale-95">
                                ติดต่อฝ่ายซัพพอร์ต
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('submitBtn').addEventListener('click', async function(e) {
            e.preventDefault(); // ป้องกันการรีเฟรชหน้าต่างหากปุ่มไปอยู่ในฟอร์ม

            const inputField = document.getElementById('voucherInput');
            const link = inputField.value.trim();
            const btn = this;

            // 1. เช็คว่ากรอกลิงก์หรือยัง
            if (!link) {
                Swal.fire({ 
                    icon: 'warning', 
                    title: 'แจ้งเตือน', 
                    text: 'กรุณากรอกลิงก์ซองของขวัญก่อนครับ',
                    confirmButtonColor: '#9333ea'
                });
                return;
            }

            // 2. ป้องกันกดรัวๆ
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> กำลังตรวจสอบ...';
            btn.disabled = true;

            try {
                // 3. ส่งข้อมูลไปที่ Backend
                const response = await fetch('/api/topup/truemoney', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    body: JSON.stringify({ link: link })
                });

                const result = await response.json();

                // 4. แสดงผลลัพธ์
                if (response.ok && result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'เติมเงินสำเร็จ!',
                        text: `ระบบเติมเงินเข้าบัญชีคุณ ${result.amount} บาทเรียบร้อยแล้ว`,
                        confirmButtonColor: '#9333ea'
                    }).then(() => {
                        location.reload(); // รีเฟรชเว็บเพื่อให้ยอดเงินด้านบนเปลี่ยน
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'รายการไม่สำเร็จ',
                        text: result.message || 'ซองนี้อาจถูกใช้งานไปแล้ว หรือลิงก์ไม่ถูกต้อง',
                        confirmButtonColor: '#9333ea'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'ระบบขัดข้อง',
                    text: 'ไม่สามารถติดต่อเซิร์ฟเวอร์ได้ กรุณาลองใหม่อีกครั้งครับ',
                    confirmButtonColor: '#9333ea'
                });
            } finally {
                // คืนค่าปุ่ม
                btn.innerHTML = originalText;
                btn.disabled = false;
                inputField.value = ''; 
            }
        });
    </script>
@endsection