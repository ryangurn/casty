<x-jet-form-section submit="updateEpisode">
    <x-slot name="title">
        {{ __('Update Basic Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can update the basic details for your podcast. All of the fields in this section are required values.') }}
        {{ __('See down below if you are looking for iTunes or Spotify specific configurations.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Episode Title') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="title"  />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="enclosure" value="{{ __('Episode Audio File (only mp3 due to spotify restrictions)') }}" />
            <input type="file" wire:model="enclosure">
            <x-jet-input-error for="enclosure" class="mt-2" />

            {{--            <div class="mt-8">--}}
            {{--            --}}{{-- this is where the audio component will go later --}}
            {{--            </div>--}}

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>