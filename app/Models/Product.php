<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function favorites()
{
    return $this->hasMany(Favorite::class);
}
public function relatedProducts()
    {
        return Product::where('category', $this->category)
                      ->where('id', '!=', $this->id)
                      ->distinct()
                      ->take(3)
                      ->get();
    }
   
}