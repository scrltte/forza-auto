<?php
require_once __DIR__ . '/../../config/database.php';

class RequestModel {
    public static function create(array $data): bool {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO requests (user_id, car_id, name, phone, email, type, date, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['user_id'] ?? null,
            $data['car_id'] ?? null,
            $data['name'],
            $data['phone'],
            $data['email'] ?? null,
            $data['type'],
            !empty($data['date']) ? $data['date'] : null,
            $data['comment'] ?? null
        ]);
    }

    public static function getAll(): array {
        $db = Database::getConnection();
        return $db->query("SELECT r.*, c.brand, c.model FROM requests r LEFT JOIN cars c ON r.car_id = c.id ORDER BY r.id DESC")->fetchAll();
    }
}