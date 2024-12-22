<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Session;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardGot>
 */
class CardGotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'imageUrl' => $this->faker->imageUrl(),
            'setName' => $this->faker->text(10),
            'prezzo' => $this->faker->randomFloat(1, 0, 5000),
            'rarity' => 'rare',
            'foil' => false,
            'ref' => 1,
            'prezzo_consigliato' => $this->faker->randomFloat(1, 0, 5000),
            'manaCost' => '{G}',
            'type' => 'Instant',
            'text' => $this->faker->text(30),
            'flavor'=> $this->faker->text(20),
            'session_id' => Session::factory()
        ];
    }
}
