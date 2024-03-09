<?php

namespace App\Http\Controllers;
use App\Http\Resources\CommentResource;

use App\Models\Comment;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $request->validate([
            'content' => 'required',
        ]);

        $comment = $post->comments()->create([
            'content' => $request->input('content'),
        ]);

        return response()->json(['comment' => $comment], 201);
    }

    public function index($postId)
    {
        $post = Post::findOrFail($postId);
        $comments = $post->comments;

        return response()->json(['comments' => $comments]);
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
