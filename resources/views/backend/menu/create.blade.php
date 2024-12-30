<x-layout-admin>
    <x-slot:title>
        Thêm Menu
    </x-slot:title>

    <div class="flex justify-center">
        <!-- Main Content -->
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Thêm menu</h1>
                <a href="{{ route('menu.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
        </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-8">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tên Menu -->
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Tên menu</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}" 
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tên mục menu" 
                               required>
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Liên kết (URL) -->
                    <div class="mb-6">
                        <label for="link" class="block text-lg font-medium text-gray-700 mb-2">Liên kết (URL)</label>
                        <input type="text" 
                               name="link" 
                               id="link" 
                               value="{{ old('link') }}" 
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập liên kết" 
                               required>
                        @if ($errors->has('link'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('link') }}</div>
                        @endif
                    </div>

                    <!-- Vị trí -->
                    <div class="mb-6">
                        <label for="position" class="block text-lg font-medium text-gray-700 mb-2">Vị trí</label>
                        <select name="position" 
                                id="position" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                required>
                            <option value="mainmenu" {{ old('position') == 'mainmenu' ? 'selected' : '' }}>Main Menu</option>
                            <option value="footermenu" {{ old('position') == 'footermenu' ? 'selected' : '' }}>Footer Menu</option>
                        </select>
                        @if ($errors->has('position'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('position') }}</div>
                        @endif
                    </div>

                    <!-- Loại Menu -->
                    <div class="mb-6">
                        <label for="type" class="block text-lg font-medium text-gray-700 mb-2">Loại Menu</label>
                        <select name="type" 
                                id="type" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                required>
                            <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
                            <option value="category" {{ old('type') == 'category' ? 'selected' : '' }}>Category</option>
                        </select>
                        @if ($errors->has('type'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('type') }}</div>
                        @endif
                    </div>

                    <!-- Thứ tự -->
                    <div class="mb-6">
                        <label for="sort_order" class="block text-lg font-medium text-gray-700 mb-2">Thứ tự</label>
                        <input type="number" 
                               name="sort_order" 
                               id="sort_order" 
                               value="{{ old('sort_order') }}" 
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if ($errors->has('sort_order'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('sort_order') }}</div>
                        @endif
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-6">
                        <label for="status" class="block text-lg font-medium text-gray-700 mb-2">Trạng thái</label>
                        <select name="status" 
                                id="status" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không hoạt động</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm mt-1">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="mt-8 flex justify-end">
                        <button type="submit" 
                                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300">Thêm menu</button>
                        <a href="{{ route('menu.index') }}" 
                           class="ml-4 bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
