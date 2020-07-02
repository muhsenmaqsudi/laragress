<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::allPosts();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }
}
