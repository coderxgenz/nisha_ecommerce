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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->String('order_number')->unique();
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('shipping_charge', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->date('order_date')->nullable(); 
            $table->date('shipping_date')->nullable(); 
            $table->date('delivery_date')->nullable(); 
            $table->date('cancel_date')->nullable(); 
            $table->date('return_date')->nullable(); 
            $table->String('cancel_reason')->nullable(); 
            $table->String('return_reason')->nullable(); 
            $table->string('delivery_status')->nullable();  
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
