<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class CompletePodcastForm extends Component
{
    public $podcast, $word;
    public $confirmingPodcastComplete, $confirmingPodcastResume;

    /**
     * @param $podcast
     */
    public function mount($podcast)
    {
        $this->word = ($podcast->itunes_complete == false) ? "Complete" : "Resume" ;
    }

    /**
     * @return RedirectResponse
     */
    public function CompletePodcast()
    {
        $this->podcast->itunes_complete = true;
        $this->podcast->save();

        return redirect()->route('podcast.edit', $this->podcast->id);
    }

    /**
     * @return RedirectResponse
     */
    public function ResumePodcast()
    {
        $this->podcast->itunes_complete = false;
        $this->podcast->save();

        return redirect()->route('podcast.edit', $this->podcast->id);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $word = $this->word;
        return view('podcasts.partials.complete-podcast-form', compact('word'));
    }
}
