@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr transition-all duration-300">

        <div class="flex items-center gap-4 mb-8 mt-2">
            <div class="w-12 h-12 rounded-xl bg-[#7C3AED] text-white flex items-center justify-center text-xl">
                <i class="fa-solid fa-house"></i>
            </div>
            <div>
                <h1 class="text-2xl font-medium text-slate-800 tracking-tight">ภาพรวม</h1>
                <p class="text-sm text-slate-500 mt-0.5">แสดงข้อมูลสรุปภาพรวมทั้งหมดบนเว็บไซต์</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <div
                class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div
                    class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">สมาชิกเว็บ <span
                        class="text-slate-700">{{ number_format($totalUsers) }}</span> คน</h3>
            </div>

            <div
                class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div
                    class="w-16 h-16 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">รวมยอด <span
                        class="text-slate-700">{{ number_format($totalRevenue, 2) }}</span> ฿</h3>
            </div>

            <div
                class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-basket-shopping"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">สต็อกทั้งหมด <span
                        class="text-slate-700">{{ number_format($totalStock) }}</span> ชิ้น</h3>
            </div>

            <div
                class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div
                    class="w-16 h-16 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">แอดมินเว็บ <span class="text-slate-700">
                        {{ number_format($onlineUsers) }}</span> คน</h3>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-xl p-6 border border-slate-200 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-medium text-slate-800">สถิติรายได้ 7 วันล่าสุด</h2>
                    <span class="text-xs font-medium text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">+12%
                        จากสัปดาห์ก่อน</span>
                </div>
                <div id="revenueChart" class="w-full"></div>
            </div>

            <div class="bg-white rounded-xl p-6 border border-slate-200 lg:col-span-1">
                <div class="mb-4">
                    <h2 class="text-lg font-medium text-slate-800">สัดส่วนยอดขาย</h2>
                </div>
                <div id="salesChart" class="w-full flex justify-center mt-6"></div>
            </div>

        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const revenueLabels = @json($days);
            const revenueValues = @json($revenueData);
            const donutLabels = @json($salesLabels);
            const donutSeries = @json($salesSeries);

            // --- Revenue Area Chart ---
            var revenueOptions = {
                series: [{
                    name: 'รายได้ (บาท)',
                    data: revenueValues
                }],
                chart: {
                    type: 'area',
                    height: 320,
                    fontFamily: 'Mitr, sans-serif',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#7C3AED'],
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: revenueLabels
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return "฿" + value.toLocaleString();
                        }
                    }
                }
            };
            new ApexCharts(document.querySelector("#revenueChart"), revenueOptions).render();

            // --- Sales Donut Chart ---
            var salesOptions = {
                series: donutSeries.length > 0 ? donutSeries : [0],
                labels: donutLabels.length > 0 ? donutLabels : ['ยังไม่มีข้อมูล'],
                chart: {
                    type: 'donut',
                    height: 320,
                    fontFamily: 'Mitr, sans-serif'
                },
                colors: ['#7C3AED', '#38bdf8', '#fbbf24', '#f87171', '#4ade80'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'รายการทั้งหมด',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                legend: {
                    position: 'bottom'
                }
            };
            new ApexCharts(document.querySelector("#salesChart"), salesOptions).render();
        });
    </script>
@endsection
