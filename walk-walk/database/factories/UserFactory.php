<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'NameUser'=>$this->faker->name,
            'EmailUser'=>$this->faker->email,
            'NoTelpUser'=>$this->faker->phoneNumber,
            'DOBUser'=>$this->faker->dateTime,
            'PasswordUser'=>$this->faker->password,
            // 'NationalityUser'=>Country::factory(),
            'NationalityUser'=>Country::factory(),
            // 'NameUser'=>$this->faker->name,
        ];
    }
}
