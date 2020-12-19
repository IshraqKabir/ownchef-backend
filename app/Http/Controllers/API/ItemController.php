<?php

namespace App\Http\Controllers\API;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::items();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'top_view_image_id' => ['integer'],
            'side_view_image_id' => ['integer'],
            'stock' => ['integer'],
            'price' => ['integer', 'required'],
            'category_id' => ['integer', 'required'],
        ]);

        $item = Item::create($data);

        return $item;
    }

    public function read(Item $item)
    {
        return $item;
    }

    public function update(Item $item, Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'top_view_image_id' => ['integer'],
            'side_view_image_id' => ['integer'],
            'stock' => ['integer'],
            'price' => ['integer', 'required'],
            'category_id' => ['integer', 'required'],
        ]);

        $item->update($data);

        return $item;
    }

    public function delete(Item $item)
    {
        $item->delete();
    }
    
}
