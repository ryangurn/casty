<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * @param Podcast $podcast
     * @return Response
     */
    public function iTunes(Podcast $podcast)
    {
        $pcs = $podcast->categories;
        $categories = [];
        foreach($pcs as $pc)
        {
            $c = PodcastCategory::where('id', '=', $pc)->first();
            if ($c->category != null)
            {
                $categories[$c->category->name][] = $c->name;
            }
            else
            {
                $categories[] = $c->name;
            }
        }

        return response()
            ->view('assets.itunes', compact('podcast', 'categories'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * @param Podcast $podcast
     * @return Response
     */
    public function Spotify(Podcast $podcast)
    {
        $pcs = $podcast->categories;
        $categories = [];
        foreach($pcs as $pc)
        {
            $c = PodcastCategory::where('id', '=', $pc)->first();
            if ($c->category != null)
            {
                $categories[$c->category->name][] = $c->name;
            }
            else
            {
                $categories[] = $c->name;
            }
        }

        return response()
            ->view('assets.spotify', compact('podcast', 'categories'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     *
     */
    public function audio($guid)
    {
        $episode = Episode::where('guid', '=', $guid)->first();

        $file = $episode->enclosure['file'];
        $f = Storage::disk('public')->get($file);

        return response($f)
            ->header('Content-Length', $episode->enclosure['length'])
            ->header('Content-Type', 'audio/mpeg');
//        return (new Response($file, 200))
//            ->header('Content-Type', 'audio/mpeg');

    }
}
