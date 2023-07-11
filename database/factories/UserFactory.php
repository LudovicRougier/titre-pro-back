<?php

namespace Database\Factories;

use App\Enums\CountryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $genres = [
        [
            "id" => "28",
            "name" => "Action"
        ],
        [
            "id" => "10759",
            "name" => "Action & Adventure"
        ],
        [
            "id" => "12",
            "name" => "Adventure"
        ],
        [
            "id" => "16",
            "name" => "Animation"
        ],
        [
            "id" => "35",
            "name" => "Comedy"
        ],
        [
            "id" => "80",
            "name" => "Crime"
        ],
        [
            "id" => "99",
            "name" => "Documentary"
        ],
        [
            "id" => "18",
            "name" => "Drama"
        ],
        [
            "id" => "10751",
            "name" => "Family"
        ],
        [
            "id" => "14",
            "name" => "Fantasy"
        ],
        [
            "id" => "36",
            "name" => "History"
        ],
        [
            "id" => "27",
            "name" => "Horror"
        ],
        [
            "id" => "10762",
            "name" => "Kids"
        ],
    ];

    protected $providers = [
        [
            "provider_id" => "8",
            "provider_name" => "Netflix",
            "display_priority" => 5,
            "logo_path" => "\/t2yyOv40HZeVlLjYsCsPHnWLk4W.jpg"
        ],
        [
            "provider_id" => "9",
            "provider_name" => "Amazon Prime Video",
            "display_priority" => 1,
            "logo_path" => "\/emthp39XA2YScoYL1p0sdbAH2WA.jpg"
        ],
        [
            "provider_id" => "350",
            "provider_name" => "Apple TV Plus",
            "display_priority" => 9,
            "logo_path" => "\/6uhKBfmtzFqOcLousHwZuzcrScK.jpg"
        ],
        [
            "provider_id" => "283",
            "provider_name" => "Crunchyroll",
            "display_priority" => 15,
            "logo_path" => "\/8Gt1iClBlzTeQs8WQm8UrCoIxnQ.jpg"
        ],
        [
            "provider_id" => "192",
            "provider_name" => "YouTube",
            "display_priority" => 14,
            "logo_path" => "\/oIkQkEkwfmcG7IGpRR1NB8frZZM.jpg"
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wanted_genres = [];
        $unwanted_genres = [];
        $wanted_watch_providers = [];

        for ($i = 0; $i < rand(1, 4); $i++) {
            shuffle($this->genres);
            $wanted_genres[] = array_pop($this->genres);
        }

        for ($i = 0; $i < rand(1, 4); $i++) {
            shuffle($this->genres);
            $unwanted_genres[] = array_pop($this->genres);
        }

        for ($i = 0; $i < rand(1, 4); $i++) {
            $wanted_watch_providers[] = array_pop($this->providers);
        }

        return [
            'name' => fake()->name(),
            'email' => 'test@test.com',
            'age' => rand(15, 100),
            'country' => CountryEnum::cases()[array_rand(CountryEnum::cases())]->value,
            'gender' => 'Non Renseigné',
            'password' => 'MyPassword1!',
            'description' => rand(1, 100) <= 50 ? fake()->paragraphs(rand(1, 5), true) : null,
            'wanted_genres' => $wanted_genres,
            'unwanted_genres' => $unwanted_genres,
            'wanted_watch_providers' => $wanted_watch_providers,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
