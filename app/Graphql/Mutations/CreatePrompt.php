<?php

namespace App\GraphQL\Mutations;

use OpenAI;
use App\Models\Prompt;
use App\Models\Emotion;
use App\Models\Genre;
use App\Models\Media;
use App\Models\People;
use Illuminate\Support\Facades\Http;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class CreatePrompt
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user = $context->request()->user();
        $userInput = $args['input']['user_input'];


        $allEmotions = Emotion::all('name')->pluck('name')->all();
        $emotionsString = implode(', ', $allEmotions);

        $prompt = "Please provide the following analysis (in JSON) for the given sentence:

            {
                '".$userInput."'
            }

            In the given format with 3 movies or TV Shows or documentary in each category (related to topics or related to this given emotions : ".$emotionsString.").

            And be sure to give a personalized message IN THE SAME LANGUAGE as the given sentence for the user by speaking to him and telling him about the movies you recommend. Without saying Hi or presenting yourself.

            GIVE THE MOVIE NAME IN ORIGINAL LANGUAGE.
            DON'T GIVE FAKE RECOMMANDATIONS.
            PROVIDE ALL THE JSON FIELDS, DON'T LEAVE EMPTY FIELDS, ESPECIALLY THE main_emotion AND THE sub_emotion fields.
            ANSWER THE JSON ONLY DON'T CHANGE THE STRUCTURE.

            Don't forget, the AI_message needs to be in the same language as the given sentence.

            Format :
            {
                \"AI_message\": \"\",
                \"emotion\": {
                    \"main_emotion\": \"\",
                    \"sub_emotion\": \"\",
                },
                \"movies\": {
                    \"related_to_emotion\": [
                        {
                            \"title\": \"\",
                            \"year\": \"\"
                        }
                    ],
                    \"related_to_topic\": [
                        {
                            \"title\": \"\",
                            \"year\": \"\"
                        }
                    ]
                }
            }";


        $client = OpenAI::client(env('OPENAI_API_KEY'));


        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        if ($response->choices[0]) {
            $openaiResponse = json_decode($response->choices[0]->message->content);

            $emotionMovies = [];
            $topicMovies = [];

            dd($openaiResponse);
            foreach([$openaiResponse->movies->related_to_emotion, $openaiResponse->movies->related_to_topic] as $i => $movie) {
                foreach($movie as $emotionMovie) {

                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
                        'accept' => 'application/json',
                    ])
                    ->get('https://api.themoviedb.org/3/search/multi?query='.urlencode($emotionMovie->title).'&include_adult=false&page=1&language=fr-FR
                    ')
                    ->body();

                    $decodedResponse = collect(json_decode($response)->results);

                    $movieFromTMDB = $decodedResponse->first(function (object $value) use ($emotionMovie) {
                        if ($value->media_type === 'movie') {
                            return !empty($value->release_date)
                                ? str_contains($value->release_date, $emotionMovie->year)
                                : false;
                        }

                        if ($value->media_type === 'tv') {
                            return !empty($value->first_air_date)
                                ? str_contains($value->first_air_date, $emotionMovie->year)
                                : false;
                        }

                        return false;
                    });


                    $response2 = Http::withHeaders([
                        'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
                        'accept' => 'application/json',
                    ])
                    ->get('https://api.themoviedb.org/3/'.$movieFromTMDB->media_type.'/'.$movieFromTMDB->id.'?language=fr-FR&append_to_response=credits')
                    ->body();

                    $decodedResponse2 = json_decode($response2);

                    $directors = collect($decodedResponse2->credits->crew)->filter(function (object $value) use ($movieFromTMDB) {
                        // dd($value, $movieFromTMDB->media_type === 'tv' ? 'Producer' : 'Director');
                        return $value->job === ($movieFromTMDB->media_type === 'tv' ? 'Producer' : 'Director');
                    });

                    $directors = $directors->map(function($value) {
                        $people = new People([
                            'id' => $value->id,
                            'name' => $value->name ?? $value->original_name,
                            'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
                        ]);

                        return $people->toArray();
                    });

                    $directorsArray = $directors->count() > 10
                        ? $directors->shift(10)->toArray()
                        : $directors->toArray();


                    $actors = collect($decodedResponse2->credits->cast)->map(function($value) {
                        $people = new People([
                            'id' => $value->id,
                            'name' => $value->name ?? $value->original_name,
                            'profile_picture' => 'https://image.tmdb.org/t/p/original/'.$value->profile_path,
                        ]);

                        return $people->toArray();
                    });

                    $actorsArray = $actors->count() > 10
                        ? $actors->shift(10)->toArray()
                        : $actors->toArray();


                    $genresArray = collect($decodedResponse2->genres)->map(function($value) {
                        $genre = new Genre([
                            'name' => $value->name,
                        ]);

                        return $genre->toArray();
                    })->toArray();



                    if ($i === 0) {
                        $movie = new Media([
                                'id' => $decodedResponse2->id,
                                'title' => $movieFromTMDB->media_type === 'tv' ? $decodedResponse2->original_name : $decodedResponse2->original_title,
                                'overview' => $decodedResponse2->overview,
                                'backdrop_path' => 'https://image.tmdb.org/t/p/original/'.$decodedResponse2->backdrop_path,
                                'poster_path' => 'https://image.tmdb.org/t/p/original/'.$decodedResponse2->poster_path,
                                'runtime' => $movieFromTMDB->media_type === 'tv' ? $decodedResponse2->episode_run_time : $decodedResponse2->runtime,
                                'directors' => $directorsArray,
                                'actors' => $actorsArray,
                                'genres' => $genresArray,
                            ]);

                        $emotionMovies[] = $movie->toArray();
                    }



                    if ($i === 1) {
                        $movie = new Media([
                            'id' => $decodedResponse2->id,
                            'title' => $movieFromTMDB->media_type === 'tv' ? $decodedResponse2->original_name : $decodedResponse2->original_title,
                            'overview' => $decodedResponse2->overview,
                            'backdrop_path' => 'https://image.tmdb.org/t/p/original/'.$decodedResponse2->backdrop_path,
                            'poster_path' => 'https://image.tmdb.org/t/p/original/'.$decodedResponse2->poster_path,
                            'runtime' => $movieFromTMDB->media_type === 'tv' ? $decodedResponse2->episode_run_time : $decodedResponse2->runtime,
                            'directors' => $directorsArray,
                            'actors' => $actorsArray,
                            'genres' => $genresArray,
                        ]);

                        $topicMovies[] = $movie->toArray();
                    }
                }
            }

            $mainEmotion = Emotion::where('name', $openaiResponse->emotion->main_emotion)->first();
            $subEmotion = Emotion::where('name', $openaiResponse->emotion->sub_emotion)->first();

            $prompt = new Prompt([
                'user_input' => $userInput,
                'main_emotion_id' => $mainEmotion ? $mainEmotion->id : null,
                'sub_emotion_id' => $subEmotion ? $subEmotion->id : null,
                'is_positive' => $mainEmotion ? $mainEmotion->is_positive : null,
                'custom_answer' => $openaiResponse->AI_message,
                'language' => '$openaiResponse->language',
                'movies_related_to_emotions' => $emotionMovies,
                'movies_related_to_topic' => $topicMovies,
            ]);

            if ($user) {
                $prompt->user_id = $user->id;
                $prompt->save();
            }


            return $prompt;
        }
    }
}
