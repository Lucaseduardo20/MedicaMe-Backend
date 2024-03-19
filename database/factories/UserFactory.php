<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            "id" => $this->id,
            'nome' => $this->nome,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make($this->faker->password()),
        ];
    }
}
