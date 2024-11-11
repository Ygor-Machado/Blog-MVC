<?php

namespace App\Services;

use App\Core\Request;
use App\Models\Post;

class PostService
{

    protected $post;
    protected $request;

    public function __construct()
    {
        $this->post = new Post();
        $this->request = new Request();
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


}