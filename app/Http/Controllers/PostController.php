<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        /** @var Pipeline $pipeline */
        $pipeline = app(Pipeline::class);
        $posts = $pipeline->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class
            ])
            ->thenReturn()->get();
        return $posts;
    }

    public function create()
    {
        return view('post.create');
    }
}
