<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(User $user): View
    {
        $posts = Post::with(['categories', 'user', 'comments'])
            ->withCount('comments')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')->get();
        $categories = Category::whereHas('posts', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->withCount(['posts as user_posts_count' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        return view('profile.index', [
            'posts' => $posts,
            'author' => $user,
            'categories' => $categories,
        ]);
    }
}
