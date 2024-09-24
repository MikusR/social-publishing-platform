<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'body' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
        $validated['user_id'] = $request->user()->id;
        Comment::create($validated);

        return redirect(route('posts.show', $request->post_id));
    }

    public function edit(Comment $comment): View
    {
        Gate::authorize('update', $comment);

        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);

        $validated = $request->validate([
            'body' => 'required',
        ]);

        $comment->update($validated);

        return redirect(route('posts.show', $comment->post_id))->with('success', 'Comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');

    }
}
