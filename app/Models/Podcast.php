<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Podcast
 * @package App\Models
 */
class Podcast extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'language',
        'categories',
        'explicit',
        'link',
        'author',
        'owner',
        'itunes_title',
        'itunes_type',
        'copyright',
        'new_feed_url',
        'itunes_block',
        'itunes_complete',
        'spotify_restriction',
        'spotify_limit',
        'spotify_country_of_origin'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'categories' => 'array',
        'explicit' => 'boolean',
        'author' => 'array',
        'owner' => 'array',
        'itunes_type' => 'boolean',
        'itunes_block' => 'boolean',
        'itunes_complete' => 'boolean',
        'spotify_restriction' => 'array',
    ];
}
