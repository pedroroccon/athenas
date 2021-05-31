<?php

namespace Athenas\Models\Factories;

use Athenas\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFactory extends Factory
{

    use RefreshDatabase;

    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->numerify('###'), 
            'name' => $this->faker->sentence(2)
        ];
    }
}