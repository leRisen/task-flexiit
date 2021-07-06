<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(500, 2200),
            'title' => $this->faker->words(3, true),
            'options' => json_encode([
                'color' => $this->faker->colorName,
                'height' => $this->faker->numberBetween(50, 200),
                'weight' => $this->faker->numberBetween(200, 500),
            ]),
            'description' => $this->faker->realText(200),
        ];
    }
}
