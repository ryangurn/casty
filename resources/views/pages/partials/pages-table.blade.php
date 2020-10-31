<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-gray-200 table-auto">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Podcast</th>
                        <th class="py-5 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Episode</th>
                        <th class="py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</th>
                        <th class="px-6 py-1 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if (isset($podcasts) && !$podcasts->isEmpty())
                        @foreach($podcasts as $podcast)
                        <tr>
                            <td rowspan="{{ $podcast->episodes->count() + 1 }}" class="px-6 py-4 whitespace-no-wrap">
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
                            <td></td>
                            <td>Create button</td>
                            <td></td>
                        </tr>
                        {{-- row for each episode --}}
                            @foreach($podcast->episodes as $episode)
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
                           <td>Create button</td>
                           <td></td>
                       </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap" colspan="4">{{ __('No podcasts or episodes to add content for.') }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>