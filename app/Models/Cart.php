<?php

namespace App\Models;

use App\Models\Backend\Color;
use App\Models\Backend\ProductImage;
use App\Models\Backend\Size;
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

    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function getSize(){
        return $this->belongsTo(Size::class,  'size_id');
    }
    public function getColor(){
        return $this->belongsTo(Color::class,  'color_id');
    }
}
