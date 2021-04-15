<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_price', 'quantity'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id')->select('id', 'thumbnail');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
