<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class UpdateEpisodeSpotifyForm extends Component
{
    public $podcast, $episode;
    public $spotify_order, $spotify_start, $spotify_end, $spotify_chapters, $spotify_countries, $spotify_keywords;

    protected $rules = [
        'spotify_countries' => 'nullable|exists:countries,id',
        'spotify_order' => 'nullable|numeric',
        // TODO: ensure that end is after start
        'spotify_start' => 'nullable|date_format:m/d/Y H:i',
        'spotify_end' => 'nullable|date_format:m/d/Y H:i',
        'spotify_chapters' => 'nullable|json',
        'spotify_keywords' => 'nullable|string'
    ];

    public function mount($podcast, $episode)
    {
        $this->spotify_countries = $episode->spotify_restriction;
        $this->spotify_order = $episode->order;
        if(isset($episode->spotify_start) && $episode->spotify_start != null)
            $this->spotify_start = date("m/d/Y H:i", $episode->spotify_start);
        if(isset($episode->spotify_end) && $episode->spotify_end != null)
            $this->spotify_end = date("m/d/Y H:i", $episode->spotify_end);
        $this->spotify_chapters = $episode->spotify_chapters;
        $this->spotify_keywords = implode(", ", $episode->spotify_keywords);
    }

    public function updated($parameter)
    {
        return $this->validateOnly($parameter);
    }

    public function updateSpotify()
    {
        $validated = $this->validate();

        $episode = $this->episode;
        $episode->spotify_restriction = $validated['spotify_countries'];
        $episode->order = $validated['spotify_order'];
        $episode->spotify_start = date("Y-m-d H:i:s", strtotime($validated['spotify_start']));
        $episode->spotify_end = date("Y-m-d H:i:s", strtotime($validated['spotify_end']));
        $episode->spotify_chapters = $validated['spotify_chapters'];
        $episode->spotify_keywords = explode(",", $validated['spotify_keywords']);
        $episode->save();

        return redirect()->route('episode.show', [$this->podcast->id, $this->episode->id]);
    }

    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('episodes.partials.update-episode-spotify-form', compact('countries'));
    }
}
