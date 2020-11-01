<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Page
 * @package App\Models
 */
class Page extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'podcast_id',
        'episode_id',
        'team_id',
        'author_id',
        'title',
        'metadata',
        'content',
        'slug'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'array',
    ];

    /**
     * @return HasOne
     */
    public function podcast()
    {
        return $this->hasOne(Podcast::class, 'id', 'podcast_id');
    }

    /**
     * @return HasOne
     */
    public function episode()
    {
        return $this->hasOne(Episode::class, 'id',' episode_id');
    }

    /**
     * @return HasOne
     */
    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    /**
     * @return HasOne
     */
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
