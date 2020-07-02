<?php


namespace App\Repositories;


use App\Post;
use Illuminate\Support\Str;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::orderBy('title')
            ->where('active', 1)
            ->get()
            ->map->format();

//        return Post::orderBy('title')
//            ->where('active', 1)
//            ->get()
//            ->map(function ($post) {
//                $post->format();
//            });
    }

    public function findById($postId)
    {
        return Post::where('id', $postId)
//            ->where('active', 1)
            ->firstOrFail()
            ->format();
    }

    public function findByUsername()
    {

    }
}
