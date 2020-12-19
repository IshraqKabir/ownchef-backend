<?php

namespace App\Http\Controllers\API;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        return ItemCategory::item_categories();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'product_id' => ['integer', 'required']
        ]);

        $ic = ItemCategory::create($data);

        return $ic;
    }

    public function read(ItemCategory $itemCategory)
    {
        return $itemCategory;
    }

    public function update(ItemCategory $itemCategory, Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'product_id' => ['integer', 'required']
        ]);

        $itemCategory->udpate($data);

        return $itemCategory;
    }

    public function delete(ItemCategory $itemCategory)
    {
        $itemCategory->delete();
    }

    public function get_items(ItemCategory $itemCategory)
    {
        return $itemCategory->items;
    }
}
