<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
   public function __invoke(string $id){
      $post = Post::with('comments')->find($id);
      return $post;
   }
}
