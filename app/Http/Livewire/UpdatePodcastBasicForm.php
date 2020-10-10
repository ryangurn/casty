<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Language;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

/**
 * Class UpdatePodcastBasicForm
 * @package App\Http\Livewire
 */
class UpdatePodcastBasicForm extends Component
{
    /**
     * @var
     */
    public $podcast;
    /**
     * @var
     */
    public $title, $description, $image, $language, $explicit, $updated_image;
    /**
     * @var array
     */
    public $podcast_categories = [];

    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required',
        'updated_image' => 'nullable|sometimes|image',
        'language' => 'required|numeric|exists:languages,id',
        'podcast_categories' => 'required',
        'podcast_categories.*' => 'required|exists:podcast_categories,id',
        'explicit' => 'nullable',
    ];

    /**
     * @param $podcast
     */
    public function mount($podcast)
    {
        $this->title = $podcast->title;
        $this->description = $podcast->description;
        $this->image = $podcast->image;
        $this->language = $podcast->language;
        $this->explicit = $podcast->explicit;
        $this->podcast_categories = $podcast->categories;
    }

    /**
     * @param $propertyName
     * @throws ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * @return RedirectResponse
     */
    public function updatePodcast()
    {
        $validated = $this->validate();

        $podcast = $this->podcast;
        $podcast->title = $validated['title'];
        $podcast->description = $validated['description'];
        if ($validated['updated_image'])
            $podcast->image = $validated['updated_image'];
        $podcast->language = $validated['language'];
        $podcast->explicit = $validated['explicit'];
        $podcast->categories = $validated['podcast_categories'];
        $podcast->save();

        return redirect()->route('podcast.show', $podcast->id);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $categories = PodcastCategory::all();
        $languages = Language::where('iso_639_1', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('podcasts.partials.update-podcast-basic-form', compact('countries', 'categories', 'languages'));
    }
}
