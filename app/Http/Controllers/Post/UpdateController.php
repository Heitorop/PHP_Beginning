<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
   public function __invoke(){
        $posts = Post::with('comments', 'tags')->get();
        return $posts;
   }
}
