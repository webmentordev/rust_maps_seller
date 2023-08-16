<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function orders(){
        return view('orders', [
            'orders' => Order::latest()->paginate(50)
        ]);
    }

    public function randomStringGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function randomCheckOutGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 120; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function store(Product $product){
        if(Order::where('user_id', auth()->user()->id)->where('status', 'success')->where('product_id', $product->id)->first()){
            return back()->with('error', 'Sorry, but you already own the map! Please check the client area for any updates');
        }

        $order_id = $this->randomStringGenerator();
        $checkout_id = $this->randomCheckOutGenerator();
        Order::create([
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
            'map_slug' => $product->slug,
            'order_id' => $order_id,
            'checkout_id' => $checkout_id,
            'price'=> $product->price
        ]);

        $stripe = new StripeClient(config('app.stripe'));
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => config('app.url')."/success/".$checkout_id,
            'cancel_url' => config('app.url')."/cancel/".$checkout_id,
            'currency' => "USD",
            'expires_at' => Carbon::now()->addMinutes(120)->timestamp,
            'line_items' => [
                [
                    'price' => $product->price_id,
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

        $user = auth()->user();
        $url = $checkout['url'];
        Http::post(config('app.order'), [
            'content' => "**Name**: {$user->name}\n**Email**: {$user->email}\n**Product**: {$product->name}\n**OrderID**: {$order_id}\n**CheckoutID**: {$checkout_id}\n**Price**: {$product->price}\n**CheckoutURL**: {$url}\n=======================================================\n"
        ]);

        return redirect($url);
    }

    public function cancelOrder(Order $order){
        if($order->status == 'pending'){
            $order->status = 'canceled';
            $order->save();
            Http::post(config('app.order'), [
                'content' => "**OrderID**: $order->order_id worth of $$order->price has been cancelled.\n==================================="
            ]);
            return view('cancel');
        }else{
            abort(500, 'Internal Server Error!');
        }
    }
    public function successOrder(Order $order){
        if($order->status == 'pending'){
            $order->status = 'success';
            $order->save();
            Http::post(config('app.order'), [
                'content' => "**OrderID**: $order->order_id worth of $$order->price has been Completed & Paid.\n==================================="
            ]);
            return view('success', [
                'order_id' => $order->order_id
            ]);
        }else{
            abort(500, 'Internal Server Error!');
        }
    }
}