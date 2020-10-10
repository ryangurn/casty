<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

/**
 * Class UpdatePodcastSpotifyForm
 * @package App\Http\Livewire
 */
class UpdatePodcastSpotifyForm extends Component
{
    /**
     * @var
     */
    public $podcast;
    /**
     * @var array
     */
    public $spotify_countries = [];
    /**
     * @var
     */
    public $spotify_limit, $spotify_origin;

    /**
     * @var string[]
     */
    protected $rules = [
        'spotify_countries' => 'nullable|exists:countries,id',
        'spotify_limit' => 'nullable|numeric',
        'spotify_origin' => 'nullable|exists:countries,id',
    ];

    /**
     * @param $podcast
     */
    public function mount($podcast)
    {
        $this->spotify_countries = $podcast->spotify_restriction;
        $this->spotify_limit = $podcast->spotify_limit;
        $this->spotify_origin = $podcast->spotify_country_of_origin;
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
    public function updateSpotify()
    {
        $validated = $this->validate();

        $podcast = $this->podcast;
        $podcast->spotify_restriction = $validated['spotify_countries'];
        $podcast->spotify_limit = $validated['spotify_limit'];
        $podcast->spotify_country_of_origin = $validated['spotify_origin'];
        $podcast->save();

        return redirect()->route('podcast.show', $podcast->id);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        return view('podcasts.partials.update-podcast-spotify-form', compact('countries'));
    }
}
