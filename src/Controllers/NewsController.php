<?php
require_once __DIR__ . '/../Models/News.php';

class NewsController {
    public function index(): void {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;

        $news = News::getAll($limit, $offset);
        $totalNews = News::countAll();
        $totalPages = ceil($totalNews / $limit);

        require_once __DIR__ . '/../../views/news/index.php';
    }

    public function show(string $slug): void {
        $article = News::getBySlug($slug);
        if (!$article) {
            header("HTTP/1.0 404 Not Found");
            echo "Новость не найдена";
            return;
        }
        require_once __DIR__ . '/../../views/news/show.php';
    }
}