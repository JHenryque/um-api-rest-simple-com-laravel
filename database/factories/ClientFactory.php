<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Campos fake
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            // Adicione mais campos conforme o model Client
        ];
    }
}
