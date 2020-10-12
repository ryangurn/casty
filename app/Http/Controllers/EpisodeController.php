<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Podcast $podcast
     * @return Application|Factory|View
     */
    public function index(Podcast $podcast)
    {
        $episodes = $podcast->episodes;
        return view('episodes.index', compact('podcast', 'episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Podcast $podcast
     * @return Application|Factory|View
     */
    public function create(Podcast $podcast)
    {
        return view('episodes.create', compact('podcast'));
    }

    /**
     * Display the specified resource.
     *
     * @param Episode $episode
     * @return Response
     */
    public function show(Podcast $podcast, Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Episode $episode
     * @return Response
     */
    public function edit(Podcast $podcast, Episode $episode)
    {
        //
    }
}
