@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Thêm Thương Hiệu
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4">
            <div class="flex justify-end">
                <a class="btn bg-red-500 text-white text-sm px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400"
                   href="{{ route('brand.index') }}">
                    <i class="fas fa-arrow-left mr-2"></i>Về danh sách
                </a>
            </div>
        </div>

        <!-- Tiêu đề -->
        <section class="content-header">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl font-bold text-gray-800">Thêm Thương Hiệu</h1>
            </div>
        </section>

        <!-- Thêm Thương Hiệu -->
        <section class="content">
            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

                <!-- Form -->
                <div class="p-6">
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tên Thương Hiệu -->
                            <div class="mb-2 w-full">
                                <label for="name" class="block font-medium text-gray-700">Tên Thương Hiệu</label>
                                <input type="text" id="name" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <!-- Slug -->
                            <div class="mb-2 w-full">
                                <label for="slug" class="block font-medium text-gray-700">Slug</label>
                                <input type="text" id="slug" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="slug" value="{{ old('slug') }}">
                                @if ($errors->has('slug'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>

                            <!-- Logo -->
                            <div class="mb-2 w-full">
                                <label for="image" class="block font-medium text-gray-700">Logo Thương Hiệu</label>
                                <input type="file" id="image" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="image">
                                @if ($errors->has('image'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <!-- Mô tả -->
                            <div class="mb-2 w-full md:col-span-2">
                                <label for="description" class="block font-medium text-gray-700">Mô tả</label>
                                <textarea id="description" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-300" name="description" rows="4">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-red-500 mt-1">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <!-- Nút Submit -->
                        <div class="mt-6">
                            <button type="submit" class="btn bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                Thêm Thương Hiệu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>
