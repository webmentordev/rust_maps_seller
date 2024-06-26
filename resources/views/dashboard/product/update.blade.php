<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('update.product', $product->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <h1 class="mb-3 text-3xl">Update the product</h1>
                    @session('success')
                        <x-success message="{{ $value }}" />
                    @endsession
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$product->title" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="$product->slug" required />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="$product->price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="size" :value="__('Size')" />
                            <x-text-input id="size" class="block mt-1 w-full" type="number" name="size" :value="$product->size" required />
                            <x-input-error :messages="$errors->get('size')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full mb-4">
                        <x-input-label for="seo" :value="__('SEO Description')" />
                        <x-text-input id="seo" class="block mt-1 w-full" type="text" name="seo" :value="$product->seo" required />
                        <x-input-error :messages="$errors->get('seo')" class="mt-2" />
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="w-full">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full rounded-none" type="file" name="image" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="file" :value="__('Map File')" />
                            <x-text-input id="file" class="block mt-1 w-full rounded-none" type="file" name="file" />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full mb-4">
                        <textarea id="editor" name="description">{{ $product->description }}</textarea>
                    </div>
                    <x-primary-button class="mt-1">
                        {{ __('Update') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
    </div>
</x-app-layout>