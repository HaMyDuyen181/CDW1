@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Thêm Banner
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4">
            <div class="flex justify-end">
                <a class="btn bg-red-500 text-white text-sm px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400"
                   href="{{ route('banner.index') }}">
                    <i class="fas fa-arrow-left mr-2"></i>Về danh sách
                </a>
            </div>
        </div>

        <!-- Tiêu đề -->
        <section class="content-header">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl font-bold text-gray-800">Thêm Banner</h1>
            </div>
        </section>

        <!-- Thêm Banner -->
        <section class="content">
            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

                <!-- Form -->
                <div class="p-6">
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tên Banner -->
                            <div class="mb-2 w-full">
                                <label for="name" class="block font-medium text-gray-700">Tên Banner</label>
                                <input type="text" id="name" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <!-- Link -->
                            <div class="mb-2 w-full">
                                <label for="link" class="block font-medium text-gray-700">Liên kết Banner</label>
                                <input type="text" id="link" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="link" value="{{ old('link') }}">
                                @if ($errors->has('link'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('link') }}</div>
                                @endif
                            </div>

                            <!-- Hình ảnh -->
                            <div class="mb-2 w-full">
                                <label for="image" class="block font-medium text-gray-700">Hình ảnh Banner</label>
                                <input type="file" id="image" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="image">
                                @if ($errors->has('image'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <!-- Mô tả -->
                            <div class="mb-2 w-full">
                                <label for="description" class="block font-medium text-gray-700">Mô tả Banner</label>
                                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" rows="3">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
            
                            <!-- Vị trí -->
                            <div class="mb-2 w-full">
                                <label for="position" class="block font-medium text-gray-700">Vị trí Banner</label>
                                <select id="position" name="position" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300">
                                    <option value="slideshow" @if(old('position') == 'slideshow') selected @endif>Slideshow</option>
                                </select>
                                @if ($errors->has('position'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('position') }}</div>
                                @endif
                            </div>

                            <!-- Thứ tự sắp xếp -->
                            <div class="mb-2 w-full">
                                <label for="sort_order" class="block font-medium text-gray-700">Thứ tự hiển thị</label>
                                <input type="number" id="sort_order" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="sort_order" value="{{ old('sort_order', 1) }}" min="1"> {{-- Giá trị mặc định là 1 --}}
                                @if ($errors->has('sort_order'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('sort_order') }}</div>
                                @endif
                            </div>

                            <!-- Trạng thái -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                                <select name="status" id="status" class="form-control w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="2" {{ old('status', 2) == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Xuất bản</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nút Submit -->
                        <div class="mt-6">
                            <button type="submit" class="btn bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                Thêm Banner
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>
