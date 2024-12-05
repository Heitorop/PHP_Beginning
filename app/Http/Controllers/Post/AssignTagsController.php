<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AssignTagsController extends Controller
{
   public function __invoke(Request $request, $postId){
      $post = Post::find($postId);
      $post->tags()->syncWithoutDetaching($request->input('tags'));
   }
}
