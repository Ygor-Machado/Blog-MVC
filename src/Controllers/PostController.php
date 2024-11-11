<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Post;
use App\Services\AuthService;
use App\Services\PostService;


class PostController extends Controller
{

    protected $post;
    protected $request;
    protected $postService;
    protected $authService;

    public function __construct()
    {
        $this->post = new Post();
        $this->request = new Request();
        $this->postService = new PostService();
        $this->authService = new AuthService();
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

        if ($this->authService->checked()) {
            $user = $this->authService->user();
            $userId = $user->id;

            $data = [
                'title' => $this->request->input('title'),
                'content' => $this->request->input('content'),
                'user_id' => $userId,
                'image' => $_FILES['image']
            ];
        }

        if ($this->postService->createPost($data)) {
            header('Location: /posts/create');
        } else {
            echo "Erro ao criar post.";
        }
    }
}