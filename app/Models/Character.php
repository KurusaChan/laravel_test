<?php

namespace App\Models;

use Illuminate\Database\{Eloquent\Factories\HasFactory,
    Eloquent\Model,
    Eloquent\Relations\BelongsToMany,
    Eloquent\Relations\HasMany};
use Illuminate\Notifications\Notifiable;

/**
 * Class Character
 *
 * @property string $name
 * @property string $nickname
 * @property string $portrayed
 * @property string $img
 * @property string $occupations
 * @property string $birthday_date
 *
 * @package App\Models
 */
class Character extends Model
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'portrayed',
        'img',
        'birthday_date',
        'occupations',
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
    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class)->using(CharacterEpisode::class);
    }

}
