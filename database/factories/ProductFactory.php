<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

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
            'title' => $this->faker->sentence(4),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->regexify('[0-9]{2,4}'),
            'price_unit' => $this->faker->word,
            'quantity' => $this->faker->regexify('[0-9]{2,4}'),
            'quantity_unit' => $this->faker->word,
            'is_daily' => $this->faker->boolean,
            'is_hidden' => $this->faker->boolean,
            'has_reminder' => $this->faker->boolean,
        ];
    }
}
