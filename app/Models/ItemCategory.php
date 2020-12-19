<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public static function item_categories()
    {
        return ItemCategory::where('id', '!=', '0')->with(['items'])->get();
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id')->with([
            'top_view_image', 'side_view_image'
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
