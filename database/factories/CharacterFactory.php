<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->firstName . $this->faker->lastName,
            'nickname'      => $this->faker->userName,
            'portrayed'     => $this->faker->name,
            'occupations'   => json_encode([
                $this->faker->jobTitle
            ]),
            'img'           => $this->faker->imageUrl(),
            'birthday_date' => $this->faker->date(),
        ];
    }
}
