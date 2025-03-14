<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa menu
    </x-slot:title>

    <div class="flex justify-center">
        <div class="p-6 w-full max-w-4xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa menu</h1>
                <a href="{{ route('menu.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Tên Menu -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên Menu</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $menu->name ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tên menu" 
                               required>
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Link -->
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                        <input type="text" 
                               name="link" id="link" 
                               value="{{ old('link', $menu->link ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập link menu" 
                               required>
                        @if ($errors->has('link'))
                            <div class="text-red-500 text-sm">{{ $errors->first('link') }}</div>
                        @endif
                    </div>

                    {{-- <!-- Hình ảnh -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if (isset($menu) && $menu->image)
                            <img src="{{ asset('storage/images/menu/' . $menu->image) }}" alt="{{$menu->image}}" class="mt-2" width="200">
                        @endif
                        @if ($errors->has('image'))
                            <div class="text-red-500 text-sm">{{ $errors->first('image') }}</div>
                        @endif
                    </div> --}}

                    <!-- Vị trí -->
                    <div class="mb-4">
                        <label for="position" class="block text-sm font-medium text-gray-700">Vị trí</label>
                        <input type="text" name="position" id="position" 
                               value="{{ old('position', $menu->position ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập vị trí">
                        @if ($errors->has('position'))
                            <div class="text-red-500 text-sm">{{ $errors->first('position') }}</div>
                        @endif
                    </div>

                    <!-- Loại -->
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Loại</label>
                        <input type="text" name="type" id="type" 
                               value="{{ old('type', $menu->type ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập loại menu">
                        @if ($errors->has('type'))
                            <div class="text-red-500 text-sm">{{ $errors->first('type') }}</div>
                        @endif
                    </div>

                    <!-- Thứ tự -->
                    <div class="mb-4">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $menu->sort_order ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @if ($errors->has('sort_order'))
                            <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                        @endif
                    </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ (old('status', $menu->status ?? '') == 1) ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ (old('status', $menu->status ?? '') == 0) ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-start"> {{-- Keep justify-start if that's your preference --}}
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật menu</button>
                            <a href="{{ route('menu.index') }}"
                                class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>