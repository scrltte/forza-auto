<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон «Форза»</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold text-orange" href="/">ФОРЗА</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/cars">Каталог</a></li>
                <li class="nav-item"><a class="nav-link" href="/news">Новости</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link fw-bold text-warning" href="/admin">Админка</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="/logout">Выход (<?= htmlspecialchars($_SESSION['user']['name']) ?>)</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Вход</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Регистрация</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-4">