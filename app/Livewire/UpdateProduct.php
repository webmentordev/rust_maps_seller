<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Stripe\StripeClient;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateProduct extends Component
{
    use WithFileUploads;
    
    public $product, $title, $slug, $price = 2.0, $image = null, $file = null, $size = 2000, $content, $seo;
    
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->title = $product->title;
        $this->slug = $product->slug;
        $this->price = $product->price;
        $this->size = $product->size;
        $this->content = $product->description;
        $this->seo = $product->seo;
    }

    public function render()
    {
        return view('livewire.update-product');
    }
    
    public function updateProduct(){
        $this->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required|numeric|min:2',
            'image' => 'nullable|image|max:1024|mimes:png,jpg,webp',
            'file' => 'nullable|file|mimes:zip',
            'size' => 'required|numeric',
            'content' => 'required|max:255',
            'seo' => 'required|max:255',
        ]);
        $stripe = new StripeClient(config('app.stripe'));
        
        $file = null;
        $imageLink = null;
        $slug = strtolower(str_replace(' ', '-', $this->slug));
        if($this->image){
            Storage::disk('public_disk')->delete($this->product->image);
            $imageLink = $this->image->storeAs('maps', $slug."-image.".$this->image->getClientOriginalExtension(), 'public_disk');
            $stripe->products->update(
                $this->product->stripe_id,
                [
                    'images' => [
                        config('app.url').'/storage/'.$imageLink
                    ]
                ]
            );
        }
        if($this->title != $this->product->title){
            $stripe->products->update(
                $this->product->stripe_id,
                ['name' => $this->title]
            );
        }
        if($this->file){
            Storage::disk('local')->delete($this->product->file);
            $file = $this->file->store('files');
        }
        $this->product->update(array_filter([
            'title' => $this->title,
            'slug' => $slug,
            'price' => $this->price,
            'image' => $imageLink,
            'file' => $file,
            'size' => $this->size,
            'description' => $this->content,
            'seo' => $this->seo,
        ]));
        session()->flash('success', 'Product has been updated!');
    }
}
