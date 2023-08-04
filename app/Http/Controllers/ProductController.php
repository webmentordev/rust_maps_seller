<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class ProductController extends Controller
{
    public function index(){
        return view('product', [
            'products' => Product::latest()->paginate(100)
        ]);
    }

    public function create(){
        return view('create-product');
    }

    function randomNameGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvw.()&@xyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 120; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|unique:products,name',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp|max:500',
            'map' => 'required|mimes:zip',
            'description' => 'required',
        ]);

        $fps = $request->has('fps') ? true : false;
        $buildable = $request->has('buildable') ? true : false;
        $combined = $request->has('combined') ? true : false;


        $stripe = new StripeClient(config('app.stripe'));
        $product = $stripe->products->create([
            'name' => $request->name
        ]);
        $price = $stripe->prices->create([
            'unit_amount' => $request->price * 100,
            'currency' => 'USD',
            'product' => $product['id'],
        ]);
        $paymentlink = $stripe->paymentLinks->create([
            'line_items' => [
                [
                    'price' => $price['id'],
                    'quantity' => 1
                ],
            ]
        ]);
        Product::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)).'-'.rand(10,100000),
            'price' => $request->price,
            'map_size' => $request->size,
            'is_combined' => $combined,
            'is_fps' => $fps,
            'is_buildable' => $buildable,
            'price_id' => $price['id'],
            'stripe_id' => $product['id'],
            'payment_link' => $paymentlink['url'],
            'description' => $request->description,
            'thumbnail' => $request->thumbnail->store('map_thumbnails', 'public_disk'),
            'mapfile' => $request->map->storeAs('map_files', $this->randomNameGenerator().'.'.$request->map->getClientOriginalExtension(),'public_disk'),
            'original_map_name' => $request->map->getClientOriginalName(),
        ]);
        return back()->with('success', 'Product has been created!');
    }


    public function show(Product $product){
        dd($product);
    }

    public function fetch(){
        return view('maps', [
            'maps' => Product::latest()->get()
        ]);
    }
}