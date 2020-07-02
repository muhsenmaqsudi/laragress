<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function index()
    {
        $posts = Post::allPosts();
        return view('post.index', compact('posts'));
    }

    public function show($postId)
    {
        return $this->postRepository->findById($postId);
    }

    public function create()
    {
        return view('post.create');
    }
}
