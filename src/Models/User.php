<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function findByEmail(string $email)
    {
        return $this->findBy('email', $email);
    }

}