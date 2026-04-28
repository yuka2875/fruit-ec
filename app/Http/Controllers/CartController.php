<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();
        $items = [];
        if ($cart) {
            $items = CartItem::where('cart_id', $cart->id)->get();
        }
        return view('cart.index', compact('items'));
    }

    public function add(Request $request)
    {
        $userId = auth()->id();

        $cart = Cart::firstOrCreate([
            'user_id' => $userId
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }
        return redirect('/cart');
    }

    public function update(Request $request)
    {
        $item = CartItem::findOrFail($request->item_id);
        $item->update([
            'quantity' => $request->quantity
        ]);
        return redirect('/cart')->with('success', '数量を更新しました');
    }

    public function delete(Request $request)
    {
        $item = CartItem::findOrFail($request->item_id);
        $item->delete();
        return redirect('/cart');
    }
}
