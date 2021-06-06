<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Cat;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['MALE', 'FEMALE']);

        return [
            'name' => $this->faker->firstName(strtolower($gender)),
            'gender' => $gender,
            'birthday' => $this->faker->dateTimeThisDecade(),
            'breed_id' => Breed::inRandomOrder()->first(),
            'description' => $this->faker->sentences(3,true),
        ];
    }
}
