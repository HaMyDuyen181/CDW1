<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Liên hệ
    </x-slot:title>
    <div class="p-6"> {{-- Loại bỏ absolute positioning và thêm padding cho container chính --}}
        <div class="p-6 w-full max-w-6xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa liên hệ</h1>
                <a href="{{ route('contact.index') }}" class="text-red-500 border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('contact.update', ['contact' => $contact->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> {{-- Thay đổi grid để responsive --}}
                        <div>
                            <div class="mb-4">
                                <label for="user_id" class="block text-sm font-medium text-gray-700">Người dùng</label>
                                <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ (old('user_id', $contact->user_id) == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $contact->name ?? '') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập tên" required>
                                @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $contact->email ?? '') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập email" required>
                                @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập số điện thoại">
                                @error('phone') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div>
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $contact->title ?? '') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập tiêu đề">
                                @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                                <textarea name="content" id="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập nội dung">{{ old('content', $contact->content ?? '') }}</textarea>
                                @error('content') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="1" {{ (old('status', $contact->status ?? '') == 1) ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ (old('status', $contact->status ?? '') == 0) ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                                @error('status') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end"> {{-- Căn chỉnh nút về bên phải --}}
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Cập nhật liên hệ</button>
                        <a href="{{ route('contact.index') }}" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>