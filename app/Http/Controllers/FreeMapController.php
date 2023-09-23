<?php

namespace App\Http\Controllers;

use App\Models\FreeMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class FreeMapController extends Controller
{
    public function index(){
        return view('admin.free-maps', [
            'maps' => FreeMap::latest()->paginate(100)
        ]);
    }

    public function create(){
        return view('admin.create-free-map');
    }

    function randomNameGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvw.()&@xyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|unique:products,name',
            'size' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp|max:500',
            'map' => 'required|mimes:zip',
        ]);

        FreeMap::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)).'-'.rand(10, 100000),
            'map_size' => $request->size,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail->store('freemap_thumbnails', 'public_disk'),
            'mapfile' => $request->map->store(config('app.free'), 'public_disk'),
            'original_map_name' => $request->map->getClientOriginalName(),
        ]);
        return back()->with('success', 'Free Map has been added!');
    }


    public function update_page($slug){
        $map = FreeMap::where('slug', $slug)->first();
        if($map){
            return view('admin.update-free-map', [
                'product' => $map
            ]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $slug){
        $result = FreeMap::where('slug', $slug)->first();
        if($result){
            $this->validate($request, [
                'name' => 'required',
                'slug' => 'required',
                'size' => 'required|numeric',
                'map' => 'nullable|mimes:zip',
                'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:500'
            ]);

            $thumbnail = null;
            $map_file = null;

            if($request->hasFile('map')){
                $map_file = $request->map->store(config('app.free'), 'public_disk');
            }

            if($request->hasFile('thumbnail')){
                dd(Storage::disk('public_disk')->delete('/storage/'.$result->thumbnail));
                $thumbnail = $request->thumbnail->store('freemap_thumbnails', 'public_disk');
            }

            $array = [
                'name' => $request->name,
                'slug' => $request->slug,
                'map_size' => $request->size,
                'thumbnail' => $thumbnail,
                'mapfile' => $map_file,
            ];

            $result->update(array_filter($array));
            return back()->with('success', 'Free has been updated!');
        }else{
            abort(404, 'Not Found!');
        }
    }

    public function show(){
        SEOMeta::setTitle('Download Free Custom Rust Maps');
        SEOMeta::setCanonical(config('app.url').'/maps/free');
        SEOMeta::setDescription("Download free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");

        OpenGraph::setTitle('Download Free Custom Rust Maps');
        OpenGraph::setDescription("Download free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map"); 
        OpenGraph::setUrl(config('app.url').'/maps/free');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Download Free Custom Rust Maps');
        TwitterCard::setDescription("Download free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Download Free Custom Rust Maps');
        JsonLd::setDescription("Download free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');
        
        return view('free-maps', [
            'maps' => FreeMap::latest()->get()
        ]);
    }

    public function download($slug)
    {
        $map = FreeMap::where('slug', $slug)->first();
        $originalFilePath = Storage::disk('public_disk')->path($map->mapfile);
        $newFileName = $this->randomNameGenerator().'-buyrustmaps-store-'.date("d-m-y").'.zip';
        $headers = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="' . $newFileName . '"',
        ];
        return response()->file($originalFilePath, $headers);
    }

    public function search(Request $request){
        SEOMeta::setTitle('Search Free Custom Rust Maps');
        SEOMeta::setCanonical(config('app.url').'/map/search');
        SEOMeta::setDescription("Search free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");

        OpenGraph::setTitle('Search Free Custom Rust Maps');
        OpenGraph::setDescription("Search free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map"); 
        OpenGraph::setUrl(config('app.url').'/map/search');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');
        

        TwitterCard::setTitle('Search Free Custom Rust Maps');
        TwitterCard::setDescription("Search free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Search Free Custom Rust Maps');
        JsonLd::setDescription("Search free custom rust maps. Rust FPS+, Buildable Roads, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map");
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');

        $product = FreeMap::where('name', 'LIKE', '%'.$request->search.'%')->where('is_active', true)->get();
        return view('free-maps', [
            'maps' => $product
        ]);
    }
}