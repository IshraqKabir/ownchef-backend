<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function items()
    {
        return Item::where('id', '!=', '0')->with([
            'side_view_image', 'top_view_image'
        ])->get();
    }

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function top_view_image()
    {
        return $this->belongsTo(Image::class, 'top_view_image_id');
    }

    public function side_view_image()
    {
        return $this->belongsTo(Image::class, 'side_view_image_id');
    }
}
