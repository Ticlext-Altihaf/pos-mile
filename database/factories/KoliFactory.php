<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Koli>
 */
class KoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $package = Package::inRandomOrder()->first();
        return [
            'package_id' => $package->id,
            'weight' => rand(1, 15),
            'length' => $this->faker->randomNumber(1),
            'width' => $this->faker->randomNumber(1),
            'height' => $this->faker->randomNumber(1),
            'description' => $this->faker->word(),
            'surcharge' => $this->faker->word(),
            'goods_value' => $this->faker->randomNumber(4),
            'amount' => rand(1, 2)
        ];
    }
}
