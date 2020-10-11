<div class="mt-8">
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Delete Podcast') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Permanently delete this podcast.') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Once a podcast is deleted, all of its resources and data will be permanently deleted. Before deleting this podcast, please gather any data or information regarding this team that you wish to retain.') }}
            </div>

            <div class="mt-5">
                <x-jet-danger-button wire:click="$toggle('confirmingPodcastDeletion')" wire:loading.attr="disabled">
                    {{ __('Delete Podcast') }}
                </x-jet-danger-button>
            </div>

            <!-- Delete Podcast Confirmation Modal -->
            <x-jet-confirmation-modal wire:model="confirmingPodcastDeletion">
                <x-slot name="title">
                    {{ __('Delete Podcast') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete this podcast? Once a podcast is deleted, all of its resources and data will be permanently deleted.') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingPodcastDeletion')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="deletePodcast" wire:loading.attr="disabled">
                        {{ __('Delete Podcast') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </x-slot>
    </x-jet-action-section>
</div>