<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title>{{ $podcast->title }}</title>
        @if (isset($podcast->description) && $podcast->description != null)
            <description>
                {{ $podcast->description }}
            </description>
        @endif
        <itunes:image
                href="{{ route('asset.podcast.image', $podcast->guid) }}"
        />
        <language>{{ \App\Models\Language::where('id', '=', $podcast->language)->first()->iso_639_1 }}</language>

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
        <itunes:explicit>{{ ($podcast->explicit) ? "true" : "false" }}</itunes:explicit>
        @if (isset($podcast->author) && $podcast->author != null)
            <itunes:author>{{ $podcast->author }}</itunes:author>
        @endif

        @if (isset($podcast->link) && $podcast->link != null)
            <link>{{ $podcast->link }}</link>
        @endif
        @if (isset($podcast->owner) && $podcast->owner != null)
            <itunes:owner>
                <itunes:name>{{ $podcast->owner['name'] }}</itunes:name>
                <itunes:email>{{ $podcast->owner['email'] }}</itunes:email>
            </itunes:owner>
        @endif

        @if (isset($podcast->itunes_title) && $podcast->itunes_title != null)
            <itunes:title>{{ $podcast->itunes_title }}</itunes:title>
        @endif

        <itunes:type>{{ strtolower($podcast->itunes_type) }}</itunes:type>

        @if (isset($podcast->copyright) && $podcast->copyright != null)
            <copyright>{{ $podcast->copyright }}</copyright>
        @endif

        @if (isset($podcast->new_feed_url) && $podcast->new_feed_url != null)
            <itunes:new-feed-url>{{ $podcast->new_feed_url }}</itunes:new-feed-url>
        @endif

        @if (isset($podcast->itunes_block) && $podcast->itunes_block == true)
            <itunes:block>{{ 'Yes' }}</itunes:block>
        @endif

        @if (isset($podcast->itunes_complete) && $podcast->itunes_complete == true)
            <itunes:complete>{{ 'Yes' }}</itunes:complete>
        @endif



        @if (isset($podcast->episodes) && !$podcast->episodes->isEmpty())
            @foreach ($podcast->episodes as $item)
                <item>
                    <title>{{ $item->title }}</title>
                    <enclosure
                            url="{{ route('asset.audio', $item->guid) }}"
                            length="{{ $item->enclosure['length'] }}"
                            type="audio/mpeg"
                    />
                    <guid>{{ $item->guid }}</guid>
                    @if (isset($item->publishing_date) && $item->publishing_date != null)
                    <pubDate>{{ (new \Carbon\Carbon($item->publishing_date))->toRfc2822String() }}</pubDate>
                    @endif
                    @if (isset($item->description) && $item->description != null)
                        <itunes:description>
                            <![CDATA[
                            {{ $item->description }}
                            ]]>
                        </itunes:description>
                    @endif
                    <itunes:duration>{{ $item->enclosure['duration'] }}</itunes:duration>
                @if (isset($item->link) && $item->link != null)
                        <link>{{ $item->link }}</link>
                @endif
                @if (isset($item->image) && $item->image != null)
                    <itunes:image href="{{ route('asset.episode.image', $item->guid) }}" />
                @endif
                <itunes:explicit>{{ ($item->explicit == 0) ? "false" : "true"  }}</itunes:explicit>
                @if (isset($item->itunes_title) & $item->itunes_title != null)
                    <itunes:title>{{ $item->itunes_title }}</itunes:title>
                @endif
                @if (isset($item->itunes_episode_number) && $item->itunes_episode_number != null)
                    <itunes:episode>{{ $item->itunes_episode_number }}</itunes:episode>
                @endif
                @if (isset($item->itunes_season_number) && $item->itunes_season_number != null)
                    <itunes:season>{{ $item->itunes_season_number }}</itunes:season>
                @endif
                    <itunes:episodeType>{{ strtolower($item->itunes_episode_type) }}</itunes:episodeType>
                @if (isset($item->itunes_block) && $item->itunes_block == true)
                    <itunes:block>{{ 'Yes' }}</itunes:block>
                @endif
                </item>
                    @endforeach
                @endif
    </channel>
</rss>
