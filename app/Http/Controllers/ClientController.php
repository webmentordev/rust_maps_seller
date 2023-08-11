<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(){
        return view('client', [
            'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->latest()->get()
        ]);
    }

    public function randomNameGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function download(Order $order)
    {
        $originalFilePath = Storage::disk('public_disk')->path($order->product->mapfile);
        $newFileName = $this->randomNameGenerator().'-buyrustmaps-store-'.date("d-m-y").'.zip';
        $headers = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="' . $newFileName . '"',
        ];
        return response()->file($originalFilePath, $headers);
    }
}
