<x-jet-form-section submit="updateItunes" class="mt-8">
    <x-slot name="title">
        {{ __('Update iTunes Specific Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('There are iTunes specific settings that you can configure here, all of these values are optional. ') }}
        {{ __('If you would like to see more information about the settings. ') }}
        {!! '<a href="https://help.apple.com/itc/podcasts_connect/#/itcb54353390">iTunes Specification Document</a>'  !!}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="link" value="{{ __('Podcast Website Link (optional)') }}" />
            <x-jet-input name="link" id="link" type="text" class="mt-1 block w-full" wire:model="link"  />
            <x-jet-input-error for="link" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author.name" value="{{ __('Author Name (optional)') }}" />
            <x-jet-input name="author.name" id="author.name" type="text" class="mt-1 block w-full" wire:model="author.name"  />
            <x-jet-input-error for="author.name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author.email" value="{{ __('Author Email (optional)') }}" />
            <x-jet-input name="author.email" id="author.email" type="text" class="mt-1 block w-full" wire:model="author.email"  />
            <x-jet-input-error for="author.email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="owner.name" value="{{ __('Owner Name (optional)') }}" />
            <x-jet-input name="owner.name" id="owner.name" type="text" class="mt-1 block w-full" wire:model="owner.name"  />
            <x-jet-input-error for="owner.name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="owner.email" value="{{ __('Owner Email (optional)') }}" />
            <x-jet-input name="owner.email" id="owner.email" type="text" class="mt-1 block w-full" wire:model="owner.email"  />
            <x-jet-input-error for="owner.email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_title" value="{{ __('Optional iTunes Title') }}" />
            <x-jet-input id="itunes_title" type="text" class="mt-1 block w-full" wire:model.defer="itunes_title"  />
            <x-jet-input-error for="itunes_title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_type" value="{{ __('iTunes Type (defaults to episodic)') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select name="itunes_type" class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="itunes_type">
                    <option disabled>iTunes Type</option>
                    <option value="episodic">Episodic</option>
                    <option value="serial">Serial</option>
                </select>
            </div>
            <x-jet-input-error for="itunes_type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="copyright" value="{{ __('Copyright (optional)') }}" />
            <x-textarea name="copyright" id="copyright" class="mt-1 block w-full" wire:model="copyright"  />
            <x-jet-input-error for="copyright" class="mt-2" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>