<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progetto>
 */
class ProgettoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(20),
            'descrizione' => $this->faker->text(200),
            'immagine' => 'https://picsum.photos/id/' . fake()->randomNumber(2) . '/200/300',
            'user_id' => User::get()->random()->id
        ];
    }
}
