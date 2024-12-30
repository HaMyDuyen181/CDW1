<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Sản phẩm
    </x-slot:title>
    <div class="flex justify-center py-6">
        <div class="w-full max-w-4xl px-7 bg-red-200 shadow-md rounded-md min-h-screen py-10">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa sản phẩm</h1>
                <a href="{{ route('product.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white p-6">
                <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Danh mục -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                            <select name="category_id" id="category_id" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Thương hiệu -->
                        <div>
                            <label for="brand_id" class="block text-sm font-medium text-gray-700">Thương hiệu</label>
                            <select name="brand_id" id="brand_id" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tên sản phẩm -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                                   class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" 
                                   class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Tự động tạo từ tên nếu để trống">
                        </div>

                        <!-- Hình ảnh -->
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                            <input type="file" name="thumbnail" id="thumbnail" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if ($product->thumbnail)
                                <img src="{{ asset('storage/images/product/' . $product->thumbnail) }}" alt="{{ $product->name }}" class="mt-2" width="200">
                            @endif
                        </div>

                        <!-- Giá mua -->
                        <div>
                            <label for="price_buy" class="block text-sm font-medium text-gray-700">Giá mua</label>
                            <input type="number" name="price_buy" id="price_buy" value="{{ old('price_buy', $product->price_buy) }}" 
                                   class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                       
                        <!-- Số lượng -->
                        <div>
                            <label for="qty" class="block text-sm font-medium text-gray-700">Số lượng</label>
                            <input type="number" name="qty" id="qty" value="{{ old('qty', $product->qty) }}" 
                                   class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Nhập số lượng sản phẩm" required>
                        </div>
 <!-- Giá giảm -->
 <div>
    <label for="price_sale" class="block text-sm font-medium text-gray-700">Giá giảm</label>
    <input type="number" name="price_sale" id="price_sale" value="{{ old('price_sale', $product->price_sale) }}" 
           class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

                        <!-- Chi tiết -->
                        <div>
                            <label for="detail" class="block text-sm font-medium text-gray-700">Chi tiết sản phẩm</label>
                            <textarea name="detail" id="detail" rows="4" 
                                      class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                      placeholder="Nhập chi tiết sản phẩm">{{ old('detail', $product->detail) }}</textarea>
                        </div>

                        <!-- Mô tả -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                      placeholder="Nhập mô tả">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Nội dung -->
                        <div class="md:col-span-2">
                            <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                            <textarea name="content" id="content" rows="5" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                      placeholder="Nhập nội dung">{{ old('content', $product->content) }}</textarea>
                        </div>

                        <!-- Trạng thái -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between items-center">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật sản phẩm</button>
                        <a href="{{ route('product.index') }}" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
