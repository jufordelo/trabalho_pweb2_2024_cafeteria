<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personalizado>
 */
class PersonalizadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'categoria_personalizado' => $this->faker->randomElement(
             'Bolo Morango kg',
             'Bolo Chocolate kg',
            'Bolo Red Velvet kg',
            'Bolo Baunilha kg',
            'Bolo Marta Rocha kg',
        )];
    }
}
