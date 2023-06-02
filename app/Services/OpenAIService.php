<?php

namespace App\Services;

use OpenAI;
use App\Models\Emotion;

class OpenAIService
{
    protected $user;
    protected $userInput;
    protected $prompt;
    protected $emotions;

    public function __construct($user, $userInput)
    {
        $this->user = $user;
        $this->userInput = $userInput;
        $this->emotions = implode(', ', Emotion::all('name')->pluck('name')->all());
        $this->prompt = "Please provide the following analysis (in JSON) for the given sentence:

            {
                '".$this->userInput."'
            }

            In the given format with 3 movies or TV Shows or documentary in each category (related to topics or related to this given emotions : ".$this->emotions.").

            And be sure to give a personalized message IN THE SAME LANGUAGE as the given sentence for the user by speaking to him and telling him about the movies you recommend. Without saying Hi or presenting yourself.

            GIVE THE MOVIE NAME IN ORIGINAL LANGUAGE.
            DON'T GIVE FAKE RECOMMANDATIONS.
            PROVIDE ALL THE JSON FIELDS, DON'T LEAVE EMPTY FIELDS, ESPECIALLY THE main_emotion AND THE sub_emotion fields.
            ANSWER THE JSON ONLY DON'T CHANGE THE STRUCTURE.

            Don't forget, the AI_message needs to be in the same language as the given sentence.

            Give the language of the given sentence in IETF format.

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
                },
                \"language\": \"\"
            }";
    }

    public function getOpenAIResponse()
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $this->prompt],
            ],
        ]);

        $responseIsInvalid = !$response
            || !$response->choices
            || !$response->choices[0]->message
            || !$response->choices[0]->message->content
            || !json_decode($response->choices[0]->message->content)->movies
            || (empty(json_decode($response->choices[0]->message->content)->movies->related_to_emotion)
                && empty(json_decode($response->choices[0]->message->content)->movies->related_to_topic));

        return $responseIsInvalid
            ? $this->getOpenAIResponse()
            : json_decode($response->choices[0]->message->content);
    }
}
