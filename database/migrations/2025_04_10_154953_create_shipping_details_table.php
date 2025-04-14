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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('email')->nullable();
            $table->biginteger('phone')->nullable();
            $table->String('address')->nullable();
            $table->String('city')->nullable();
            $table->String('state')->nullable(); 
            $table->String('postal_code')->nullable();
            $table->String('country')->nullable();
            $table->boolean('is_default')->default(0);
            $table->String('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
