<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Banner
    </x-slot:title>

    <div class="flex justify-center">
        <div class="p-6 w-full max-w-4xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa banner</h1>
                <a href="{{ route('banner.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('banner.update', ['banner' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Tên Banner</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $banner->name ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập tên banner" required>
                            @if ($errors->has('name'))
                                <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="link" class="block text-sm font-medium text-gray-700">Liên kết (url)</label>
                            <input type="text" name="link" id="link" value="{{ old('link', $banner->link ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập liên kết">
                            @if ($errors->has('link'))
                                <div class="text-red-500 text-sm">{{ $errors->first('link') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if (isset($banner) && $banner->image)
                                <img src="{{ asset('/images/banners/' . $banner->image) }}" alt="{{$banner->image}}"
                                    class="mt-2 max-w-xs">
                            @endif
                            @if ($errors->has('image'))
                                <div class="text-red-500 text-sm">{{ $errors->first('image') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập mô tả">{{ old('description', $banner->description ?? '') }}</textarea>
                            @if ($errors->has('description'))
                                <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                            <input type="number" name="sort_order" id="sort_order"
                                value="{{ old('sort_order', $banner->sort_order ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($errors->has('sort_order'))
                                <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700">Vị trí</label>
                            <select name="position" id="position"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="slideshow" {{ (old('position', $banner->position ?? '') == 'slideshow') ? 'selected' : '' }}>Slideshow</option>
                                <option value="ads" {{ (old('position', $banner->position ?? '') == 'ads') ? 'selected' : '' }}>Quảng cáo</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ (old('status', $banner->status ?? '') == 1) ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ (old('status', $banner->status ?? '') == 0) ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-start">
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật Banner</button>
                            <a href="{{ route('banner.index') }}"
                                class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>