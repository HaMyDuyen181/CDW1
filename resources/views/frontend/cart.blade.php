<x-layout-site>
    <x-slot:title>
        Giỏ hàng
    </x-slot:title>

    @vite('resources/css/app.css')
    <div class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <!-- Hiển thị thông báo lỗi hoặc thành công -->
        @if(session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-4 rounded-md mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success bg-green-500 text-white p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-center text-4xl font-semibold mb-6">Giỏ hàng</h2>

        <form action="{{ route('site.updatecart') }}" method="POST">
            @csrf
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="text-center py-3 px-4 border-b bg-gray-100">Hình ảnh</th>
                        <th class="text-center py-3 px-4 border-b bg-gray-100">Tên sản phẩm</th>
                        <th class="text-center py-3 px-4 border-b bg-gray-100">Đơn giá</th>
                        <th class="text-center py-3 px-4 border-b bg-gray-100">Số lượng</th>
                        <th class="text-center py-3 px-4 border-b bg-gray-100">Thành tiền</th>
                        <th class="text-center py-3 px-4 border-b bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalMoney = 0; @endphp
                    @foreach ($cart as $id => $row_cart)
                    <tr>
                        <td class="text-center py-4 border-b">
                            <a href="#" class="text-dark">
                                <img class="w-24 h-24 object-cover mx-auto" src="{{ asset('images/product/' . $row_cart['thumbnail']) }}" alt="{{ $row_cart['name'] }}">
                            </a>
                        </td>
                        <td class="text-center py-4 border-b">{{ $row_cart['name'] }}</td>
                        <td class="text-center py-4 border-b">{{ number_format($row_cart['price'] * 1000) }}₫</td>
                        <td class="text-center py-4 border-b">
                            <input class="text-center w-16 py-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="qty[{{ $id }}]" value="{{ $row_cart['qty'] }}" min="1">
                        </td>
                        <td class="text-center py-4 border-b">{{ number_format($row_cart['price'] * $row_cart['qty'] * 1000) }}₫</td>
                        <td class="text-center py-4 border-b">
                            <a href="{{ route('site.delcart', ['id' => $id]) }}" class="text-red-500 hover:text-red-700">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @php $totalMoney += $row_cart['price'] * $row_cart['qty']; @endphp
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center mt-6">
                <div class="flex space-x-4">
                    <button class="bg-green-500 text-white py-2 px-6 rounded-md hover:bg-green-600 transition duration-200" type="submit" formaction="{{ route('site.updatecart') }}">Cập nhật</button>
                    <a href="{{ route('site.delcart') }}" class="bg-red-500 text-white py-2 px-6 rounded-md hover:bg-red-600 transition duration-200">Hủy giỏ hàng</a>
                </div>

                <div class="font-semibold text-2xl text-right">
                    <strong>Tổng tiền: {{ number_format($totalMoney * 1000) }}₫</strong>
                </div>
            </div>
        </form>

        <div class="mt-6 text-center">
            <form action="{{ route('site.procced') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-md hover:bg-green-600 transition duration-200">
                    Tiến hành thanh toán
                </button>
            </form>
        </div>
    </div>
</x-layout-site>
