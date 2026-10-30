<?php
require_once __DIR__ . '/../../config/database.php';

class Car {
    public static function getAll(array $filters = []): array {
        $db = Database::getConnection();
        $sql = "SELECT * FROM cars WHERE 1=1";
        $params = [];

        if (!empty($filters['brand'])) {
            $sql .= " AND brand = ?";
            $params[] = $filters['brand'];
        }
        if (!empty($filters['price_to'])) {
            $sql .= " AND price <= ?";
            $params[] = $filters['price_to'];
        }

        $sql .= " ORDER BY id DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function getById(int $id): ?array {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }
    
    public static function delete(int $id): bool {
    $db = Database::getConnection();
    $stmt = $db->prepare("DELETE FROM cars WHERE id = ?");
    return $stmt->execute([$id]);
}
}