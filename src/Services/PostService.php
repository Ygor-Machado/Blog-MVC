<?php

namespace App\Services;

use App\Core\Request;
use App\Models\Post;

class PostService
{

    protected $post;
    protected $request;
    protected $authService;

    public function __construct()
    {
        $this->post = new Post();
        $this->request = new Request();
        $this->authService = new AuthService();
    }

    public function createPost(array $data): bool
    {
        if (isset($data['image']) && $data['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../public/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            $imageTmpName = $data['image']['tmp_name'];
            $imageExt = pathinfo($data['image']['name'], PATHINFO_EXTENSION);

            $imageHash = md5(uniqid(rand(), true) . file_get_contents($imageTmpName)) . '.' . $imageExt;
            $imagePath = $uploadDir . $imageHash;

            if (move_uploaded_file($imageTmpName, $imagePath)) {
                $data['image'] = $imageHash;
            } else {
                return false;
            }
        }

        return $this->post->create($data);
    }

    public function updatePost(int $postId, array $data): bool
    {
        $post = $this->post->find($postId);

        if (!$post) {
            return false;
        }

        if (isset($data['image']) && $data['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../public/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            $imageTmpName = $data['image']['tmp_name'];
            $imageExt = pathinfo($data['image']['name'], PATHINFO_EXTENSION);

            $imageHash = md5(uniqid(rand(), true) . file_get_contents($imageTmpName)) . '.' . $imageExt;
            $imagePath = $uploadDir . $imageHash;

            if (move_uploaded_file($imageTmpName, $imagePath)) {
                if (!empty($post->image) && file_exists($uploadDir . $post->image)) {
                    unlink($uploadDir . $post->image);
                }
                $data['image'] = $imageHash;
            } else {
                return false;
            }
        } else {
            unset($data['image']);
        }

        return $this->post->update($postId, $data);
    }

    public function deletePost($postId): bool
    {
        $post = $this->post->find($postId);

        if ($post) {
            if (!empty($post->image)) {
                $imagePath = __DIR__ . '/../public/uploads/' . $post->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            return $this->post->delete($postId);
        }

        return false;
    }

}