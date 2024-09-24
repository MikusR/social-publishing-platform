<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit(Comment $comments)
    {
        //
    }

    public function update(Request $request, Comment $comments)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::user()->id) {
            abort(403);
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');

    }
}
