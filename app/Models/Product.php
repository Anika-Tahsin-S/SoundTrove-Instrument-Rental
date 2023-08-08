<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'small_description',
        'custom_url',
        'original_price',
        'tax',
        'selling_price',
        'product_image',
        'qty',
        'status',
        'popular',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}