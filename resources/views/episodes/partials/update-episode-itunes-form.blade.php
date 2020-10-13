<x-jet-form-section submit="updateiTunes" class="mt-8">
    <x-slot name="title">
        {{ __('Update iTunes Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can update the information that is generally specific to iTunes.') }}
        {{ __('The extra information you can update here is all optional but allows for more control over publishing your episodes. If you would like to read Apple\'s specification documentation, then here it is. ') }}
        {!! '<a href="https://help.apple.com/itc/podcasts_connect/#/itcb54353390">iTunes Specification Document</a>'  !!}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="publishing_date" value="{{ __('Publishing Date (optional, ex: 01/20/2015 13:00)') }}" />
            <x-jet-input id="publishing_date" type="text" class="mt-1 block w-full" wire:model.defer="publishing_date"  />
            <x-jet-input-error for="publishing_date" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description (optional)') }}" />
            <x-textarea id="description" class="mt-1 block w-full" wire:model="description"  />
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="link" value="{{ __('Episode Link (optional)') }}" />
            <x-jet-input name="link" id="link" type="text" class="mt-1 block w-full" wire:model="link"  />
            <x-jet-input-error for="link" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="updated_image" value="{{ __('Episode Image (optional)') }}" />
            <input type="file" wire:model="updated_image">

            @if ($updated_image != null)
                <img class="w-32 h-32 m-4 rounded-md" src="{{ $updated_image->temporaryUrl() }}">
            @elseif ($image != null && $updated_image == null)
                <img class="w-32 h-32 m-4 rounded-md" src="{{ Storage::url($image) }}">
            @endif

            <x-jet-input-error for="updated_image" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="explicit" value="{{ __('Explicit Content') }}" />
            <label class="flex justify-start items-start">
                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                    <input name="explicit" type="checkbox" class="opacity-0 absolute" wire:model="explicit">
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
            <x-jet-label for="itunes_title" value="{{ __('iTunes Title (optional)') }}" />
            <x-jet-input name="itunes_title" id="itunes_title" type="text" class="mt-1 block w-full" wire:model="itunes_title"  />
            <x-jet-input-error for="itunes_title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_episode_number" value="{{ __('iTunes Episode Number (optional)') }}" />
            <x-jet-input name="itunes_episode_number" id="itunes_episode_number" type="text" class="mt-1 block w-full" wire:model="itunes_episode_number"  />
            <x-jet-input-error for="itunes_episode_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_season_number" value="{{ __('iTunes Season Number (optional)') }}" />
            <x-jet-input name="itunes_season_number" id="itunes_season_number" type="text" class="mt-1 block w-full" wire:model="itunes_season_number"  />
            <x-jet-input-error for="itunes_season_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="itunes_episode_type" value="{{ __('iTunes Type (defaults to full)') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select name="itunes_episode_type" class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="itunes_episode_type">
                    <option disabled>iTunes Type</option>
                    <option value="full">Full</option>
                    <option value="trailer">Trailer</option>
                    <option value="bonus">Bonus</option>
                </select>
            </div>
            <x-jet-input-error for="itunes_episode_type" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>