<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'title' => $this->faker->word(),
            'body' => $this->faker->paragraphs(3, true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
