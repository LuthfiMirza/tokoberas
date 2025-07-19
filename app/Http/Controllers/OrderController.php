<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // For now, we'll show all orders. In a real app, you'd filter by user
        $orders = Order::with('items')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('orders.index', compact('orders'));
    }
    
    public function show(Order $order)
    {
        $order->load('items', 'paymentProofs');
        
        return view('orders.show', compact('order'));
    }
}