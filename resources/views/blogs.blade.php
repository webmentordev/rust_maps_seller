@extends('layouts.apps')
@section('content')
    <section class="h-[40vh] bg-center bg-cover relative" style="background-image: url({{ asset('assets/store.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-8xl text-white mb-3 leading-[50px] 520:text-6xl">Our Blogs</h1>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="max-w-5xl m-auto py-[120px] px-4"> 
            <h1 class="text-6xl text-white leading-10 text-center mb-6">Blogs</h1>
            <form action="{{ route('map.search') }}" method="POST" class="flex items-center">
                @csrf
                <input type="text" name="search" required autocomplete="off" placeholder="Search blog by title..." class="py-2 px-3 rounded-lg bg-dark-100 border border-white/10 w-full text-white/80">
                <button type="submit" class="py-2 px-4 ml-3 bg-white rounded-lg link">Search</button>
            </form>
            @if (count($blogs))
                <div class="grid grid-cols-2 gap-6 mt-6 m-auto 710:flex 710:flex-col 1000:grid-cols-2 1000:max-w-2xl">
                    @foreach ($blogs as $blog)
                        <div class="bg-dark-100 p-3 rounded-lg 710:max-w-[440px] w-full m-auto">
                            <img src="{{ asset('/storage/'. $blog->thumbnail) }}" class="mb-3 rounded-lg" alt="{{ $blog->name }} Image">
                            <div class="p-3">
                                <span class="link bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">Posted: {{ $blog->created_at->diffForHumans() }}</span>
                                <h3 class="blog-title text-2xl text-white/80">{{ $blog->title }}</h3>
                            </div>
                            <a href="{{ route('blog.read', $blog->slug) }}" class="py-3 blog-title rounded-lg bg-rust inline-block px-4 w-full font-semibold text-center text-white">Read article</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-2xl mt-3 text-center text-white">No blogs data exist at the moment! 😢</p>
            @endif
        </div>
    </section>
    <x-sponsor />
@endsection