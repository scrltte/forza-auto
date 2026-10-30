<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row">
    <div class="col-md-6 mb-4">
        <img src="<?= htmlspecialchars($car['image'] ?? '/images/no-photo.jpg') ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($car['brand']) ?>">
    </div>
    <div class="col-md-6">
        <h2><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></h2>
        <h3 class="text-orange my-3"><?= number_format($car['price'], 0, ',', ' ') ?> ₽</h3>
        
        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item"><strong>Год выпуска:</strong> <?= $car['year'] ?></li>
            <li class="list-group-item"><strong>Кузов:</strong> <?= htmlspecialchars($car['body_type']) ?></li>
            <li class="list-group-item"><strong>Двигатель:</strong> <?= htmlspecialchars($car['engine']) ?></li>
            <li class="list-group-item"><strong>Коробка передач:</strong> <?= htmlspecialchars($car['transmission']) ?></li>
            <li class="list-group-item"><strong>Привод:</strong> <?= htmlspecialchars($car['drive']) ?></li>
            <li class="list-group-item"><strong>Пробег:</strong> <?= number_format($car['mileage'], 0, ',', ' ') ?> км</li>
        </ul>

        <p><?= nl2br(htmlspecialchars($car['description'] ?? '')) ?></p>
        
        <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#requestModal">Оставить заявку</button>
    </div>
</div>

<!-- Модальное окно записи на тест-драйв / покупку -->
<div class="modal fade" id="requestModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/requests/store" method="POST" id="ajaxRequestForm">
                <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Заявка на <?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Тип заявки</label>
                        <select name="type" class="form-select" required>
                            <option value="test-drive">Тест-драйв</option>
                            <option value="purchase">Покупка</option>
                            <option value="consultation">Консультация</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ваше имя</label>
                        <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input type="text" name="phone" class="form-control" required placeholder="+7 (XXX) XXX-XX-XX">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Дата и время (для тест-драйва)</label>
                        <input type="datetime-local" name="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Комментарий</label>
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Отправить заявку</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>