<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'variant_id',
        'color_id',
        'name',
        'color',
        'price',
        'sale_price',
        'stock',
        'stock_status',
        'status',
    ];

    public function getProductImages(){
        return $this->hasMany(ProductImage::class, 'product_variant_id');
    }
    
}
