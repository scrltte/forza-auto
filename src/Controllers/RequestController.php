<?php
require_once __DIR__ . '/../Models/RequestModel.php';

class RequestController {
    public function store(): void {
        $data = [
            'user_id' => $_SESSION['user']['id'] ?? null,
            'car_id' => $_POST['car_id'] ?? null,
            'name' => $_POST['name'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? null,
            'type' => $_POST['type'] ?? 'consultation',
            'date' => $_POST['date'] ?? null,
            'comment' => $_POST['comment'] ?? null
        ];

        RequestModel::create($data);
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
        exit;
    }
}