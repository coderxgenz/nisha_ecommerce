<?php

use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Backend\CmsController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CouponsController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MainCategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\WebsiteManagementController;

Route::middleware(['guest'])->group(function(){
    Route::get('/admin', [AuthencationController::class, 'adminLogin'])->name('backend.admin.login');
    Route::post('/admin/login', [AuthencationController::class, 'adminLoginSubmit'])->name('backend.admin.login_submit');
});

Route::middleware(['auth', 'web', 'verified', 'admin.check'])->group(function(){
    Route::controller(AuthencationController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/dashboard', [AuthencationController::class, 'adminDashboard'])->name('backend.admin.dashboard');
        });
     }); 

     Route::controller(MainCategoryController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/main-category', [MainCategoryController::class, 'index'])->name('backend.main_category.index');
            Route::get('/main-category/create', [MainCategoryController::class, 'create'])->name('backend.main_category.create');
            Route::post('/main-category/store', [MainCategoryController::class, 'store'])->name('backend.main_category.store');
            Route::get('/main-category/edit/{id}', [MainCategoryController::class, 'edit'])->name('backend.main_category.edit');
            Route::post('/main-category/update/{id}', [MainCategoryController::class, 'update'])->name('backend.main_category.update');
            Route::get('/main-category/delete/{id}', [MainCategoryController::class, 'destroy'])->name('backend.main_category.destroy');
            Route::post('/main-category/update-status', [MainCategoryController::class, 'updateStatus'])->name('backend.main_category.update_status');
        });
     });

     Route::controller(SubCategoryController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/sub-category', action: [SubCategoryController::class, 'index'])->name('backend.sub_category.index');
            Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('backend.sub_category.create');
            Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('backend.sub_category.store');
            Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('backend.sub_category.edit');
            Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('backend.sub_category.update');
            Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'destroy'])->name('backend.sub_category.destroy');
            Route::post('/sub-category/update-status', [SubCategoryController::class, 'updateStatus'])->name('backend.sub_category.update_status');
            Route::get('/sub-category/get-sub-category-by-main-category/{id}', [SubCategoryController::class, 'getSubCategoryByMainCategory'])->name('backend.sub_category.get_sub_category_by_main_category');
        });
     });

     Route::controller(ProductController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/product', 'index')->name('backend.product.index');
            Route::get('/product/create', 'create')->name('backend.product.create');
            Route::post('/product/store', 'store')->name('backend.product.store');
            Route::get('/product/edit/{id}', 'edit')->name('backend.product.edit');
            Route::post('/product/update/{id}', 'update')->name('backend.product.update');
            Route::get('/product/delete/{id}', 'destroy')->name('backend.product.destroy');
            Route::get('/product/change-status/{id}', 'changeStatus')->name('backend.product.change_status');
        });
     });
     Route::controller(CustomerController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/customer', 'index')->name('backend.customer.index');
            Route::get('/customer/view/{id}', 'viewCustomer')->name('backend.customer.view');
            Route::get('/customer/edit/{id}', 'viewCustomer')->name('backend.customer.edit');
            Route::post('/customer/update', 'viewCustomer')->name('backend.customer.update');
            Route::get('/customer/change-status', 'changeStatus')->name('backend.customer.change_status');
            Route::get('/customer/delete/{id}', 'destroy')->name('backend.customer.destroy');
        });
     });

     Route::controller(OrderController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/order', 'index')->name('backend.order.index');
            Route::get('/order/view-order', 'viewOrder')->name('backend.order.view_order');
            Route::get('/order/delete/{id}', 'destroy')->name('backend.order.destroy');
        });
     });
     Route::controller(SizeController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/size', 'index')->name('backend.size.index');
            Route::get('/size/create', 'create')->name('backend.size.create');
            Route::post('/size/store', 'store')->name('backend.size.store');
            Route::post('/size/update', 'update')->name('backend.size.update');
            Route::get('/size/edit', 'edit')->name('backend.size.edit');
            Route::get('/size/delete/{id}', 'destroy')->name('backend.size.destroy');
            Route::post('/size/update-status', 'updateStatus')->name('backend.size.update_status');

        });
     });
     Route::controller(ColorController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/color', 'index')->name('backend.color.index');
            Route::get('/color/create', 'create')->name('backend.color.create');
            Route::post('/color/store', 'store')->name('backend.color.store');
            Route::post('/color/update', 'update')->name('backend.color.update');
            Route::get('/color/edit', 'edit')->name('backend.color.edit');
            Route::get('/color/delete/{id}', 'destroy')->name('backend.color.destroy');
            Route::post('/color/update-status', 'updateStatus')->name('backend.color.update_status');

        });
     });

     Route::get('refund-and-return', [OrderController::class, 'refundAndReturn'])->name('backend.refund_and_return');
     Route::get('coupons', [CouponsController::class, 'index'])->name('backend.coupons.index');
     Route::get('create', [CouponsController::class, 'create'])->name('backend.coupons.create');
     Route::get('general-setting', [WebsiteManagementController::class, 'generalSetting'])->name('backend.website_management.general_setting');
        Route::get('seo-setting', [WebsiteManagementController::class, 'seoSetting'])->name('backend.website_management.seo_setting');
        Route::get('social-media-link', [WebsiteManagementController::class, 'socialMediaLink'])->name('backend.website_management.social_media_link');
        Route::get('payment-gateway', [WebsiteManagementController::class, 'paymentGateway'])->name('backend.website_management.payment_gateway');
        Route::get('banner-management', [CmsController::class, 'bannerMangement'])->name('backend.cms.banner_management');
        Route::get('pages-management', [CmsController::class, 'pagesManagement'])->name('backend.cms.pages_management');
        Route::get('blog-management', [CmsController::class, 'blogManagement'])->name('backend.cms.blog_management');

});