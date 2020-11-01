<x-jet-form-section submit="createPage">
    <x-slot name="title">
        {{ __('Page Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new page of content for your episode/podcast.') }}
        {{ __('Creating a page allows you to publish written content that goes along with your podcast or episode.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author" value="{{ __('Author') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select name="author" class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="author">
                    <option>Users</option>
                    @if (!$users->isEmpty())
                        @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <x-jet-input-error for="author" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="team" value="{{ __('Team') }}" />
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select name="team" class="w-full border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none form-input" wire:model="team">
                    <option>Teams</option>
                    @if(!auth()->user()->allTeams()->isEmpty())
                        @foreach(auth()->user()->allTeams() as $team)
                            <option value="{{ $team->id }}">@if($team->personal_team){{ '[Peronsal]: ' }}@endif{{ $team->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <x-jet-input-error for="team" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Page Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title"  />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="slug" value="{{ __('Page Slug') }}" />
            <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="slug"  />
            <x-jet-input-error for="slug" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
