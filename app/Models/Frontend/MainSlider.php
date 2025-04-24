<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
        'image',
        'image_alt',
        'image_title',
        'status'
    ];
}
