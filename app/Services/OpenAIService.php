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
        $this->isOpposite = $isOpposite ? 'the opposite of ' : '';
        $this->emotions = implode(', ', Emotion::all('name')->pluck('name')->all());
        $this->prompt = 'Your are a tool which purpose is to analyze a given sentence and choose two emotions that correspond the most to this sentence among the given ones and translate them into the language of given sentence.
        Then propose 3 movies or tv shows related to '.$this->isOpposite.'this emotions and 3 movies or tv shows related to the topic of the given sentence.
        Finally you have to answer a short message to the given sentence.

        The given sentence is : '.$this->userInput.'
        The given emotions are : '.$this->emotions.'

        The followings are variables.
        All words written in capital letters are very important.
        Based on the given sentence and the given emotions, you have to fill ALL the others variables, from $A to $P and place them in the formated JSON below.
        Your response HAVE TO BE the formated json filled.

        $A = Pick 1 emotion contained in the given emotions that correspond the most to the given sentence.
        $B = Pick 1 emotion contained in the given emotions that correspond the most to the given sentence but different from $A.

        $C = Give a first REAL movie or TV show ORIGINAL NAME related to '.$this->isOpposite.'$A and $B.
        $D = Give the release date of $C.

        $E = Give a second REAL movie or TV show ORIGINAL NAME related to '.$this->isOpposite.'$A and $B, DIFFERENT FROM $C.
        $F = Give the release date of $E.

        $G = Give a third REAL movie or TV show ORIGINAL NAME related to '.$this->isOpposite.'$A and $B, DIFFERENT FROM $C AND $E.
        $H = Give the release date of $G.

        $I = Give a first REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence.
        $J = Give the release date of $I.

        $K = Give a second REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence, DIFFERENT FROM $C, $E, $G AND $I.
        $L = Give the release date of $K.

        $M = Give a third REAL movie or TV show ORIGINAL NAME related to the topic of the given sentence, DIFFERENT FROM $C, $E, $G, $I AND $K.
        $N = Give the release date of $M.

        $O = Give the language of the given sentence in IETF format.

        $P = Generate a SHORT personalized and sophisticated sentence (30 words max) IN THE SAME LANGUAGE AS THE GIVEN SENTENCE related to movies WITHOUT NAMING THEM, emotions WITHOUT NAMING THEM NEITHER, and the detected topic.



        Formated JSON :

        {
            "emotion": {
                "main_emotion": "$A",
                "sub_emotion": "$B"
            },
            "movies": {
                "related_to_emotion": [
                    {
                        "title": "$C",
                        "year": "$D"
                    },
                    {
                        "title": "$E",
                        "year": "$F"
                    },
                    {
                        "title": "$G",
                        "year": "$H"
                    }
                ],
                "related_to_topic": [
                    {
                        "title": "$I",
                        "year": "$J"
                    },
                    {
                        "title": "$K",
                        "year": "$L"
                    },
                    {
                        "title": "$M",
                        "year": "$N"
                    }
                ]
            },
            "language": "$O",
            "AI_message": "$P"
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
