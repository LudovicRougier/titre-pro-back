<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prompt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_input',
        'custom_answer',
        'is_positive',
        'language',
        'movies_related_to_emotions',
        'movies_related_to_topic',
        'main_emotion_id',
        'sub_emotion_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'movies_related_to_emotions' => 'array',
        'movies_related_to_topic' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mainEmotion(): BelongsTo
    {
        return $this->belongsTo(Emotion::class);
    }

    public function subEmotion(): BelongsTo
    {
        return $this->belongsTo(Emotion::class);
    }
}
