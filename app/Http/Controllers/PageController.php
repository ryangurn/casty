<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Page;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();
        return view('pages.index', compact('podcasts'));
    }

    public function create(Request $request, $guid)
    {
        $podcast = Podcast::where('guid', '=', $guid)->first();
        $episode = Episode::where('guid', '=', $guid)->first();

        if ($podcast == null && $episode == null)
            abort(404);

        $pages = Page::all();

        return view('pages.create', compact('podcast', 'episode', 'pages'));
    }

    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    public function pub(Page $page)
    {
        return view('pages.public', compact('page'));
    }

    public function save(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'page_title' => 'nullable|min:3|max:255',
            'content' => 'nullable',
        ]);

        if ($request->has('page_title'))
            $page->title = trim(strip_tags($request->get('page_title')));
        if ($request->has('content'))
            $page->content = $request->get('content');
        $page->save();

        return response()->json('ok', 200);
    }
}
