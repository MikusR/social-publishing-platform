<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $post = Post::inRandomOrder()->first() ?? Post::factory()->create();
        $date = $this->faker->dateTimeBetween($post->created_at->addMinute(), now()->addHour());
        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph(),
            'created_at' => $date,
        ];
    }
}
