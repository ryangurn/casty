<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Episode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEpisodeForm extends Component
{
    use WithFileUploads;

    public $podcast;
    public $title, $enclosure, $publishing_date, $description, $link, $image, $explicit, $itunes_title, $itunes_type,
        $itunes_episode_number, $itunes_season_number, $itunes_episode_type, $spotify_order, $spotify_start, $spotify_end,
        $spotify_chapters, $spotify_keywords;
    public $spotify_countries;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'enclosure' => 'required|file|mimes:mp3|max:205000', // 200mb (thanks spotify)
        'publishing_date' => 'nullable|date_format:m/d/Y H:i',
        'description' => 'nullable|min:5',
        'link' => 'nullable|url',
        'image' => 'nullable|file|image',
        'explicit' => 'nullable',
        'itunes_title' => 'nullable|min:3|max:255',
        'itunes_episode_number' => 'nullable|numeric',
        'itunes_season_number' => 'nullable|numeric',
        'itunes_type' => 'nullable|in:full,trailer,bonus',
        'spotify_countries' => 'nullable|exists:countries,id',
        'spotify_order' => 'nullable|numeric',
        // ensure that end is after start
        'spotify_start' => 'nullable|date_format:m/d/Y H:i',
        'spotify_end' => 'nullable|date_format:m/d/Y H:i',
        'spotify_chapters' => 'nullable|json',
        'spotify_keywords' => 'nullable|string'
    ];

    public function updated($property)
    {
        return $this->validateOnly($property);
    }

    public function createPodcast()
    {
        $validated = $this->validate();



        $media = $this->enclosure->storeAs($this->podcast->id . '-media', time() . '.'. $this->enclosure->extension(), 'public');
        if (isset($this->image) && $this->image != null)
            $photo = $this->image->storeAs($this->podcast->id . '-media', time() . '-image.' . $this->image->extension(), 'public');

        $item = [];
        $item['podcast_id'] = $this->podcast->id;
        $item['title'] = $validated['title'];
        $item['enclosure'] = ['file' => $media, 'tag' =>
                                    '<enclosure
                                     url="'.Storage::url($media).'" 
                                     length="'.$this->enclosure->getSize().'"
                                     type="audio/mpeg
                                    />'
                                ];
        $item['guid'] = Str::uuid();
        $item['publishing_date'] = date("Y-m-d H:i:s", strtotime($validated['publishing_date']));
        $item['description'] = $validated['description'];
        $item['link'] = $validated['link'];
        if (isset($this->image) && $this->image != null)
            $item['image'] = $photo;
        $item['explicit'] = ($validated['explicit'] == null) ? false : true;
        $item['itunes_title'] = $validated['itunes_title'];
        $item['itunes_episode_number'] = $validated['itunes_episode_number'];
        $item['itunes_season_number'] = $validated['itunes_season_number'];
        if (!isset($validated['itunes_episode_type']) || $validated['itunes_episode_type'] == null || $validated['itunes_episode_type'] == "full")
        {
            $item['itunes_episode_type'] = 0;
        }
        elseif ($validated['itunes_episode_type'] == null && $validated['itunes_episode_type'] == "trailer")
        {
            $item['itunes_episode_type'] = 1;
        }
        elseif ($validated['itunes_episode_type'] == null && $validated['itunes_episode_type'] == "bonus")
        {
            $item['itunes_episode_type'] = 2;
        }
        $item['spotify_restriction'] = $validated['spotify_countries'];
        $item['order'] = $validated['spotify_order'];
        $item['spotify_start'] = date("Y-m-d H:i:s", strtotime($validated['spotify_start']));
        $item['spotify_end'] = date("Y-m-d H:i:s", strtotime($validated['spotify_end']));
        $item['spotify_chapters'] = $validated['spotify_chapters'];
        $item['spotify_keywords'] = explode(",", $validated['spotify_keywords']);

        Episode::create($item);

        return redirect()->route('episode.index', $this->podcast->id);

    }

    public function render()
    {
        $countries = Country::where('id', '!=', NULL)->orderBy('name', 'asc')->get();
        $podcast = $this->podcast;
        return view('episodes.partials.create-episode-form', compact('podcast', 'countries'));
    }
}
