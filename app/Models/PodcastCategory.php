<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class PodcastCategory
 * @package App\Models
 */
class PodcastCategory extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'name',
        'programming'
    ];

    /**
     * @return HasOne
     */
    public function category() {
        return $this->hasOne(PodcastCategory::class, 'id', 'category_id');
    }
}
