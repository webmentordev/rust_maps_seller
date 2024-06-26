<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index(Order $order)
    {
        if(!$order->is_paid){
            abort(500);
        }
        return view('order.download', [
            'order' => $order
        ]);
    }

    public function download(Order $order)
    {
        if(!$order->is_paid){
            abort(500);
        }
        if($order->downloads == 5){
            abort(403);
        }
        $originalFilePath = Storage::disk('local')->path($order->product->file);
        $newFileName = $this->randomNameGenerator().'-customrustprints-'.date("d-m-y").rand(9,999999).'.zip';
        $headers = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="' . $newFileName . '"',
        ];
        $order->downloads = $order->downloads + 1;
        $order->save();
        return response()->file($originalFilePath, $headers);
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
}
