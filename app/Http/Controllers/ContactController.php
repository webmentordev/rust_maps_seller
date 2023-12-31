<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class ContactController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Contact');
        SEOMeta::setCanonical(config('app.url').'/contact');

        OpenGraph::setTitle('Contact');
        OpenGraph::setUrl(config('app.url').'/contact');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Contact');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Contact');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');
        return  view('contact');
    }

    public function store(Request $request){
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha to proceed');
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|max:255',
                'message' => 'required|min:10|max:1200',
            ]);
    
            $message_array = explode(' ', strtolower($request->message));
            if(in_array('google', $message_array) || in_array('seo', $message_array) || in_array('traffic', $message_array) || in_array('search', $message_array)){
                return back()->with('success', 'Contact message sent!');
            }
    
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            
            Http::post(config('app.contact'), [
                'content' => "**Name**: {$request->name}\n**Email**: {$request->email}\n**Subject**: {$request->subject}\n**Message**: {$request->message}\n==================\n"
            ]);
            return back()->with('success', 'Contact message sent! We will contact you shortly');

        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }
    }
}
