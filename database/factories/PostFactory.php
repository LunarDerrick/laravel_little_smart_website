<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use App\Models\Post;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch all existing user IDs
        // $userIds = User::pluck('id')->toArray();
        $userIds = User::teachers()->pluck('id')->toArray();

        // Set time posted to be consistent in Malaysia
        $timezone = Config::get('app.timezone');

        // Generate image URL using an external service
        $imageUrl = 'https://loremflickr.com/600/420';

        // Define local storage path
        $imageName = uniqid() . '.jpg';
        $localPath = 'uploads/' . $imageName;

        // Download and save the image locally
        downloadImage($imageUrl, $localPath);

        return [
            // randomly assign post maker, may duplicate
            'userid' => fake()->randomElement($userIds),
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'images' => json_encode([$imageName]), // Store JSON-encoded array
            'createdtime' => fake()->dateTimeBetween($startDate = '2018-12-17', $endDate = 'now', $timezone),
        ];
    }
}
