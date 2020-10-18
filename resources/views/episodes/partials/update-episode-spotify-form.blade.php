<x-jet-form-section submit="updateSpotify" class="mt-8">
    <x-slot name="title">
        {{ __('Update Spotify Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can update the information that is generally specific to Spotify.') }}
        {{ __('The extra information you can update here is all optional but allows for more control over publishing your episodes. If you would like to read Spotify\'s specification documentation, then here it is. ') }}
        {!! '<a href="https://drive.google.com/file/d/1wjls5eJJwY0TUXk1pf3GV2J-bM0hV0JL/view">Spotify Specification Document</a>'  !!}
    </x-slot>

    <x-slot name="form">

        @if(isset($countries) && !$countries->isEmpty())
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="spotify_countries" value="{{ __('Spotify Country Whitelist (optional)') }}" />
                <div class="relative inline-flex">
                    <select class="form-multiselect block w-full" multiple id="my-multiselect" wire:model="spotify_countries">
                        <option disabled>Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="spotify_countries" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_order" value="{{ __('Spotify Order Number (optional)') }}" />
            <x-jet-input name="spotify_order" id="spotify_order" type="text" class="mt-1 block w-full" wire:model="spotify_order"  />
            <x-jet-input-error for="spotify_order" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_start" value="{{ __('Spotify Viewable Start Time (optional, ex: 01/20/2015 13:00)') }}" />
            <x-jet-input id="spotify_start" type="text" class="mt-1 block w-full" wire:model.defer="spotify_start"  />
            <x-jet-input-error for="spotify_start" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_end" value="{{ __('Spotify Viewable End Time (optional, ex: 01/20/2015 13:00)') }}" />
            <x-jet-input id="spotify_end" type="text" class="mt-1 block w-full" wire:model.defer="spotify_end"  />
            <x-jet-input-error for="spotify_end" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_chapters" value="{{ __('Spotify Chapters (optional and in json form)') }} [{'start':'0', 'title':'Opening'}, ...]" />
            <x-textarea name="spotify_chapters" id="spotify_chapters" class="mt-1 block w-full" wire:model="spotify_chapters"  />
            <x-jet-input-error for="spotify_chapters" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spotify_keywords" value="{{ __('Spotify Keywords (optional, comma separated)') }}" />
            <x-jet-input id="spotify_keywords" type="text" class="mt-1 block w-full" wire:model.defer="spotify_keywords"  />
            <x-jet-input-error for="spotify_keywords" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>