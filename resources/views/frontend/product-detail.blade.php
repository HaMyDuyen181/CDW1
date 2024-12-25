<x-layout-site>
  <x-slot:title>
    {{ $dulieu['title'] }}
  </x-slot:title>
  
  <!-- Product Info Section -->
  <section class="py-12">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
      <!-- Product Image -->
      <div class="w-full relative">
        <img
          src="https://bizweb.dktcdn.net/thumb/large/100/518/478/products/1-e23d4069-a3b9-4259-818a-f150236d839b.jpg?v=1723103737563"
          alt="Product Image"
          class="w-full h-96 object-cover rounded-lg shadow-lg"
        />
        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-lg text-sm font-semibold">
          Giảm 50%
        </div>
      </div>

      <!-- Product Info -->
      <div>
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">
          Thuốc Hoạt Huyết Trường Phúc giúp hoạt huyết, trị thiếu năng tuần hoàn (3 vỉ x 10 viên)
        </h2>
        <div class="flex items-center mb-4">
          <span class="text-xl font-bold text-blue-600 mr-4">Giá: 750,000 VND</span>
          <span class="line-through text-gray-400 text-lg">1,500,000 VND</span>
        </div>
        <div class="flex items-center mb-4">
          <div class="flex text-yellow-400">
            ★★★★☆
          </div>
          <span class="ml-2 text-gray-600">(120 đánh giá)</span>
        </div>
        <p class="text-gray-600 mb-4">
          Thành phần chính là cao đặc hỗn hợp các dược liệu đương quy, ích mẫu, ngưu tất, thục địa, xích thược, xuyên khung có công dụng điều trị các chứng huyết hư, ứ trệ...
        </p>
        <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
          Thêm vào giỏ hàng
        </button>
        <button class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300 ml-4">
          Mua ngay
        </button>
      </div>
    </div>
  </section>

  <!-- Product Detail Section -->
  <section class="py-12 bg-gray-100">
    <div class="container mx-auto">
      <h3 class="text-2xl font-semibold text-gray-800 mb-6">
        Chi Tiết Sản Phẩm
      </h3>
      <p class="text-gray-600">
        Thuốc Hoạt Huyết Trường Phúc được sản xuất từ các dược liệu quý giúp cải thiện tuần hoàn máu, giảm nguy cơ các bệnh lý tim mạch, giúp tăng cường sức khỏe cho người sử dụng. Sản phẩm hỗ trợ rất tốt trong việc điều trị các bệnh lý như thiếu máu, mệt mỏi, đau nhức cơ thể do tuần hoàn kém.
      </p>
    </div>
  </section>

  <!-- Products in the Same Category -->
  <section class="py-12">
    <div class="container mx-auto">
      <h3 class="text-2xl font-semibold text-gray-800 mb-6">
        Sản Phẩm Cùng Loại
      </h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Product 1 -->
        <div class="product-card bg-white p-4 rounded-lg shadow-lg relative">
          <img
            src="https://bizweb.dktcdn.net/thumb/large/100/518/478/products/1-b84ca9f2-ce22-4a66-95df-b53ce7bd9164.jpg?v=1723104578447"
            alt="Product 1"
            class="w-full h-48 object-cover mb-4"
          />
          <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-lg text-sm font-semibold">
            Giảm 30%
          </div>
          <h3 class="text-xl font-semibold mb-2">
            Thuốc Boganic Forte Traphaco bổ gan, hỗ trợ điều trị suy giảm chức năng gan
          </h3>
          <div class="flex items-center">
            <span class="text-xl font-bold text-blue-600">600,000 VND</span>
          </div>
          <div class="flex items-center mt-2 text-yellow-400">
            ★★★☆☆
          </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card bg-white p-4 rounded-lg shadow-lg">
          <img
            src="https://nhathuocviet.vn/data/items/5626/thuoc-thyzol-plus-ho-tro-tang-cuong-mien-dich.jpg"
            alt="Product 2"
            class="w-full h-48 object-cover mb-4"
          />
          <h3 class="text-xl font-semibold mb-2">
            Thuốc Tăng Cường Miễn Dịch HealthPlus hỗ trợ bảo vệ sức khỏe
          </h3>
          <div class="flex items-center">
            <span class="text-xl font-bold text-blue-600">500,000 VND</span>
          </div>
          <div class="flex items-center mt-2 text-yellow-400">
            ★★★★☆
          </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card bg-white p-4 rounded-lg shadow-lg">
          <img
            src="https://bizweb.dktcdn.net/100/460/272/products/screenshot20220921at201848than.png?v=1664534577653"
            alt="Product 3"
            class="w-full h-48 object-cover mb-4"
          />
          <h3 class="text-xl font-semibold mb-2">
            Thuốc Hỗ Trợ Tiêu Hóa Gastrohealth điều trị rối loạn tiêu hóa
          </h3>
          <div class="flex items-center">
            <span class="text-xl font-bold text-blue-600">350,000 VND</span>
          </div>
          <div class="flex items-center mt-2 text-yellow-400">
            ★★★★☆
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout-site>
