<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with(['user', 'categories'])
            ->orderByDesc('created_at')
            ->withCount('comments')
            ->get();
        $authors = User::withCount('posts')->orderByDesc('posts_count')->get();
        $categories = Category::withCount('posts')->get();
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

        return redirect(route('posts.show', $post->id))->with('success', 'Post created successfully');
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', ['post' => $post, 'categories' => Category::all(), 'author' => Auth::user()]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'categories' => 'exists:categories,id',
        ]);

        $post->update($validated);

        if (empty($validated['categories'])) {
            $post->categories()->detach();
        }

        if (($request->has('categories')) && ! empty($validated['categories'])) {
            $post->categories()->sync($validated['categories']);
        }

        return redirect(route('posts.show', $post->id))->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->user_id !== Auth::user()->id) {
            abort(403);
        }

        $post->delete();

        if (URL::previous() === route('posts.show', $post->id)) {
            return redirect(route('posts.index'))->with('success', 'Post deleted successfully');
        } else {
            return redirect()->back()->with('success', 'Post deleted successfully');
        }
    }
}
