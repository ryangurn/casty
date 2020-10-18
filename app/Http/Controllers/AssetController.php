<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\PodcastCategory;
use Illuminate\Http\Request;

class AssetController extends Controller
{
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

    public function Spotify()
    {

    }
}
