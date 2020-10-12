<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEpisodeForm extends Component
{
    use WithFileUploads;

    public $podcast;
    public $title, $enclosure, $publishing_date, $description, $link, $explicit, $itunes_title,
        $itunes_episode_number, $itunes_season_number, $itunes_episode_type, $spotify_order;
    public $spotify_countries;

    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $podcast = $this->podcast;
        return view('episodes.partials.create-episode-form', compact('podcast', 'countries'));
    }
}
