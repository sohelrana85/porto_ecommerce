<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['root', 'name', 'slug', 'status', 'create_by'];

    protected $with = 'sub_category';

    public function sub_category()
    {
        return $this->hasMany(Category::class, 'root')->select('id', 'root', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'create_by');
    }
}
