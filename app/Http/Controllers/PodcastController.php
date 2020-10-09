<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $podcasts = Podcast::all();
        return view('podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $categories = PodcastCategory::all();
        $languages = Language::where('iso_639_1', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('podcasts.create', compact('languages', 'categories', 'countries'));
    }

    }

}
