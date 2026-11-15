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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $phone = trim($_POST['phone'] ?? '');

            $cleanPhone = preg_replace('/\D/', '', $phone);

            if (strlen($cleanPhone) !== 11) {
                $_SESSION['error'] = 'Некорректный формат номера телефона. Введите 11 цифр.';
                header('Location: /register');
                exit;
            }

            if (User::findByEmail($email)) {
                $_SESSION['error'] = 'Пользователь с таким email уже зарегистрирован.';
                header('Location: /register');
                exit;
            }

            if (User::findByPhone($cleanPhone)) {
                $_SESSION['error'] = 'Пользователь с таким номером телефона уже зарегистрирован.';
                header('Location: /register');
                exit;
            }

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'phone' => $cleanPhone 
            ]);

            header('Location: /login');
            exit;
        }
    }

    public function logout(): void {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
        exit;
    }
}