<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    public static function create(string $name, string $email, string $phone, string $password): bool {
        $db = Database::getConnection();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $phone, $hash]);
    }

    public static function findByEmail(string $email): ?array {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }
    
    public static function countAll(): int {
        $db = Database::getConnection();
        return (int)$db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }
}