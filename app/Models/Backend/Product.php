<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sku',
        'slug',
        'main_category_id',
        'sub_category_id',
        'stock',
        'stock_status',
        'short_description',
        'full_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'thumbnail_image',
        'uploaded_by',
        'is_featured',
        'is_trending',
        'is_todays_deal',
        'new_arrival',
        'status',
    ];

    public function getMainCategory(){
        return $this->belongsTo(MainCategory::class, 'main_category_id', 'id');
    }

    public function getSubCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function getProductSizeVariants(){
        return $this->hasMany(ProductVariants::class, 'product_id', 'id')->with('getProductImages');
    }
   
}
