<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Score;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    protected $model = Score::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Fetch all existing user IDs
        // $userIds = User::pluck('id')->toArray();
        $userIds = User::students()->pluck('id')->toArray();

        $userId = fake()->unique()->randomElement($userIds);
        $standard = User::find($userId)->standard;

        return [
            // 'userid' => User::factory(), // Assigns randomly to an existing user's id
            // 'userid' => fake()->unique()->randomElement($userIds),
            'userid' => $userId,
            'mandarin' => fake()->numberBetween(0, 100),
            'english' => fake()->numberBetween(0, 100),
            'malay' => fake()->numberBetween(0, 100),
            'math' => fake()->numberBetween(0, 100),
            'science' => fake()->numberBetween(0, 100),
            'history' => ($standard >= 4 && $standard <= 6) ? fake()->numberBetween(0, 100) : null,
        ];
    }
}
