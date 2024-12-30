@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Đơn hàng
    </x-slot:title>

    <div class="p-6"> {{-- Consistent padding --}}
        <div class="max-w-4xl mx-auto"> {{-- Centered content with max width --}}
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết đơn hàng</h1>
                <a href="{{ route('order.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <table class="min-w-full table-auto border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-red-200 text-left"> {{-- Header row background --}}
                            <th class="px-6 py-3 font-medium text-black text-sm">Tên trường</th>
                            <th class="px-6 py-3 font-medium text-black text-sm">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">ID Đơn hàng</td> {{-- Added text-sm --}}
                            <td class="px-6 py-4 border-b text-sm">{{ $order->id }}</td> {{-- Added text-sm --}}
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">ID Người dùng</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->user_id }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Tên khách hàng</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Số điện thoại</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Email</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Địa chỉ giao hàng</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Trạng thái</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-black text-sm">Tổng tiền</td>
                            <td class="px-6 py-4 border-b text-sm">{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>