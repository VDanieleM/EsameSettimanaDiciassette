<?php

namespace Database\Factories;

use App\Models\Progetto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attivita>
 */
class AttivitaFactory extends Factory
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
            'progetto_id' => Progetto::get()->random()->id
        ];
    }
}
