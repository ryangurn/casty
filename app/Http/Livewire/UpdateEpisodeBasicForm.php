<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use wapmorgan\MediaFile\Exceptions\FileAccessException;
use wapmorgan\MediaFile\Exceptions\ParsingException;
use wapmorgan\MediaFile\MediaFile;

class UpdateEpisodeBasicForm extends Component
{
    public $podcast, $episode;
    public $title, $enclosure;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'enclosure' => 'nullable|file|mimes:mp3|max:205000', // 200mb (thanks spotify)
    ];

    public function mount($podcast, $episode)
    {
        $this->title = $episode->title;
    }

    public function updated($parameter)
    {
        return $this->validateOnly($parameter);
    }

    public function updateEpisode()
    {
        $validated = $this->validate();

        $episode = $this->episode;
        $episode->title = $validated['title'];
        if (isset($validated['enclosure']) && $validated['enclosure'] != null)
        {
            $media = $this->enclosure->storeAs($this->podcast->id . '-media', time() . '.'. $this->enclosure->extension(), 'public');

            $duration = null;
            $bitrate = null;
            $samplerate = null;
            $lossless = null;
            $vbr = null;
            try {
                $file = MediaFile::open($this->enclosure->getRealPath());
                if ($file->isAudio())
                {
                    $audio = $file->getAudio();
                    $duration = $audio->getLength();
                    $bitrate = $audio->getBitRate();
                    $samplerate = $audio->getSampleRate();
                    $lossless = $audio->isLossless();
                    $vbr = $audio->isVariableBitRate();
                }
            } catch (FileAccessException | ParsingException $e) {
                return redirect()->back()->withErrors(['Unable to verify the audio file']);
            }

            $item['enclosure'] = ['file' => $media, 'length' => $this->enclosure->getSize(),
                'duration' => $duration, 'bitrate' => $bitrate, 'samplerate' => $samplerate, 'lossless' => $lossless, 'vbr' => $vbr
            ];
        }
        $episode->save();

        return redirect()->route('episode.show', [$this->podcast->id, $this->episode->id]);

    }

    public function render()
    {
        return view('episodes.partials.update-episode-basic-form');
    }
}
