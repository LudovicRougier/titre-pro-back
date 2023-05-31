<?php

namespace App\GraphQL\Mutations;

use OpenAI;
use App\Models\Prompt;
use App\Models\Emotion;
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

        $allEmotions = Emotion::all('name')->toArray();
        $emotionsString = '';

        foreach ($allEmotions as $emotion) {
            $emotionsString .= implode('', $emotion) . ',';
        }

        $emotionsString = rtrim($emotionsString, ',');

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
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $openaiResponse = json_decode($response->choices[0]->message->content);

        $mainEmotion = Emotion::where('name', $openaiResponse->emotion->main_emotion)->first();
        $subEmotion = Emotion::where('name', $openaiResponse->emotion->sub_emotion)->first();

        return $user
            ? Prompt::create([
                'user_id' => $user->id,
                'user_input' => $userInput,
                'main_emotion_id' => $mainEmotion ? $mainEmotion->id : null,
                'sub_emotion_id' => $subEmotion ? $subEmotion->id : null,
                'is_positive' => $mainEmotion ? $mainEmotion->is_positive : null,
                'custom_answer' => $openaiResponse->AI_message,
            ])
            : new Prompt([
                'user_input' => $userInput,
                'main_emotion_id' => $mainEmotion ? $mainEmotion->id : null,
                'sub_emotion_id' => $subEmotion ? $subEmotion->id : null,
                'is_positive' => $mainEmotion ? $mainEmotion->is_positive : null,
                'custom_answer' => $openaiResponse->AI_message,
            ]);
    }
}
