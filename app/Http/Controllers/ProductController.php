<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        return view('dashboard.product.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create(){
        return view('dashboard.product.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required|numeric|min:2',
            'image' => 'required|image|max:1024|mimes:png,jpg,webp',
            'file' => 'required|file|mimes:zip',
            'size' => 'required|numeric',
            'description' => 'required|max:255',
            'seo' => 'required|max:255',
        ]);
        $stripe = new StripeClient(config('app.stripe'));
        $slug = strtolower(str_replace(' ', '-', $request->slug)).'-'.rand(9, 9999999);
        $imageLink = $request->image->storeAs('maps', $slug."-image.".$request->image->getClientOriginalExtension(), 'public_disk');
        $file = $request->file->store('files');

        $result = $stripe->products->create([
            'name' => $request->title,
            'images' => [
                config('app.url').'/storage/'.$imageLink
            ]
        ]);
        Product::create([
            'title' => $request->title,
            'stripe_id' => $result['id'],
            'slug' => $slug,
            'price' => $request->price,
            'image' => $imageLink,
            'file' => $file,
            'size' => $request->size,
            'description' => $request->description,
            'seo' => $request->seo,
        ]);
        return back()->with('success', 'Product has been created!');
    }

    public function status(Product $product){
        $product->is_active = !$product->is_active;
        $product->save();
        return back();
    }

    public function edit(Product $product){
        return view('dashboard.product.update', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required|numeric|min:2',
            'image' => 'nullable|image|max:1024|mimes:png,jpg,webp',
            'file' => 'nullable|file|mimes:zip',
            'size' => 'required|numeric',
            'description' => 'required|max:255',
            'seo' => 'required|max:255',
        ]);
        $stripe = new StripeClient(config('app.stripe'));
        
        $file = null;
        $imageLink = null;
        $slug = strtolower(str_replace(' ', '-', $request->slug));
        if($request->hasFile('image')){
            Storage::disk('public_disk')->delete($product->image);
            $imageLink = $request->image->storeAs('maps', $slug."-image.".$request->image->getClientOriginalExtension(), 'public_disk');
            $stripe->products->update(
                $product->stripe_id,
                [
                    'images' => [
                        config('app.url').'/storage/'.$imageLink
                    ]
                ]
            );
        }
        if($request->title != $product->title){
            $stripe->products->update(
                $product->stripe_id,
                ['name' => $request->title]
            );
        }
        if($request->hasFile('file')){
            Storage::disk('local')->delete($product->file);
            $file = $request->file->store('files');
        }
        $product->update(array_filter([
            'title' => $request->title,
            'slug' => $slug,
            'price' => $request->price,
            'image' => $imageLink,
            'file' => $file,
            'size' => $request->size,
            'description' => $request->description,
            'seo' => $request->seo,
        ]));
        return redirect()->route('product.update', [ 'product' => $slug ])->with('success', 'Product has been updated!');
    }
}