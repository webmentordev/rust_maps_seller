<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class ReportController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Report Map Bug');
        SEOMeta::setCanonical(config('app.url').'/report');

        OpenGraph::setTitle('Report Map Bug');
        OpenGraph::setUrl(config('app.url').'/report');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Report Map Bug');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Report Map Bug');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');

        return view('report', [
            'maps' => Product::pluck('name')
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'map' => 'required|max:255',
            'message' => 'required|min:10|max:1200',
        ]);

        $result = Product::where('name', $request->map)->first();
        if($result){
            Report::create([
                'name' => $request->name,
                'email' => $request->email,
                'map' => $request->map,
                'message' => $request->message
            ]);
            
            Http::post(config('app.report'), [
                'content' => "**Name**: {$request->name}\n**Email**: {$request->email}\n**Map**: {$request->map}\n**Message**: {$request->message}\n==================\n"
            ]);

            return back()->with('success', "Bug has been reported. We will get it fixed ASAP");
        }else{
            return back()->with('error', "Please put the correct map name!");
        }
    }
}
