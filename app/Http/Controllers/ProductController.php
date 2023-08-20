<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

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

        $imageLink = $request->thumbnail->store('map_thumbnails', 'public_disk');
        $stripe = new StripeClient(config('app.stripe'));
        $product = $stripe->products->create([
            'name' => $request->name,
            'images' => [
                config('app.url').'/storage/'.$imageLink
            ]
        ]);
        $price = $stripe->prices->create([
            'unit_amount' => $request->price * 100,
            'currency' => 'USD',
            'product' => $product['id'],
        ]);
        Product::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)).'-'.rand(10, 100000),
            'price' => $request->price,
            'map_size' => $request->size,
            'is_combined' => $combined,
            'is_fps' => $fps,
            'is_buildable' => $buildable,
            'price_id' => $price['id'],
            'stripe_id' => $product['id'],
            'description' => $request->description,
            'thumbnail' => $imageLink,
            'mapfile' => $request->map->store(config('app.location'), 'public_disk'),
            'original_map_name' => $request->map->getClientOriginalName(),
        ]);
        return back()->with('success', 'Product has been created!');
    }

    public function show(Product $product){
        SEOMeta::setTitle($product->name);
        SEOMeta::setCanonical(config('app.url').'/map/'.$product->slug);

        OpenGraph::setTitle($product->name);
        OpenGraph::setUrl(config('app.url').'/map/'.$product->slug);
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/storage/'.$product->thumbnail);

        TwitterCard::setTitle($product->name);
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/storage/'.$product->thumbnail);

        JsonLd::setTitle($product->name);
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/storage/'.$product->thumbnail);

        return view('map', [
            'product' => $product
        ]);
    }

    public function fetch(){
        SEOMeta::setTitle('Rust Maps Collection');
        SEOMeta::setCanonical(config('app.url').'/maps');

        OpenGraph::setTitle('Rust Maps Collection');
        OpenGraph::setUrl(config('app.url').'/maps');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Rust Maps Collection');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Rust Maps Collection');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');
        
        return view('maps', [
            'maps' => Product::latest()->get()
        ]);
    }

    public function search(Request $request){
        SEOMeta::setTitle('Search Rust Maps');
        SEOMeta::setCanonical(config('app.url').'/map/search');

        OpenGraph::setTitle('Search Rust Maps');
        OpenGraph::setUrl(config('app.url').'/map/search');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Search Rust Maps');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Search Rust Maps');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');

        $product = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('maps', [
            'maps' => $product
        ]);
    }


    public function update_page($slug){
        $product = Product::where('slug', $slug)->first();
        if($product){
            return view('update-product', [
                'product' => $product
            ]);
        }else{
            abort(404, 'Not Found!');
        }
    }

    public function update(Request $request, $slug){
        $result = Product::where('slug', $slug)->first();
        if($result){
            $this->validate($request, [
                'name' => 'required',
                'slug' => 'required',
                'size' => 'required|numeric',
                'description' => 'required',
                'map' => 'nullable|mimes:zip',
                'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:500'
            ]);

            $thumbnail = null;
            $map_file = null;

            if($request->hasFile('map')){
                $map_file = $request->map->store(config('app.location'), 'public_disk');
            }

            if($request->hasFile('thumbnail')){
                dd(Storage::disk('public_disk')->delete('/storage/'.$result->thumbnail));
                $thumbnail = $request->thumbnail->store('map_thumbnails', 'public_disk');
            }

            $array = [
                'name' => $request->name,
                'slug' => $request->slug,
                'map_size' => $request->size,
                'description' => $request->description,
                'thumbnail' => $thumbnail,
                'mapfile' => $map_file,
            ];

            $result->update(array_filter($array));
            return back()->with('success', 'Product has been updated!');
        }else{
            abort(404, 'Not Found!');
        }
    }
}