<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // USERS

        $emails = [
            'vincent@test.com',
            'philemon@test.com',
            'ludovic@test.com',
            'julien@test.com',
        ];

        foreach ($emails as $email) {
            \App\Models\User::factory(1)->create(['email' => $email]);
        }



        // EMOTIONS
        $emotions = array(
            'joy' => '#FFC0CB',            // Pink
            'anger' => '#FF0000',          // Red
            'sadness' => '#0000FF',        // Blue
            'fear' => '#800080',           // Purple
            'surprise' => '#FFFF00',       // Yellow
            'disappointment' => '#C0C0C0', // Light gray
            'admiration' => '#9932CC',     // Orchid
            'apprehension' => '#FFFF99',   // Beige
            'dread' => '#800080',          // Purple
            'curiosity' => '#1E90FF',      // Royal blue
            'determination' => '#FF00FF',  // Fuchsia
            'doubt' => '#FFFF99',          // Beige
            'wonder' => '#ADFF2F',         // Lime green
            'astonishment' => '#FFA07A',   // Salmon
            'excitement' => '#FFD700',     // Gold
            'exasperation' => '#FF6347',   // Tomato
            'frustration' => '#FF6347',    // Tomato
            'generosity' => '#FF1493',     // Deep pink
            'impatience' => '#FFFF00',     // Yellow
            'indifference' => '#B0C4DE',   // Steel blue
            'worry' => '#FF6347',          // Tomato
            'jealousy' => '#00FF00',       // Light green
            'discomfort' => '#FF6347',     // Tomato
            'nostalgia' => '#800000',      // Burgundy
            'panic' => '#FFFF00',          // Yellow
            'resentment' => '#000080',     // Navy blue
            'remorse' => '#8B0000',        // Dark red
            'serenity' => '#20B2AA',       // Blue-green
            'solitude' => '#D8BFD8',       // Lavender
            'overwork' => '#FF4500',       // Orange
            'suspicion' => '#FFFF99',      // Beige
            'relief' => '#00FF7F',         // Spring green
            'courage' => '#FF8C00',        // Dark orange
            'confidence' => '#00FFFF',     // Cyan
            'compassion' => '#FF1493',     // Deep pink
            'contentment' => '#FF69B4',    // Hot pink
            'indecision' => '#FFDAB9',     // Peach
            'disgust' => '#008000',        // Dark green
            'vulnerability' => '#FF6347',  // Tomato
            'thoughtful' => '#808080',     // Gray
            'embarrassment' => '#FFA07A',  // Salmon
            'envy' => '#32CD32',           // Lime green
            'boredom' => '#FFFF99',        // Beige
            'daydream' => '#FFA07A',       // Salmon
            'despair' => '#000000',        // Black
            'incredulity' => '#808000',    // Olive
            'amusement' => '#FFD700',      // Gold
            'soothing' => '#00FF7F',       // Spring green
            'vengeance' => '#8B008B',      // Indigo
            'desire' => '#FF8C00',         // Dark orange
            'love' => '#FFC0CB',           // Pink
            'greed' => '#FFD700',          // Gold
            'uncertainty' => '#FF6347',    // Tomato
            'pessimism' => '#696969',      // Dark gray
            'hope' => '#90EE90',           // Pale green
            'enthusiasm' => '#FFDAB9',     // Peach
            'sincerity' => '#00BFFF',      // Sky blue
        );

        foreach ($emotions as $emotion => $color) {
            \App\Models\Emotion::factory(1)->create([
                'name' => $emotion,
                'color' => $color,
            ]);
        }
    }
}
