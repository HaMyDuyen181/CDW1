@vite('resources/css/app.css')

<x-layout-admin>
  <x-slot:title>
    Thêm Banner
  </x-slot:title>

  <div class="flex justify-center">
    <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
      <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold">Thêm banner</h1>
        <a href="{{ route('banner.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
            ← Về danh sách
        </a>
      </div>

      <div class="bg-white shadow-md rounded-md p-8">
        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-black mb-2">Tên Banner</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập tên Banner" required>
            @if ($errors->has('name'))
              <div class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</div>
            @endif
          </div>

          <div class="mb-6">
            <label for="link" class="block text-lg font-medium text-black mb-2">Liên kết Banner</label>
            <input type="text" name="link" id="link" value="{{ old('link') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập liên kết">
            @if ($errors->has('link'))
              <div class="text-red-500 text-sm mt-1">{{ $errors->first('link') }}</div>
            @endif
          </div>

          <div class="mb-6">
            <label for="image" class="block text-lg font-medium text-black mb-2">Hình ảnh Banner</label>
            <input type="file" name="image" id="image" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @if ($errors->has('image'))
              <div class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</div>
            @endif
          </div>

          <div class="mb-6">
            <label for="description" class="block text-lg font-medium text-black mb-2">Mô tả Banner</label>
            <textarea name="description" id="description" rows="4" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
              <div class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</div>
            @endif
          </div>

          <div class="mb-6">
            <label for="position" class="block text-lg font-medium text-black mb-2">Vị trí Banner</label>
            <select name="position" id="position" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
              <option value="1" {{ old('position') == 1 ? 'selected' : '' }}>Đầu trang</option>
              <option value="2" {{ old('position') == 2 ? 'selected' : '' }}>Giữa trang</option>
              <option value="3" {{ old('position') == 3 ? 'selected' : '' }}>Cuối trang</option>
            </select>
            @if ($errors->has('position'))
              <div class="text-red-500 text-sm mt-1">{{ $errors->first('position') }}</div>
            @endif
          </div>

          <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300">Thêm Banner</button>
            <a href="{{ route('banner.index') }}" class="ml-4 bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout-admin>
