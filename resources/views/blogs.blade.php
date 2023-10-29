@extends('layouts.apps')
@section('content')
    <section class="h-[40vh] bg-center bg-cover relative" style="background-image: url({{ asset('assets/store.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-8xl text-white mb-3 leading-[50px] 520:text-6xl">Rust Related Blogs</h1>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="max-w-4xl m-auto py-[120px] px-4"> 
            <h2 class="text-6xl text-white leading-10 text-center mb-6">Our Blogs</h2>
            <form action="{{ route('blog.search') }}" method="POST" class="flex items-center">
                @csrf
                <input type="text" name="search" required autocomplete="off" placeholder="Search blog by title..." class="py-2 px-3 rounded-lg bg-dark-100 border border-white/10 w-full text-white/80">
                <button type="submit" class="py-2 px-4 ml-3 bg-white rounded-lg link">Search</button>
            </form>
            @if (count($blogs))
                <div class="grid grid-cols-2 gap-6 mt-6 m-auto 710:flex 710:flex-col 1000:grid-cols-2 1000:max-w-2xl">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blog.read', $blog->slug) }}" class="bg-dark-100 p-3 rounded-lg 710:max-w-[440px] w-full m-auto">
                            <img data-src="{{ asset('/storage/'. $blog->thumbnail) }}" class="mb-3 lazyload rounded-lg" alt="{{ $blog->name }} Image">
                            <div class="py-3 px-2">
                                <span class="link rounded-md bg-dark text-sm text-gray-200 py-2 px-3 mb-3 inline-block">Posted: {{ $blog->created_at->diffForHumans() }}</span>
                                @if ($blog->created_at != $blog->updated_at)
                                    <span class="link rounded-md bg-rust-green text-sm text-gray-200 py-2 px-3 mb-3 inline-block">Updated: {{ $blog->updated_at->diffForHumans() }}</span>
                                @endif
                                <h3 class="blog-title text-xl text-white/80">{{ $blog->title }}</h3>
                            </div>
                            <span class="py-3 blog-title rounded-lg bg-rust inline-block px-4 w-full font-semibold text-center text-white">Read article</span>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-2xl mt-3 text-center text-white">No blogs data exist at the moment! 😢</p>
            @endif
        </div>
    </section>
    {{-- <x-sponsor /> --}}
@endsection