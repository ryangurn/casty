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
                            <td class="px-6 py-4 whitespace-no-wrap"></td>
                            <td>
                                @if ($podcast->page == null)
                                <a class="m-3" href="{{ route('pages.create', $podcast->guid) }}">
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                        <!-- Heroicon name: plus-circle -->
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Create Podcast Page
                                    </button>
                                </a>
                                @else
                                    <a class="m-3" href="{{ route('pages.show', $podcast->page->id) }}">
                                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                            <!-- Heroicon name: plus-circle -->
                                            <svg  class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                            View
                                        </button>
                                    </a>
                                @endif
                            </td>
                            <td>@if ($podcast->page != null)<a href="{{ route('public.page', $podcast->page->slug) }}">Public Page</a>@endif</td>
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
                           <td>
                               @if ($episode->page == null)
                               <a class="m-3" href="{{ route('pages.create', $episode->guid) }}">
                                   <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                       <!-- Heroicon name: plus-circle -->
                                       <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                       </svg>
                                       Create Episode Page
                                   </button>
                               </a>
                               @else
                                   <a class="m-3" href="{{ route('pages.show', $episode->page->id) }}">
                                       <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                           <!-- Heroicon name: plus-circle -->
                                           <svg  class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                           </svg>
                                           View
                                       </button>
                                   </a>
                               @endif
                           </td>
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