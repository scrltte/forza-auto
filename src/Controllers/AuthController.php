<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    public function showLogin(): void {
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    public function login(): void {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'role' => $user['role']
            ];
            header('Location: ' . ($user['role'] === 'admin' ? '/admin' : '/'));
            exit;
        }
        $_SESSION['error'] = 'Неверный E-mail или пароль';
        header('Location: /login');
        exit;
    }

    public function showRegister(): void {
        require_once __DIR__ . '/../../views/auth/register.php';
    }

    public function register(): void {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::create($name, $email, $phone, $password)) {
            header('Location: /login');
            exit;
        }
        $_SESSION['error'] = 'Ошибка регистрации. Возможно, E-mail уже занят.';
        header('Location: /register');
        exit;
    }

    public function logout(): void {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
        exit;
    }
}