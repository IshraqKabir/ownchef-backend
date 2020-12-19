<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function item_categories() {
        return $this->hasMany(ItemCategory::class);
    }
}
