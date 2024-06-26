@props(['message'])
<div {!! $attributes->merge(['class' => 'bg-black flex items-center text-sm py-5 px-6 font-semibold text-lg fixed bottom-3 left-3 rounded-lg text-white z-50']) !!}>
    <img src="https://api.iconify.design/svg-spinners:90-ring-with-bg.svg?color=%23ffffff" alt="Processing Icon" width="25"> 
    <p class="ml-3">{{ $message }}</p>
</div>