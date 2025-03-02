<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'main_category_id', 'order_number', 'is_active'];
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }
}
