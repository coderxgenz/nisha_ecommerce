<?php

use App\Http\Controllers\Frontend\HomeController;
 

Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
