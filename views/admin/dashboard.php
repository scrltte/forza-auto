<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2 class="mb-4">Панель администратора</h2>

<div class="row my-4">
    <div class="col-md-4 mb-3">
        <div class="card bg-primary text-white p-3 shadow-sm">
            <h4>Всего авто</h4>
            <h2 class="mb-0"><?= $stats['cars'] ?></h2>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white p-3 shadow-sm">
            <h4>Заявки</h4>
            <h2 class="mb-0"><?= $stats['requests'] ?></h2>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-info text-white p-3 shadow-sm">
            <h4>Пользователи</h4>
            <h2 class="mb-0"><?= $stats['users'] ?></h2>
        </div>
    </div>
</div>

<div class="card p-4 my-4 shadow-sm">
    <h3 class="mb-3">Добавить новый автомобиль</h3>
    <form action="/admin/cars/store" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Марка</label>
                <input type="text" name="brand" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Модель</label>
                <input type="text" name="model" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Год выпуска</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Тип кузова</label>
                <input type="text" name="body_type" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Цена (₽)</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Пробег (км)</label>
                <input type="number" name="mileage" class="form-control" value="0">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Двигатель</label>
                <input type="text" name="engine" class="form-control" required placeholder="например, 2.0 л / 150 л.с.">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Коробка передач</label>
                <input type="text" name="transmission" class="form-control" required placeholder="Автомат / Механика">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Привод</label>
                <input type="text" name="drive" class="form-control" required placeholder="Передний / Полный">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Цвет</label>
                <input type="text" name="color" class="form-control" required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить автомобиль</button>
    </form>
</div>

<div class="card p-4 my-4 shadow-sm">
    <h3 class="mb-3">Список автомобилей</h3>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Марка / Модель</th>
                    <th>Год</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $c): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= htmlspecialchars($c['brand'] . ' ' . $c['model']) ?></td>
                        <td><?= $c['year'] ?></td>
                        <td><?= number_format($c['price'], 0, ',', ' ') ?> ₽</td>
                        <td>
                            <form action="/admin/cars/delete" method="POST" onsubmit="return confirm('Удалить этот автомобиль?');">
                                <input type="hidden" name="car_id" value="<?= $c['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card p-4 my-4 shadow-sm">
    <h3 class="mb-3">Управление заявками</h3>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Клиент</th>
                    <th>Телефон</th>
                    <th>Тип</th>
                    <th>Автомобиль</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $req): ?>
                    <tr>
                        <td><?= $req['id'] ?></td>
                        <td><?= htmlspecialchars($req['name']) ?></td>
                        <td><?= htmlspecialchars($req['phone']) ?></td>
                        <td><?= htmlspecialchars($req['type']) ?></td>
                        <td><?= htmlspecialchars(($req['brand'] ?? '') . ' ' . ($req['model'] ?? '—')) ?></td>
                        <td>
                            <form action="/admin/requests/status" method="POST" class="d-flex align-items-center gap-2">
                                <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="new" <?= $req['status'] === 'new' ? 'selected' : '' ?>>Новая</option>
                                    <option value="processing" <?= $req['status'] === 'processing' ? 'selected' : '' ?>>В обработке</option>
                                    <option value="completed" <?= $req['status'] === 'completed' ? 'selected' : '' ?>>Завершена</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>