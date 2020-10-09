<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(string[] $array)
 */
class Country extends Model
{
    protected $fillable = [
        'name',
        'iso_3166_1_2',
        'iso_3166_1_3',
    ];
}
