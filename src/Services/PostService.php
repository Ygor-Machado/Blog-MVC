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

    public function createPost(array $data, $file): bool
    {
        if(isset($_FILES['image']) && $file['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../public/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $imageHash = md5(uniqid(rand(), true) . file_get_contents($imageTmpName)) . '.' . $imageExt;

            $imagePath = $uploadDir . $imageHash;

            if(move_uploaded_file($imageTmpName, $imagePath)) {

                $data['image'] = $imageHash;

                return $this->post->create($data);
            }
        }

        return false;
    }


}