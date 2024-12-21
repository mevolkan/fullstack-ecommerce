<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    public function placeOrder(Request $request) {
        $cart = json_decode(Redis::get('cart'), true);
        $order = Order::create([
            'user_id' => $request->user()->id,
            'details' => json_encode($cart)
        ]);
        Redis::del('cart');
        return response()->json(['message' => 'Order placed successfully']);
    }

    public function viewOrders() {
        $orders = Order::where('user_id', auth()->id())->get();
        return response()->json($orders);
    }
}
