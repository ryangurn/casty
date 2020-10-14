<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteEpisodeForm extends Component
{
    public $confirmingEpisodeDeletion, $episode, $podcast;

    public function deleteEpisode()
    {
//        dd($this->episode->enclosure['file']);
        $file = $this->episode->enclosure['file'];
        Storage::disk('public')->delete($file);

        if ($this->episode->image != null) {
            $image = $this->episode->image;
            Storage::disk('public')->delete($image);
        }
        $this->episode->delete();

        return redirect()->route('episode.index', [$this->podcast->id]);
    }

    public function render()
    {
        return view('episodes.partials.delete-episode-form');
    }
} // 2261
