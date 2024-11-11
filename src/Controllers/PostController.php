<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Post;


class PostController extends Controller
{

    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(): void
    {
        $posts = $this->post->all();
        $this->render('posts/index', ['posts' => $posts]);
    }

    public function show($data): void
    {
        $post = $this->post->find($data['id']);

        if ($post) {
            $this->render('posts/show', ['post' => $post]);
        } else {
            echo "Post não encontrado.";
        }
    }
}