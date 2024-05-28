<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $post = Post::inRandomOrder()->limit(1)->first();
        $user = User::inRandomOrder()->limit(1)->first();
        return [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => $this->faker->paragraph(8),
        ];
    }
}
