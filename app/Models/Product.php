<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_slug',
        'product_img',
        'product_stock',
        'product_status',
        'product_price',
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
