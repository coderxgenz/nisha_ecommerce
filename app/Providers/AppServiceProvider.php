<?php

namespace App\Providers;

use App\Models\Backend\SubCategory;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
             $sub_categories = SubCategory::where("is_active",1)->get(); // Fetch all subcategories
            
            

        View::share('sub_categories', $sub_categories);
    }
}
