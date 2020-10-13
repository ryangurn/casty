<div class="mt-8">
    <x-jet-action-section>
        <x-slot name="title">
            {{ __($word.' Episode') }}
        </x-slot>

        <x-slot name="description">
            {{ __('If you want your show removed from the Apple directory, ensure that it is blocked.') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Blocking an episode, prevents the episode from appearing in Apple Podcasts.') }}
            </div>

            <div class="mt-5">
                <x-jet-danger-button wire:click="$toggle('{{ 'confirmingEpisode'.$word }}')" wire:loading.attr="disabled">
                    {{ __($word.' Episode') }}
                </x-jet-danger-button>
            </div>

            <!-- Block Episode Confirmation Modal -->
            <x-jet-confirmation-modal wire:model="{{ 'confirmingEpisode'.$word }}">
                <x-slot name="title">
                    {{ __($word.' Episode') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to '.strtolower($word).' this episode from Apple Podcasts?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('{{ 'confirmingEpisode'.$word }}')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="{{ $word.'Episode' }}" wire:loading.attr="disabled">
                        {{ __($word.' Episode') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </x-slot>
    </x-jet-action-section>
</div>