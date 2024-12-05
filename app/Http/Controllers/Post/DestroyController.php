<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
   public function __invoke(string $id){
      $post = Post::find($id);
      $post->delete();
   }
}
