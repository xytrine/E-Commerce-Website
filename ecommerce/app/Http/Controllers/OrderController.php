<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

public function confirmation()
{
    $latestOrder = Order::where('user_id', auth()->id())
                        ->latest()
                        ->first();

    return view('productsUser.order-confirmation', compact('latestOrder'));
}

public function index()
{
    $orders = Order::where('user_id', auth()->id())->latest()->get();

    return view('productsUser.orders', compact('orders'));
}


}
