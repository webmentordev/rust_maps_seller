<section class="w-full h-screen flex items-center justify-center">
    <div class="max-w-lg p-6 bg-white w-full rounded-xl shadow-md">
        <form wire:submit='sendMessage' method="post">
            <h2 class="text-4xl mb-1 font-semibold">Contact Us!</h2>
            <p class="mb-1 pb-4 border-gray-100 border-b text-gray-600">You can contact us here or send us an email on <strong class="text-black">support(at)customrustprint.online</strong></p>
            @session('success')
                <x-success message="{{ $value }}" />
            @endsession
            <div class="w-full mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="w-full mb-4">
                <x-input-label for="subject" :value="__('Subject')" />
                <x-text-input id="subject" class="block mt-1 w-full" type="text" wire:model="subject" required />
                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
            </div>
            <div class="w-full mb-4">
                <x-input-label for="message" :value="__('Message')" />
                <x-textarea id="message" class="block mt-1 w-full" type="text" wire:model="message" required />
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
            </div>
            <x-primary-button class="mt-1">
                {{ __('Send') }}
            </x-primary-button>
        </form>
    </div>
</section>
