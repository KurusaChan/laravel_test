<?php

namespace App\Models;

use Illuminate\Database\{Eloquent\Factories\HasFactory,
    Eloquent\Model,
    Eloquent\Relations\BelongsToMany,
    Eloquent\Relations\HasMany};
use Illuminate\Notifications\Notifiable;

/**
 * Class Episode
 *
 * @property string $title
 * @property string $air_date
 *
 * @package App\Models
 */
class Episode extends Model
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'air_date',
    ];

    /** RELATIONS */
    /**
     * @return HasMany
     */
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * @return BelongsToMany
     */
    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class)->using(CharacterEpisode::class);
    }

}
