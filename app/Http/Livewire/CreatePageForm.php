<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\User;
use Livewire\Component;

class CreatePageForm extends Component
{
    public $author, $team, $title, $podcast, $episode, $slug;

    protected $rules = [
        'author' => 'required|exists:users,id',
        'team' => 'required|exists:teams,id',
        'title' => 'required|min:3|max:255',
        'slug' => 'required|alphadash|min:3|max:255'
    ];

    public function updated($property)
    {
        return $this->validateOnly($property);
    }

    public function createPage()
    {
        $validated = $this->validate();
        $podcast_id = (isset($this->podcast->id) && $this->podcast->id != null) ? $this->podcast->id : null;
        $episode_id = (isset($this->episode->id) && $this->episode->id != null) ? $this->episode->id : null;


        Page::create([
            'author_id' => $validated['author'],
            'podcast_id' => $podcast_id,
            'episode_id' => $episode_id,
            'team_id' => $validated['team'],
            'title' => $validated['title'],
            'slug' => $validated['slug'],
        ]);

        return redirect()->route('pages.index');
    }

    public function render()
    {
        $users = User::all();
        return view('pages.partials.create-page-form', compact('users'));
    }
}
