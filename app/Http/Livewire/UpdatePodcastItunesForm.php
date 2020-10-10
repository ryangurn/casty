<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UpdatePodcastItunesForm extends Component
{
    public $podcast;
    public $itunes_title, $link, $itunes_type, $copyright;
    public $author, $owner = [];

    protected $rules = [
        'link' => 'nullable|url',
        'author.name' => 'nullable|min:1|max:50',
        'author.email' => 'nullable|email',
        'owner.name' => 'nullable|min:1|max:50',
        'owner.email' => 'nullable|email',
        'itunes_title' => 'nullable|min:3|max:255',
        'itunes_type' => 'nullable|in:serial,episodic',
        'copyright' => 'nullable|min:5|max:255',
    ];

    /**
     * @param $podcast
     */
    public function mount($podcast)
    {
        $this->link = $podcast->link;
        $this->author = $podcast->author;
        $this->owner = $podcast->owner;
        $this->itunes_type = strtolower($podcast->itunes_type);
        $this->itunes_title = $podcast->itunes_title;
        $this->copyright = $podcast->copyright;
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
    public function updateItunes()
    {
        $validated = $this->validate();

        $podcast = $this->podcast;
        $podcast->link = $validated['link'];

        $author = $podcast->author;
        $author['name'] = $validated['author']['name'];
        $author['email'] = $validated['author']['email'];
        $owner = $podcast->owner;
        $owner['name'] = $validated['owner']['name'];
        $owner['email'] = $validated['owner']['email'];

        $podcast->author = $author;
        $podcast->owner = $owner;
        $podcast->itunes_title = $validated['itunes_title'];
        $podcast->itunes_type = ($validated['itunes_type'] == null) ? 0 : (($validated['itunes_type'] == "serial") ? 1 : 0);
        $podcast->copyright = $validated['copyright'];
        $podcast->save();

        return redirect()->route('podcast.show', $podcast->id);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('podcasts.partials.update-podcast-itunes-form');
    }
}
