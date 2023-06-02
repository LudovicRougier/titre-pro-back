<?php

namespace App\GraphQL\Mutations;

use OpenAI;
use App\Models\Prompt;
use App\Models\Emotion;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class CreatePromptTest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user = $context->request()->user();
        $userInput = $args['input']['user_input'];

        $mainEmotion = Emotion::all()->random();
        $subEmotion = Emotion::all()->random();

        return $user
            ? Prompt::create([
                'user_id' => $user->id,
                'user_input' => $userInput,
                'main_emotion_id' => $mainEmotion->id,
                'sub_emotion_id' => $subEmotion->id,
                'is_positive' => $mainEmotion->is_positive,
                'custom_answer' => '$openaiResponse->AI_message: hdscvusvgyefgbrvghiehbvihrtibir',
            ])
            : new Prompt([
                'user_input' => $userInput,
                'main_emotion_id' => $mainEmotion ? $mainEmotion->id : null,
                'sub_emotion_id' => $subEmotion ? $subEmotion->id : null,
                'is_positive' => $mainEmotion ? $mainEmotion->is_positive : null,
                'custom_answer' => '$openaiResponse->AI_message: chviuerhviuerhviuhrtbihrtbhir',
            ]);
    }
}
