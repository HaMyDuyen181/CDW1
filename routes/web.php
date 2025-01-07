<?php

use App\Http\Controllers\backend\AuthController;
use Illuminate\Support\Facades\Route;
//Controller trang người dùng
use App\Http\Controllers\frontend\HomeController as TrangchuController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\AboutusController as GioithieuController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\PostController as BaivietController;
use App\Http\Controllers\frontend\UserController as ThanhVienController;

//Controller trang quản trị
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Middleware\LoginAdmin;
use App\Http\Middleware\LoginCustomer;

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
Route::get('/chi-tiet-san-pham/{slug}', [SanphamController::class, 'product_detail'])->name('site.product.detail');
Route::get("chi-tiet-bai-viet/{slug}", [BaivietController::class, "post_detail"])->name('site.post.detail');

//cart
Route::get('/addcart/{id}', [CartController::class, 'addcart'])->name('site.addcart');
Route::post('/updatecart', [CartController::class, 'updatecart'])->name('site.updatecart');
Route::get('/delcart/{id?}', [CartController::class, 'delcart'])->name('site.delcart');
Route::get('/gio-hang', [CartController::class, 'index'])->name('site.cart');
Route::post('/thanh-toan', [CartController::class, 'checkout'])->name('site.checkout');
Route::get('/cam-on', [CartController::class, 'thanks'])->name('site.thanks');
//

// Route trang người dùng (Yêu cầu đăng nhập)
Route::middleware(['login-customer'])->group(function () {
    Route::get('/thong-tin', [ThanhVienController::class, 'profile'])->name('site.profile'); // Trang thông tin người dùng
    Route::get('/dang-xuat', [ThanhVienController::class, 'logout'])->name('site.logout'); // Đăng xuất
});

// Route đăng nhập và đăng ký
Route::get('/dang-nhap', [ThanhVienController::class, 'login'])->name('site.login');
Route::post('/dang-nhap', [ThanhVienController::class, 'dologin'])->name('site.dologin');
Route::get('/dang-ky', [ThanhVienController::class, 'register'])->name('site.register');
Route::post('/dang-ky', [ThanhVienController::class, 'doregister'])->name('site.doregister');

//đăng nhập trang quan trị
Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'dologin'])->name('admin.dologin');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ->middleware('login-admin')
Route::prefix('admin')->middleware('login-admin')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard.index");
    Route::prefix('product')->group(function () {
        Route::get('trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::delete('{product}/delete', [ProductController::class, 'delete'])->name('product.delete'); //xoa vao thung rac
        Route::delete('{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('{product}/restore', [ProductController::class, 'restore'])->name('product.restore');
        Route::get("{product}/status", [ProductController::class, "status"])->name('product.status');
        Route::get("{product}/edit", [ProductController::class, "edit"])->name('product.edit'); // Route tĩnh trước
        Route::get("{product}/show", [ProductController::class, "show"])->name('product.show'); // Route tham số sau
        Route::get("create", [ProductController::class, "create"])->name('product.create');
    });
    Route::resource('product', ProductController::class);
    ///

    Route::prefix('category')->group(function () {
        Route::get('trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::delete('{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::delete('{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('{category}/restore', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get("{category}/status", [CategoryController::class, "status"])->name('category.status');
    });
    Route::resource('category', CategoryController::class);
    ///

    Route::prefix('brand')->group(function () {
        Route::get('trash', [BrandController::class, 'trash'])->name('brand.trash');
        Route::delete('{brand}/delete', [BrandController::class, 'delete'])->name('brand.delete');
        Route::delete('{brand}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
        Route::post('{brand}/restore', [BrandController::class, 'restore'])->name('brand.restore');
        Route::get("{brand}/status", [BrandController::class, "status"])->name('brand.status');
        Route::get("{brand}/edit", [BrandController::class, "edit"])->name('brand.edit'); // Route tĩnh trước
        Route::get("{brand}/show", [BrandController::class, "show"])->name('brand.show'); // Route tham số sau
    });
    Route::resource('brand', BrandController::class);
    ///
    Route::prefix('post')->group(function () {
        Route::get('trash', [PostController::class, 'trash'])->name('post.trash');
        Route::delete('{post}/delete', [PostController::class, 'delete'])->name('post.delete');
        Route::delete('{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
        Route::post('{post}/restore', [PostController::class, 'restore'])->name('post.restore');
        Route::get("{post}/status", [PostController::class, "status"])->name('post.status');
    });
    Route::resource('post', PostController::class);
    ///
    Route::prefix('topic')->group(function () {
        Route::get('trash', [TopicController::class, 'trash'])->name('topic.trash');
        Route::delete('{topic}/delete', [TopicController::class, 'delete'])->name('topic.delete');
        Route::delete('{topic}/destroy', [TopicController::class, 'destroy'])->name('topic.destroy');
        Route::post('{topic}/restore', [TopicController::class, 'restore'])->name('topic.restore');
        Route::get("{topic}/status", [TopicController::class, "status"])->name('topic.status');
    });
    Route::resource('topic', TopicController::class);

    ///
    Route::prefix('banner')->group(function () {
        Route::get('trash', [BannerController::class, 'trash'])->name('banner.trash');
        Route::delete('{banner}/delete', [BannerController::class, 'delete'])->name('banner.delete');
        Route::delete('{banner}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
        Route::post('{banner}/restore', [BannerController::class, 'restore'])->name('banner.restore');
        Route::get("{banner}/status", [BannerController::class, "status"])->name('banner.status');
        Route::get("{id}/edit", [BannerController::class, "edit"])->name('banner.edit'); // Route tĩnh trước

    });
    Route::resource('banner', BannerController::class);

    ///
    Route::prefix('menu')->group(function () {
        Route::get('trash', [MenuController::class, 'trash'])->name('menu.trash');
        Route::delete('{menu}/delete', [MenuController::class, 'delete'])->name('menu.delete');
        Route::delete('{menu}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');

        Route::post('{menu}/restore', [MenuController::class, 'restore'])->name('menu.restore');
        Route::get("{menu}/status", [MenuController::class, "status"])->name('menu.status');
    });
    Route::resource('menu', MenuController::class);

    ///
    Route::prefix('order')->group(function () {
        Route::get('trash', [OrderController::class, 'trash'])->name('order.trash');
        Route::delete('{order}/delete', [OrderController::class, 'delete'])->name('order.delete');
        Route::delete('{order}/destroy', [OrderController::class, 'destroy'])->name('order.destroy');

        Route::post('{order}/restore', [OrderController::class, 'restore'])->name('order.restore');
        Route::get("{order}/status", [OrderController::class, "status"])->name('order.status');
    });
    Route::resource('order', OrderController::class);

    ///
    Route::prefix('user')->group(function () {
        Route::get('trash', [UserController::class, 'trash'])->name('user.trash');
        Route::delete('{user}/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::delete('{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

        Route::post('{user}/restore', [UserController::class, 'restore'])->name('user.restore');
        Route::get("{user}/status", [UserController::class, "status"])->name('user.status');
    });
    Route::resource('user', UserController::class);
    ///
    Route::prefix('contact')->group(function () {
        Route::get('trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::delete('{contact}/delete', [ContactController::class, 'delete'])->name('contact.delete');
        Route::delete('{contact}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');

        Route::post('{contact}/restore', [ContactController::class, 'restore'])->name('contact.restore');
        Route::get("{contact}/status", [ContactController::class, "status"])->name('contact.status');
    });
    Route::resource('contact', ContactController::class);
});