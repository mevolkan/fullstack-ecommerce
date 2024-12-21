<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    //Add to cart
    public function addToCart(Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
        $cart[$productId] = $quantity;
        Redis::set('cart', json_encode($cart));
        return response()->json(['message' => 'Item added to cart']);
    }

    //remove from cart
    public function removeFromCart(Request $request) {
        $productId = $request->input('product_id');
        $cart = json_decode(Redis::get('cart'), true);
        unset($cart[$productId]);
        Redis::set('cart', json_encode($cart));
        return response()->json(['message' => 'Item removed from cart']);
    }

    //view cart
    public function viewCart() {
        $cart = json_decode(Redis::get('cart'), true);
        return response()->json($cart);
    }
}
