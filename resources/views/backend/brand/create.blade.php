<x-layout-admin>
  <x-slot:title>
      Thêm Thương Hiệu
  </x-slot:title>

  <div class="flex justify-center">
    <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
      <div class="mb-6 flex justify-between items-center">
              <h1 class="text-3xl font-bold">Thêm thương hiệu</h1>
              <a href="{{ route('brand.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                  ← Về danh sách
              </a>
          </div>

          <div class="bg-white shadow-md rounded-md p-8"> <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="mb-6">
                      <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Tên thương hiệu</label>
                      <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập tên thương hiệu" required>
                      @if ($errors->has('name'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</div>
                      @endif
                  </div>

                  <div class="mb-6">
                      <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
                      <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập slug" required>
                      @if ($errors->has('slug'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('slug') }}</div>
                      @endif
                  </div>

                  <div class="mb-6">
                      <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Hình ảnh</label>
                      <input type="file" name="image" id="image" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                      @if ($errors->has('image'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</div>
                      @endif
                  </div>

                  <div class="mb-6">
                      <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Mô tả</label>
                      <textarea name="description" id="description" rows="4" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                      @if ($errors->has('description'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</div>
                      @endif
                  </div>

                  <div class="mb-6">
                      <label for="sort_order" class="block text-lg font-medium text-gray-700 mb-2">Thứ tự</label>
                      <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập thứ tự">
                      @if ($errors->has('sort_order'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('sort_order') }}</div>
                      @endif
                  </div>

                  <div class="mb-6">
                      <label for="status" class="block text-lg font-medium text-gray-700 mb-2">Trạng thái</label>
                      <select name="status" id="status" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                          <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                          <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không hoạt động</option>
                      </select>
                      @if ($errors->has('status'))
                          <div class="text-red-500 text-sm mt-1">{{ $errors->first('status') }}</div>
                      @endif
                  </div>

                  <div class="mt-8 flex justify-end">
                      <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300">Thêm thương hiệu</button>
                      <a href="{{ route('brand.index') }}" class="ml-4 bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</x-layout-admin>