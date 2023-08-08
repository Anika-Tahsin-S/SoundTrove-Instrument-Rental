<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'custom_url',
        'status',
        'is_popular',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
