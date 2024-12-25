<div>
  <nav class="ml-10 space-x-6 flex items-center">
      <a
          href="/"
          class="text-gray-700 hover:text-blue-500 transition duration-300"
      >
          Trang chủ
      </a>
      <a
          href="/san-pham"
          class="text-gray-700 hover:text-blue-500 transition duration-300"
      >
          Sản phẩm
      </a>

      <!-- Danh mục với dropdown cấp 1 -->
      <div class="relative inline-block">
          <a
              href="#"
              class="text-gray-700 hover:text-blue-500 transition duration-300"
              onclick="toggleDropdown(event)"
          >
              Danh mục
          </a>
          <!-- Dropdown Menu -->
          <div id="dropdown-menu" class="absolute left-0 hidden mt-2 space-y-2 bg-white shadow-lg rounded-lg z-10 w-48">
              <a
                  href="/danh-muc/thuc-pham-chuc-nang"
                  class="block px-4 py-2 text-gray-700 hover:bg-blue-100"
              >
                  Thực phẩm chức năng
              </a>
              <a
                  href="/danh-muc/cham-soc-ca-nhan"
                  class="block px-4 py-2 text-gray-700 hover:bg-blue-100"
              >
                  Chăm sóc cá nhân
              </a>
              <a
                  href="/danh-muc/thuoc"
                  class="block px-4 py-2 text-gray-700 hover:bg-blue-100"
              >
                  Thuốc
              </a>
              <a
                  href="/danh-muc/duoc-my-pham"
                  class="block px-4 py-2 text-gray-700 hover:bg-blue-100"
              >
                  Dược mỹ phẩm
              </a>
          </div>
      </div>

      <a
          href="/gioi-thieu"
          class="text-gray-700 hover:text-blue-500 transition duration-300"
      >
          Giới thiệu
      </a>
      <a
          href="/lien-he"
          class="text-gray-700 hover:text-blue-500 transition duration-300"
      >
          Liên hệ
      </a>
  </nav>
</div>

<script>
  // Hàm toggle dropdown khi click vào "Danh mục"
  function toggleDropdown(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
    const dropdown = document.getElementById("dropdown-menu");

    // Toggle hiển thị dropdown
    dropdown.classList.toggle("hidden");
  }
</script>
