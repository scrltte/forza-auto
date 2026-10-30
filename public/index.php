<?php
session_start();

require_once __DIR__ . '/../src/Controllers/CarController.php';
require_once __DIR__ . '/../src/Controllers/AuthController.php';
require_once __DIR__ . '/../src/Controllers/NewsController.php';
require_once __DIR__ . '/../src/Controllers/RequestController.php';
require_once __DIR__ . '/../src/Controllers/AdminController.php';
require_once __DIR__ . '/../src/Controllers/ApiController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$carController = new CarController();$authController = new AuthController();
$newsController = new NewsController();$requestController = new RequestController();
$adminController = new AdminController();$apiController = new ApiController();

switch ($uri) {
    case '/':
        require_once __DIR__ . '/../views/home.php';
        break;

    case '/cars':
        $carController->index();
        break;

    case '/news':
        $newsController->index();
        break;

    case '/contacts':
        require_once __DIR__ . '/../views/contacts.php';
        break;

    case '/profile':
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        require_once __DIR__ . '/../views/profile.php';
        break;

    case '/login':
        $_SERVER['REQUEST_METHOD'] === 'POST' ? $authController->login() :$authController->showLogin();
        break;

    case '/register':
        $_SERVER['REQUEST_METHOD'] === 'POST' ? $authController->register() :$authController->showRegister();
        break;

    case '/logout':
        $authController->logout();
        break;

    case '/requests/store':
        $requestController->store();
        break;

    // Панель администратора
    case '/admin':
        $adminController->dashboard();
        break;

    case '/admin/cars/store':
        $adminController->storeCar();
        break;

    case '/admin/cars/delete':
        $adminController->deleteCar();
        break;

    case '/admin/requests/status':
        $adminController->updateRequestStatus();
        break;

    // REST API
    case '/api/cars':
        $apiController->cars();
        break;

    case '/api/requests':
        $apiController->requests();
        break;

    default:
        if (preg_match('#^/cars/(\d+)$#', $uri,$matches)) {
            $carController->show((int)$matches[1]);
        } elseif (preg_match('#^/news/(.+)$#', $uri,$matches)) {
            $newsController->show($matches[1]);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Страница не найдена";
        }
        break;
}