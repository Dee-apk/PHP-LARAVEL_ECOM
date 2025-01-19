<?php

// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('cart.index');
    }

    public function checkout()
{
    $cartItems = Cart::where('user_id', auth()->id())->get();
    $cartTotal = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('cart.checkout', compact('cartTotal'));
}
}
