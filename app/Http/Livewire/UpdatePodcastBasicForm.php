<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Language;
use App\Models\PodcastCategory;
use Livewire\Component;

class UpdatePodcastBasicForm extends Component
{
    public $podcast;
    public $title, $description, $image, $language, $explicit;
    public $podcast_categories = [];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required',
        'image' => 'required|image',
        'language' => 'required|numeric|exists:languages,id',
        'podcast_categories' => 'required',
        'podcast_categories.*' => 'required|exists:podcast_categories,id',
        'explicit' => 'nullable',
    ];

    public function mount($podcast)
    {
        $this->title = $podcast->title;
        $this->description = $podcast->description;
        $this->image = $podcast->image;
        $this->language = $podcast->language;
        $this->explicit = $podcast->explicit;
        $this->podcast_categories = $podcast->categories;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatePodcast()
    {
//        $validated = $this->validate();
    }

    public function render()
    {
        $this->title = $this->podcast->title;
        $this->description = $this->podcast->description;
        $this->image = $this->podcast->image;
        $this->language = $this->podcast->language;

        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $categories = PodcastCategory::all();
        $languages = Language::where('iso_639_1', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('podcasts.partials.update-podcast-basic-form', compact('countries', 'categories', 'languages'));
    }
}
