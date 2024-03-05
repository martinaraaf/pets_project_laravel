<?php

namespace App\Http\Controllers;
use App\Http\Resources\PostResource;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->get();
        return PostResource::collection($posts);
    }
    
    public function show(Post $post)
    {
        $post->load('user', 'comments.user');
        return new PostResource($post);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|text',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);
    
        $post = auth()->user()->posts()->create($request->all());
        return new PostResource($post);
    }
    public function update(Request $request, Post $post)
        {
            if ($post->user_id !== auth()->id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            $request->validate([
                'content' => 'required|text',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $post->update($request->all());
    
            return new PostResource($post);
        }
    
    public function destroy(Post $post)
        {
            if ($post->user_id !== auth()->id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            $post->delete();
    
            return response()->json(['message' => 'Post deleted successfully']);
        }
}
