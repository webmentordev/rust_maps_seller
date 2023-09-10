@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-5xl m-auto pt-[150px] pb-12 px-4">
            <div class="border border-white/10 p-12 690px:p-0 690px:bg-transparent 690px:border-none rounded-lg bg-dark-100">
                <h1 class="blog-title text-3xl mb-2 text-white">{{ $blog->title }}</h1>
                <ul class="flex flex-col mb-3 text-rust">
                    <span class="blog-title">Posted: 
                        <time class="created" datetime="{{ $blog->created_at->tz('UTC')->toAtomString() }}" itemprop="dateCreated">{{ $blog->created_at->format('M d, Y H:i:s A') }}</time> (UTC)
                    </span>
                    @if ($blog->created_at != $blog->updated_at)
                        <span class="blog-title">Last Updated:
                            <time class="updated" datetime="{{ $blog->updated_at->tz('UTC')->toAtomString() }}" itemprop="dateModified">{{ $blog->updated_at->format('M d, Y H:i:s A') }}</time> (UTC)
                        </span>
                    @endif
                </ul>
                <main class=" py-2 blog">
                    <img src="{{ asset('/storage/'.$blog->thumbnail) }}" title="{{ $blog->title }}" alt="{{ $blog->title }} Image">
                    {!! $blog->body !!}
                </main>
            </div>
        </div>
    </section>
@endsection