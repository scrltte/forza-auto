<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/news">Новости</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($article['title']) ?></li>
            </ol>
        </nav>
        
        <h1 class="mb-3"><?= htmlspecialchars($article['title']) ?></h1>
        <p class="text-muted">Дата публикации: <?= date('d.m.Y H:i', strtotime($article['published_at'])) ?></p>
        
        <?php if (!empty($article['image'])): ?>
            <img src="<?= htmlspecialchars($article['image']) ?>" class="img-fluid rounded mb-4 shadow" alt="<?= htmlspecialchars($article['title']) ?>">
        <?php endif; ?>

        <div class="content">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>

        <div class="mt-5">
            <a href="/news" class="btn btn-secondary">&larr; Назад к списку новостей</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>