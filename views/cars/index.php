<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">Каталог автомобилей</h1>

<div class="row">
    <!-- Фильтры -->
    <div class="col-md-3 mb-4">
        <div class="card p-3">
            <h5 class="card-title">Фильтры</h5>
            <form method="GET" action="/cars">
                <div class="mb-3">
                    <label class="form-label">Марка</label>
                    <input type="text" name="brand" class="form-control" value="<?= htmlspecialchars($_GET['brand'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Макс. цена (₽)</label>
                    <input type="number" name="price_to" class="form-control" value="<?= htmlspecialchars($_GET['price_to'] ?? '') ?>">
                </div>
                <button type="submit" class="btn btn-primary w-100">Применить</button>
            </form>
        </div>
    </div>

    <!-- Список авто -->
    <div class="col-md-9">
        <div class="row">
            <?php if (empty($cars)): ?>
                <div class="col-12"><p>Автомобили не найдены.</p></div>
            <?php else: ?>
                <?php foreach ($cars as $car): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= htmlspecialchars($car['image'] ?? '/images/no-photo.jpg') ?>" class="card-img-top" alt="<?= htmlspecialchars($car['brand']) ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></h5>
                                <p class="card-text text-muted"><?= $car['year'] ?> г. | <?= $car['engine'] ?></p>
                                <h6 class="text-orange fw-bold mb-3"><?= number_format($car['price'], 0, ',', ' ') ?> ₽</h6>
                                <a href="/cars/<?= $car['id'] ?>" class="btn btn-outline-primary mt-auto">Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>