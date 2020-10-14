<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateEpisodeItunesForm extends Component
{
    use WithFileUploads;

    public $podcast, $episode;
    public $image, $publishing_date, $description, $link, $explicit,
        $itunes_title, $itunes_episode_number, $itunes_season_number, $itunes_episode_type,
        $updated_image;

    protected $rules = [
        'publishing_date' => 'nullable|date_format:m/d/Y H:i',
        'description' => 'nullable|min:5',
        'link' => 'nullable|url',
        'updated_image' => 'nullable|file|image',
        'explicit' => 'nullable',
        'itunes_title' => 'nullable|min:3|max:255',
        'itunes_episode_number' => 'nullable|numeric',
        'itunes_season_number' => 'nullable|numeric',
        'itunes_episode_type' => 'nullable|in:full,trailer,bonus',
    ];

    public function mount($podcast, $episode)
    {
        if(isset($episode->publishing_date) && $episode->publishing_date != null)
            $this->publishing_date = date("m/d/Y H:i", $episode->publishing_date);
        $this->description = $episode->description;
        $this->link = $episode->link;
        $this->explicit = $episode->explicit;
        $this->itunes_title = $episode->itunes_title;
        $this->itunes_episode_number = $episode->itunes_episode_number;
        $this->itunes_season_number = $episode->itunes_season_number;
        $this->itunes_episode_type = strtolower($episode->itunes_episode_type);
        $this->image = $episode->image;
    }

    public function updated($parameter)
    {
        return $this->validateOnly($parameter);
    }

    public function updateItunes()
    {
        $validated = $this->validate();
        $episode = $this->episode;

        $episode->publishing_date = date("Y-m-d H:i:s", strtotime($validated['publishing_date']));
        $episode->description = $validated['description'];
        $episode->link = $validated['link'];
        if (isset($this->updated_image) && $this->updated_image != null) {
            $photo = $this->updated_image->storeAs($this->podcast->id . '-media', time() . '-image.' . $this->updated_image->extension(), 'public');
            $episode->image = $photo;
        }
        $episode->explicit = ($validated['explicit'] == null) ? false : true;
        $episode->itunes_title = $validated['itunes_title'];
        $episode->itunes_episode_number = $validated['itunes_episode_number'];
        $episode->itunes_season_number = $validated['itunes_season_number'];
        if (!isset($validated['itunes_episode_type']) || $validated['itunes_episode_type'] == null || $validated['itunes_episode_type'] == "full")
        {
            $episode->itunes_episode_type = 0;
        }
        elseif ($validated['itunes_episode_type'] != null && $validated['itunes_episode_type'] == "trailer")
        {
            $episode->itunes_episode_type = 1;
        }
        elseif ($validated['itunes_episode_type'] != null && $validated['itunes_episode_type'] == "bonus")
        {
            $episode->itunes_episode_type = 2;
        }

        $episode->save();

        return redirect()->route('episode.show', [$this->podcast->id, $this->episode->id]);
    }

    public function render()
    {
        return view('episodes.partials.update-episode-itunes-form');
    }
}
