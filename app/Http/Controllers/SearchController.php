<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ['search' => 'required|string|max:255|min:3']);

        $search = $validated['search'];
        $posts = Post::with(['user', 'categories'])
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
            ->orderByDesc('created_at')
            ->withCount('comments')
            ->get();
        $authors = User::withCount('posts')->orderByDesc('posts_count')->get();
        $categories = Category::withCount('posts')->get();
        $title = (count($posts) === 0) ? 'No results found' : 'Search Results for: '.$search;

        return view('search.results', [
            'title' => $title,
            'posts' => $posts,
            'authors' => $authors,
            'categories' => $categories,
            'uncategorizedCount' => Post::whereDoesntHave('categories')->count(),
        ]);
    }
}
