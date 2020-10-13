<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ _('Podcasts') }}
                </h2>
            </div>

            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <a class="hidden sm:block ml-3 shadow-sm rounded-md" href="{{ route('podcast.index') }}">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        <!-- Heroicon name: plus-circle -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('update-podcast-basic-form', ['podcast' => $podcast])
            @livewire('update-podcast-itunes-form', ['podcast' => $podcast])
            @livewire('update-podcast-spotify-form', ['podcast' => $podcast])
            @livewire('new-feed-podcast-form', ['podcast' => $podcast])
            @livewire('block-podcast-form', ['podcast' => $podcast])
            @livewire('complete-podcast-form', ['podcast' => $podcast])
            @livewire('delete-podcast-form', ['podcast' => $podcast])
        </div>
    </div>
</x-app-layout>
