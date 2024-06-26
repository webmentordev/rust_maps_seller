<?php

namespace App\Livewire;

use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Contact extends Component
{
    public $name, $email, $subject, $message;
    
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'email' => 'required|max:255|email',
            'subject' => 'required|min:5|max:255',
            'message' => 'required|min:5',
        ];
    }


    public function mount(){
        SEOMeta::setTitle("Contact CustomRustPrints");
        SEOMeta::setDescription("Find the contact details of CustomRustPrints on this page. Contact CustomRustPrints discord fast communication");
        SEOMeta::setCanonical(config('app.url')."/contact");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "CustomRustPrints");
        SEOMeta::addMeta("application-name", "CustomRustPrints");
        
        OpenGraph::setTitle("Contact CustomRustPrints");
        OpenGraph::setDescription("Find the contact details of CustomRustPrints on this page. Contact CustomRustPrints discord fast communication"); 
        OpenGraph::setUrl(config('app.url')."/contact");
        OpenGraph::addProperty("type", "WebPage");
        OpenGraph::addProperty("locale", "en_US");
        OpenGraph::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
        
        TwitterCard::setTitle("Contact CustomRustPrints");
        TwitterCard::setSite("customrustprint");
        TwitterCard::setImage(config('app.url')."/images/customrustprints-banner.png");
        TwitterCard::setDescription("Find the contact details of CustomRustPrints on this page. Contact CustomRustPrints discord fast communication");
        
        JsonLd::setTitle("Contact CustomRustPrints");
        JsonLd::setDescription("Find the contact details of CustomRustPrints on this page. Contact CustomRustPrints discord fast communication");
        JsonLd::setType("WebPage");
        JsonLd::addImage(config('app.url')."/images/customrustprints-banner.png", ["height" => 1032, "width" => 541]);
    }

    public function render()
    {
        return view('livewire.contact');
    }

    public function sendMessage(){
        $this->validate();
        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ]);
        $this->reset();
        session()->flash('success', 'Message has been sent!');
    }
}