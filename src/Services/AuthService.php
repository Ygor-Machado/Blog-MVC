<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function login(string $email, string $password): bool
    {
        $user = (new User())->findByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            return true;
        }

        return false;
    }

    public function register($data): bool
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        return (new User())->create($data);
    }

    public function logout(): void
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }

    public function checked(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function user()
    {
        if($this->checked()) {
            $userId = $_SESSION['user_id'];
            return (new User())->find($userId);
        }

        return null;
    }
}