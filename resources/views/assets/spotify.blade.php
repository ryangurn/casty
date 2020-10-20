<rss xmlns:media="https://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:itunes="https://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:dcterms="https://purl.org/dc/terms"
     xmlns:spotify="https://www.spotify.com/ns/rss"
     xmlns:psc="http://podlove.org/simple-chapters/"
     version="2.0">

    <channel>
        <title>{{ $podcast->title }}</title>
        <link>{{ $podcast->link }}</link>
        <description>{{ $podcast->description }}</description>
        <language>{{ \App\Models\Language::where('id', '=', $podcast->language)->first()->iso_639_1 }}</language>
        <itunes:author>{{ $podcast->author }}</itunes:author>
        <itunes:image href="{{ request()->root() . Storage::url($podcast->image) }}" />
        <itunes:explicit>{{ ($podcast->explicit) ? "true" : "false" }}</itunes:explicit>
        @if (isset($categories) && $categories != null)
            @foreach($categories as $key => $category)
                @if(is_numeric($key))
                    <itunes:category text="{{ $category }}" />
                @else
                    <itunes:category text="{{ $key }}">
                        @foreach($category as $vs)
                            <itunes:category text="{{ $vs }}" />
                        @endforeach
                    </itunes:category>
                @endif
            @endforeach
        @endif
        @if (isset($podcast->itunes_complete) && $podcast->itunes_complete == true)
            <itunes:complete>{{ 'Yes' }}</itunes:complete>
        @endif
        <itunes:type>{{ strtolower($podcast->itunes_type) }}</itunes:type>
        @if (isset($podcast->spotify_restriction) && $podcast->spotify_restriction != null)
        <media:restriction type="country" relationship="allow">
            @foreach($podcast->spotify_restriction as $res){{ \App\Models\Country::where('id', '=', $res)->first()->iso_3166_1_2 }} @endforeach
        </media:restriction>
        @endif
        @if (isset($podcast->spotify_limit) && $podcast->spotify_limit != null)
            <spotify:limit>{{ $podcast->spotify_limit }}</spotify:limit>
        @endif
        @if (isset($podcast->spotify_country_of_origin) && $podcast->spotify_country_of_origin != null)
            <spotify:countryoforigin>{{ $podcast->spotify_country_of_origin }}</spotify:countryoforigin>
        @endif
    </channel>

</rss>