@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Menu
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="mb-6 flex justify-between items-center">
                        <h1 class="text-3xl font-bold">Chi tiết menu</h1>
                        <a href="{{ route('menu.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                            ← Về danh sách
                        </a>
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
                                <td class="px-6 py-3 border-b font-semibold">Tên Menu</td>
                                <td class="px-6 py-3 border-b">{{ $menu->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Link</td>
                                <td class="px-6 py-3 border-b">{{ $menu->link }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Vị trí</td>
                                <td class="px-6 py-3 border-b">{{ $menu->position }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Mã bảng (table_id)</td>
                                <td class="px-6 py-3 border-b">{{ $menu->table_id ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Loại</td>
                                <td class="px-6 py-3 border-b">{{ $menu->type }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">ID cha</td>
                                <td class="px-6 py-3 border-b">{{ $menu->parent_id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Sắp xếp</td>
                                <td class="px-6 py-3 border-b">{{ $menu->sort_order }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>
