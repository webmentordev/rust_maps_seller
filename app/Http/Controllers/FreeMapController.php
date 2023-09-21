<?php

namespace App\Http\Controllers;

use App\Models\FreeMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}