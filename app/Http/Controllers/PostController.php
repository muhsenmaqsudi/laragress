<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        if (request()->has('active')) {
            $posts->where('active', request('active'));
        }

        if (request()->has('sort')) {
            $posts->orderBy('title', request('sort'));
        }

        return $posts->get();
    }

    public function create()
    {
        return view('post.create');
    }
}
