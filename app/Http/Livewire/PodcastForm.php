<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Language;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class PodcastForm extends Component
{
    use WithFileUploads;

    public $title, $description, $image, $language, $explicit, $link, $itunes_title, $itunes_type, $copyright, $spotify_limit;
    public $author, $owner, $spotify_countries, $podcast_categories = [];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required',
        'image' => 'required|image',
        'language' => 'required|numeric|exists:languages,id',
        'podcast_categories' => 'required',
        'podcast_categories.*' => 'required|exists:podcast_categories,id',
        'explicit' => 'nullable',
        'link' => 'nullable|url',
        'author.name' => 'nullable|min:1|max:50',
        'author.email' => 'nullable|email',
        'owner.name' => 'nullable|min:1|max:50',
        'owner.email' => 'nullable|email',
        'itunes_title' => 'nullable|min:3|max:255',
        'itunes_type' => 'nullable|in:serial,episodic',
        'copyright' => 'nullable|min:5|max:255',
        'spotify_countries' => 'nullable|numeric|exists:countries,id',
        'spotify_limit' => 'nullable|numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createUser()
    {
        $validated = $this->validate();

        // finish uploading file
        $p = $this->image->storeAs('podcast-art', time().'.'.$this->image->extension(), 'public');

        $podcast = [];
        $podcast['title'] = $validated['title'];
        $podcast['description'] = $validated['description'];
        $podcast['image'] = $p;
        $podcast['language'] = $validated['language'];
        $podcast['categories'] = $validated['podcast_categories'];
        $podcast['explicit'] = ($validated['explicit'] == null) ? "false" : "true";
        $podcast['link'] = $validated['link'];
        $podcast['author'] = $validated['author'];
        $podcast['owner'] = $validated['owner'];
        $podcast['itunes_title'] = $validated['itunes_title'];
        $podcast['itunes_type'] = $validated['itunes_type'];
        $podcast['copyright'] = $validated['copyright'];
        $podcast['spotify_restriction'] = $validated['spotify_countries'];
        $podcast['spotify_limit'] = $validated['spotify_limit'];
        
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
