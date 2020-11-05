<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0" @if(Auth::check()) data-editable data-name="page_title" @endif>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $page->title }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 flex">
        <div class="w-1/4 bg-white h-0 m-4 rounded-full">
            @if (isset($page) && $page->podcast != null)
                <div class="bg-white m-auto border-1  border-dashed border-gray-100 shadow-md rounded-lg overflow-hidden">
                    <img src="{{ route('asset.podcast.image', $page->podcast->guid) }}" alt="" class="w-full object-cover object-center" />
                    <div class="p-4">
                        <p class="mb-1 text-gray-900 font-semibold">{{ $page->podcast->title }}</p>
                        <p class="mb-1 text-gray-900 text-sm font-semibold">by {{ $page->podcast->author }}</p>

                        <span class="text-gray-700">{{ $page->podcast->description }}</span>
                    </div>


                </div>

            @endif
        </div>
        <div class="w-3/4 bg-white h-0 m-4">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
{{--                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">--}}
{{--                    <h3 class="text-lg leading-6 font-medium text-gray-900">--}}
{{--                        Podcast--}}
{{--                    </h3>--}}
{{--                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">--}}
{{--                        Personal details and application.--}}
{{--                    </p>--}}
{{--                </div>--}}
                <div class="p-4 text-md font-normal text-gray-900" @if(Auth::check()) data-editable data-name="content" @endif>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>

    @section('styles')
        @if(Auth::check())
        <link rel="stylesheet" type="text/css" href="{{ asset('css/content-tools/content-tools.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/content-tools/app.css') }}">
        @endif
    @endsection

    @section('scripts')
        @if(Auth::check())
        <script src="{{ asset('js/content-tools/content-tools.js') }}"></script>
        <script>
            {{ $page->guid }}
            @include('pages.partials.editor')
        </script>
        @endif
    @endsection

</x-app-layout>
