<?php
require_once __DIR__ . '/../Models/Car.php';
require_once __DIR__ . '/../Models/RequestModel.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/News.php';

class AdminController {
    private function checkAdmin(): void {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /login');
            exit;
        }
    }

    public function dashboard(): void {
        $this->checkAdmin();
        $stats = [
            'cars' => count(Car::getAll()),
            'requests' => count(RequestModel::getAll()),
            'users' => User::countAll()
        ];
        $requests = RequestModel::getAll();
        $cars = Car::getAll();
        require_once __DIR__ . '/../../views/admin/dashboard.php';
    }

    public function storeCar(): void {
        $this->checkAdmin();
        $db = Database::getConnection();
        
        $imagePath = null;
        if (!empty($_FILES['image']['name'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $imageName = uniqid('car_') . '.' . $ext;
            $uploadDir = __DIR__ . '/../../public/images/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
            $imagePath = '/images/' . $imageName;
        }

        $stmt = $db->prepare("INSERT INTO cars (brand, model, year, body_type, price, mileage, engine, transmission, drive, color, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['brand'] ?? '',
            $_POST['model'] ?? '',
            $_POST['year'] ?? 0,
            $_POST['body_type'] ?? '',
            $_POST['price'] ?? 0,
            $_POST['mileage'] ?? 0,
            $_POST['engine'] ?? '',
            $_POST['transmission'] ?? '',
            $_POST['drive'] ?? '',
            $_POST['color'] ?? '',
            $_POST['description'] ?? '',
            $imagePath
        ]);

        header('Location: /admin');
        exit;
    }

    public function deleteCar(): void {
        $this->checkAdmin();
        $carId = $_POST['car_id'] ?? null;
        if ($carId) {
            Car::delete((int)$carId);
        }
        header('Location: /admin');
        exit;
    }

    public function updateRequestStatus(): void {
        $this->checkAdmin();
        $requestId = $_POST['request_id'] ?? null;
        $status = $_POST['status'] ?? 'new';

        if ($requestId) {
            $db = Database::getConnection();
            $stmt = $db->prepare("UPDATE requests SET status = ? WHERE id = ?");
            $stmt->execute([$status, $requestId]);
        }
        header('Location: /admin');
        exit;
    }
}