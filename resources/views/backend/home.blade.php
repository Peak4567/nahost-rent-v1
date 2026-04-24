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

            <div class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">เข้าชมเว็บ <span class="text-slate-700">1,204</span> คน</h3>
            </div>

            <div class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">รวมยอด <span class="text-slate-700">14,500</span> ฿</h3>
            </div>

            <div class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-basket-shopping"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]">สต็อกทั้งหมด <span class="text-slate-700">86</span> ชิ้น</h3>
            </div>

            <div class="bg-white rounded-xl p-6 border border-slate-200 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center text-3xl mb-4">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="text-xl font-medium text-[#7C3AED]"><span class="text-slate-700">100</span> Online</h3>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-xl p-6 border border-slate-200 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-medium text-slate-800">สถิติรายได้ 7 วันล่าสุด</h2>
                    <span class="text-xs font-medium text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">+12% จากสัปดาห์ก่อน</span>
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

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var revenueOptions = {
                series: [{
                    name: 'รายได้ (บาท)',
                    data: [1500, 2300, 1800, 3200, 2800, 4100, 3800]
                }],
                chart: {
                    type: 'area',
                    height: 320,
                    fontFamily: 'Mitr, sans-serif',
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                colors: ['#7C3AED'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: ['จันทร์', 'อังคาร', 'พุธ', 'พฤหัส', 'ศุกร์', 'เสาร์', 'อาทิตย์'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#94a3b8'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#94a3b8'
                        },
                        formatter: function(value) {
                            return "฿" + value;
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                }
            };

            var revenueChart = new ApexCharts(document.querySelector("#revenueChart"), revenueOptions);
            revenueChart.render();

            var salesOptions = {
                series: [45, 30, 25],
                labels: ['เช่าเซิร์ฟเวอร์', 'เติมเงิน', 'สินค้าอื่นๆ'],
                chart: {
                    type: 'donut',
                    height: 320,
                    fontFamily: 'Mitr, sans-serif',
                },
                colors: ['#7C3AED', '#38bdf8', '#fbbf24'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                name: {
                                    fontSize: '14px',
                                    color: '#64748b'
                                },
                                value: {
                                    fontSize: '24px',
                                    fontWeight: 500,
                                    color: '#1e293b',
                                    formatter: function(val) {
                                        return val + "%"
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'ยอดฮิต',
                                    fontSize: '14px',
                                    color: '#64748b'
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: false
                },
                legend: {
                    position: 'bottom',
                    markers: {
                        radius: 12
                    }
                }
            };

            var salesChart = new ApexCharts(document.querySelector("#salesChart"), salesOptions);
            salesChart.render();

        });
    </script>
@endsection