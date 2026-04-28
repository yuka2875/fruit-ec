<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;


class OrderController extends Controller
{
    public function confirm()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();
        $items = [];
        if ($cart) {
            $items = CartItem::where('cart_id', $cart->id)->get();
        }
        return view('order.confirm', compact('items'));
    }

    public function complete()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();
        if (!$cart) {
            return redirect('/cart');
        }
        $items = CartItem::where('cart_id', $cart->id)->get();
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total,
        ]);
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
        // カート削除
        CartItem::where('cart_id', $cart->id)->delete();
        return view('order.complete');
    }
}
