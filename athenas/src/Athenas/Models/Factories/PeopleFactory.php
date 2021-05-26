<?php

namespace Athenas\Models\Factories;

use Athenas\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeopleFactory extends Factory
{

    use RefreshDatabase;

    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

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