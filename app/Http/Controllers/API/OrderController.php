<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::orders();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'checkout_id' => ['integer'],
            'items[*]' => [
                'id' => ['integer', 'required'],
                'description' => ['string'],
                'quantity' => ['integer', 'required']
            ]
        ]);

        $order = new Order();

        if (isset($data['checkout_id'])) {
            $order->checkout_id = $data['checkout_id'];
        }

        $order->save();

        foreach ($request['items'] as $item) {
            $order->items()->attach([
                $item['id'] => [
                    'description' => $item['description'],
                    'quantity' => $item['quantity']
                ]
            ]);
        }

        $order['items'] = $order->items;

        return $order;
    }

    public function read(Order $order)
    {
        return $order;
    }

    public function update(Order $order, Request $request)
    {
        $data = $request->validate([
            'checkout_id' => ['integer'],
            'items[*]' => [
                'id' => ['integer', 'required'],
                'description' => ['string'],
                'quantity' => ['integer', 'required']
            ]
        ]);

        $old_items = [];

        foreach($order->items as $item) {
            array_push($old_items, $item['id']);
        }

        $order->items()->detach($old_items);

        foreach ($request['items'] as $item) {
            $order->items()->attach([
                $item['id'] => [
                    'description' => $item['description'],
                    'quantity' => $item['quantity']
                ]
            ]);
        }

        $order['items'] = $order->items;

        return $order;
    }

    public function delete(Order $order)
    {
        $order->delete();
    }
}
