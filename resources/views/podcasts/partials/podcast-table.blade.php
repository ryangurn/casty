<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Podcast</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Categories</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Language</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Info</th>
                        <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if (isset($podcasts) && !$podcasts->isEmpty())
                        @foreach($podcasts as $podcast)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <a href="{{ route('podcast.show', $podcast->id) }}" class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-md" src="{{ Storage::url($podcast->image) }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        {{ $podcast->title }}
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500">
                                        @if(strlen($podcast->description) > 50)
                                        {{ substr($podcast->description, 0, 50) }}...
                                        @else
                                        {{ $podcast->description }}
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            @if(count($podcast->categories) != 0)
                                @foreach($podcast->categories as $cat)
                                    <div class="text-sm leading-5 text-gray-900">{{ \App\Models\PodcastCategory::where('id', '=', $cat)->first()->name }}</div>
                                @endforeach
                            @else
                                <div class="text-sm leading-5 text-red-900">No Categories Yet.</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{ $podcast->getLanguage->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($podcast->itunes_type == "Episodic"){{ 'bg-blue-100' }}@elseif($podcast->itunes_type == "Serial"){{ 'bg-yellow-100' }}@endif text-black-800">
                              {{ $podcast->itunes_type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('podcast.edit', $podcast->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="{{ route('episode.index', $podcast->id) }}" class="text-red-600 hover:text-red-900">Episodes</a>
                        </td>
                    </tr>
                        @endforeach
                    @else
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap" colspan="5">{{ _('No podcasts setup yet. :(') }}</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>