<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_variant_name',
        'product_variant_id',
        'color_name',
        'color_id',
        'image',
        'status',
    ];
}
