<?php

namespace App\Http\Livewire;

use App\Models\Episode;
use App\Models\Podcast;
use Livewire\Component;

class DashboardStatistics extends Component
{
    public function render()
    {
        $podcastCount = Podcast::all()->count();
        $episodeCount = Episode::all()->count();
        return view('dashboard.partials.dashboard-statistics', compact('podcastCount', 'episodeCount'));
    }
}
