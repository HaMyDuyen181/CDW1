@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Đơn hàng
    </x-slot:title>

    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Đơn hàng</h1>
                    </div>
                 
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card shadow-lg">
                <div class="card-header flex justify-end space-x-2">
                
                    <a href="{{ route('order.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
                <div class="card-body">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="text-left text-gray-700">
                                <th class="px-6 py-3 border-b">Tên trường</th>
                                <th class="px-6 py-3 border-b">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">ID Đơn hàng</td>
                                <td class="px-6 py-3 border-b">{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">ID Người dùng</td>
                                <td class="px-6 py-3 border-b">{{ $order->user_id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Tên khách hàng</td>
                                <td class="px-6 py-3 border-b">{{ $order->customer_name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Số điện thoại</td>
                                <td class="px-6 py-3 border-b">{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Email</td>
                                <td class="px-6 py-3 border-b">{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Địa chỉ giao hàng</td>
                                <td class="px-6 py-3 border-b">{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Trạng thái</td>
                                <td class="px-6 py-3 border-b">{{ $order->status }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Tổng tiền</td>
                                <td class="px-6 py-3 border-b">{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>