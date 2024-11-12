<?php

namespace App\Controllers;

use App\Core\Request;
use App\Services\AuthService;

class AuthController extends Controller
{

    private $authService;
    private $request;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->request = new Request();
    }

    public function viewLogin(): void
    {
        $this->render('auth/login');
    }

    public function viewRegister(): void
    {
        $this->render('auth/register');
    }

    public function dashboard(): void
    {
        if ($this->authService->checked()) {
            $this->render('auth/dashboard', [], 'dashboard_layout');
        } else {
            header("Location: /login");
            exit;
        }
    }

    public function login(): void
    {
        $email = $this->request->input('email');
        $password = $this->request->input('password');

        if ($this->authService->login($email, $password)) {
            header("Location: /dashboard");
            exit;
        }

        $this->render('auth/login', ['error' => 'Credenciais inválidas.']);
    }

    public function register(): void
    {
        $data = $this->request->all();

        if ($this->authService->register($data)) {
            header("Location: /login");
            exit;
        }

        $this->render('auth/register', ['error' => 'Falha ao registrar usuário.']);
    }

    public function logout(): void
    {
        $this->authService->logout();
        header("Location: /login");
        exit;
    }

}