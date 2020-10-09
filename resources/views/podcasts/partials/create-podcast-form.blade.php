<x-jet-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Podcast Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new podcast and provide the information that it takes to do so.') }}
        {{ __('We will add episodes later but this is just the podcast itself for now.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Podcast Title') }}" />
            <x-jet-input name="title" id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-textarea name="description" id="description" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="image" value="{{ __('Podcast Image') }}" />
            <x-file-upload text="Select an image" />
            <x-jet-input-error for="image" class="mt-2" />
        </div>

        @if(isset($languages) && !$languages->isEmpty())
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="language" value="{{ __('Language') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select class="w-full border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input">
                    <option disabled>Podcast Language</option>
                    @foreach($languages as $language)
                    <option value="{{ $language->iso_639_1 }}">{{ $language->name }}</option>
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
                <select name="categories[]" class="form-multiselect block w-full" multiple id="categories[]">
                    <option disabled>Podcast Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">@if($category->category != null){{ '[' . $category->category->name . '] - ' }}@endif{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-jet-input-error for="categories[]" class="mt-2" />
        </div>
        @endif

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="explicit" value="{{ __('Explicit Content') }}" />
            <label class="flex justify-start items-start">
                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                    <input name="explicit" type="checkbox" class="opacity-0 absolute">
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

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="link" value="{{ __('Podcast Website Link (optional)') }}" />
            <x-jet-input name="link" id="link" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="link" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author[name]" value="{{ __('Author Name (optional)') }}" />
            <x-jet-input name="author[name]" id="author[name]" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="author[name]" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author[email]" value="{{ __('Author Email (optional)') }}" />
            <x-jet-input name="author[email]" id="author[email]" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="author[email]" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="owner[name]" value="{{ __('Owner Name (optional)') }}" />
            <x-jet-input name="owner[name]" id="owner[name]" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="owner[name]" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="owner[email]" value="{{ __('Owner Email (optional)') }}" />
            <x-jet-input name="owner[email]" id="owner[email]" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="owner[email]" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_title" value="{{ __('iTunes Title (optional)') }}" />
            <x-jet-input name="itunes_title" id="itunes_title" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="itunes_title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_type" value="{{ __('iTunes Type (defaults to episodic)') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select name="categories" class="w-full border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input">
                    <option disabled>iTunes Type</option>
                    <option value="episodic">Episodic</option>
                    <option value="serial">Serial</option>
                </select>
            </div>
            <x-jet-input-error for="itunes_type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="copyright" value="{{ __('Copyright (optional)') }}" />
            <x-textarea name="copyright" id="copyright" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="copyright" class="mt-2" />
        </div>

        @if(isset($countries) && !$countries->isEmpty())
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="countries[]" value="{{ __('Spotify Country Whitelist (optional)') }}" />
                <div class="relative inline-flex">
                    <select name="countries[]" class="form-multiselect block w-full" multiple id="my-multiselect">
                        <option disabled>Countries</option>
                        @foreach($countries as $countries)
                            <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="countries" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_limit" value="{{ __('Spotify Display Limit (optional)') }}" />
            <x-jet-input name="spotify_limit" id="spotify_limit" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="spotify_limit" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
