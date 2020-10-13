<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ _('Podcast') }}
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

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Podcast Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        All provided details relating to the podcast itself.
                    </p>
                </div>
                <div>
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Title
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $podcast->title }}
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Image
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <img src="{{ Storage::url($podcast->image) }}" class="w-32 h-32 rounded-md" />
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Description
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $podcast->description }}
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Language
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $podcast->getLanguage->name }}
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Explicit
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->explicit)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">Explicit</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">Clean</span>
                                @endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Categories
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if (count($podcast->categories) != 0)
                                    @foreach($podcast->categories as $cat)
                                        <div class="text-sm leading-5 text-gray-900">{{ \App\Models\PodcastCategory::where('id', '=', $cat)->first()->name }}</div>
                                    @endforeach
                                @else

                                @endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Link
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->link != null){{ $podcast->link }}@else{{ 'No podcast link specified' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Author
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->author != null)
                                @if(isset($podcast->author['email']))
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-md" src="{{ Gravatar::get($podcast->author['email']) }}">
                                </div>
                                @endif
                                <div class="ml-4">
                                    @if($podcast->author['name'])
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        {{ $podcast->author['name'] }}
                                    </div>
                                    @endif
                                    @if(isset($podcast->author['email']))
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ $podcast->author['email'] }}
                                    </div>
                                    @endif
                                </div>
                                @else
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        Author information not specified
                                    </div>
                                @endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Owner
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->owner != null)
                                    @if(isset($podcast->owner['email']))
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-md" src="{{ Gravatar::get($podcast->owner['email']) }}">
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        @if($podcast->owner['name'])
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{ $podcast->owner['name'] }}
                                            </div>
                                        @endif
                                        @if(isset($podcast->owner['email']))
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ $podcast->owner['email'] }}
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        Owner information not specified
                                    </div>
                                @endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Specific Title
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->itunes_title != null){{ $podcast->itunes_title }}@else{{ 'iTunes title will be the same as title above' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Type
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($podcast->itunes_type == "Episodic"){{ 'bg-blue-100' }}@elseif($podcast->itunes_type == "Serial"){{ 'bg-yellow-100' }}@endif text-black-800">
                                  {{ $podcast->itunes_type }}
                                </span>
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional Copyright
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->copyright != null){{ $podcast->copyright }}@else{{ 'Copyright not specified' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                New Feed Url
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->new_feed_url != null){{ $podcast->new_feed_url }}@else{{ 'This field is only utilized if this podcast is no longer active.' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                iTunes Block
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->itunes_block == false){{ 'iTunes will show this podcast in their catalog.' }}@else{{ 'iTunes has been instructed to hide this podcast.' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                iTunes Completed
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->itunes_completed == false){{ 'Podcast not completed' }}@else{{ 'Podcast completed' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Country Whitelist
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(!empty($podcast->spotify_restriction))
                                    @foreach($podcast->spotify_restriction as $sr)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-black-800">
                                          {{ \App\Models\Country::where('id', '=', $sr)->first()->name }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">
                                        Country not specified
                                    </span>
                                @endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Display Limit
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($podcast->spotify_limit == null || $podcast->spotify_limit < 0){{ 'No limit' }}@else{{ 'Limited to ' .$podcast->spotify_limit . ' ' . Illuminate\Support\Str::plural('podcast', $podcast->spotify_limit)  }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Country of Origin
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if(!empty($podcast->spotify_country_of_origin))
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-black-800">
                                  {{ \App\Models\Country::where('id', '=', $podcast->spotify_country_of_origin)->first()->name }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">
                                    Country not specified
                                </span>
                            @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
