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
            'joie' => '#FFC0CB',        // Rose
            'colère' => '#FF0000',      // Rouge
            'tristesse' => '#0000FF',   // Bleu
            'peur' => '#800080',        // Violet
            'surprise' => '#FFFF00',    // Jaune
            'déception' => '#C0C0C0',   // Gris clair
            'admiration' => '#9932CC',  // Orchidée
            'appréhension' => '#FFFF99',// Beige
            'crainte' => '#800080',     // Violet
            'curiosité' => '#1E90FF',   // Bleu roi
            'détermination' => '#FF00FF',// Fuchsia
            'doute' => '#FFFF99',       // Beige
            'émerveillement' => '#ADFF2F',// Vert fluo
            'étonnement' => '#FFA07A',  // Saumon
            'excitation' => '#FFD700',  // Or
            'exaspération' => '#FF6347',// Tomate
            'frustration' => '#FF6347', // Tomate
            'générosité' => '#FF1493',  // Rose foncé
            'impatience' => '#FFFF00',  // Jaune
            'indifférence' => '#B0C4DE',// Bleu acier
            'inquiétude' => '#FF6347',  // Tomate
            'jalousie' => '#00FF00',    // Vert clair
            'malaise' => '#FF6347',     // Tomate
            'nostalgie' => '#800000',   // Bordeaux
            'panique' => '#FFFF00',     // Jaune
            'rancune' => '#000080',     // Bleu marine
            'remords' => '#8B0000',     // Rouge foncé
            'sérénité' => '#20B2AA',    // Bleu-vert
            'solitude' => '#D8BFD8',    // Lavande
            'surmenage' => '#FF4500',   // Orange
            'suspicion' => '#FFFF99',   // Beige
            'soulagement' => '#00FF7F', // Vert printemps
            'courage' => '#FF8C00',     // Orange foncé
            'confiance' => '#00FFFF',   // Cyan
            'compassion' => '#FF1493',  // Rose foncé
            'contentement' => '#FF69B4',// Rose vif
            'indécision' => '#FFDAB9',  // Pêche
            'dégoût' => '#008000',      // Vert foncé
            'vulnérabilité' => '#FF6347',// Tomate
            'pensif' => '#808080',      // Gris
            'embarras' => '#FFA07A',    // Saumon
            'envie' => '#32CD32',       // Vert lime
            'ennui' => '#FFFF99',       // Beige
            'rêverie' => '#FFA07A',     // Saumon
            'désespoir' => '#000000',   // Noir
            'contentement' => '#FF69B4',// Rose vif
            'incrédulité' => '#808000', // Olive
            'amusement' => '#FFD700',    // Or
            'apaisement' => '#00FF7F',   // Vert printemps
            'émerveillement' => '#ADFF2F',// Vert fluo
            'vengeance' => '#8B008B',   // Indigo
            'désir' => '#FF8C00',       // Orange foncé
            'amour' => '#FFC0CB',       // Rose
            'cupidité' => '#FFD700',    // Or
            'incertitude' => '#FF6347', // Tomate
            'pessimisme' => '#696969',  // Gris foncé
            'espérance' => '#90EE90',   // Vert pâle
            'engouement' => '#FFDAB9',  // Pêche
            'sincérité' => '#00BFFF',   // Bleu ciel
            'enthousiasme' => '#FF4500' // Orange
        );

        foreach ($emotions as $emotion => $color) {
            \App\Models\Emotion::factory(1)->create([
                'name' => $emotion,
                'color' => $color,
            ]);
        }
    }
}
