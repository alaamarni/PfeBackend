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
        $name=$this->faker->company;
        return [
            'name'=>$name,
            'slug'=>$name,
            'description'=>$this->faker->realText(320),
            'price'=>$this->faker->numberBetween(10000,100000),
        ];
    }
}
