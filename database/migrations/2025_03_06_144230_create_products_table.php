<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->Text('name')->nullable();
            $table->Text('sku')->nullable();
            $table->Text('slug')->nullable();
            $table->bigInteger('main_category_id')->nullable();
            $table->bigInteger('sub_category_id')->nullable();
            $table->integer('stock')->nullable();
            $table->tinyInteger('stock_status')->default(1)->comment('1=In Stock, 0=Out of Stock')->nullable();
            $table->Text('short_description')->nullable();
            $table->Text('full_description')->nullable();
            $table->Text('meta_title')->nullable();
            $table->Text('meta_description')->nullable();
            $table->Text('meta_keywords')->nullable();
            $table->Text('thumbnail_image')->nullable(); 
            $table->bigInteger('uploaded_by')->nullable();
            $table->boolean('is_featured')->default(0)->comment('1=Featured, 0=Not Featured');
            $table->boolean('is_trending')->default(0)->comment('1=Trending, 0=Not Trending');
            $table->boolean('is_todays_deal')->default(0)->comment('1=Todays deal, 0=Not Todays deal');
            $table->boolean('new_arrival')->default(0)->comment('1=New Arrival, 0=Not New Arrival');
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
