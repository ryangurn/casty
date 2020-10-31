<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $podcasts = Podcast::all();
        return view('pages.index', compact('podcasts'));
    }
}
