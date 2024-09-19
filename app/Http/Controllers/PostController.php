<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with(['user', 'categories'])->orderByDesc('created_at')->withCount('comments')->get();
        $authors = User::all();
        $categories = Category::all();
        $title = 'All Posts';

        return view('posts.index', [
            'title' => $title,
            'posts' => $posts,
            'authors' => $authors,
            'categories' => $categories,
            'uncategorizedCount' => Post::whereDoesntHave('categories')->count(),
        ]);
    }

    public function create(): View
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'author' => Auth::user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'categories' => 'exists:categories,id',
        ]);

        $post = $request->user()->posts()->create($validated);
        if (($request->has('categories')) && ! empty($validated['categories'])) {
            $post->categories()->attach($validated['categories']);
        }

        return redirect(route('my-profile'));
    }

    public function show(Post $post): View
    {

        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
