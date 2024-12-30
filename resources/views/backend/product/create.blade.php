<x-layout-admin>
    <x-slot:title>
        Thêm Sản Phẩm
    </x-slot:title>

    <div class="flex justify-center">
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
                        <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Thêm sản phẩm</h1>
                <a href="{{ route('product.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
        </div>

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-md shadow-md">
                @csrf

                <!-- Tên sản phẩm -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập slug" value="{{ old('slug') }}" required>
                </div>

                <!-- Nội dung -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                    <textarea name="content" id="content" 
                              class="mt-1 block w-full border-gray-300 rounded-md" 
                              placeholder="Nhập nội dung sản phẩm" required>{{ old('content') }}</textarea>
                </div>

                <!-- Mô tả -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea name="description" id="description" 
                              class="mt-1 block w-full border-gray-300 rounded-md" 
                              placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
                </div>

                <!-- Giá nhập -->
                <div class="mb-4">
                    <label for="price_buy" class="block text-sm font-medium text-gray-700">Giá nhập</label>
                    <input type="number" name="price_buy" id="price_buy" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập giá nhập" value="{{ old('price_buy') }}" required>
                </div>

                <!-- Giá bán -->
                <div class="mb-4">
                    <label for="price_sale" class="block text-sm font-medium text-gray-700">Giá bán</label>
                    <input type="number" name="price_sale" id="price_sale" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập giá bán" value="{{ old('price_sale') }}" required>
                </div>

                <!-- Số lượng -->
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-700">Số lượng</label>
                    <input type="number" name="qty" id="qty" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập số lượng" value="{{ old('qty') }}" required>
                </div>

                <!-- Hình ảnh -->
                <div class="mb-4">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full">
                </div>

                <!-- Danh mục -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select name="category_id" id="category_id" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Thương hiệu -->
                <div class="mb-4">
                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="">Chọn thương hiệu</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Trạng thái -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select name="status" id="status" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>

                <div class="flex items-center mt-6">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Thêm sản phẩm</button>
                    <a href="{{ route('product.index') }}" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
