<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ModelsProduct;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Products extends Component
{
    public $search = "", $range = 6000;

    public function mount(){
        SEOMeta::setTitle("Complete Custom Rust maps collection");
        SEOMeta::setDescription("Find a collection of all custom flat, FPS+ boosted, less item/prefab Rust maps. These maps are built with fewer rock formations and offer a lot of building and roaming areas");
        SEOMeta::setCanonical(config('app.url')."/maps");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "CustomRustPrint");
        SEOMeta::addMeta("application-name", "CustomRustPrint");
        
        OpenGraph::setTitle("Complete Custom Rust maps collection");
        OpenGraph::setDescription("Find a collection of all custom flat, FPS+ boosted, less item/prefab Rust maps. These maps are built with fewer rock formations and offer a lot of building and roaming areas"); 
        OpenGraph::setUrl(config('app.url')."/maps");
        OpenGraph::addProperty("type", "product.group");
        OpenGraph::addProperty("locale", "en_US");
        OpenGraph::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
        
        TwitterCard::setTitle("Complete Custom Rust maps collection");
        TwitterCard::setSite("customrustprint");
        TwitterCard::setImage(config('app.url')."/images/customrustprints-banner.png");
        TwitterCard::setDescription("Find a collection of all custom flat, FPS+ boosted, less item/prefab Rust maps. These maps are built with fewer rock formations and offer a lot of building and roaming areas");
        
        JsonLd::setTitle("Complete Custom Rust maps collection");
        JsonLd::setDescription("Find a collection of all custom flat, FPS+ boosted, less item/prefab Rust maps. These maps are built with fewer rock formations and offer a lot of building and roaming areas");
        JsonLd::setType("product.group");
        JsonLd::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
    }
    public function render()
    {
        return view('livewire.products', [
            'products' => ModelsProduct::where('is_active', true)
                    ->where(function($query) {
                        $query
                            ->where('title', 'LIKE', '%'.$this->search.'%')
                            ->orWhere('description', 'LIKE', '%'.$this->search.'%')
                            ->orWhere('seo', 'LIKE', '%'.$this->search.'%');
                    })
                    ->whereBetween('size', [1000, $this->range])
                    ->latest()
                    ->get()
        ]);
    }
}
