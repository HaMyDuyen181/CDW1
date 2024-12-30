<x-layout-admin>
    <x-slot:title>
        Thêm Danh Mục
    </x-slot:title>
    <div class="flex justify-center">
    <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Thêm danh mục</h1>
            <a href="{{ route('category.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                ← Về danh sách
            </a>
    </div>


        <!-- Form -->
        <div class="bg-white shadow-lg rounded-md p-8">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tên Danh Mục -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <input type="text" 
                           name="name" id="name" 
                           value="{{ old('name') }}" 
                           class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Nhập tên danh mục" 
                           required>
                    @if ($errors->has('name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập slug" required>
                    @if ($errors->has('slug'))
                        <div class="text-red-500 text-sm">{{ $errors->first('slug') }}</div>
                    @endif
                </div>

                <!-- Hình ảnh -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @if ($errors->has('image'))
                        <div class="text-red-500 text-sm">{{ $errors->first('image') }}</div>
                    @endif
                </div>

                <!-- Mô tả -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <!-- Thứ tự -->
                <div class="mb-4">
                    <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập thứ tự" required>
                    @if ($errors->has('sort_order'))
                        <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                    @endif
                </div>

                <!-- Trạng thái -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                    @if ($errors->has('status'))
                        <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                    @endif
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300">Thêm danh mục</button>
                    <a href="{{ route('category.index') }}" class="ml-4 bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
 