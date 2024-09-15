<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {

        $user = Auth::user();
        $posts = Post::with(['categories'])->where('user_id', $user->id)->orderByDesc('created_at')->get();
        $categories = Category::whereHas('posts', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('profile.index', [
            'posts' => $posts,
            'author' => $user,
            'categories' => $categories,
        ]);
    }
}
