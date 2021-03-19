<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\{Eloquent\Factories\HasFactory, Eloquent\Model, Eloquent\Relations\BelongsTo};

/**
 * Class Quote
 *
 * @property int $episode_id
 * @property int $character_id
 * @property string $quote
 *
 * @package App\Models
 */
class Quote extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'episode_id',
        'character_id',
        'quote',
    ];

    /** RELATIONS */
    /**
     * @return BelongsTo
     */
    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }
    /**
     * @return BelongsTo
     */
    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

}
