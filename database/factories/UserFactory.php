<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $age = fake()->numberBetween(7, 12);

        return [
            'id' => fake()->unique()->randomNumber(6, true),
            'username' => fake()->userName(),
            'name' => fake()->name(),
            'role' => 'student',
            'age' => $age,
            'telno' => $this->generateUniqueRandomTelNo(),
            'school' => 'SJK(C) Bukit Serdang',
            'standard' => $age - 6,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10)
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

    private function generateUniqueRandomTelNo()
    {
        do {
            $telno = '01';
            $digit = fake()->randomDigit();
            if ($digit == 1) {
                $telno .= $digit;
                $telno .= '-';
                $telno .= fake()->randomNumber(8, true);
            } else { // $digit is 0-9 except 1
                $telno .= $digit;
                $telno .= '-';
                $telno .= fake()->randomNumber(7, true);
            }
        } while (User::where('telno', $telno)->exists());

        return $telno;
        // fake()->phoneNumber()
    }
}
