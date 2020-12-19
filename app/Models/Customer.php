<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public static function customers()
    {
        return Customer::where('id', '!=', '0')->recent()->get();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
