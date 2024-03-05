<?php

namespace App\Http\Controllers;
use App\Http\Resources\CommentResource;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|text',
        ]);
    
        $comment = auth()->user()->comments()->create([
            'post_id' => $post->id,
            'content' => $request->input('content'),
        ]);
    
        return new CommentResource($comment);
    }
    
    public function update(Request $request, Comment $comment)
        {
            if ($comment->user_id !== auth()->id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            $request->validate([
                'content' => 'required|text',
            ]);
    
            $comment->update($request->all());
    
            return new CommentResource($comment);
        }
    
        public function destroy(Comment $comment)
        {
            if ($comment->user_id !== auth()->id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            $comment->delete();
    
            return response()->json(['message' => 'Comment deleted successfully']);
        }
}
