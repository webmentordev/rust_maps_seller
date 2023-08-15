<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class ClientController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Client Area');
        SEOMeta::setCanonical(config('app.url').'/client');

        OpenGraph::setTitle('Client Area');
        OpenGraph::setUrl(config('app.url').'/client');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Client Area');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Client Area');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');

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


    public function search(Request $request){
        if($request->filter == 'last-updated'){
            return view('client', [
                'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->orderBy('updated_at', 'desc')->get()
            ]);
        }elseif($request->filter == 'fps-plus'){
            return view('client', [
                'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->whereHas('product', function ($query) {
                    $query->where('is_fps', true);
                })->get()
            ]);
        }elseif($request->filter == 'buildable'){
            return view('client', [
                'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->whereHas('product', function ($query) {
                    $query->where('is_buildable', true);
                })->get()
            ]);
        }elseif($request->filter == 'combined'){
            return view('client', [
                'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->whereHas('product', function ($query) {
                    $query->where('is_combined', true);
                })->get()
            ]);
        }else{
            return view('client', [
                'orders' => Order::where('user_id', auth()->user()->id)->where('status', 'success')->latest()->get()
            ]);
        }
    }
}
