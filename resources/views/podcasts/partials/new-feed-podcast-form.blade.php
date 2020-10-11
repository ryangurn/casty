<x-jet-form-section submit="updateFeedURL" class="mt-8">
    <x-slot name="title">
        {{ __('New Podcast Feed URL') }}
    </x-slot>

    <x-slot name="description">
        {{ __('If you change the URL of your podcast feed, you should provide this value. We use this value to manually change the URL where your podcast is located with Apple Podcast.') }}
        {{ __('Specifying a URL reports the new feed URL to Apple Podcasts and isn\'t displayed in Apple Podcasts.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="new_feed" value="{{ __('New Feed URL (optional)') }}" />
            <x-jet-input name="new_feed" id="new_feed" type="text" class="mt-1 block w-full" wire:model="new_feed" autofocus />
            <x-jet-input-error for="new_feed" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update New Feed URL') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>