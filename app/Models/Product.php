<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'users_id', 'categories_id', 'price', 'description', 'slug'];
    protected $hidden = [];

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
