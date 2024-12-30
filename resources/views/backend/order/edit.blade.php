@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Đơn hàng
    </x-slot:title>

    <div class="p-6 flex justify-center"> 
        <div class="p-6 w-full max-w-4xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa đơn hàng</h1>
                <a href="{{ route('order.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4"> 
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700">ID Người dùng</label>
                            <input type="number" name="user_id" id="user_id"
                                value="{{ old('user_id', $order->user_id ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập ID người dùng" required>
                            @if ($errors->has('user_id'))
                                <div class="text-red-500 text-sm">{{ $errors->first('user_id') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $order->name ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập tên khách hàng" required>
                            @if ($errors->has('name'))
                                <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', $order->email ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập email khách hàng">
                            @if ($errors->has('email'))
                                <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                            <input type="text" name="phone" id="phone"
                                value="{{ old('phone', $order->phone ?? '') }}"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập số điện thoại">
                            @if ($errors->has('phone'))
                                <div class="text-red-500 text-sm">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                            <textarea name="address" id="address" rows="4"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nhập địa chỉ khách hàng">{{ old('address', $order->address ?? '') }}</textarea>
                            @if ($errors->has('address'))
                                <div class="text-red-500 text-sm">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ (old('status', $order->status ?? '') == 1) ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ (old('status', $order->status ?? '') == 0) ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="mt-6 flex justify-start"> 
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật đơn hàng</button>
                            <a href="{{ route('order.index') }}"
                                class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>