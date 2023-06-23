<?php

namespace App\Models;

use ParagonIE\CipherSweet\BlindIndex;
use Illuminate\Database\Eloquent\Model;
use ParagonIE\CipherSweet\EncryptedRow;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\LaravelCipherSweet\Concerns\UsesCipherSweet;
use Spatie\LaravelCipherSweet\Contracts\CipherSweetEncrypted;

class Prompt extends Model implements CipherSweetEncrypted
{
    use UsesCipherSweet, SoftDeletes;

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
        'main_emotion_translation',
        'sub_emotion_translation',
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
        'user_input' => 'string',
        'custom_answer' => 'string',
        'is_positive' => 'boolean',
        'language' => 'string',
        'main_emotion_translation' => 'string',
        'sub_emotion_translation' => 'string',
        'movies_related_to_emotions' => 'array',
        'movies_related_to_topic' => 'array',
        'main_emotion_id' => 'integer',
        'sub_emotion_id' => 'integer',
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

    public static function configureCipherSweet(EncryptedRow $encryptedRow): void
    {
        $encryptedRow
            ->addField('user_input')->addBlindIndex('user_input', new BlindIndex('user_input_index'))
            ->addField('custom_answer')->addBlindIndex('custom_answer', new BlindIndex('custom_answer_index'))
            ->addField('is_positive')->addBlindIndex('is_positive', new BlindIndex('is_positive_index'))
            ->addField('language')->addBlindIndex('language', new BlindIndex('language_index'))
            ->addField('main_emotion_translation')->addBlindIndex('main_emotion_translation', new BlindIndex('main_emotion_translation_index'))
            ->addField('sub_emotion_translation')->addBlindIndex('sub_emotion_translation', new BlindIndex('sub_emotion_translation_index'))
            ->addField('movies_related_to_emotions')->addBlindIndex('movies_related_to_emotions', new BlindIndex('movies_related_to_emotions_index'))
            ->addField('movies_related_to_topic')->addBlindIndex('movies_related_to_topic', new BlindIndex('movies_related_to_topic_index'))
            ->addField('main_emotion_id')->addBlindIndex('main_emotion_id', new BlindIndex('main_emotion_id_index'))
            ->addField('sub_emotion_id')->addBlindIndex('sub_emotion_id', new BlindIndex('sub_emotion_id_index'));
    }
}
