<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Products $product)
{
    $cart = session()->get('cart', []);

    $cart[$product->id] = [
        'name' => $product->name,
        'price' => $product->price,
        'image' => $product->image,
        'quantity' => ($cart[$product->id]['quantity'] ?? 0) + 1,
    ];

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}

 public function destroy($productId)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Item removed from cart.');
}

public function view()
{
    $cart = session()->get('cart', []);

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return view('productsUser.cart', compact('cart', 'total'));
}

public function checkout()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    session()->forget('cart');

    return redirect()->back()->with('success', 'Order confirmed! Thank you for your purchase.');
}

}
