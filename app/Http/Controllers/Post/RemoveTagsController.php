<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class RemoveTagsController extends BaseController
{
   public function __invoke(Request $request, $postId)
   {
      $post = Post::find($postId);

      $tags = $request->input('tags');

      $this->service->remove($post, $tags);

     

      return response()->json([
         'message' => 'Selected tags removed successfully',
         'removed_tags' => $tags
      ]);
   }
}
