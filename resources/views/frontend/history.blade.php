@extends('layout')

@section('content')
    <section class="py-16 md:py-24 bg-gray-50 font-mitr min-h-screen">
        <div class="max-w-screen-xl mx-auto px-4">

            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-purple-600 p-2 rounded-lg text-white shadow-lg">
                        <i class="fa-solid fa-layer-group text-xl"></i>
                    </div>
                    <h2 class="text-black text-2xl md:text-3xl leading-none font-medium">ประวัติซื้อสินค้า</h2>
                </div>
                <p class="text-gray-500">ค้นหาและเลือกชมสินค้าคุณภาพสูงที่เราคัดสรรมาเพื่อคุณ</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mt-10">
                @if (count($history ?? []) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="px-6 py-4 border-b border-gray-200 font-semibold w-16">ลำดับ</th>
                                    <th class="px-6 py-4 border-b border-gray-200 font-semibold">ออเดอร์</th>
                                    <th class="px-6 py-4 border-b border-gray-200 font-semibold">สินค้าและข้อมูล</th>
                                    <th class="px-6 py-4 border-b border-gray-200 font-semibold text-right">ยอดรวม</th>
                                    <th class="px-6 py-4 border-b border-gray-200 font-semibold text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-700">
                                @foreach ($history as $index => $order)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-500 align-top">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="font-bold text-gray-900">{{ $order['order_id'] }}</div>
                                            <div class="text-xs text-gray-400">{{ $order['date'] }}</div>
                                        </td>
                                        <td class="px-6 py-4 align-top min-w-[300px]">
                                            @foreach ($order['items'] as $item)
                                                <div class="mb-4 last:mb-0">
                                                    <div class="font-medium text-sm text-gray-800">{{ $item['name'] }}</div>
                                                    <div class="text-xs text-gray-500">{{ $item['quantity'] }} ชิ้น |
                                                        ฿{{ number_format($item['price'], 2) }}</div>

                                                    @if (!empty($item['descriptions']))
                                                        <div class="mt-2" x-data="{ show: false }">
                                                            <button @click="show = !show"
                                                                class="text-xs text-purple-600 underline font-medium hover:text-purple-800">
                                                                <span x-text="show ? 'ซ่อนข้อมูล' : 'ดูข้อมูลไอดี'"></span>
                                                            </button>
                                                            <div x-show="show"
                                                                class="mt-2 p-3 bg-gray-100 rounded-lg text-[11px] font-mono text-gray-600 border border-gray-200">
                                                                @foreach ($item['descriptions'] as $desc)
                                                                    <div class="truncate">{{ $desc }}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 text-right font-bold text-gray-900 align-top">
                                            ฿{{ number_format($order['total'], 2) }}</td>
                                        <td class="px-6 py-4 text-center align-top">
                                            <span
                                                class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-[11px] font-bold uppercase">
                                                {{ $order['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center text-gray-400 italic">ยังไม่มีประวัติการสั่งซื้อ</div>
                @endif
            </div>
        </div>
    </section>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
