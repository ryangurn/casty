<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BlockEpisodeForm extends Component
{
    public $podcast, $episode, $word;
    public $confirmingEpisodeBlock;

    public function mount($podcast, $episode)
    {
        $this->word = ($episode->itunes_block == false) ? "Block" : "Unblock" ;
    }

    /**
     * Change the block value to true
     */
    public function BlockEpisode()
    {
        $this->episode->itunes_block = true;
        $this->episode->save();

        return redirect()->route('episode.edit', [$this->podcast->id, $this->episode->id]);
    }

    /**
     * Change the block value to false
     */
    public function UnblockEpisode()
    {
        $this->episode->itunes_block = false;
        $this->episode->save();

        return redirect()->route('episode.edit', [$this->podcast->id, $this->episode->id]);
    }

    public function render()
    {
        $word = $this->word;
        return view('episodes.partials.block-episode-form', compact('word'));
    }
}
