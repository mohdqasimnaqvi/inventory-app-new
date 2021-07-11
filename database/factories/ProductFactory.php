<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Product;

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
            'title' => implode(' ', $this->faker->words(3)),
            'image' => $this->faker->word,
            'price' => $this->faker->randomFloat(0, 0, 255),
            'price_unit' => $this->faker->word,
            'quantity' => $this->faker->randomFloat(0, 0, 255),
            'quantity_unit' => $this->faker->word,
            'is_daily' => $this->faker->boolean,
            'is_hidden' => $this->faker->boolean,
            'has_reminder' => $this->faker->boolean,
        ];
    }
}
