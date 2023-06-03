<?php

namespace App\GraphQL\Mutations;

use App\Models\Prompt;
use App\Models\Emotion;
use App\Services\OpenAIService;
use App\Services\TMDBService;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class CreatePrompt
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // Get needed infos from request
        $user = $context->request()->user();
        $userInput = $args['input']['user_input'];
        $isPersonnalized = $args['input']['is_personnalized'];
        $isOpposite = $args['input']['is_opposite'];

        // Instanciate OpenAiService and get response
        $openaiService = new OpenAIService($user, $userInput, $isPersonnalized, $isOpposite);
        $openaiResponse = $openaiService->getOpenAIResponse();

        // Instanciate TMDBService and then get arrays of medias
        $tmdbService = new TMDBService($openaiResponse->language);
        $emotionMedias = $tmdbService->getMedias($openaiResponse, true);
        $topicMedias = $tmdbService->getMedias($openaiResponse, false);

        // Find emotions in DB from OpenAI response
        $mainEmotion = Emotion::where('name', $openaiResponse->emotion->main_emotion)->first();
        $subEmotion = Emotion::where('name', $openaiResponse->emotion->sub_emotion)->first();

        // Create new Prompt model and fill it
        $prompt = new Prompt([
            'user_input'                 => $userInput,
            'main_emotion_id'            => $mainEmotion
                ? $mainEmotion->id
                : null,
            'sub_emotion_id'             => $subEmotion
                ? $subEmotion->id
                : null,
            'is_positive'                => $mainEmotion
                ? $mainEmotion->is_positive
                : null,
            'custom_answer'              => $openaiResponse->AI_message,
            'language'                   => $openaiResponse->language,
            'movies_related_to_emotions' => $emotionMedias,
            'movies_related_to_topic'    => $topicMedias,
        ]);

        // Save the Prompt model if a User is connected
        if ($user) {
            $prompt->user_id = $user->id;
            $prompt->save();
        }

        return $prompt;
    }
}
