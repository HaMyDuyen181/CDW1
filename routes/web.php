<?php

use Illuminate\Support\Facades\Route;
//Controller trang người dùng
use App\Http\Controllers\frontend\HomeController as TrangchuController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\AboutusController as GioithieuController;
use App\Http\Controllers\frontend\CartController as GiohangController;

//Controller trang quản trị
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\OrderdetailController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Route trang người dùng
use App\Http\Controllers\HomeController;

Route::get('/', [TrangchuController::class, 'index'])->name('site.home');
Route::get('/san-pham', [SanphamController::class, 'index'])->name('site.product');
Route::get('/san-pham/{slug}', [SanphamController::class, 'detail'])->name('site.product.detail');
Route::get('/bai-viet/{slug}', [PostController:: class, 'detail'])->name('site.post.detail');
Route::get('/danh-muc/{slug}', [SanphamController::class, 'showCategory'])->name('site.product.category');
Route::get('/lien-he', [LienheController::class, 'index'])->name('site.contact');
Route::get('/gioi-thieu', [GioithieuController::class, 'index'])->name('frontend.about_us');
Route::get('/gio-hang', [GiohangController::class, 'index'])->name('frontend.cart');

//Route trang quản trị

Route::prefix('admin')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard");
   // Product
Route::prefix('product')->group(function () {
    Route::get("/", [ProductController::class, "index"])->name('product.index');
    Route::get("trash", [ProductController::class, "trash"])->name('product.trash');
    Route::get("{product}/create", [ProductController::class, "create"])->name('product.create');
    Route::post("{product}/store", [ProductController::class, "store"])->name('product.store');
    Route::get("{product}/edit", [ProductController::class, "edit"])->name('product.edit');
    Route::get("{product}/show", [ProductController::class, "show"])->name('product.show');
    Route::put("{product}/update", [ProductController::class, "update"])->name('product.update');
    Route::get("{product}/delete", [ProductController::class, "delete"])->name('product.delete');
    Route::get("{product}/restore", [ProductController::class, "restore"])->name('product.restore');
    Route::delete("{product}/destroy", [ProductController::class, "destroy"])->name('product.destroy');
    Route::get('{product}/status', [ProductController::class, 'status'])->name('product.status');
});

    Route::resource('product', ProductController::class);

   // Category
