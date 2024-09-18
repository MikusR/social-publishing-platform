<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $posts = $category->posts()
            ->with(['user', 'categories'])
            ->orderByDesc('created_at')
            ->get();
        $authors = $posts->pluck('user')->unique();
        $categories = Category::all();
        $title = $category->name;
        $userPostCounts = $posts->groupBy('user.id')->map(function ($group) {
            return $group->count();
        });
        $authors->each(function ($author) use ($userPostCounts) {
            $author->category_posts_count = $userPostCounts->get($author->id, 0);
        });

        return view('category.show', ['title' => $title, 'posts' => $posts, 'authors' => $authors, 'categories' => $categories]);
    }
}
