<?php
require_once __DIR__ . '/../Models/Car.php';
require_once __DIR__ . '/../Models/RequestModel.php';

class ApiController {
    public function cars(): void {
        header('Content-Type: application/json');
        echo json_encode(Car::getAll(), JSON_UNESCAPED_UNICODE);
    }

    public function requests(): void {
        header('Content-Type: application/json');
        echo json_encode(RequestModel::getAll(), JSON_UNESCAPED_UNICODE);
    }
}