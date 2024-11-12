<?php

namespace App\Models;

class Post extends Model
{
    protected $table = 'posts';

    public function getPostsByUserId(int $userId)
    {
        $query = "SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}