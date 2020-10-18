<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Language;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePodcastForm extends Component
{
    use WithFileUploads;

    public $team_id, $title, $description, $image, $language, $explicit, $link, $itunes_title, $itunes_type, $copyright, $spotify_limit, $spotify_origin;
    public $author, $owner, $spotify_countries, $podcast_categories = [];

    protected $rules = [
        'team_id' => 'required|exists:teams,id',
        'title' => 'required|min:3|max:255',
        'description' => 'required',
        'image' => 'required|image',
        'language' => 'required|numeric|exists:languages,id',
        'podcast_categories' => 'required',
        'podcast_categories.*' => 'required|exists:podcast_categories,id',
        'explicit' => 'nullable',
        'link' => 'nullable|url',
        'author' => 'nullable|min:1|max:50',
        'owner.name' => 'nullable|min:1|max:50',
        'owner.email' => 'nullable|email',
        'itunes_title' => 'nullable|min:3|max:255',
        'itunes_type' => 'nullable|in:serial,episodic',
        'copyright' => 'nullable|min:5|max:255',
        'spotify_countries' => 'nullable|exists:countries,id',
        'spotify_limit' => 'nullable|numeric',
        'spotify_origin' => 'nullable|exists:countries,id',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPodcast()
    {
        $validated = $this->validate();

        // finish uploading file
        $p = $this->image->storeAs('podcast-art', time().'.'.$this->image->extension(), 'public');

        $podcast = [];
        $podcast['team_id'] = $validated['team_id'];
        $podcast['title'] = $validated['title'];
        $podcast['description'] = $validated['description'];
        $podcast['image'] = $p;
        $podcast['language'] = $validated['language'];
        $podcast['categories'] = $validated['podcast_categories'];
        $podcast['explicit'] = ($validated['explicit'] == null) ? false : true;
        $podcast['link'] = $validated['link'];
        if (isset($validated['author']) && $validated['author'] != null)
            $podcast['author'] = $validated['author'];
        if (isset($validated['owner']) && $validated['owner'] != null)
            $podcast['owner'] = $validated['owner'];
        $podcast['itunes_title'] = $validated['itunes_title'];
        $podcast['itunes_type'] = ($validated['itunes_type'] == null) ? 0 : (($validated['itunes_type'] == "serial") ? 1 : 0);
        $podcast['copyright'] = $validated['copyright'];
        $podcast['spotify_restriction'] = $validated['spotify_countries'];
        $podcast['spotify_limit'] = $validated['spotify_limit'];
        $podcast['spotify_country_of_origin'] = $validated['spotify_origin'];

        Podcast::create($podcast);

        return redirect()->route('podcast.index');

    }

    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $categories = PodcastCategory::all();
        $languages = Language::where('iso_639_1', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('podcasts.partials.create-podcast-form', compact('countries', 'categories', 'languages'));
    }
}
