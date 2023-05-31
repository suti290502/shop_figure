<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::prefix('cart')->group(function () {
    // Xem giỏ hàng
    Route::get('/{cart_id}', [CartController::class, 'show'])->name('cart.show');
    // Thêm sản phẩm vào giỏ hàng
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    // Cập nhật số lượng sản phẩm trong giỏ hàng
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');  
    // Xoá sản phẩm khỏi giỏ hàng
    Route::post('/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


Route::prefix('categories')->group(function () {
    // Xem danh sách danh mục
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    // Xem chi tiết danh mục
    Route::get('/{category_id}', [CategoryController::class, 'show'])->name('category.show');
    // Thêm danh mục
    Route::post('/', [CategoryController::class, 'create'])->name('category.create');
    // Chỉnh sửa danh mục
    Route::put('/{category_id}', [CategoryController::class, 'update'])->name('category.update');
    // Xoá danh mục
    Route::delete('/{category_id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});



Route::prefix('feedbacks')->group(function () {
    // Xem danh sách phản hồi
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');

    // Xem chi tiết phản hồi
    Route::get('/{feedback_id}', [FeedbackController::class, 'show'])->name('feedback.show');
    // Thêm phản hồi
    Route::post('/', [FeedbackController::class, 'create'])->name('feedback.create');
    // Chỉnh sửa phản hồi
    Route::put('/{feedback_id}', [FeedbackController::class, 'update'])->name('feedback.update');
    // Xoá phản hồi
    Route::delete('/{feedback_id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});



Route::prefix('figures')->group(function () {
    // Xem danh sách sản phẩm
    Route::get('/', [FigureController::class, 'index'])->name('figure.index');

    // Xem chi tiết sản phẩm
    Route::get('/{figure_id}', [FigureController::class, 'show'])->name('figure.show');
    // Hiển thị form thêm sản phẩm
    Route::get('/create', [FigureController::class, 'create'])->name('figure.create');
    // Lưu sản phẩm mới
    Route::post('/', [FigureController::class, 'store'])->name('figure.store');
    // Hiển thị form chỉnh sửa sản phẩm
    Route::get('/{figure_id}/edit', [FigureController::class, 'edit'])->name('figure.edit');
    // Cập nhật thông tin sản phẩm
    Route::put('/{figure_id}', [FigureController::class, 'update'])->name('figure.update');
    // Xoá sản phẩm
    Route::delete('/{figure_id}', [FigureController::class, 'destroy'])->name('figure.destroy');
});




Route::prefix('orders')->group(function () {
    // Xem danh sách đơn hàng
    Route::get('/', [OrderController::class, 'index'])->name('order.index');

    // Xem chi tiết đơn hàng
    Route::get('/{order_id}', [OrderController::class, 'show'])->name('order.show');
    // Hiển thị form tạo đơn hàng
    Route::get('/create', [OrderController::class, 'create'])->name('order.create');
    // Lưu đơn hàng mới
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
    // Hiển thị form chỉnh sửa đơn hàng
    Route::get('/{order_id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    // Cập nhật thông tin đơn hàng
    Route::put('/{order_id}', [OrderController::class, 'update'])->name('order.update');
    // Xoá đơn hàng
    Route::delete('/{order_id}', [OrderController::class, 'destroy'])->name('order.destroy');
});



// Route cho đăng nhập và đăng ký
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Route cho các hoạt động chỉ dành cho người dùng đã đăng nhập
Route::middleware('auth')->group(function () {
    // Route cho xem và chỉnh sửa thông tin người dùng
    Route::get('/profile', [UserController::class, 'viewProfile'])->name('user.viewProfile');
    Route::post('/profile', [UserController::class, 'editProfile'])->name('user.editProfile');

    // Route cho các hoạt động chỉ dành cho Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [UserController::class, 'adminOnlyAction'])->name('admin.dashboard');
        // Thêm các Route cho các hoạt động chỉ dành cho Admin
        // ...
    });

    // Route cho các hoạt động chỉ dành cho Customer
    Route::middleware('role:customer')->group(function () {
        Route::get('/customer', [UserController::class, 'customerOnlyAction'])->name('customer.dashboard');
        // Thêm các Route cho các hoạt động chỉ dành cho Customer
        // ...
    });

    // Route cho các hoạt động chỉ dành cho Seller
    Route::middleware('role:seller')->group(function () {
        Route::get('/seller', [UserController::class, 'sellerOnlyAction'])->name('seller.dashboard');
        // Thêm các Route cho các hoạt động chỉ dành cho Seller
        // ...
    });
});




Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@showRegistrationForm')->name('register');
Route::post('/register', 'AuthController@register');

