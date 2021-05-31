<?php

namespace Athenas\Models\Factories;

use Athenas\Models\Category;
use Athenas\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonFactory extends Factory
{

    use RefreshDatabase;

    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(), 
            'code' => $this->faker->unique()->numerify('###'), 
            'name' => $this->faker->sentence(2), 
            'email' => $this->faker->safeEmail()
        ];
    }
}