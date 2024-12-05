<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class StoreController extends Controller
{
   public function __invoke(Request $request){
      Post::create($request->all());
   }
}
