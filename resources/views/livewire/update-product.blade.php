<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mt-[50px]">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div wire:loading wire:target='updateProduct'>
                <x-processing message="Updating...." />
            </div>
            <form wire:submit.prevent='updateProduct' enctype="multipart/form-data">
                <div x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <h1 class="mb-3 text-3xl">Update product</h1>
                    @session('success')
                        <x-success message="{{ $value }}" />
                    @endsession
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model.live="title" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" wire:model.live="slug" required />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" wire:model.live="price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="size" :value="__('Size')" />
                            <x-text-input id="size" class="block mt-1 w-full" type="number" wire:model.live="size" required />
                            <x-input-error :messages="$errors->get('size')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full mb-4">
                        <x-input-label for="seo" :value="__('SEO Description')" />
                        <x-text-input id="seo" class="block mt-1 w-full" type="text" wire:model.live="seo" required />
                        <x-input-error :messages="$errors->get('seo')" class="mt-2" />
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full rounded-none" type="file" wire:model="image" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="file" :value="__('Map File')" />
                            <x-text-input id="file" class="block mt-1 w-full rounded-none" type="file" wire:model="file" />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full mb-4" wire:ignore>
                            <textarea id="editor" wire:model.live='content'></textarea>
                    </div>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                        <button type="button" wire:click="$cancelUpload('file')" class="p-2 bg-red-600 text-white ml-3 font-semibold">Cancel Upload</button>
                    </div>
                    <div x-show="!uploading">
                        <x-primary-button class="mt-1">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.instances.editor.on('change', function(){
            @this.set('content', CKEDITOR.instances.editor.getData())
        })
    </script>
</div>