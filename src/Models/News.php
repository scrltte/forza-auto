<?php
require_once __DIR__ . '/../../config/database.php';

class News {
    public static function getAll(int $limit = 10, int $offset = 0): array {$db = Database::getConnection();
        $stmt =$db->prepare("SELECT * FROM news ORDER BY published_at DESC LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);$stmt->bindValue(2, $offset, PDO::PARAM_INT);$stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getBySlug(string $slug): ?array {$db = Database::getConnection();
        $stmt =$db->prepare("SELECT * FROM news WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function create(array $data): bool {$db = Database::getConnection();
        $stmt =$db->prepare("INSERT INTO news (title, slug, content, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['title'],$data['slug'],
            $data['content'],$data['image'] ?? null
        ]);
    }

    public static function delete(int $id): bool {$db = Database::getConnection();
        $stmt =$db->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function countAll(): int {
        $db = Database::getConnection();
        return (int)$db->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }
}