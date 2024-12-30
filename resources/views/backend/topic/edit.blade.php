<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Chủ đề
    </x-slot:title>

    <div class="flex justify-center">
        <div class="p-6 w-full max-w-4xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa chủ đề</h1>
                <a href="{{ route('topic.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('topic.update', ['topic' => $topic->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4"> {{-- Consistent spacing between form elements --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Tên chủ đề</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $topic->name) }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required placeholder="Nhập tên chủ đề">
                            @if ($errors->has('name'))
                                <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $topic->slug) }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tự động tạo từ tên nếu để trống">
                            @if ($errors->has('slug'))
                                <div class="text-red-500 text-sm">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập mô tả">{{ old('description', $topic->description) }}</textarea>
                            @if ($errors->has('description'))
                                <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                            <input type="number" name="sort_order" id="sort_order"
                                value="{{ old('sort_order', $topic->sort_order) }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if ($errors->has('sort_order'))
                                <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-end space-x-2"> {{-- Button container with spacing --}}
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Cập
                                nhật chủ đề</button>
                            <a href="{{ route('topic.index') }}"
                                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>