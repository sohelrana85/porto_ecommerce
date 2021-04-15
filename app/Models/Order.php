<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["order_no", "customer_id", "shipping_id", "total"];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'order_id');
    }
}
