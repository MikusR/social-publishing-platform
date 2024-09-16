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
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::with(['user', 'categories'])->orderByDesc('created_at')->get();
        $authors = User::all();
        $categories = Category::all();

        return view('posts.index', [
            'posts' => $posts,
            'authors' => $authors,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'author' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'categories' => 'exists:categories,id',
        ]);

        //        dd($request->all());
        $post = $request->user()->posts()->create($validated);
        if ($request->has('categories')) {
            $post->categories()->attach($validated['categories']);
        }

        return redirect(route('profile.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
