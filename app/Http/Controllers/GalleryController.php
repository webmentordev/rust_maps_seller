<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){
        return view('dashboard.images', [
            'images' => Gallery::latest()->with('product')->get(),
            'products' => Product::latest()->get()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|array',
            'product' => 'required'
        ]);
        $product = Product::where('slug', $request->product)->first();
        foreach($request->image as $key => $image){
            $index = $key + 1;
            Gallery::create([
                'image' => $image->storeAs('images', $product->slug.'-'.rand(9,99999).'-image-design-'.$index.'.'.$image->getClientOriginalExtension(), 'public_disk'),
                'product_id' => $product->id
            ]);
        }
        return back();
    }


    public function delete(Gallery $image){
        Storage::disk('public_disk')->delete($image->image);
        $image->delete();
        return back();
    }
}