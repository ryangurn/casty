<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NewFeedPodcastForm extends Component
{
    public $podcast;
    public $new_feed;

    protected $rules = [
        'new_feed' => 'nullable|url'
    ];

    public function mount($podcast)
    {
        $this->new_feed = $podcast->new_feed_url;
    }

    public function updated($properties)
    {
        return $this->validateOnly($properties);
    }

    public function updateFeedURL()
    {
        $validated = $this->validate();

        $this->podcast->new_feed_url = $validated['new_feed'];
        $this->podcast->save();

        return redirect()->route('podcast.edit', $this->podcast->id);
    }

    public function render()
    {
        return view('podcasts.partials.new-feed-podcast-form');
    }
}
