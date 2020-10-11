<x-jet-form-section submit="updateSpotify" class="mt-8">
    <x-slot name="title">
        {{ __('Update Spotify Specific Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('There are Spotify specific settings that you can configure here, all of these values are optional. ') }}
        {{ __('If you would like to see more information about the settings. ') }}
        {!! '<a href="https://drive.google.com/file/d/1wjls5eJJwY0TUXk1pf3GV2J-bM0hV0JL/view">Spotify Specification Document</a>'  !!}
    </x-slot>

    <x-slot name="form">

        @if(isset($countries) && !$countries->isEmpty())
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="countries[]" value="{{ __('Spotify Country Whitelist (optional)') }}" />
                <div class="relative inline-flex">
                    <select class="form-multiselect block w-full" multiple id="my-multiselect" wire:model="spotify_countries">
                        <option value="">Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="spotify_countries" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_limit" value="{{ __('Spotify Display Limit (optional)') }}" />
            <x-jet-input name="spotify_limit" id="spotify_limit" type="text" class="mt-1 block w-full" wire:model="spotify_limit" autofocus />
            <x-jet-input-error for="spotify_limit" class="mt-2" />
        </div>

        @if(isset($countries) && !$countries->isEmpty())
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="spotify_origin" value="{{ __('Spotify Country of Origin (optional)') }}" />
                <div class="relative inline-flex">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="spotify_origin">
                        <option value="">Origin Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="spotify_origin" class="mt-2" />
            </div>
        @endif

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>