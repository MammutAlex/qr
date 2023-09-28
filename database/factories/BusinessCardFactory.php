<?php

namespace Database\Factories;

use App\Models\BusinessCard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BusinessCardFactory extends Factory
{
    protected $model = BusinessCard::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'website' => $this->faker->word(),
            'facebook' => $this->faker->word(),
            'linkedin' => $this->faker->word(),
            'telegram' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
