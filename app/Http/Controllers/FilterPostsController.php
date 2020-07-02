<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;

class FilterPostsController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke()
    {
        return $this->postRepository->all();
    }
}
