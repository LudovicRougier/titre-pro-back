<?php

namespace App\Services;

use OpenAI;
use App\Models\Emotion;

class OpenAIService
{
    protected $user;
    protected $userInput;
    protected $isPersonnalized;
    protected $isOpposite;
    protected $prompt;
    protected $emotions;

    public function __construct($user, $userInput, $isPersonnalized = false, $isOpposite = false)
    {
        $this->user = $user;
        $this->userInput = $userInput;
        $this->isPersonnalized = $isPersonnalized;
        $this->isOpposite = $isOpposite ? 'less' : 'most';
        $this->emotions = implode(', ', Emotion::all('name')->pluck('name')->all());
        $this->prompt = 'Your are a tool which purpose is to analyze a given sentence and choose two emotions among the given ones that correspond the '.$this->isOpposite.' to the given sentence.
        You have to find the language of the given sentence.
        Then propose 3 movies or tv shows related to this emotions and 3 movies or tv shows related to the topic of the given sentence.
        Finally you have to answer a short message to the given sentence.

        The given sentence is : '.$this->userInput.'
        The given emotions are : '.$this->emotions.'.

        The followings are variables.
        All words written in capital letters are very important.
        Based on the given sentence and the given emotions, you have to fill ALL the others variables, from $A to $R and place them in the formated JSON below.
        ALL variables starting with $t HAVE TO BE TRANSLATED in the same language of the given sentence.
        Your response HAVE TO BE the formated json filled.

        $A = Give the language of the given sentence in locale format like en-US or fr-FR for example.

        $B = Pick 1 emotion contained in the given emotions that correspond the '.$this->isOpposite.' to the given sentence.
        $tC = The emotion used for $B translated IN THE SAME LANGUAGE as the given sentence.
        $D = Pick 1 emotion contained in the given emotions that correspond the '.$this->isOpposite.' to the given sentence but different from $B.
        $tE = The emotion used for $D translated IN THE SAME LANGUAGE as the given sentence.

        $F = Give a first REAL movie or TV show ORIGINAL NAME related to $B and $D.
        $G = Give the release date of $F.

        $H = Give a second REAL movie or TV show ORIGINAL NAME related to $B and $D, DIFFERENT FROM $F.
        $I = Give the release date of $H.

        $J = Give a third REAL movie or TV show ORIGINAL NAME related to $B and $D, DIFFERENT FROM $F AND $H.
        $K = Give the release date of $J.

        $L = Give a first REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence.
        $M = Give the release date of $L.

        $N = Give a second REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence, DIFFERENT FROM $F, $H, $J AND $L.
        $O = Give the release date of $N.

        $P = Give a third REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence, DIFFERENT FROM $F, $H, $J, $L AND $N.
        $Q = Give the release date of $P.

        $tR = Generate a SHORT personalized and sophisticated sentence (30 words max) IN THE SAME LANGUAGE as the given sentence, related to movies WITHOUT NAMING THEM, emotions WITHOUT NAMING THEM NEITHER, and the detected topic.

        Formated JSON :

        {
            "language": "$A",
            "emotion": {
                "main_emotion": "$B",
                "main_emotion_translation": "$tC",
                "sub_emotion": "$D",
                "sub_emotion_translation": "$tE",
            },
            "movies": {
                "related_to_emotion": [
                    {
                        "title": "$F",
                        "year": "$G"
                    },
                    {
                        "title": "$H",
                        "year": "$I"
                    },
                    {
                        "title": "$J",
                        "year": "$K"
                    }
                ],
                "related_to_topic": [
                    {
                        "title": "$L",
                        "year": "$M"
                    },
                    {
                        "title": "$N",
                        "year": "$O"
                    },
                    {
                        "title": "$P",
                        "year": "$Q"
                    }
                ]
            },
            "AI_message": "$tR"
        }';
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
            || !json_decode($response->choices[0]->message->content)
            || !json_decode($response->choices[0]->message->content)->movies
            || !json_decode($response->choices[0]->message->content)->AI_message
            || !json_decode($response->choices[0]->message->content)->language
            || !json_decode($response->choices[0]->message->content)->emotion
            || (empty(json_decode($response->choices[0]->message->content)->emotion->main_emotion)
                && empty(json_decode($response->choices[0]->message->content)->emotion->sub_emotion))
            || (empty(json_decode($response->choices[0]->message->content)->movies->related_to_emotion)
                && empty(json_decode($response->choices[0]->message->content)->movies->related_to_topic));

        return $responseIsInvalid
            ? $this->getOpenAIResponse()
            : json_decode($response->choices[0]->message->content);
    }
}
