<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function products() {
        return Product::where('id', '!=', '0')->with(['image'])->get();
    }

    public function item_categories() {
        return $this->hasMany(ItemCategory::class)->with(['items']);
    }

    public function image() 
    {
        return $this->belongsTo(Image::class);
    }
}
