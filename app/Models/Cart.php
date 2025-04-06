<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'temp_id',
        'product_id',
        'product_name',
        'size',
        'color',
        'quantity',
        'price',
        'sale_price',
        'total_amount',
        'size_id',
        'color_id',
        'product_variant_id',
        'product_image_id'
    ];
}
