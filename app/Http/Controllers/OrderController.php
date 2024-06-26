<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        return view('dashboard.orders', [
            'orders' => Order::latest()->get()
        ]);
    }

    public function success(Request $request, Order $order){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        if($order->status == 'pending'){
            Order::where('checkout_id', $order->checkout_id)->update([
                'is_paid' => true,
                'status' => 'completed'
            ]);
            Mail::to($order->email)->send(new OrderCompleted($order->checkout_id));
        }
        return view('order.success', [
            'order' => $order
        ]);
    }
    public function cancel(Request $request, Order $order){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        if($order->status == 'pending'){
            Order::where('checkout_id', $order->checkout_id)->update([
                'status' => 'canceled'
            ]);
        }
        return view('order.cancel', [
            'order' => $order
        ]);
    }

    public function delete(Order $order){
        $order->delete();
        return back();
    }
}