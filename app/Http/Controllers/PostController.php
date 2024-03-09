<?php

namespace App\Http\Controllers;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    }
    
    public function show($id)
    {
    
            $post = Post::findOrFail($id);
            return response()->json(['post' => $post]);
        
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);

        // auth()->user()->posts()->
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $customFolder = 'posts_images';

        $image->move(public_path($customFolder), $imageName);

        $newFilePath = "{$customFolder}/{$imageName}";

        $post = Post::create([
            'content' => $request->input('content'),
            'image' => $newFilePath,
        ]);

        return response()->json(['post' => $post, 'message' => 'post created successfully']);
        
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
    
    public function destroy( Post $id)
        {
            
    
            $id->delete();
    
            return response()->json(['message' => 'Post deleted successfully']);
        }
}
