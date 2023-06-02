<?php

namespace App\Services;

use App\Models\Genre;
use App\Models\Media;
use App\Models\People;
use Illuminate\Support\Facades\Http;

class TMDBService
{
    public function getMedia($media)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept'        => 'application/json',
        ])
        ->get('https://api.themoviedb.org/3/search/multi?query='.urlencode($media->title).'&include_adult=false&page=1&language=fr-FR
        ')
        ->body();

        $decodedResponse = collect(json_decode($response)->results);

        return $decodedResponse->first(function (object $value) use ($media) {
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
        ->get('https://api.themoviedb.org/3/'.$media->media_type.'/'.$media->id.'?language=fr-FR&append_to_response=credits')
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
                $people = new People([
                    'id'              => $value->id,
                    'name'            => $value->name ?? $value->original_name,
                    'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
                ]);

                return $people->toArray();
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
            $people = new People([
                'id'              => $value->id,
                'name'            => $value->name ?? $value->original_name,
                'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
            ]);

            return $people->toArray();
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
            $genre = new Genre([
                'name' => $value->name,
            ]);

            return $genre->toArray();
        })->toArray();
    }

    public function getMedias($openaiResponse, $isEmotion)
    {
        $medias = [];
        $array = $isEmotion
            ? $openaiResponse->movies->related_to_emotion
            : $openaiResponse->movies->related_to_topic;

        foreach($array as $openaiMedia) {

            $media         = $this->getMedia($openaiMedia);
            $detailedMedia = $this->getMediaDetails($media);
            $directors     = $this->getMediaDirectors($detailedMedia);
            $actors        = $this->getMediaActors($detailedMedia);
            $genres        = $this->getMediaGenres($detailedMedia);

            $mediaModel = new Media([
                'id'            => $detailedMedia->id,
                'title'         => $detailedMedia->media_type === 'tv'
                    ? $detailedMedia->original_name
                    : $detailedMedia->original_title,
                'overview'      => $detailedMedia->overview,
                'backdrop_path' => 'https://image.tmdb.org/t/p/original/'.$detailedMedia->backdrop_path,
                'poster_path'   => 'https://image.tmdb.org/t/p/original/'.$detailedMedia->poster_path,
                'runtime'       => $detailedMedia->media_type === 'tv'
                    ? $detailedMedia->episode_run_time
                    : $detailedMedia->runtime,
                'directors'     => $directors,
                'actors'        => $actors,
                'genres'        => $genres,
            ]);

            $medias[] = $mediaModel->toArray();
        }

        return $medias;
    }
}
