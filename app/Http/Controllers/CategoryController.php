<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //        dd($category);
        $posts = $category->posts()->with(['user'])->orderByDesc('created_at')->get();
        $authors = $posts->pluck('user')->unique();
        $categories = Category::all();
        $title = $category->name;

        return view('posts.index', ['title' => $title, 'posts' => $posts, 'authors' => $authors, 'categories' => $categories]);
    }
}
