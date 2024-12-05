<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class RemoveTagsController extends Controller
{
   public function __invoke(Request $request, $postId){
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
}
