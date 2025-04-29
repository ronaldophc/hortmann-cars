<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['car', 'motorcycle']),
            'model' => fake()->word(),
            'manufacturer' => fake()->word(),
            'fuel_type' => fake()->randomElement(['gasoline', 'alcohol', 'flex', 'diesel']),
            'steering_type' => fake()->randomElement(['mechanical', 'hydraulic', 'electric']),
            'transmission' => fake()->randomElement(['automatic', 'manual']),
            'doors' => fake()->numberBetween(0, 5),
            'year' => fake()->year(),
            'mileage' => fake()->numberBetween(0, 400000),
            'price' => fake()->numberBetween(0, 100000),
            'license_plate' => strtoupper(fake()->regexify('[A-z]{3}-\d[A-j0-9]\d{2}')),
            'description' => fake()->text(200),
            'is_active' => fake()->boolean(),
            'user_id' => User::factory()
        ];
    }
}
