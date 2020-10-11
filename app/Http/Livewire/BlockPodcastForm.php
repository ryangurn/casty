<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BlockPodcastForm extends Component
{
    public $podcast, $word;
    public $confirmingPodcastBlock, $confirmingPodcastUnblock;

    /**
     * @param $podcast
     */
    public function mount($podcast)
    {
        $this->word = ($podcast->itunes_block == false) ? "Block" : "Unblock" ;
    }

    /**
     * Change the block value to true
     */
    public function BlockPodcast()
    {
        $this->podcast->itunes_block = true;
        $this->podcast->save();

        return redirect()->route('podcast.edit', $this->podcast->id);
    }

    /**
     * Change the block value to false
     */
    public function UnblockPodcast()
    {
        $this->podcast->itunes_block = false;
        $this->podcast->save();

        return redirect()->route('podcast.edit', $this->podcast->id);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $word = $this->word;
        return view('podcasts.partials.block-podcast-form', compact('word'));
    }
}
