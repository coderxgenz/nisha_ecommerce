<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'order_number', 'is_active'];
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'main_category_id');
    }
}
