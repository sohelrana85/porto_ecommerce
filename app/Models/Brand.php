<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'create_by', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function countProducts()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
