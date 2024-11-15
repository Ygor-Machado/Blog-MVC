<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Post;
use App\Services\AuthService;
use App\Services\PostService;


class PostController extends Controller
{

    private $post;
    private $request;
    private $postService;
    private $authService;

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

    public function show($id): void
    {
        $post = $this->post->find((int)$id);

        if ($post) {
            $this->render('posts/show', ['post' => $post]);
        } else {
            echo "Post não encontrado.";
        }
    }

    public function create(): void
    {

        if (!$this->authService->checked()) {
            header("Location: /login");
            exit;
        }

        $this->render('posts/create', [], 'dashboard_layout');
    }

    public function edit($data)
    {
        if (!$this->authService->checked()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->user();
        $postId = (int)$data['id'];
        $post = $this->post->find($postId);

        if ($post && $post->user_id == $user->id) {
            $this->render('posts/edit', ['post' => $post], 'dashboard_layout');
        } else {
            $_SESSION['error'] = "Você não tem permissão para editar este post.";
            header('Location: /posts/user');
            exit;
        }
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
            header('Location: /posts/user');
            $_SESSION['success'] = "Post criado com sucesso.";
            exit;
        } else {
            $_SESSION['error'] = "Erro ao criar o post";
        }
    }

    public function update($data)
    {
        if (!$this->authService->checked()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->user();
        $postId = (int)$data['id'];
        $post = $this->post->find($postId);

        if ($post && $post->user_id == $user->id) {
            $data = [
              'title' => $this->request->input('title'),
              'content' => $this->request->input('content'),
            ];

            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $_FILES['image'];
            }

            if ($this->postService->updatePost($postId, $data)) {
                $_SESSION['success'] = "Post atualizado com sucesso.";
                header("Location: /posts/user");
                exit;
            } else {
                $_SESSION['error'] = "Erro ao atualizar o post.";
            }
        } else {
            $_SESSION['error'] = "Você não tem permissão para editar este post.";
        }

    }

    public function usersPosts(): void
    {
        if (!$this->authService->checked()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->user();
        $userId = $user->id;

        $posts = $this->post->getPostsByUserId($userId);

        $this->render('posts/usersPosts', ['posts' => $posts], 'dashboard_layout');
    }

    public function destroy($data): void
    {
        if (!$this->authService->checked()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->user();
        $userId = $user->id;

        $postId = (int)$data['id'];
        $post = $this->post->find($postId);

        if ($post && $post->user_id == $userId) {
            if ($this->postService->deletePost($postId)) {
                header('Location: /posts/user');
                $_SESSION['success'] = "Deletado com sucesso.";
                exit;
            } else {
                $_SESSION['error'] = "Erro ao deletar o post.";
            }
        } else {
            $_SESSION['error'] = "Você não tem permissão para deletar este post.";
        }
    }
}

