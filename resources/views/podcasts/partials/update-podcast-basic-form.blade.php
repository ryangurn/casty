<x-jet-form-section submit="updatePodcast">
    <x-slot name="title">
        {{ __('Update Basic Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can update the basic details for your podcast. All of the fields in this section are required values.') }}
        {{ __('See down below if you are looking for iTunes or Spotify specific configurations.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Podcast Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autofocus />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-textarea id="description" class="mt-1 block w-full" wire:model="description" autofocus />
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="image" value="{{ __('Podcast Image') }}" />
            <input type="file" wire:model="updated_image">

            @if ($updated_image != null)
                <img class="w-32 h-32 m-4 rounded-md" src="{{ $image->temporaryUrl() }}">
            @elseif ($image != null)
                <img class="w-32 h-32 m-4 rounded-md" src="{{ Storage::url($image) }}">
            @endif

            <x-jet-input-error for="updated_image" class="mt-2" />
        </div>

        @if(isset($languages) && !$languages->isEmpty())
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="language" value="{{ __('Language') }}" />
                <div class="relative inline-flex">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="language">
                        <option disabled>Podcast Language</option>
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="language" class="mt-2" />
            </div>
        @endif

        @if(isset($categories) && !$categories->isEmpty())
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="categories[]" value="{{ __('Categories') }}" />
                <div class="relative inline-flex">
                    <select name="categories[]" class="form-multiselect block w-full" multiple id="categories[]" wire:model="podcast_categories">
                        <option disabled>Podcast Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">@if($category->category != null){{ '[' . $category->category->name . '] - ' }}@endif{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="podcast_categories" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="explicit" value="{{ __('Explicit Content') }}" />
            <label class="flex justify-start items-start">
                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                    <input name="explicit" type="checkbox" class="opacity-0 absolute" wire:model="explicit">
                    <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                </div>
                <div class="select-none">Explicit Content</div>
            </label>

            <style>
                input:checked + svg {
                    display: block;
                }
            </style>
            <x-jet-input-error for="explicit" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>