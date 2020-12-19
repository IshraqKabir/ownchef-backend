<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::products();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'image_id' => ['integer'],
        ]);

        $product = Product::create($data);

        return $product;
    }

    public function read(Product $product)
    {
        return $product;
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'image_id' => ['integer'],
        ]);

        $product->update($data);

        return $product;
    }

    public function delete(Product $product)
    {
        $product->delete();

        return $product;
    }

    public function get_item_categories(Product $product)
    {
        return $product->item_categories;
    }
}
