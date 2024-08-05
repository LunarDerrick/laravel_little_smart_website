<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use App\Models\Feedback;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch all existing user IDs
        $userIds = User::pluck('id')->toArray();
        $userIds[] = null; // Append null to the array

        // Set time posted to be consistent in Malaysia
        $timezone = Config::get('app.timezone');

        return [
            // randomly assign feedback maker, may duplicate, may be null
            'userid' => fake()->randomElement($userIds),
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            // if prefer to have some read by default
            // 'is_read' => fake()->boolean,
            'createdtime' => fake()->dateTimeBetween($startDate = '2018-12-17', $endDate = 'now', $timezone),
        ];
    }
}