Route::prefix('category')->group(function () {
    Route::get("/", [CategoryController::class, "index"])->name('category.index');
    Route::get("trash", [CategoryController::class, "trash"])->name('category.trash');
    Route::get("{category}/create", [CategoryController::class, "create"])->name('category.create');
    Route::post("{category}/store", [CategoryController::class, "store"])->name('category.store');
    Route::get("{category}/edit", [CategoryController::class, "edit"])->name('category.edit');
    Route::get("{category}/show", [CategoryController::class, "show"])->name('category.show');
    Route::put("{category}/update", [CategoryController::class, "update"])->name('category.update');
    Route::get("{category}/delete", [CategoryController::class, "delete"])->name('category.delete');
    Route::get("{category}/restore", [CategoryController::class, "restore"])->name('category.restore');
    Route::delete("{category}/destroy", [CategoryController::class, "destroy"])->name('category.destroy');
    Route::get("{category}/status", [CategoryController::class, "status"])->name('category.status');
});

    Route::resource('category', CategoryController::class);

   // Brand
    Route::prefix('brand')->group(function () {
        Route::get('{brand}/create', [BrandController::class, 'create'])->name('brand.create'); // Form tạo thương hiệu
        Route::post('{brand}/store', [BrandController::class, 'store'])->name('brand.store'); // Lưu thương hiệu mới
        Route::get('{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit'); // Form chỉnh sửa thương hiệu
        Route::put('{brand}/update', [BrandController::class, 'update'])->name('brand.update'); // Cập nhật thương hiệu
        Route::get('{brand}/show', [BrandController::class, 'show'])->name('brand.show'); // Xem chi tiết thương hiệu
        Route::delete('{brand}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy'); // Xóa hoàn toàn thương hiệu
        Route::get('trash', [BrandController::class, 'trash'])->name('brand.trash'); // Hiển thị danh sách thương hiệu bị xóa
        Route::get('{brand}/delete', [BrandController::class, 'delete'])->name('brand.delete'); // Xóa mềm thương hiệu
        Route::get('{brand}/restore', [BrandController::class, 'restore'])->name('brand.restore'); // Khôi phục thương hiệu đã xóa
        Route::get('{brand}/status', [BrandController::class, 'status'])->name('brand.status'); // Thay đổi trạng thái thương hiệu
    });
    Route::resource('brand', BrandController::class);

    // Order
    Route::prefix('order')->group(function () {
        Route::get('{order}/create', [OrderController::class, 'create'])->name('order.create'); // Form tạo đơn hàng mới
        Route::post('{order}/store', [OrderController::class, 'store'])->name('order.store'); // Lưu đơn hàng mới
        Route::get('{order}/edit', [OrderController::class, 'edit'])->name('order.edit'); // Form chỉnh sửa đơn hàng
        Route::put('{order}/update', [OrderController::class, 'update'])->name('order.update'); // Cập nhật đơn hàng
        Route::get('{order}/show', [OrderController::class, 'show'])->name('order.show'); // Xem chi tiết đơn hàng
        Route::delete('{order}/destroy', [OrderController::class, 'destroy'])->name('order.destroy'); // Xóa hoàn toàn đơn hàng
        Route::get('trash', [OrderController::class, 'trash'])->name('order.trash'); // Hiển thị danh sách đơn hàng đã bị xóa mềm
        Route::get('{order}/delete', [OrderController::class, 'delete'])->name('order.delete'); // Xóa mềm đơn hàng
        Route::get('{order}/restore', [OrderController::class, 'restore'])->name('order.restore'); // Khôi phục đơn hàng đã xóa mềm
        Route::get('{order}/status', [OrderController::class, 'status'])->name('order.status'); // Thay đổi trạng thái đơn hàng
    });
    Route::resource('order', OrderController::class);

    // OrderDetail
    Route::prefix('orderdetail')->group(function () {
        Route::get('{orderdetail}/create', [OrderdetailController::class, 'create'])->name('orderdetail.create'); // Form tạo chi tiết đơn hàng mới
        Route::post('{orderdetail}/store', [OrderdetailController::class, 'store'])->name('orderdetail.store'); // Lưu chi tiết đơn hàng mới
        Route::get('{orderdetail}/edit', [OrderdetailController::class, 'edit'])->name('orderdetail.edit'); // Form chỉnh sửa chi tiết đơn hàng
        Route::put('{orderdetail}/update', [OrderdetailController::class, 'update'])->name('orderdetail.update'); // Cập nhật chi tiết đơn hàng
        Route::get('{orderdetail}/show', [OrderdetailController::class, 'show'])->name('orderdetail.show'); // Xem chi tiết của chi tiết đơn hàng
        Route::delete('{orderdetail}/destroy', [OrderdetailController::class, 'destroy'])->name('orderdetail.destroy'); // Xóa hoàn toàn chi tiết đơn hàng
        Route::get('trash', [OrderdetailController::class, 'trash'])->name('orderdetail.trash'); // Hiển thị danh sách chi tiết đơn hàng đã xóa mềm
        Route::get('{orderdetail}/delete', [OrderdetailController::class, 'delete'])->name('orderdetail.delete'); // Xóa mềm chi tiết đơn hàng
        Route::get('{orderdetail}/restore', [OrderdetailController::class, 'restore'])->name('orderdetail.restore'); // Khôi phục chi tiết đơn hàng đã xóa mềm
        Route::get('{orderdetail}/status', [OrderdetailController::class, 'status'])->name('orderdetail.status'); // Thay đổi trạng thái của chi tiết đơn hàng
    });
    Route::resource('orderdetail', OrderdetailController::class);

    // Post
    Route::prefix('post')->group(function () {
        Route::get('trash', [PostController::class, 'trash'])->name('post.trash'); // Hiển thị bài viết đã bị xóa mềm
        Route::get('{post}/show', [PostController::class, 'show'])->name('post.show'); // Xem chi tiết bài viết
        Route::get('{post}/create', [PostController::class, 'create'])->name('post.create'); // Form tạo bài viết mới
        Route::post('{post}/store', [PostController::class, 'store'])->name('post.store'); // Lưu bài viết mới
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('post.edit'); // Form chỉnh sửa bài viết
        Route::put('{post}/update', [PostController::class, 'update'])->name('post.update'); // Cập nhật bài viết
        Route::get('{post}/delete', [PostController::class, 'delete'])->name('post.delete'); // Xóa mềm bài viết
        Route::get('{post}/restore', [PostController::class, 'restore'])->name('post.restore'); // Khôi phục bài viết đã xóa mềm
        Route::delete('{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy'); // Xóa hoàn toàn bài viết
        Route::get('{post}/status', [PostController::class, 'status'])->name('post.status'); // Thay đổi trạng thái bài viết
    });
    Route::resource('post', PostController::class);

    // Topic
    Route::prefix('topic')->group(function () {
        Route::get('trash', [TopicController::class, 'trash'])->name('topic.trash'); // Hiển thị chủ đề đã bị xóa mềm
        Route::get('{topic}/show', [TopicController::class, 'show'])->name('topic.show'); // Xem chi tiết chủ đề
        Route::get('{topic}/create', [TopicController::class, 'create'])->name('topic.create'); // Form tạo chủ đề mới
        Route::post('{topic}/store', [TopicController::class, 'store'])->name('topic.store'); // Lưu chủ đề mới
        Route::get('{topic}/edit', [TopicController::class, 'edit'])->name('topic.edit'); // Form chỉnh sửa chủ đề
        Route::put('{topic}/update', [TopicController::class, 'update'])->name('topic.update'); // Cập nhật chủ đề
        Route::get('{topic}/delete', [TopicController::class, 'delete'])->name('topic.delete'); // Xóa mềm chủ đề
        Route::get('{topic}/restore', [TopicController::class, 'restore'])->name('topic.restore'); // Khôi phục chủ đề đã xóa mềm
        Route::delete('{topic}/destroy', [TopicController::class, 'destroy'])->name('topic.destroy'); // Xóa hoàn toàn chủ đề
        Route::get('{topic}/status', [TopicController::class, 'status'])->name('topic.status'); // Thay đổi trạng thái chủ đề
    });
    Route::resource('topic', TopicController::class);

   // Contact
    Route::prefix('contact')->group(function () {
        Route::get('trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::get('{contact}/show', [ContactController::class, 'show'])->name('contact.show');
        Route::get('{contact}/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('{contact}/store', [ContactController::class, 'store'])->name('contact.store');
        Route::get('{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('{contact}/update', [ContactController::class, 'update'])->name('contact.update');
        Route::get('{contact}/delete', [ContactController::class, 'delete'])->name('contact.delete');
        Route::get('{contact}/restore', [ContactController::class, 'restore'])->name('contact.restore');
        Route::delete('{contact}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
        Route::get('{contact}/status', [ContactController::class, 'status'])->name('contact.status');
    });
    Route::resource('contact', ContactController::class);

    // Menu
    Route::prefix('menu')->group(function () {
        Route::get('trash', [MenuController::class, 'trash'])->name('menu.trash');
        Route::get('{menu}/show', [MenuController::class, 'show'])->name('menu.show');
        Route::get('{menu}/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('{menu}/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('{menu}/update', [MenuController::class, 'update'])->name('menu.update');
        Route::get('{menu}/delete', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('{menu}/restore', [MenuController::class, 'restore'])->name('menu.restore');
        Route::delete('{menu}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
        Route::get('{menu}/status', [MenuController::class, 'status'])->name('menu.status');
    });
    Route::resource('menu', MenuController::class);

    // Banner
    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('trash', [BannerController::class, 'trash'])->name('banner.trash');
        Route::get('{banner}/show', [BannerController::class, 'show'])->name('banner.show');
        Route::get('{banner}/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('{banner}/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('{banner}/update', [BannerController::class, 'update'])->name('banner.update');
        Route::get('{banner}/delete', [BannerController::class, 'delete'])->name('banner.delete');
        Route::get('{banner}/restore', [BannerController::class, 'restore'])->name('banner.restore');
        Route::delete('{banner}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
        Route::get('{banner}/status', [BannerController::class, 'status'])->name('banner.status');
    });
    Route::resource('banner', BannerController::class);

    // User
    Route::prefix('user')->group(function () {
        Route::get('trash', [UserController::class, 'trash'])->name('user.trash');
        Route::get('{user}/show', [UserController::class, 'show'])->name('user.show');
        Route::get('{user}/create', [UserController::class, 'create'])->name('user.create');
        Route::post('{user}/store', [UserController::class, 'store'])->name('user.store');
        Route::get('{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('{user}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('{user}/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('{user}/restore', [UserController::class, 'restore'])->name('user.restore');
        Route::delete('{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('{user}/status', [UserController::class, 'status'])->name('user.status');
    });
    Route::resource('user', UserController::class);

});