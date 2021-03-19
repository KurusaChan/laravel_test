<?php

namespace App\Models;

use Illuminate\Database\{Eloquent\Factories\HasFactory, Eloquent\Relations\Pivot};
use Illuminate\Notifications\Notifiable;

/**
 * Class CharacterEpisode
 *
 * @property integer $character_id
 * @property integer $episode_id
 *
 * @package App\Models
 */
class CharacterEpisode extends Pivot
{
    use HasFactory, Notifiable;

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'character_id',
        'episode_id',
    ];

}
