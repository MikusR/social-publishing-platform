<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $users = $category->posts()->groupBy('user')->withCount('user')->get();
        //        dd(compact('users'));
        //        dd($users[0]->getAttributes());

        $posts = $category->posts()
            ->with(['user', 'categories'])
//            ->withCount('categories')
            ->orderByDesc('created_at')
            ->get();
        $authors = $posts->pluck('user')->unique();
        $categories = Category::all();
        $title = $category->name;

        return view('posts.index', ['title' => $title, 'posts' => $posts, 'authors' => $authors, 'categories' => $categories]);
    }
}
