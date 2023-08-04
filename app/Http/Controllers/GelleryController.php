<?php

namespace App\Http\Controllers;

use App\Models\Gellery;
use App\Models\Product;
use Illuminate\Http\Request;

class GelleryController extends Controller
{
    public function index(){
        return view('gellery', [
            "gellery" => Gellery::latest()->paginate(50),
            'products' => Product::latest()->get()
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'images' => 'required',
            'product' => 'required|numeric'
        ]);
        foreach ($request->images as $image) {
            Gellery::create([
                'url' => $image->store('gellery_images', 'public_disk'),
                'product_id' => $request->product,
            ]);
        }
        return back()->with('success', 'Images uploaded successfully.');    
    }
}
