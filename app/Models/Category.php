<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['root', 'name', 'slug', 'status', 'create_by'];

    protected $with = ['sub_category', 'user'];

    public const categoryRoot = 0;

    public function sub_category()
    {
        return $this->hasMany(Category::class, 'root');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function productCount()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
