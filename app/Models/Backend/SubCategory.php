<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategory extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['name', 'slug', 'image', 'main_category_id', 'order_number', 'is_active'];
    public function getMainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    
}
