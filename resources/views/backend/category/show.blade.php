@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Danh mục
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="mb-6 flex justify-between items-center">
                        <h1 class="text-3xl font-bold">Chi tiết danh mục</h1>
                        <a href="{{ route('category.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                            ← Về danh sách
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card-body">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr class="text-left text-black bg-red-200">
                            <th class="px-6 py-3 border-b font-medium">Tên trường</th>
                            <th class="px-6 py-3 border-b font-medium">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Tên Danh mục</td>
                            <td class="px-6 py-3 border-b">{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Slug</td>
                            <td class="px-6 py-3 border-b">{{ $category->slug }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Mô tả</td>
                            <td class="px-6 py-3 border-b">{{ $category->description }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">ID Cha</td>
                            <td class="px-6 py-3 border-b">{{ $category->parent_id == 0 ? 'Không có' : 'Danh mục cha' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Thứ tự sắp xếp</td>
                            <td class="px-6 py-3 border-b">{{ $category->sort_order }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Ảnh danh mục</td>
                            <td class="px-6 py-3 border-b">
                                <img src="{{ asset('images/categories/' . $category->image) }}" alt="Category Image" class="w-32 h-32 object-cover">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout-admin>
