<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UpdateEpisodeBasicForm extends Component
{
    public $podcast, $episode;
    public $title, $enclosure;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'enclosure' => 'nullable|file|mimes:mp3|max:205000', // 200mb (thanks spotify)
    ];

    public function mount($podcast, $episode)
    {
        $this->title = $episode->title;
    }

    public function updated($parameter)
    {
        return $this->validateOnly($parameter);
    }

    public function updateEpisode()
    {
        $validated = $this->validate();

        $episode = $this->episode;
        $episode->title = $validated['title'];
        if (isset($validated['enclosure']) && $validated['enclosure'] != null)
        {
            $media = $this->enclosure->storeAs($this->podcast->id . '-media', time() . '.'. $this->enclosure->extension(), 'public');

            $episode->enclosure = ['file' => $media, 'tag' =>
                '<enclosure
                                     url="'.Storage::url($media).'" 
                                     length="'.$this->enclosure->getSize().'"
                                     type="audio/mpeg
                                    />'
            ];
        }
        $episode->save();

        return redirect()->route('episode.show', [$this->podcast->id, $this->episode->id]);

    }

    public function render()
    {
        return view('episodes.partials.update-episode-basic-form');
    }
}
