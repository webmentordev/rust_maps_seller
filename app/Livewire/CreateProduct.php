<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Stripe\StripeClient;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    
    public $title, $slug, $price = 2.0, $image, $file, $size = 2000, $content, $seo;
    
    public function render()
    {
        return view('livewire.create-product');
    }
    public function createProduct(){
        $this->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required|numeric|min:2',
            'image' => 'required|image|max:1024|mimes:png,jpg,webp',
            'file' => 'required|file|mimes:zip|max:1000000',
            'size' => 'required|numeric',
            'content' => 'required',
            'seo' => 'required|max:255',
        ]);
        $stripe = new StripeClient(config('app.stripe'));
        $slug = strtolower(str_replace(' ', '-', $this->slug)).'-'.rand(9, 9999999);
        $imageLink = $this->image->storeAs('maps', $slug."-image.".$this->image->getClientOriginalExtension(), 'public_disk');
        $file = $this->file->store('files');

        $result = $stripe->products->create([
            'name' => $this->title,
            'images' => [
                config('app.url').'/storage/'.$imageLink
            ]
        ]);
        Product::create([
            'title' => $this->title,
            'stripe_id' => $result['id'],
            'slug' => $slug,
            'price' => $this->price,
            'image' => $imageLink,
            'file' => $file,
            'size' => $this->size,
            'description' => $this->content,
            'seo' => $this->seo,
        ]);
        session()->flash('success', 'Product has been created!');
    }
}
