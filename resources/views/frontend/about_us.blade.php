<x-layout-site>
    <x-slot:title>
        {{ $dulieu['title'] }}
          </x-slot:title>
      <div class="container mx-auto px-6 py-12">
        <!-- Header Section -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Giới Thiệu Về Chúng Tôi</h1>
            <p class="text-lg text-gray-600">Tìm hiểu về lịch sử, sứ mệnh và giá trị của chúng tôi</p>
        </header>

        <!-- About Us Section -->
        <section class="mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <img 
                        src="https://thegioiwhisky.com/wp-content/uploads/2019/02/lich-su-hinh-thanh-ruou-chivas-regal.jpg" 
                        alt="About Us" 
                        class="rounded-lg shadow-lg"
                    />
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Lịch Sử Hình Thành</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Chúng tôi được thành lập vào năm 2024 với mục tiêu mang đến những sản phẩm và dịch vụ chất lượng nhất cho khách hàng. Trải qua nhiều năm phát triển, chúng tôi tự hào là đơn vị dẫn đầu trong lĩnh vực của mình, với sự tin tưởng và ủng hộ từ hàng triệu khách hàng.
                    </p>
                </div>
            </div>
        </section>

        <!-- Mission and Values Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Sứ Mệnh và Giá Trị</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <!-- Mission -->
                <div class="p-6 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Sứ Mệnh</h3>
                    <p class="text-lg text-gray-600">
                        Mang đến sự hài lòng tối đa cho khách hàng thông qua các sản phẩm và dịch vụ tốt nhất.
                    </p>
                </div>
                <!-- Vision -->
                <div class="p-6 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Tầm Nhìn</h3>
                    <p class="text-lg text-gray-600">
                        Trở thành thương hiệu hàng đầu trong lĩnh vực của mình tại Việt Nam và khu vực.
                    </p>
                </div>
                <!-- Core Values -->
                <div class="p-6 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Giá Trị Cốt Lõi</h3>
                    <p class="text-lg text-gray-600">
                        Chất lượng, Uy tín, và Sáng tạo là ba giá trị cốt lõi của chúng tôi.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Liên Hệ Với Chúng Tôi</h2>
            <p class="text-lg text-gray-600 mb-8">
                Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, hãy liên hệ ngay với chúng tôi.
            </p>
            <a
                href="/lien-he"
                class="inline-block px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-lg hover:bg-blue-700 transition"
            >
                Liên Hệ Ngay
            </a>
        </section>
    </div>
    </x-layout-site>
