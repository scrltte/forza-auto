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
        $car = $stmt->fetch();
        return $car ?: null;
    }

    public static function update(int $id, array $data): bool {
    $db = Database::getConnection();
    $stmt = $db->prepare("UPDATE cars SET brand = ?, model = ?, year = ?, body_type = ?, price = ?, mileage = ?, engine = ?, transmission = ?, drive = ?, color = ?, description = ?, image = ? WHERE id = ?");
    return $stmt->execute([
        $data['brand'], 
        $data['model'], 
        $data['year'], 
        $data['body_type'], 
        $data['price'], 
        $data['mileage'], 
        $data['engine'], 
        $data['transmission'], 
        $data['drive'], 
        $data['color'], 
        $data['description'], 
        $data['image'], 
        $id
    ]);
}
    
    public static function delete(int $id): bool {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$id]);
    }
}