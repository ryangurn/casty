<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $user = auth()->user();
        $podcasts = [];
        foreach($user->allTeams() as $team)
        {
            foreach($team->podcasts as $p)
            {
                $podcasts[] = $p;
            }
        }
        $podcasts = collect($podcasts);

        return view('podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('podcasts.create');
    }


    /**
     * Display the specified resource.
     *
     * @param Podcast $podcast
     * @return Application|Factory|View|Response
     */
    public function show(Podcast $podcast)
    {
        return view('podcasts.show', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Podcast $podcast
     * @return Application|Factory|View|Response
     */
    public function edit(Podcast $podcast)
    {
        return view('podcasts.update', compact('podcast'));
    }
}
