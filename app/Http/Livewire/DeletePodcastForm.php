<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class DeletePodcastForm extends Component
{
    public $confirmingPodcastDeletion, $podcast;

    /**
     * @return RedirectResponse
     */
    public function deletePodcast()
    {
        $this->podcast->delete();
        return redirect()->route('podcast.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('podcasts.partials.delete-podcast-form');
    }
}
