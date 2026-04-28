@extends('layout')

@section('content')
    <section class="py-16 bg-gray-50 font-mitr min-h-screen">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">ตะกร้าสินค้าของคุณ</h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">{{ session('error') }}</div>
            @endif

            <div class="bg-white p-6 md:p-8 rounded-xl border border-gray-200">
                @if (count($cart) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left whitespace-nowrap min-w-max">
                            <thead>
                                <tr class="border-b border-gray-100 text-gray-500 text-sm tracking-wide">
                                    <th class="py-4 font-medium">สินค้า</th>
                                    <th class="py-4 font-medium text-center">ราคา</th>
                                    <th class="py-4 font-medium text-center">จำนวน</th>
                                    <th class="py-4 font-medium text-right">รวม</th>
                                    <th class="py-4 font-medium text-center w-16"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($cart as $id => $details)
                                    @php $total += $details['price'] * $details['quantity']; @endphp
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-4 flex items-center gap-4">
                                            <div
                                                class="w-24 h-16 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden border border-gray-100">
                                                <img src="{{ !empty($details['image']) ? asset($details['image']) : asset('/assets/img/Rent.png') }}"
                                                    alt="{{ $details['name'] }}" class="w-full h-full object-cover">
                                            </div>
                                            <span
                                                class="font-medium text-gray-800 text-base whitespace-normal line-clamp-2 min-w-[200px]">{{ $details['name'] }}</span>
                                        </td>

                                        <td class="py-4 text-center text-gray-600 font-medium">
                                            ฿{{ number_format($details['price'], 2) }}
                                        </td>

                                        <td class="py-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <form action="{{ route('frontend.cart.update', $id) }}" method="POST"
                                                    class="m-0 p-0">
                                                    @csrf
                                                    <input type="hidden" name="action" value="decrease">
                                                    <button type="submit"
                                                        class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center transition-colors">
                                                        <i class="fa-solid fa-minus text-xs"></i>
                                                    </button>
                                                </form>

                                                <span
                                                    class="w-8 text-center font-bold text-gray-800">{{ $details['quantity'] }}</span>

                                                <form action="{{ route('frontend.cart.update', $id) }}" method="POST"
                                                    class="m-0 p-0">
                                                    @csrf
                                                    <input type="hidden" name="action" value="increase">
                                                    <button type="submit"
                                                        class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center transition-colors">
                                                        <i class="fa-solid fa-plus text-xs"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="py-4 text-right font-bold text-purple-600 text-lg">
                                            ฿{{ number_format($details['price'] * $details['quantity'], 2) }}
                                        </td>

                                        <td class="py-4 text-center">
                                            <form action="{{ route('frontend.cart.remove', $id) }}" method="POST"
                                                class="m-0 p-0">
                                                @csrf
                                                <button type="submit"
                                                    class="w-10 h-10 rounded-xl text-gray-400 hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors mx-auto"
                                                    title="ลบสินค้านี้">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="mt-8 border-t border-gray-100 pt-6 flex flex-col md:flex-row justify-between items-center gap-6">
                        <a href="{{ route('frontend.products') }}"
                            class="text-gray-400 hover:text-purple-600 transition-colors flex items-center gap-2 text-sm font-medium">
                            <i class="fa-solid fa-arrow-left"></i> เลือกซื้อสินค้าต่อ
                        </a>

                        <div class="flex flex-col sm:flex-row items-center gap-6 w-full md:w-auto">
                            <div class="text-right">
                                <span class="text-gray-500 text-sm mr-2">ยอดรวมทั้งหมด:</span>
                                <span class="font-bold text-3xl text-purple-600">฿{{ number_format($total, 2) }}</span>
                            </div>
                            <form action="{{ route('frontend.cart.checkout') }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                <button type="submit"
                                    class="w-full px-8 py-3.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 font-bold transition-colors text-center">
                                    ดำเนินการสั่งซื้อ
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-16">
                        <div class="w-24 h-24 bg-gray-50 rounded-xl flex items-center justify-center mb-6">
                            <i class="fa-solid fa-cart-shopping text-4xl text-gray-300"></i>
                        </div>
                        <p class="text-xl font-bold text-gray-700 mb-2">ตะกร้าสินค้าของคุณว่างเปล่า</p>
                        <p class="text-sm text-gray-400 mb-8">คุณยังไม่ได้เพิ่มสินค้าใดๆ ลงในตะกร้า
                            ลองดูสินค้าที่เราแนะนำสิ!</p>
                        <a href="{{ route('frontend.products') }}"
                            class="px-8 py-3 bg-purple-100 text-purple-600 rounded-xl text-sm font-bold hover:bg-purple-200 transition-colors">
                            กลับไปเลือกซื้อสินค้า
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
