<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2>Редактирование автомобиля: <?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></h2>
    
    <form action="/admin/cars/update" method="POST" class="needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $car['id'] ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Марка</label>
                <input type="text" name="brand" class="form-control" value="<?= htmlspecialchars($car['brand']) ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Модель</label>
                <input type="text" name="model" class="form-control" value="<?= htmlspecialchars($car['model']) ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Год выпуска</label>
                <input type="number" name="year" class="form-control" value="<?= $car['year'] ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Тип кузова</label>
                <input type="text" name="body_type" class="form-control" value="<?= htmlspecialchars($car['body_type']) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Цена (₽)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?= $car['price'] ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Пробег (км)</label>
                <input type="number" name="mileage" class="form-control" value="<?= $car['mileage'] ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Двигатель</label>
                <input type="text" name="engine" class="form-control" value="<?= htmlspecialchars($car['engine']) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Коробка передач</label>
                <input type="text" name="transmission" class="form-control" value="<?= htmlspecialchars($car['transmission']) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Привод</label>
                <input type="text" name="drive" class="form-control" value="<?= htmlspecialchars($car['drive']) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Цвет</label>
                <input type="text" name="color" class="form-control" value="<?= htmlspecialchars($car['color']) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Ссылка на изображение</label>
                <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($car['image']) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($car['description']) ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Сохранить изменения</button>
        <a href="/admin/cars" class="btn btn-secondary mt-4 ms-2">Отмена</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>