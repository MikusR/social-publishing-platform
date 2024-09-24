<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function update(User $user, Post $post): bool
    {
        return $post->user()->is($user);
    }

    public function delete(User $user, Post $post): bool
    {
        return $post->user()->is($user);
    }
}
