<?php

namespace Database\Factories;

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
            'type' => $this->faker->randomElement(['car', 'motorcycle']),
            'model' => $this->faker->word(),
            'manufacturer' => $this->faker->word(),
            'fuel_type' => $this->faker->randomElement(['gasoline', 'alcohol', 'flex', 'diesel']),
            'steering_type' => $this->faker->randomElement(['mechanical', 'hydraulic', 'electric']),
            'transmission' => $this->faker->randomElement(['automatic', 'manual']),
            'doors' => $this->faker->numberBetween(0, 5),
            'year' => $this->faker->year(),
            'mileage' => $this->faker->numberBetween(0, 400000),
            'price' => $this->faker->numberBetween(0, 100000),
            'license_plate' => strtoupper($this->faker->regexify('[A-z]{3}-\d[A-j0-9]\d{2}')),
            'description' => $this->faker->text(200),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
