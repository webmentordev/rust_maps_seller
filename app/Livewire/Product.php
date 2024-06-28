<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Stripe\StripeClient;
use App\Mail\OrderPending;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Product as ModelsProduct;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Product extends Component
{
    public $product, $email, $singleImage;
    
    public function mount(ModelsProduct $product)
    {
        if(!$this->product->is_active){
            abort(404);
        }
        $this->product = $product;
        $this->singleImage = asset('/storage/'. $product->image);
        SEOMeta::setTitle($product->title);
        SEOMeta::setDescription($product->seo);
        SEOMeta::setCanonical(config('app.url')."/map/".$product->slug);
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "CustomRustPrint");
        SEOMeta::addMeta("application-name", "CustomRustPrint");
        OpenGraph::setTitle($product->title);
        OpenGraph::setDescription($product->seo); 
        OpenGraph::setUrl(config('app.url')."/map/".$product->slug);
        OpenGraph::addProperty("type", "product");
        OpenGraph::addProperty("locale", "en_US");
        OpenGraph::addImage(config('app.url')."/storage/".$product->image, ["height" => 630, "width" => 630]);
        OpenGraph::addProperty('price:amount', $product->price);
        OpenGraph::addProperty('price:currency', 'USD');
        TwitterCard::setTitle($product->title);
        TwitterCard::setSite("@customrustprint");
        TwitterCard::setImage(config('app.url')."/storage/".$product->image);
        TwitterCard::setDescription($product->seo);
        JsonLd::setTitle($product->title);
        JsonLd::setDescription($product->seo);
        JsonLd::setType("product");
        JsonLd::addImage(config('app.url')."/storage/".$product->image, ["height" => 630, "width" => 630]);
    }

    public function render()
    {
        return view('livewire.product', [
            'products' => ModelsProduct::latest()->where('is_active', true)->get()
        ]);
    }

    public function randomStringGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 40; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function purchaseNow(){
        $this->validate([
            'email' => ['required', 'email', 'max:255']
        ]);
        $checkout_id = $this->randomStringGenerator();
        $stripe = new StripeClient(config('app.stripe'));
        $success = URL::temporarySignedRoute('success', now()->addMinutes(360), ['order' => $checkout_id]);
        $canceled = URL::temporarySignedRoute('cancel', now()->addMinutes(360), ['order' => $checkout_id]);
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => $success,
            'cancel_url' => $canceled,
            'currency' => "USD",
            'expires_at' => Carbon::now()->addMinutes(360)->timestamp,
            'line_items' => [
                    [ 
                        'price_data' => [
                        "product" => $this->product->stripe_id,
                        "currency" => 'USD',
                        "unit_amount" =>  $this->product->price * 100,
                    ], 
                'quantity' => 1 
                ],
            ],
            'mode' => 'payment',
        ]);
        Order::create([
            'product_id' => $this->product->id,
            'checkout_id' => $checkout_id,
            'email' => $this->email,
            'price' => number_format($this->product->price, 2),
            'downloads' => 0,
            'url' => $checkout['url']
        ]);
        Mail::to($this->email)->send(new OrderPending($checkout['url']));
        $this->reset(['email']);
        return redirect($checkout['url']);
    }
}