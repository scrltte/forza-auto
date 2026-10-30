<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">Новости и акции автосалона</h1>

<div class="row">
    <?php if (empty($news)): ?>
        <div class="col-12"><p>Новостей пока нет.</p></div>
    <?php else: ?>
        <?php foreach ($news as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if (!empty($item['image'])): ?>
                        <img src="<?= htmlspecialchars($item['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['title']) ?>">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                        <p class="text-muted small"><?= date('d.m.Y', strtotime($item['published_at'])) ?></p>
                        <p class="card-text"><?= mb_substr(strip_tags($item['content']), 0, 100) ?>...</p>
                        <a href="/news/<?= $item['slug'] ?>" class="btn btn-outline-primary mt-auto">Читать далее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Пагинация -->
<?php if ($totalPages > 1): ?>
    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                    <a class="page-link" href="/news?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>