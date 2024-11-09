<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(): void
    {
        $posts = (new Post())->all();
        $this->render('posts/index', ['posts' => $posts]);
    }
}