@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">แก้ไขสินค้า: <span
                    class="text-[#7C3AED]">{{ $product->product_name }}</span></h1>
        </div>

        @if (session('success'))
            <div
                class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200 flex items-center">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-auto mb-6 p-4 bg-red-50 text-red-600 rounded-xl border border-red-200 flex items-center">
                <i class="fa-solid fa-triangle-exclamation mr-2 mt-1 self-start"></i>
                <ul class="list-disc list-inside text-sm font-medium">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✨ เตรียมข้อมูลสำหรับ JavaScript (แปลง ID เป็นตัวเลขให้หมด) ✨ --}}
        <script>
            window.productEditData = {
                name: @json(old('product_name', $product->product_name)),
                price: @json(old('main_price', $product->main_price)),
                description: @json(old('description', $product->description)),
                categoryId: @json(old('category_id', $product->category_id)),
                categoryName: '', // จะให้ Alpine ดึงมาจาก Select อัตโนมัติเพื่อความแม่นยำ
                imageUrl: @json($product->image ? asset($product->image) : null),
                allStocks: @json($stocks ?? []),
                selectedStocks: @json($product->stocks ? $product->stocks->pluck('id')->map(fn($id) => (int) $id) : [])
            };
        </script>

        <div class="mx-auto grid grid-cols-1 xl:grid-cols-3 gap-8 items-start" x-data="{
            ...window.productEditData,
        
            // ✨ ฟังก์ชันสำหรับกรองสต็อกที่ว่าง และ สต็อกที่ถูกเลือกไว้อยู่แล้ว
            get availableStocks() {
                return this.allStocks.filter(stock => {
                    const stockId = parseInt(stock.id);
                    const isSelected = this.selectedStocks.includes(stockId);
                    const matchesCategory = this.categoryName && String(stock.category_id).trim() === String(this.categoryName).trim();
                    // แสดงผลถ้า 'ถูกเลือกอยู่แล้ว' หรือ 'ตรงกับหมวดหมู่ที่เลือก'
                    return isSelected || matchesCategory;
                });
            }
        }"
            x-init="$nextTick(() => {
                const select = $refs.catSelect;
                if (select && select.selectedIndex >= 0) {
                    const text = select.options[select.selectedIndex].text;
                    if (text && !text.includes('--')) {
                        categoryName = text.trim();
                    }
                }
            });">

            <form action="{{ route('backend.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="xl:col-span-2 space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                    <h2 class="text-xl font-bold text-slate-800"><i
                            class="fa-solid fa-pen-to-square text-[#7C3AED] mr-2"></i>
                        แก้ไขข้อมูลแพ็กเกจสินค้า</h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">เปลี่ยนรูปภาพสินค้า</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition hover:border-[#7C3AED]">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-3"></i>
                                    <p class="mb-2 text-sm text-slate-500 font-medium">คลิกเพื่อเปลี่ยนรูปภาพ</p>
                                    <p class="text-xs text-slate-400">PNG, JPG หรือ WEBP (4:3)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="image" accept="image/*" class="hidden"
                                    @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">หมวดหมู่สินค้า <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <select name="category_id" required x-ref="catSelect" x-model="categoryId"
                                    @change="categoryName = $event.target.options[$event.target.selectedIndex].text;"
                                    class="w-full h-14 px-5 pr-10 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition appearance-none cursor-pointer">
                                    <option value="" disabled>-- เลือกหมวดหมู่ --</option>
                                    @forelse($categories ?? [] as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @empty
                                        <option value="" disabled>ไม่มีหมวดหมู่</option>
                                    @endforelse
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <i class="fa-solid fa-chevron-down text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะสินค้า</label>
                            <div class="relative">
                                <select name="status"
                                    class="w-full h-14 px-5 pr-10 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition appearance-none cursor-pointer">
                                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>เปิดขาย
                                        (Active)</option>
                                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>
                                        ปิดการขายชั่วคราว (Inactive)</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <i class="fa-solid fa-chevron-down text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ผูกกับสต็อกสินค้า (คลิกเพื่อเลือก
                                / คลิกซ้ำเพื่อเอาออก) <span class="text-red-500">*</span></label>
                            <div
                                class="w-full max-h-64 overflow-y-auto p-4 rounded-xl border border-slate-300 bg-slate-50 custom-scrollbar mb-1">
                                <template x-if="availableStocks.length === 0">
                                    <div class="text-center py-6 text-slate-400">
                                        <i class="fa-solid fa-box-open text-3xl mb-2"></i>
                                        <p class="text-sm">ไม่มีสต็อกว่างสำหรับหมวดหมู่นี้</p>
                                    </div>
                                </template>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" x-show="availableStocks.length > 0">
                                    <template x-for="stock in availableStocks" :key="stock.id">
                                        <label
                                            class="flex items-center gap-3 p-3 rounded-xl border transition-all cursor-pointer select-none"
                                            :class="{
                                                'border-[#7C3AED] bg-violet-50 ring-1 ring-[#7C3AED]': selectedStocks
                                                    .includes(parseInt(stock.id)),
                                                'border-slate-200 bg-white hover:border-slate-300': !selectedStocks
                                                    .includes(parseInt(stock.id)) && stock.status !== 'ขายแล้ว',
                                                'border-slate-100 bg-slate-100 cursor-not-allowed opacity-60': stock
                                                    .status === 'ขายแล้ว'
                                            }">

                                            <input type="checkbox" name="stock_ids[]" :value="parseInt(stock.id)"
                                                x-model="selectedStocks" :disabled="stock.status === 'ขายแล้ว'"
                                                class="w-5 h-5 text-[#7C3AED] rounded border-slate-300 focus:ring-[#7C3AED] cursor-pointer"
                                                :class="stock.status === 'ขายแล้ว' ? 'cursor-not-allowed' : 'cursor-pointer'">

                                            <div class="flex flex-col flex-grow">
                                                <span class="text-sm font-bold"
                                                    :class="selectedStocks.includes(parseInt(stock.id)) ? 'text-[#7C3AED]' : (
                                                        stock.status === 'ขายแล้ว' ? 'text-slate-400' :
                                                        'text-slate-700')"
                                                    x-text="stock.item_name + (stock.status === 'ขายแล้ว' ? ' (ขายแล้ว)' : '')"></span>
                                                <span class="text-[10px] text-slate-400"
                                                    x-text="'ราคา: ฿' + stock.price"></span>
                                            </div>

                                            <div x-show="selectedStocks.includes(parseInt(stock.id))"
                                                class="text-[#7C3AED]">
                                                <i class="fa-solid fa-circle-check text-lg"></i>
                                            </div>
                                        </label>
                                    </template>
                                </div>
                            </div>
                            <div class="text-xs text-slate-400 text-right w-full">
                                จำนวนสต็อกที่ถูกเลือก: <strong class="text-[#7C3AED] text-sm"
                                    x-text="selectedStocks.length"></strong> รายการ
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อแพ็กเกจ / ชื่อสินค้า <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="product_name" required x-model="name"
                                class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ราคาปกติ (บาท) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="main_price" required min="0" step="0.01"
                                x-model="price"
                                class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">โค้ดสินค้าอ้างอิง</label>
                            <input type="text" name="product_code" value="{{ $product->product_code }}" readonly
                                class="w-full h-14 px-5 rounded-xl border border-slate-200 bg-slate-200 text-slate-500 cursor-not-allowed font-mono">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">รายละเอียดเพิ่มเติม</label>
                            <textarea name="description" rows="4" x-model="description"
                                class="w-full px-5 py-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition"></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('backend.product.index') }}"
                        class="px-8 py-3.5 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition">ยกเลิก</a>
                    <button type="submit"
                        class="bg-[#7C3AED] hover:bg-violet-700 text-white px-12 py-3.5 rounded-xl font-medium transition">
                        บันทึกการเปลี่ยนแปลง
                    </button>
                </div>
            </form>

            {{-- Preview Card --}}
            <div class="sticky top-8">
                <h2 class="text-lg font-bold text-slate-700 mb-4"><i class="fa-solid fa-eye text-[#7C3AED] mr-2"></i>
                    ตัวอย่างหน้าเว็บ</h2>
                <div class="group bg-white rounded-xl border border-slate-100 overflow-hidden flex flex-col shadow-sm">
                    <div class="relative p-3">
                        <div
                            class="relative rounded-xl overflow-hidden aspect-[4/3] bg-slate-100 flex items-center justify-center">
                            <template x-if="imageUrl">
                                <img :src="imageUrl" alt="Product"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </template>
                            <template x-if="!imageUrl">
                                <i class="fa-solid fa-image text-5xl text-slate-300"></i>
                            </template>
                            <div class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-xl text-sm font-medium"
                                x-text="price ? '฿' + new Intl.NumberFormat().format(price) : '฿0.00'">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span
                                class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-xl uppercase tracking-wider"
                                x-text="categoryName || 'หมวดหมู่'"></span>
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star text-slate-200"></i>
                            </div>
                        </div>
                        <h3 class="text-slate-800 font-bold text-lg mb-2 truncate" x-text="name || 'ชื่อสินค้า'"></h3>
                        <p class="text-slate-400 text-xs line-clamp-2 min-h-[36px]"
                            x-text="description || 'รายละเอียด...'"></p>
                        <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-slate-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-slate-700 font-bold"><span
                                        x-text="selectedStocks.length"></span> ชิ้น</span>
                            </div>
                            <div
                                class="w-10 h-10 bg-purple-600 text-white rounded-xl flex items-center justify-center opacity-80 cursor-default">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
