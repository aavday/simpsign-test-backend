<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Decorators\DescriptionAdder\DescriptionAdder;
use Database\Factories\decorators\DescriptionAdder\GolangDescriptionAdderDecorator;
use Database\Factories\decorators\DescriptionAdder\JavaDescriptionAdderDecorator;
use Database\Factories\Decorators\DescriptionAdder\PHPDescriptionAdderDecorator;
use Database\Factories\Decorators\DescriptionAdder\JSDescriptionAdderDecorator;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $descriptionCount = fake()->numberBetween(1, 4);
        $descriptionAdder = new DescriptionAdder();

        for ($i = 0; $i < $descriptionCount; $i++) {
            $descriptionIndex = fake()->numberBetween(1, 4);

            switch ($descriptionIndex) {
                case 1:
                    $descriptionAdder = new PHPDescriptionAdderDecorator($descriptionAdder);
                    break;
                case 2:
                    $descriptionAdder = new JSDescriptionAdderDecorator($descriptionAdder);
                    break;
                case 3:
                    $descriptionAdder = new GolangDescriptionAdderDecorator($descriptionAdder);
                    break;
                case 4:
                    $descriptionAdder = new JavaDescriptionAdderDecorator($descriptionAdder);
            }
        }

        $description = $descriptionAdder->getDescription();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'description' => Json::encode($description)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
