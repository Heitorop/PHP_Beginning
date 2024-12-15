<?php

namespace App\Services\Post;

class Service
{

    public function remove($post, $tags)
    {
        if (is_array($tags)) {
            $post->tags()->detach($tags);
        }
    }
}
