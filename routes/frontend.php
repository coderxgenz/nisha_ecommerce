<?php
use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Backend\ProductController;
 
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthencationController::class, 'customerLogin'])->name('frontend.login');
    Route::post('/login', [AuthencationController::class, 'customerLoginSubmit'])->name('frontend.login_submit');
    Route::get('/register', [AuthencationController::class, 'customerRegister'])->name('frontend.register');
    Route::post('/register', [AuthencationController::class, 'customerRegisterSubmit'])->name('frontend.register_submit');
});

Route::middleware(['auth'])->group(function(){
    Route::controller(WishListController::class)->group(function(){
        Route::get('/wishlist', 'viewWishList')->name('frontend.view_wishlist');
    });
    
    Route::controller(CheckoutController::class)->group(function(){
        Route::get('/checkout', 'viewCheckout')->name('frontend.view_checkout');
    });
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'viewDashboard')->name('frontend.view_dashboard');
        Route::get('/profile', 'viewProfile')->name('frontend.view_profile');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('/orders', 'viewAllOrder')->name('frontend.view_all_order');
        Route::get('/order-single', 'viewSingleOrder')->name('frontend.view_single_order');
        Route::get('/order-complete', 'viewOrderComplete')->name('frontend.view_order_complete');
    });
 
});
Route::controller(CartController::class)->group(function(){
        Route::get('/cart', 'viewCart')->name('frontend.view_cart');
        Route::post('/add-to-cart', 'addToCart')->name('frontend.add_to_cart');
 });
 Route::controller(ProductController::class)->group(function(){
    // Route::get('/products', 'productList')->name('frontent.product_list');
    Route::get('/products/{main_category_slug}', 'productList')->name('frontent.product_list');
    Route::get('/product-details/{p_id}/{selected_size_id?}/{selected_color_id?}', action: 'productDetails')->name('frontent.product_details');
    Route::get('/update-variant', 'updateVariant')->name('frontent.update_variant');
});



 