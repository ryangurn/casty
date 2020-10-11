<div class="mt-8">
    <x-jet-action-section>
        <x-slot name="title">
            {{ __($word.' Podcast') }}
        </x-slot>

        <x-slot name="description">
            {{ __('If you will never publish another episode to your show, then mark it complete.') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Specifying a podcast is complete indicates that a podcast is complete and you will not post any more episodes in the future.') }}
            </div>

            <div class="mt-5">
                <x-jet-danger-button wire:click="$toggle('{{ 'confirmingPodcast'.$word }}')" wire:loading.attr="disabled">
                    {{ __($word.' Podcast') }}
                </x-jet-danger-button>
            </div>

            <!-- Block Podcast Confirmation Modal -->
            <x-jet-confirmation-modal wire:model="{{ 'confirmingPodcast'.$word }}">
                <x-slot name="title">
                    {{ __($word.' Podcast') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to '.strtolower($word).' this podcast from Apple Podcasts?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('{{ 'confirmingPodcast'.$word }}')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="{{ $word.'Podcast' }}" wire:loading.attr="disabled">
                        {{ __($word.' Podcast') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </x-slot>
    </x-jet-action-section>
</div>