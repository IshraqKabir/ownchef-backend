<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function orders() 
    {
        return $this->belongsToMany(Order::class);
    }
}
