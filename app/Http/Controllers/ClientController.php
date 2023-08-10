<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ClientController extends Controller
{
    public function index(){
        return view('client', [
            'orders' => Order::where('user_id', auth()->user())->where('status', 'success')->get()
        ]);
    }
}
