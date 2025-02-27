<?php

use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Backend\MainCategoryController;

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
            Route::get('/main-category/edit/{id}', [MainCategoryController::class, 'edit'])->name('backend.main_category.edit');
            Route::post('/main-category/update/{id}', [MainCategoryController::class, 'update'])->name('backend.main_category.update');
            Route::get('/main-category/delete/{id}', [MainCategoryController::class, 'destroy'])->name('backend.main_category.destroy');
        });
     });


});