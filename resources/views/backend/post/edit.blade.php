<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Bài viết
    </x-slot:title>

    <div class="flex justify-center">
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa Bài viết</h1>
                <a href="{{ route('post.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4"> {{-- Consistent spacing --}}
                        <div>
                            <label for="topic_id" class="block text-sm font-medium text-gray-700">Chủ đề</label>
                            <select name="topic_id" id="topic_id"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}"
                                        {{ $post->topic_id == $topic->id ? 'selected' : '' }}>
                                        {{ $topic->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('topic_id'))
                                <div class="text-red-500 text-sm">{{ $errors->first('topic_id') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập tiêu đề" required>
                            @if ($errors->has('title'))
                                <div class="text-red-500 text-sm">{{ $errors->first('title') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập slug">
                            @if ($errors->has('slug'))
                                <div class="text-red-500 text-sm">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập mô tả">{{ old('description', $post->description) }}</textarea>
                            @if ($errors->has('description'))
                                <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                            <textarea name="content" id="content" rows="5"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập nội dung">{{ old('content', $post->content) }}</textarea>
                            @if ($errors->has('content'))
                                <div class="text-red-500 text-sm">{{ $errors->first('content') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if ($post->thumbnail)
                                <div class="mt-2">
                                    <img src="{{ asset('/images/posts/' . $post->thumbnail) }}"
                                        alt="{{ $post->title }}" class="max-w-xs h-auto rounded-lg"> {{-- Added max-w-xs and rounded-lg --}}
                                </div>
                            @endif
                            @if ($errors->has('thumbnail'))
                                <div class="text-red-500 text-sm">{{ $errors->first('thumbnail') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Loại bài viết</label>
                            <select name="type" id="type"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ $post->type == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                                <div class="text-red-500 text-sm">{{ $errors->first('type') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Cập
                                nhật</button>
                            <a href="{{ route('post.index') }}"
                                class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>