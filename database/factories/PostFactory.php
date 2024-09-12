<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        Log::debug('$user:'.$user->email);

        $date = $this->faker->dateTimeBetween($user->created_at->addMinute(), now()->addHour());

        return [
            'user_id' => $user->id,
            'title' => $this->faker->words(rand(1, 4), true),
            'body' => $this->faker->paragraphs(rand(1, 4), true),
            'created_at' => $date,
        ];
    }

    public function configure(): PostFactory
    {
        return $this->afterCreating(
            function (Post $post) {
                $limit = rand(1, Category::count());
                Log::debug('$limit:'.$limit);
                $categories = Category::inRandomOrder()->limit($limit)->get();
                $post->categories()->attach($categories);
            },
        );
    }
}
