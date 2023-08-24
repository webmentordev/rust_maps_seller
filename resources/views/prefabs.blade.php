@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-5xl m-auto pt-[150px] pb-12 px-4">
            <div class=" border border-white/10 p-12 535px:p-3 rounded-lg bg-dark-100">
                <h1 class="text-4xl mb-2 text-white">Combined Outpost & Bandit Camp Design</h1>
                <p class="text-white/80 mb-2">The following is the design that we use for the outpost combined with the bandit camp. It includes everything: vending machines, an Airwolf Vendor (helicopter), poker and slot machines, etc.</p>
                
                <div class="grid grid-cols-2 gap-6 mb-12 760:flex 760:flex-col">
                    <a target="_blank" href="{{ asset('assets/prefabs/1.jpg') }}" class="col-span-2"><img src="{{ asset('assets/prefabs/1.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 1"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/2.jpg') }}"><img src="{{ asset('assets/prefabs/2.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 2"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/3.jpg') }}"><img src="{{ asset('assets/prefabs/3.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 3"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/4.jpg') }}" class="col-span-2"><img src="{{ asset('assets/prefabs/4.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 4"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/5.jpg') }}" class=""><img src="{{ asset('assets/prefabs/5.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 5"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/6.jpg') }}" class=""><img src="{{ asset('assets/prefabs/6.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 6"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/7.jpg') }}" class="col-span-2"><img src="{{ asset('assets/prefabs/7.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 7"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/8.jpg') }}" class=""><img src="{{ asset('assets/prefabs/8.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 8"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/9.jpg') }}" class=""><img src="{{ asset('assets/prefabs/9.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 9"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/10.jpg') }}" class="col-span-2"><img src="{{ asset('assets/prefabs/10.jpg') }}" class="w-full rounded-l" alt="Outpost Image 10"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/11.jpg') }}" class=""><img src="{{ asset('assets/prefabs/11.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 11"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/12.jpg') }}" class=""><img src="{{ asset('assets/prefabs/12.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 12"></a>
                    <a target="_blank" href="{{ asset('assets/prefabs/13.jpg') }}" class="col-span-2"><img src="{{ asset('assets/prefabs/13.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 13"></a>
                </div>
                <h2 class="text-3xl mb-2 text-white">Example Of Custom Monuments</h2>
                <p class="text-white/80 mb-2">This is a rough example of the custom monuments that we use in our maps. Some maps can have more than what is listed here, potentially featuring just one type of monument.</p>
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <a target="_blank" href="{{ asset('assets/prefabs/14.jpg') }}" class="w-full relative">
                        <h3 class="top-3 left-3 bg-rust-green text-white rounded-lg absolute py-2 px-4">Combined Oil Rigs</h3>
                        <img src="{{ asset('assets/prefabs/14.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 14">
                    </a>
                    <a target="_blank" href="{{ asset('assets/prefabs/15.jpg') }}" class="w-full relative">
                        <h3 class="top-3 left-3 bg-rust-green text-white rounded-lg absolute py-2 px-4">Cobalt Office</h3>
                        <img src="{{ asset('assets/prefabs/15.jpg') }}" class="w-full rounded-lg" alt="Outpost Image 15">
                    </a>
                    
                </div>
            
            </div>
        </div>
    </section>
@endsection