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

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="categories" value="{{ __('Categories') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select class="w-full border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input">
                    <option disabled>Podcast Categories</option>

                </select>
            </div>
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
