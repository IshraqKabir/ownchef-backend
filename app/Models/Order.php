<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
