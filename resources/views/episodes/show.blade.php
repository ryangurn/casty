<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ _('Episode') }}
                </h2>
            </div>

            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <a class="hidden sm:block ml-3 shadow-sm rounded-md" href="{{ route('episode.index', $podcast->id) }}">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        <!-- Heroicon name: plus-circle -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back
                    </button>
                </a>

                <a class="hidden sm:block ml-3 shadow-sm rounded-md" href="{{ route('episode.edit', [$podcast->id, $episode->id]) }}">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        <!-- Heroicon name: plus-circle -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
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
                        Episode Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        All provided details relating to the episode itself.
                    </p>
                </div>
                <div>
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Podcast
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $podcast->title }}
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Title
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $episode->title }}
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Audio
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                Audio Player Here Soonish
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Publishing Date
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->publishing_date) && $episode->publishing_date != null){{ date("m/d/Y H:i", $episode->publishing_date) }}@else
                                {{ 'No publishing date yet' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Description
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->description) && $episode->description != null){{ $episode->description }}@else
                                    {{ 'No description yet' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Link
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->link) && $episode->link != null){{ $episode->link }}@else
                                    {{ 'No link yet' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Image
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->image) && $episode->image != null)
                                <img src="{{ Storage::url($episode->image) }}" class="w-32 h-32 rounded-md" />
                                @else
                                None Uploaded
                                @endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Explicit
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->explicit)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">Explicit</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">Clean</span>
                                @endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Specific Title
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->itunes_title != null){{ $episode->itunes_title }}@else{{ 'iTunes title will be the same as title above' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Season Number
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->itunes_season_number != null){{ $episode->itunes_season_number }}@else{{ 'No season number provided' }}@endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Episode Number
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->itunes_episode_number != null){{ $episode->itunes_episode_number }}@else{{ 'No episode number provided' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Optional iTunes Type
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($episode->itunes_episode_type == "Full"){{ 'bg-blue-100' }}@elseif($episode->itunes_episode_type == "Trailer"){{ 'bg-yellow-100' }}@elseif($episode->itunes_episode_type == "Bonus"){{ 'bg-purple-100' }}@endif text-black-800">
                                  {{ $episode->itunes_episode_type }}
                                </span>
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                iTunes Block
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->itunes_block == false){{ 'iTunes will show this episode in their catalog.' }}@else{{ 'iTunes has been instructed to hide this episode.' }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Episode Order Number
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($episode->order == null){{ 'No Order Number' }}@else{{ $episode->order }}@endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Episode Available During:
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->spotify_start, $episode->spotify_end) && $episode->spotify_start != null && $episode->spotify_end != null)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                        Start: {{ date("m/d/Y H:i", $episode->spotify_start) }}
                                    </span>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                        End: {{ date("m/d/Y H:i", $episode->spotify_end) }}
                                    </span>
                                @else
                                    {{ 'No availability period provided' }}
                                @endif
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Chapters
                            </dt>
                            <dd class="mt-1 flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->spotify_chapters) && $episode->spotify_chapters != null)
                                    <ul>
                                    @foreach($episode->spotify_chapters as $sc)
                                        <li>{{ $sc['start'] }} seconds - "{{ $sc['title'] }}" @if(isset($sc['href']))Link:({{ $sc['href'] }})@endif @if(isset($sc['image']))Image:[{{ $sc['image'] }}]@endif</li>
                                    @endforeach
                                    </ul>
                                @else
                                    {{ 'No chapters provided' }}
                                @endif
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Spotify Keywords
                            </dt>
                            <dd class="mt-1  flex text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(isset($episode->spotify_keywords) && $episode->spotify_keywords != null)
                                    {{ implode(", ", $episode->spotify_keywords) }}
                                @else
                                    {{ 'No keywords provided' }}
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
