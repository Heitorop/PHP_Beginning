<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments', 'tags')->get();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create($request->all());
    }

    public function assignTags(Request $request, $postId)
    {
        $post = Post::find($postId);

        $post->tags()->syncWithoutDetaching($request->input('tags'));
    }


    public function removeTags(Request $request, $postId)
    {
        $post = Post::find($postId);

        $tags = $request->input('tags');

        if (is_array($tags)) {
            $post->tags()->detach($tags);
        }

        return response()->json([
            'message' => 'Selected tags removed successfully',
            'removed_tags' => $tags
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comments')->find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
