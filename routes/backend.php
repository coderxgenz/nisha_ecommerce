<?php

use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Backend\MainCategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

Route::middleware(['guest'])->group(function(){
    Route::get('/admin', [AuthencationController::class, 'adminLogin'])->name('backend.admin.login');
});

Route::middleware(['auth', 'web', 'verified'])->group(function(){
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
            Route::get('/main-category/edit', [MainCategoryController::class, 'edit'])->name('backend.main_category.edit');
            Route::post('/main-category/update/{id}', [MainCategoryController::class, 'update'])->name('backend.main_category.update');
            Route::get('/main-category/delete/{id}', [MainCategoryController::class, 'destroy'])->name('backend.main_category.destroy');
        });
     });

     Route::controller(SubCategoryController::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('backend.sub_category.index');
            Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('backend.sub_category.create');
            Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('backend.sub_category.store');
            Route::get('/sub-category/edit', [SubCategoryController::class, 'edit'])->name('backend.sub_category.edit');
            Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('backend.sub_category.update');
            Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'destroy'])->name('backend.sub_category.destroy');
        });
     });


});