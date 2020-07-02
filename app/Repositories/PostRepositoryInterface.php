<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function all();

    public function findById($postId);

    public function findByUsername();
}
