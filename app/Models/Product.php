<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'category_id', 'brand_id', 'model', 'buying_price', 'selling_price', 'special_price', 'special_price_from', 'special_price_to', 'quantity', 'sku_code', 'warranty_duration', 'warranty_condition', 'description', 'thumbnail', 'images', 'status', 'color', 'size', 'create_by'];


    public function user()
    {
        return $this->belongsTo(User::class, 'create_by');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
