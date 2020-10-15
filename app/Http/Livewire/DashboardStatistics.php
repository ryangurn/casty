<?php

namespace App\Http\Livewire;

use App\Models\Episode;
use App\Models\Podcast;
use Livewire\Component;

class DashboardStatistics extends Component
{
    public function render()
    {
        $user = auth()->user();
        $podcastCount = 0;
        $episodeCount = 0;
        foreach($user->allTeams() as $team)
        {
            $podcastCount += $team->podcasts->count();
            foreach($team->podcasts as $podcast)
            {
                $episodeCount += $podcast->episodes->count();
            }
        }

        return view('dashboard.partials.dashboard-statistics', compact('podcastCount', 'episodeCount'));
    }
}
