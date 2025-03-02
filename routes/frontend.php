<?php
use App\Http\Controllers\Backend\AuthencationController;
use App\Http\Controllers\Frontend\HomeController;
 
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthencationController::class, 'customerLogin'])->name('login');
    Route::get('/register', [AuthencationController::class, 'customerRegister'])->name('frontend.register');
});