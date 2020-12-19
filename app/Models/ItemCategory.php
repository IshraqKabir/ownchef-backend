<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'category_id');
    }
}
