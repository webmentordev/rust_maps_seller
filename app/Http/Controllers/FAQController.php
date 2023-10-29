<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class FAQController extends Controller
{
    public function index(){

        SEOMeta::setTitle('FAQs About Custom Rust Maps');
        SEOMeta::setDescription("List of Frequently asked questions about Custom Rust Maps like what is fps+ map, average map size e.t.c");

        OpenGraph::setTitle('FAQs About Custom Rust Maps');
        OpenGraph::setDescription("List of Frequently asked questions about Custom Rust Maps like what is fps+ map, average map size e.t.c");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle('FAQs About Custom Rust Maps');
        TwitterCard::setDescription("List of Frequently asked questions about Custom Rust Maps like what is fps+ map, average map size e.t.c");
        TwitterCard::setSite('@buyrustmapsstore');

        JsonLd::setTitle('FAQs About Custom Rust Maps');
        JsonLd::setDescription("List of Frequently asked questions about Custom Rust Maps like what is fps+ map, average map size e.t.c");
        JsonLd::setType("WebSite");

        return view('faqs');
    }
}