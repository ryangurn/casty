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
        <itunes:image href="{{ route('asset.podcast.image', $podcast->guid) }}" />
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

        {{-- item --}}
        @if (isset($podcast->episodes) && !$podcast->episodes->isEmpty())
            @foreach ($podcast->episodes as $item)
                <item>
                    <guid isPermaLink="false">{{ $item->guid }}</guid>
                    <enclosure
                            url="{{ route('asset.audio', $item->guid) }}"
                            length="{{ $item->enclosure['length'] }}"
                            type="audio/mpeg"
                    />
                    @if (isset($item->publishing_date) && $item->publishing_date != null)
                    <pubDate>{{ (new \Carbon\Carbon($item->publishing_date))->toRfc2822String() }}</pubDate>
                    @endif
                    <title>{{ $item->title }}</title>
                    @if (isset($item->description) && $item->description != null)
                    <description>
                        <![CDATA[
                        {{ $item->description }}
                        ]]>
                    </description>
                    @endif
                    @if (isset($item->spotify_restriction) && $item->spotify_restriction != null)
                    <media:restriction type="country" relationship="allow">
                        @foreach($item->spotify_restriction as $res){{ \App\Models\Country::where('id', '=', $res)->first()->iso_3166_1_2 }} @endforeach
                    </media:restriction>
                    @endif
                    @if (isset($item->enclosure['duration']) && $item->enclosure['duration'] != null)
                    <itunes:duration>{{ $item->enclosure['duration'] }}</itunes:duration>
                    @endif
                    @if (isset($item->order) && $item->order != null)
                    <itunes:order>{{ $item->order }}</itunes:order>
                    @endif
                    <itunes:explicit>{{ ($item->explicit) ? "true" : "false" }}</itunes:explicit>
                    @if (isset($item->image) && $item->image != null)
                        <itunes:image href="{{ route('asset.episode.image', $item->guid) }}" />
                    @endif
                    @if (isset($item->spotify_start, $item->spotify_end) && $item->spotify_start != null && $item->spotify_end)
                    <dcterms:valid>
                      start={{ (new \Carbon\Carbon($item->spotify_start))->toIso8601String() }};
                      end={{ (new \Carbon\Carbon($item->spotify_end))->toIso8601String() }};
                    </dcterms:valid>
                    @endif
                    @if (isset($item->spotify_chapters) && $item->spotify_chapters != null)
                    <psc:chapters>
                        @foreach($item->spotify_chapters as $chapter)
                            <psc:chapter start="{{ $chapter['start'] }}" title="{{ $chapter['title'] }}" @if(isset($chapter['href']))href="{{ $chapter['href'] }}"@endif @if(isset($chapter['image']))image="{{ $chapter['image'] }}"@endif />
                        @endforeach
                    </psc:chapters>
                    @endif
                    @if (isset($item->spotify_keywords) && $item->spotify_keywords != null && $item->spotify_keywords[0] != "")
                    <itunes:keywords>{{ implode(",", $item->spotify_keywords) }}</itunes:keywords>
                    @endif
                    <itunes:episodeType>{{ strtolower($item->itunes_episode_type) }}</itunes:episodeType>
                </item>
            @endforeach
        @endif
    </channel>

</rss>