@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Sản phẩm
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header border-b">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết sản phẩm</h1>
                <a href="{{ route('product.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>
        </section>

            <div class="card-body bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-red-200 text-gray-700 text-left font-medium">
                            <th class="px-6 py-3 border-b">Tên trường</th>
                            <th class="px-6 py-3 border-b">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Tên Sản phẩm</td>
                            <td class="px-6 py-3 border-b">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Slug</td>
                            <td class="px-6 py-3 border-b">{{ $product->slug }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Nội dung</td>
                            <td class="px-6 py-3 border-b">{!! $product->content !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Mô tả</td>
                            <td class="px-6 py-3 border-b">{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Giá mua</td>
                            <td class="px-6 py-3 border-b">{{ number_format($product->price_buy, 0, ',', '.') }} VND</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Giá bán</td>
                            <td class="px-6 py-3 border-b">{{ number_format($product->price_sale, 0, ',', '.') }} VND</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Số lượng</td>
                            <td class="px-6 py-3 border-b">{{ $product->qty }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Chi tiết</td>
                            <td class="px-6 py-3 border-b">{{ $product->detail }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Ảnh sản phẩm</td>
                            <td class="px-6 py-3 border-b">
                                <img src="{{ asset('images/products/' . $product->thumbnail) }}" alt="Thumbnail" class="w-32 h-32 object-cover rounded-lg shadow-sm">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Danh mục</td>
                            <td class="px-6 py-3 border-b">{{ $product->category->name ?? 'Không có' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b font-semibold">Thương hiệu</td>
                            <td class="px-6 py-3 border-b">{{ $product->brand->name ?? 'Không có' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout-admin>
