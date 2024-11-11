<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Post;
use App\Services\PostService;


class PostController extends Controller
{

    protected $post;
    protected $request;
    protected $postService;

    public function __construct()
    {
        $this->post = new Post();
        $this->request = new Request();
        $this->postService = new PostService();
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

    public function create(): void
    {
        $this->render('posts/create');
    }

    public function store()
    {
        $data = [
          'title' => $this->request->input('title'),
          'content' => $this->request->input('content'),
          'user_id' => $this->request->input('user_id')
        ];

        if ($this->postService->createPost($data, $_FILES)) {
            header('Location: /posts/create');
        } else {
            echo "Erro ao criar post.";
        }
    }
}