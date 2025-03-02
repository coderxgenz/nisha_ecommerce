<?php

use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MainCategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;

Route::middleware(['guest'])->group(function(){
    Route::get('/admin', [AuthencationController::class, 'adminLogin'])->name('backend.admin.login');
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
            Route::get('/main-category/change-status/{id}', [MainCategoryController::class, 'changeStatus'])->name('backend.main_category.change_status');
        });
     });

     Route::controller(SubCategoryController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('backend.sub_category.index');
            Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('backend.sub_category.create');
            Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('backend.sub_category.store');
            Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('backend.sub_category.edit');
            Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('backend.sub_category.update');
            Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'destroy'])->name('backend.sub_category.destroy');
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
            Route::get('/customer/view', 'view')->name('backend.customer.view');
            Route::get('/customer/delete/{id}', 'destroy')->name('backend.customer.destroy');
        });
     });

     Route::controller(OrderController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/order', 'index')->name('backend.order.index');
            Route::get('/order/view', 'view')->name('backend.order.view');
            Route::get('/order/delete/{id}', 'destroy')->name('backend.order.destroy');
        });
     });

});