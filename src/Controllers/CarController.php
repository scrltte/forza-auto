<?php
require_once __DIR__ . '/../Models/Car.php';

class CarController {
    public function index(): void {
        $filters = [
            'brand' => $_GET['brand'] ?? null,
            'model' => $_GET['model'] ?? null,
            'body_type' => $_GET['body_type'] ?? null,
            'price_to' => $_GET['price_to'] ?? null,
            'status' => 'available'
        ];
        
        $cars = Car::getAll($filters);
        require_once __DIR__ . '/../../views/cars/index.php';
    }

    public function show(int $id): void {
        $car = Car::getById($id);
        if (!$car) {
            header("HTTP/1.0 404 Not Found");
            echo "Автомобиль не найден";
            return;
        }
        require_once __DIR__ . '/../../views/cars/show.php';
    }
}