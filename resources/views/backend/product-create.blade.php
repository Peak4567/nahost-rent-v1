@extends('backend.layout')

@section('content')
    <div class="lg:ml-64 p-6 sm:p-10 bg-slate-50 min-h-screen font-mitr">

        <div class="mb-8">
            <a href="{{ route('backend.product.index') }}"
                class="text-slate-400 hover:text-slate-600 text-sm flex items-center mb-2 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> ย้อนกลับไปหน้ารายการสินค้า
            </a>
            <h1 class="text-3xl font-bold text-slate-800">เพิ่มสินค้าใหม่ (แพ็กเกจ)</h1>
        </div>

        @if (session('success'))
            <div class="mx-auto mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-200 flex items-center">
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

        <script>
            window.allStocksData = @json($stocks ?? []);
        </script>

        <div class="mx-auto grid grid-cols-1 xl:grid-cols-3 gap-8 items-start" 
             x-data="{ 
                name: '', 
                price: '', 
                description: '', 
                categoryId: '',
                categoryName: '', 
                imageUrl: null,
                allStocks: window.allStocksData,
                selectedStocks: [],
                
                // ฟังก์ชันสำหรับกรองสต็อก ให้ตรงกับชื่อหมวดหมู่ที่เลือก
                get availableStocks() {
                    if (!this.categoryName) return [];
                    return this.allStocks.filter(stock => stock.category_id === this.categoryName);
                }
             }">

            <form action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data" class="xl:col-span-2 space-y-6">
                @csrf

                <div class="bg-white p-8 rounded-xl border border-slate-200 space-y-6">
                    <h2 class="text-xl font-bold text-slate-800"><i class="fa-solid fa-box-open text-[#7C3AED] mr-2"></i>
                        ข้อมูลแพ็กเกจสินค้า</h2>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">รูปภาพสินค้า <span class="text-red-500">*</span></label>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition hover:border-[#7C3AED]">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-3"></i>
                                    <p class="mb-2 text-sm text-slate-500 font-medium">คลิกเพื่ออัปโหลด หรือลากไฟล์มาวาง</p>
                                    <p class="text-xs text-slate-400">PNG, JPG หรือ WEBP (แนะนำขนาด 4:3)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="image" accept="image/*" class="hidden" 
                                       @change="imageUrl = URL.createObjectURL($event.target.files[0])" required />
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">หมวดหมู่สินค้า <span class="text-red-500">*</span></label>
                            <select name="category_id" required x-model="categoryId"
                                    @change="categoryName = $event.target.options[$event.target.selectedIndex].text; selectedStocks = [];"
                                class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition appearance-none cursor-pointer">
                                <option value="" disabled selected>-- เลือกหมวดหมู่ --</option>
                                @forelse($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @empty
                                    <option value="" disabled>ไม่มีหมวดหมู่ กรุณาสร้างก่อน</option>
                                @endforelse
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">สถานะสินค้า</label>
                            <select name="status" class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition appearance-none cursor-pointer">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>เปิดขาย (Active)</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>ปิดการขายชั่วคราว (Inactive)</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ผูกกับสต็อกสินค้า (เลือกได้หลายอัน) <span class="text-red-500">*</span></label>
                            
                            <div class="w-full max-h-56 overflow-y-auto p-4 rounded-xl border border-slate-300 bg-slate-50 custom-scrollbar">
                                <template x-if="!categoryName">
                                    <div class="text-center py-6 text-slate-400">
                                        <i class="fa-solid fa-list-check text-3xl mb-2"></i>
                                        <p class="text-sm">กรุณาเลือกหมวดหมู่ด้านบน เพื่อดูสต็อกที่ว่าง</p>
                                    </div>
                                </template>

                                <template x-if="categoryName && availableStocks.length === 0">
                                    <div class="text-center py-6 text-rose-400">
                                        <i class="fa-solid fa-box-open text-3xl mb-2"></i>
                                        <p class="text-sm">ไม่มีสต็อกว่างสำหรับหมวดหมู่ "<span x-text="categoryName"></span>"</p>
                                    </div>
                                </template>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" x-show="availableStocks.length > 0">
                                    <template x-for="stock in availableStocks" :key="stock.id">
                                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:border-[#7C3AED] hover:bg-violet-50 cursor-pointer transition-all">
                                            <input type="checkbox" name="stock_ids[]" :value="stock.id" x-model="selectedStocks"
                                                class="w-5 h-5 text-[#7C3AED] rounded border-slate-300 focus:ring-[#7C3AED] focus:ring-2 bg-slate-50 cursor-pointer">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-bold text-slate-700" x-text="stock.item_name"></span>
                                                <span class="text-[10px] text-slate-400" x-text="'ราคาเดิม: ฿' + stock.price"></span>
                                            </div>
                                        </label>
                                    </template>
                                </div>
                            </div>
                            
                            <div class="mt-2 text-sm text-slate-500 flex justify-between">
                                <span>เลือกสต็อกที่ผูกแล้ว: <strong class="text-[#7C3AED]" x-text="selectedStocks.length"></strong> รายการ</span>
                                <span class="text-xs text-slate-400">(ระบบจะดึงเฉพาะสต็อกที่ว่างมาแสดง)</span>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ชื่อแพ็กเกจ / ชื่อสินค้า <span class="text-red-500">*</span></label>
                            <input type="text" name="product_name" required placeholder="เช่น NaHost Pro Plan 1TB" x-model="name"
                                class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ราคาปกติ (บาท) <span class="text-red-500">*</span></label>
                            <input type="number" name="main_price" required min="0" step="0.01" x-model="price"
                                class="w-full h-14 px-5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">โค้ดสินค้าอ้างอิง</label>
                            <input type="text" name="product_code" value="{{ 'NAHOST-' . strtoupper(\Illuminate\Support\Str::random(6)) }}" readonly
                                class="w-full h-14 px-5 rounded-xl border border-slate-200 bg-slate-200 text-slate-500 cursor-not-allowed focus:outline-none font-mono">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">รายละเอียดเพิ่มเติม</label>
                            <textarea name="description" rows="4" placeholder="ข้อมูลสเปคต่างๆ ของสินค้า" x-model="description"
                                class="w-full px-5 py-4 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#7C3AED] transition"></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('backend.product.index') }}"
                        class="px-8 py-3.5 text-slate-600 font-medium hover:bg-slate-100 rounded-xl transition">ยกเลิก</a>
                    <button type="submit"
                        class="bg-[#7C3AED] hover:bg-violet-700 text-white px-12 py-3.5 rounded-xl font-medium transition">
                        บันทึกสินค้าใหม่
                    </button>
                </div>
            </form>

            <div class="sticky top-8">
                <h2 class="text-lg font-bold text-slate-700 mb-4"><i class="fa-solid fa-eye text-[#7C3AED] mr-2"></i> ตัวอย่างหน้าเว็บ</h2>
                
                <div class="group bg-white rounded-xl border border-slate-100 overflow-hidden flex flex-col">
                    <div class="relative p-3">
                        <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-slate-100 flex items-center justify-center">
                            <template x-if="imageUrl">
                                <img :src="imageUrl" alt="Product" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </template>
                            <template x-if="!imageUrl">
                                <div class="flex flex-col items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-5xl mb-2"></i>
                                    <span class="text-sm font-medium">รูปภาพ 4:3</span>
                                </div>
                            </template>

                            <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                                <div class="bg-red-500 text-white text-[11px] px-5 py-1.5 rounded-b-xl font-medium whitespace-nowrap">
                                    <i class="fa-solid fa-fire text-[10px] mr-1"></i>หมวดหมู่สินค้าขายดี
                                </div>
                            </div>

                            <div class="absolute bottom-3 right-3 bg-purple-600 text-white px-3 py-1 rounded-xl text-sm font-medium"
                                 x-text="price ? '฿' + new Intl.NumberFormat().format(price) : '฿0.00'">
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-2 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[10px] bg-purple-100 text-purple-600 px-2 py-0.5 rounded-xl uppercase tracking-wider line-clamp-1 max-w-[60%]" 
                                  x-text="categoryName || 'หมวดหมู่'"></span>
                            
                            <div class="flex text-yellow-400 text-[10px]">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star text-slate-200"></i>
                            </div>
                        </div>
                        <h3 class="text-slate-800 font-bold text-lg mb-2 group-hover:text-purple-600 transition-colors uppercase truncate" 
                            x-text="name || 'ชื่อแพ็กเกจสินค้า'"></h3>

                        <p class="text-slate-400 text-xs leading-relaxed mb-4 line-clamp-2 min-h-[36px]" 
                           x-text="description || 'รายละเอียดสเปคและข้อมูลของสินค้าจะแสดงที่นี่...'"></p>

                        <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-slate-400 font-medium">ในสต็อก</span>
                                <span class="text-sm text-slate-700 font-bold">
                                    <span x-text="selectedStocks.length > 0 ? selectedStocks.length : '0'"></span> ชิ้น
                                </span>
                            </div>

                            <div class="flex gap-2">
                                <a href="javascript:void(0)" class="w-10 h-10 bg-purple-600 text-white rounded-xl flex items-center justify-center hover:bg-purple-700 transition-all cursor-default opacity-80">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection