<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Episode
 * @package App\Models
 */
class Episode extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'podcast_id',
        'title',
        'enclosure',
        'guid',
        'publishing_date',
        'description',
        'link',
        'image',
        'explicit',
        'itunes_title',
        'itunes_episode_number',
        'itunes_season_number',
        'itunes_block',
        'spotify_restriction',
        'order',
        'spotify_start',
        'spotfiy_end',
        'spotify_chapters',
        'spotify_keywords',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'enclosure' => 'array',
        'publishing_date' => 'timestamp',
        'explicit' => 'boolean',
        'spotify_restriction' => 'array',
        'spotify_start' => 'timestamp',
        'spotify_end' => 'timestamp',
        'spotify_chapters' => 'array',
        'spotify_keywords' => 'array'
    ];

    /**
     * @return HasOne
     */
    public function podcast()
    {
        return $this->hasOne(Podcast::class, 'id', 'podcast_id');
    }
}
