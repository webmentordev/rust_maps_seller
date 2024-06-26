<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ModelsProduct;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Home extends Component
{
    public function mount(){
        SEOMeta::setTitle("Purchase Custom Less Prefabs Rust Maps");
        SEOMeta::setDescription("Find and purchase custom Rust maps with fewer prefabs, optimized for better performance and unique gameplay experiences");
        SEOMeta::setCanonical(config('app.url'));
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "CustomRustPrints");
        SEOMeta::addMeta("application-name", "CustomRustPrints");
        
        OpenGraph::setTitle("Purchase Custom Less Prefabs Rust Maps");
        OpenGraph::setDescription("Find and purchase custom Rust maps with fewer prefabs, optimized for better performance and unique gameplay experiences"); 
        OpenGraph::setUrl(config('app.url'));
        OpenGraph::addProperty("type", "WebPage");
        OpenGraph::addProperty("locale", "en_US");
        OpenGraph::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
        
        TwitterCard::setTitle("Purchase Custom Less Prefabs Rust Maps");
        TwitterCard::setSite("customrustprint");
        TwitterCard::setImage(config('app.url')."/images/customrustprints-banner.png");
        TwitterCard::setDescription("Find and purchase custom Rust maps with fewer prefabs, optimized for better performance and unique gameplay experiences");
        
        JsonLd::setTitle("Purchase Custom Less Prefabs Rust Maps");
        JsonLd::setDescription("Find and purchase custom Rust maps with fewer prefabs, optimized for better performance and unique gameplay experiences");
        JsonLd::setType("WebPage");
        JsonLd::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
    }
    public function render()
    {
        return view('livewire.home', [
            'products' => ModelsProduct::latest()->where('is_active', true)->limit(12)->get()
        ]);
    }
}