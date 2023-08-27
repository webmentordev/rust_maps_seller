<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BlogController extends Controller
{
    public function index(){
        return view('blogs', [
            'blogs' => Blog::latest()->paginate(10)
        ]);
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filename = $request->file('upload')->storeAs('blog_images', str_replace(' ', '-', $request->file('upload')->getClientOriginalName()), 'public_disk');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'.$filename); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function create(){
        return view('blog.create-blog');
    }

    public function show(){
        return view('blog.blogs', [
            'blogs' => Blog::latest()->paginate(50)
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,webp|max:50|unique:blogs',
            'description' => 'required',
            'body' => 'required',
        ]);
        Blog::create([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail->storeAs('blog_small', str_replace(' ', '-', $request->thumbnail->getClientOriginalName()), 'public_disk'),
            'description' => $request->description,
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'body' => $request->body
        ]);
        return back()->with('success', 'Blog has been uploaded!');
    }


    public function read(Blog $blog){
        if($blog){
            SEOMeta::setTitle($blog->title);
            SEOMeta::setCanonical(config('app.url').'/blog/'.$blog->slug);
            SEOMeta::setRobots('index, follow');
            SEOMeta::addMeta('apple-mobile-web-app-title', 'BuyRustMapsStore');
            SEOMeta::addMeta('application-name', 'BuyRustMapsStore');
            SEOMeta::setDescription($blog->description);

            OpenGraph::setTitle($blog->title);
            OpenGraph::setUrl(config('app.url').'/blog/'.$blog->slug);
            OpenGraph::addProperty("type", "article");
            OpenGraph::addProperty("locale", "eu");
            OpenGraph::addImage(config('app.url').'/storage/'.$blog->thumbnail);
            OpenGraph::setDescription($blog->description); 

            TwitterCard::setTitle($blog->title);
            TwitterCard::setSite('@buyrustmapsstore');
            TwitterCard::setImage(config('app.url').'/storage/'.$blog->thumbnail);
            TwitterCard::setDescription($blog->description);

            JsonLd::setTitle($blog->title);
            JsonLd::setType("Article");
            JsonLd::addImage(config('app.url').'/storage/'.$blog->thumbnail);
            JsonLd::setDescription($blog->description);
            
            return view('read-blog', [
                'blog' => $blog
            ]);
        }else{
            abort(404, 'Not Found!');
        }
    }
}