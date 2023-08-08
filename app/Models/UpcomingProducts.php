<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingProducts extends Model
{
    use HasFactory;
    protected $table = 'upcoming_products';
    protected $fillable = [
        'name',
        'small_desc'
    ];
}
