<x-layout-site>
    <x-slot:title>
        Giỏ hàng
      </x-slot:title>
      <x-slot:header>
        
      </x-slot:header>
      <div class="container mx-auto px-6 py-10">
        <div class="bg-white rounded-lg shadow-lg p-6">
          <h2 class="text-xl font-bold text-gray-800 mb-6">Sản phẩm trong giỏ hàng</h2>
          
          <!-- Cart Items -->
          <form action="/cap-nhat-gio-hang" method="POST" class="space-y-6">
            <!-- Single Product -->
            <div class="flex items-center justify-between border-b pb-4">
              <div class="flex items-center space-x-4">
                <img 
                  src="https://via.placeholder.com/80" 
                  alt="Product Image" 
                  class="w-20 h-20 object-cover rounded"
                />
                <div>
                  <h3 class="text-lg font-bold text-gray-800">Tên sản phẩm</h3>
                  <p class="text-sm text-gray-500">Giá: 200,000 VND</p>
                </div>
              </div>
              <div class="flex items-center space-x-4">
                <!-- Quantity -->
                <div class="flex items-center border border-gray-300 rounded-lg">
                  <button 
                    type="submit" 
                    name="action" 
                    value="decrease-1" 
                    class="px-3 py-1 text-gray-700 hover:bg-gray-200"
                  >
                    -
                  </button>
                  <input 
                    type="text" 
                    name="quantity-1" 
                    value="1" 
                    class="w-12 text-center border-l border-r border-gray-300"
                    readonly
                  />
                  <button 
                    type="submit" 
                    name="action" 
                    value="increase-1" 
                    class="px-3 py-1 text-gray-700 hover:bg-gray-200"
                  >
                    +
                  </button>
                </div>
                <!-- Remove Product -->
                <button 
                  type="submit" 
                  name="action" 
                  value="remove-1" 
                  class="text-red-500 hover:underline"
                >
                  Xóa
                </button>
              </div>
            </div>
            <!-- End Single Product -->
    
            <!-- Total Section -->
            <div class="flex justify-between items-center mt-6">
              <h3 class="text-lg font-bold text-gray-800">Tổng tiền:</h3>
              <p class="text-xl font-bold text-red-600">200,000 VND</p>
            </div>
    
            <!-- Checkout Button -->
            <div class="text-right mt-6">
              <button 
                type="submit" 
                formaction="/thanh-toan" 
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600"
              >
                Thanh Toán
              </button>
            </div>
          </form>
        </div>
      </div>
    </x-layout-site>
