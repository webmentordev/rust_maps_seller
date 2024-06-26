<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index() {
        return response()->view('sitemap', [
            'maps' => Product::all(),
        ])->header('Content-Type', 'text/xml');
    }
}