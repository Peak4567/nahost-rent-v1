@extends('layout')
@section('content')
<section class="py-30 bg-gray-50/50 font-mitr">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="mb-8">
            <h2 class="text-2xl font-medium text-black">ประวัติการเติมเงิน</h2>
            <p class="text-gray-500">ตรวจสอบสถานะรายการเติมเงินย้อนหลังของคุณ</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">วันที่</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">ช่องทาง</th>
                        <th class="px-6 py-4 text-center font-semibold text-gray-700">จำนวนเงิน</th>
                        <th class="px-6 py-4 text-center font-semibold text-gray-700">สถานะ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($histories as $item)
                    <tr>
                        <td class="px-6 py-4 text-gray-600">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 uppercase">{{ $item->method }}</td>
                        <td class="px-6 py-4 text-center font-bold text-purple-600">฿ {{ number_format($item->amount, 2) }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($item->status == 'success')
                                <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-xs font-bold">สำเร็จ</span>
                            @elseif($item->status == 'pending')
                                <span class="px-3 py-1 bg-yellow-50 text-yellow-600 rounded-full text-xs font-bold">รอตรวจสอบ</span>
                            @else
                                <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-xs font-bold">ไม่สำเร็จ</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-400">ยังไม่มีประวัติการเติมเงิน</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection