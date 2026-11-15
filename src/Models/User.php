<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    public static function create(array $data): bool {
            $db = Database::getConnection();
            $stmt = $db->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
            return $stmt->execute([
                $data['name'],
                $data['email'],
                $data['password'],
                $data['phone']
            ]);
        }

    public static function findByEmail(string $email): ?array {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }

    public static function findByPhone(string $phone): ?array {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE phone = ? LIMIT 1");
        $stmt->execute([$phone]);
        $user = $stmt->fetch();
        return $user ?: null;
    }
    
    public static function countAll(): int {
        $db = Database::getConnection();
        return (int)$db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }
}