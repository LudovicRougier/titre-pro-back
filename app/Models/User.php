<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\CountryEnum;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use ParagonIE\CipherSweet\BlindIndex;
use ParagonIE\CipherSweet\EncryptedRow;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Model;
use Spatie\LaravelCipherSweet\Concerns\UsesCipherSweet;
use Spatie\LaravelCipherSweet\Contracts\CipherSweetEncrypted;

class User extends Model implements JWTSubject, CipherSweetEncrypted
{
    use HasApiTokens, HasFactory, Notifiable, UsesCipherSweet, SoftDeletes;

    protected $attributes = [
        'gender' => 'Non Renseigné',
        'description' => '',
        'wanted_watch_providers' => '',
        'unwanted_genres' => '',
        'wanted_genres' => '',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'gender',
        'age',
        'description',
        'wanted_watch_providers',
        'unwanted_genres',
        'wanted_genres',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'age' => 'integer',
        'description' => 'string',
        'email' => 'string',
        'password' => 'string',
        'country' => CountryEnum::class,
        'gender' => GenderEnum::class,
        'wanted_watch_providers' => 'array',
        'wanted_genres' => 'array',
        'unwanted_genres' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function configureCipherSweet(EncryptedRow $encryptedRow): void
    {
        $encryptedRow
            ->addField('name')->addBlindIndex('name', new BlindIndex('name_index'))
            ->addField('age')->addBlindIndex('age', new BlindIndex('age_index'))
            ->addField('country')->addBlindIndex('country', new BlindIndex('country_index'))
            ->addField('gender')->addBlindIndex('gender', new BlindIndex('gender_index'))
            ->addField('description')->addBlindIndex('description', new BlindIndex('description_index'))
            ->addField('wanted_genres')->addBlindIndex('wanted_genres', new BlindIndex('wanted_genres_index'))
            ->addField('unwanted_genres')->addBlindIndex('unwanted_genres', new BlindIndex('unwanted_genres_index'))
            ->addField('wanted_watch_providers')->addBlindIndex('wanted_watch_providers', new BlindIndex('wanted_watch_providers_index'));
    }


    public function prompts(): HasMany
    {
        return $this->hasMany(Prompt::class);
    }
}
