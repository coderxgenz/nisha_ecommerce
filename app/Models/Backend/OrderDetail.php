<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'size_id',
        'color_id',
        'price',
        'quantity',
        'total_amount',
        'status',
        'product_variant_id',
        'product_image_id',
    ];

    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
