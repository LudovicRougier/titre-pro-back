<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TMDBService
{
    protected $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function getAllGenres()
    {
        $genres = collect([]);

        foreach (['tv', 'movie'] as $type) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
                'accept'        => 'application/json',
            ])
            ->get('https://api.themoviedb.org/3/genre/'.$type.'/list?language='.$this->language)
            ->body();

            $decodedResponse = collect(json_decode($response)->genres);

            $genresArray = $genres->pluck('name')->all();

            $decodedResponse->map(function ($value) use ($genresArray, $genres) {
                in_array($value->name, $genresArray) ?: $genres->push($value);
            });
        }

        return $genres->sortBy('name')->toArray();
    }

    public function getMedia($media)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept'        => 'application/json',
        ])
        ->get('https://api.themoviedb.org/3/search/multi?query='.urlencode($media->title).'&include_adult=false&page=1&language='.$this->language)
        ->body();

        $decodedResponse = collect(json_decode($response)->results);

        return $decodedResponse->isEmpty()
            ? null
            : $decodedResponse->first(function (object $value) use ($media) {
                if (isset($value->media_type)) {
                    if ($value->media_type === 'movie') {
                        return !empty($value->release_date)
                            ? str_contains($value->release_date, $media->year)
                            : false;
                    }

                    if ($value->media_type === 'tv') {
                        return !empty($value->first_air_date)
                            ? str_contains($value->first_air_date, $media->year)
                            : false;
                    }
                }

                return false;
            });
    }

    public function getMediaDetails($media)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept'        => 'application/json',
        ])
        ->get('https://api.themoviedb.org/3/'.$media->media_type.'/'.$media->id.'?language='.$this->language.'&append_to_response=credits')
        ->body();

        $detailedMedia = json_decode($response);
        $detailedMedia->media_type = $media->media_type;

        return $detailedMedia;
    }

    public function getMediaDirectors($media)
    {
        if (!$media->credits || !$media->credits->crew) {
            return [];
        }

        $directors = collect($media->credits->crew)
            ->filter(function (object $value) use ($media) {
                return $value->job === ($media->media_type === 'tv' ? 'Producer' : 'Director');
            })
            ->map(function($value) {
                return [
                    'id'              => $value->id,
                    'name'            => $value->name ?? $value->original_name,
                    'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
                ];
            });

        return $directors->count() > 10
            ? $directors->shift(10)->toArray()
            : $directors->toArray();
    }

    public function getMediaActors($media)
    {
        if (!$media->credits || !$media->credits->cast) {
            return [];
        }

        $actors = collect($media->credits->cast)->map(function($value) {
            return [
                'id'              => $value->id,
                'name'            => $value->name ?? $value->original_name,
                'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
            ];
        });

        return $actors->count() > 10
            ? $actors->shift(10)->toArray()
            : $actors->toArray();
    }

    public function getMediaGenres($media)
    {
        if (!$media->genres) {
            return [];
        }

        return collect($media->genres)->map(function($value) {
            return [
                'id'   => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
    }

    public function getMediaWatchProviders($media)
    {
        $language = explode('-', $this->language)[1] ?? null;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept'        => 'application/json',
        ])
        ->get('https://api.themoviedb.org/3/'.$media->media_type.'/'.$media->id.'/watch/providers')
        ->body();

        $watchProviders = json_decode($response, true)['results'];

        if (!$language || !isset($watchProviders[$language])) {
            return null;
        }

        $watchProviders = $watchProviders[$language];

        return [
            'buy'      => $watchProviders['buy'] ?? null,
            'rent'     => $watchProviders['rent'] ?? null,
            'flatrate' => $watchProviders['flatrate'] ?? null,
        ];
    }

    public function getMedias($openaiResponse, $isEmotion)
    {
        $medias = [];
        $array = $isEmotion
            ? $openaiResponse->movies->related_to_emotion
            : $openaiResponse->movies->related_to_topic;

        foreach($array as $openaiMedia) {

            $media = $this->getMedia($openaiMedia);

            if (!$media) {
                continue;
            }

            $detailedMedia  = $this->getMediaDetails($media);
            $directors      = $this->getMediaDirectors($detailedMedia);
            $actors         = $this->getMediaActors($detailedMedia);
            $genres         = $this->getMediaGenres($detailedMedia);
            $watchProviders = Auth::user()
                ? $this->getMediaWatchProviders($detailedMedia)
                : null;

            $medias[] = [
                'id'              => $detailedMedia->id,
                'title'           => $detailedMedia->media_type === 'tv'
                    ? $detailedMedia->original_name
                    : $detailedMedia->original_title,
                'type'            => $detailedMedia->media_type,
                'overview'        => $detailedMedia->overview,
                'backdrop_path'   => 'https://image.tmdb.org/t/p/original/'.$detailedMedia->backdrop_path,
                'poster_path'     => 'https://image.tmdb.org/t/p/original/'.$detailedMedia->poster_path,
                'release_date'    => $detailedMedia->media_type === 'tv'
                    ? $detailedMedia->first_air_date
                    : $detailedMedia->release_date,
                'runtime'         => $detailedMedia->media_type === 'tv'
                    ? $detailedMedia->episode_run_time
                    : $detailedMedia->runtime,
                'vote_average'    => $detailedMedia->vote_average * 1000,
                'directors'       => $directors,
                'actors'          => $actors,
                'genres'          => $genres,
                'watch_providers' => $watchProviders,
            ];
        }

        return $medias;
    }
}
