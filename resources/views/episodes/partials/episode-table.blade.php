<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-gray-200 table-auto">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Episode</th>
                        <th class="py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">iTunes</th>
                        <th class="py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Spotify</th>
                        <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if (isset($episodes) && !$episodes->isEmpty())
                            @foreach($episodes as $episode)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('episode.show', [$episode->podcast->id, $episode->id]) }}" class="flex items-center">
                                            @if (isset($episode->image) && $episode->image != null)
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-md" src="{{ Storage::url($episode->image) }}" alt="">
                                            </div>
                                            @endif
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                    {{ $episode->title }}
                                                </div>
                                                @if(isset($episode->description) && $episode->description != null)
                                                <div class="text-sm leading-5 text-gray-500">
                                                    @if(strlen($episode->description) > 50)
                                                        {{ substr($episode->description, 0, 50) }}...
                                                    @else
                                                        {{ $episode->description }}
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px=6 py-4 whitespace-no-wrap">
                                        <div class="flex flex-wrap">
                                        @if(isset($episode->itunes_title) && $episode->itunes_title != null)
                                            <div class="rounded-full px-4 mr-2 mt-2 bg-blue-600 text-white p-2 rounded leading-none flex items-center">
                                                Title: {{ $episode->itunes_title }}
                                            </div>
                                        @endif
                                        @if(isset($episode->itunes_episode_number) && $episode->itunes_episode_number != null)
                                            <div class="rounded-full px-4 mr-2 mt-2 bg-red-600 text-white p-2 rounded leading-none flex items-center">
                                                Episode #: {{ $episode->itunes_episode_number }}
                                            </div>
                                        @endif
                                        @if(isset($episode->itunes_episode_type) && $episode->itunes_episode_type != null)
                                            <div class="rounded-full px-4 mr-2 mt-2 bg-orange-600 text-white p-2 rounded leading-none flex items-center">
                                                Type: {{ $episode->itunes_episode_type }}
                                            </div>
                                        @endif
                                        </div>
                                    </td>
                                    <td class="px=6 py-4 whitespace-no-wrap">
                                        <div class="flex flex-wrap">
                                        @if(!empty($podcast->spotify_restriction))
                                            @foreach($podcast->spotify_restriction as $sr)
                                                <span class="rounded-full px-4 mr-2 mt-2 bg-blue-500 text-white p-2 rounded  leading-none flex items-center">
                                                  {{ \App\Models\Country::where('id', '=', $sr)->first()->name }}
                                                </span>
                                            @endforeach
                                        @endif
                                        @if(isset($episode->order) && $episode->order != null)
                                            <span class="rounded-full px-4 mr-2 mt-2 bg-red-600 text-white p-2 rounded  leading-none flex items-center">
                                                Order: {{ $episode->order }}
                                            </span>
                                        @endif
                                        @if(isset($episode->spotify_start, $episode->spotify_end) && $episode->spotify_start != null && $episode->spotify_end != null)
                                            <span class="rounded-full px-4 mr-2 mt-2 bg-orange-600 text-white p-2 rounded  leading-none flex items-center">
                                                Starting: {{ date("m/d/Y H:i", $episode->spotify_start) }}
                                            </span>
                                            <span class="rounded-full px-4 mr-2 mt-2 bg-orange-600 text-white p-2 rounded  leading-none flex items-center">Ending: {{ date("m/d/Y H:i", $episode->spotify_end) }}
                                            </span>
                                        @endif
                                        @if(isset($episode->spotify_chapters) && $episode->spotify_chapters != null)
                                            <span class="rounded-full px-4 mr-2 mt-2 bg-green-600 text-white p-2 rounded  leading-none flex items-center">
                                                Chapters: {{ count($episode->spotify_chapters) }}
                                            </span>
                                        @endif
                                        @if(isset($episode->spotify_keywords) && $episode->spotify_keywords != null && $episode->spotify_keywords[0] != "")
                                            <span class="rounded-full px-4 mr-2 mt-2 bg-purple-600 text-white p-2 rounded  leading-none flex items-center">
                                                Keywords: {{ implode(", ", $episode->spotify_keywords) }}
                                            </span>
                                        @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        <a href="{{ route('episode.edit', [$episode->podcast->id, $episode->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap" colspan="5">{{ __('No episodes setup yet. :(') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>