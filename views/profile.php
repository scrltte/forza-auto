<?php 
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../src/Models/RequestModel.php';

// Получаем заявки текущего пользователя
$db = Database::getConnection();
$stmt = $db->prepare("SELECT r.*, c.brand, c.model FROM requests r LEFT JOIN cars c ON r.car_id = c.id WHERE r.user_id = ? ORDER BY r.id DESC");
$stmt->execute([$_SESSION['user']['id']]);
$myRequests = $stmt->fetchAll();
?>

<h1 class="mb-4">Личный кабинет</h1>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card p-4 shadow-sm">
            <h3 class="mb-3">Профиль</h3>
            <p><strong>Имя:</strong> <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
            <p><strong>Роль:</strong> <?= $_SESSION['user']['role'] === 'admin' ? 'Администратор' : 'Клиент' ?></p>
            <a href="/logout" class="btn btn-outline-danger w-100 mt-3">Выйти из аккаунта</a>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card p-4 shadow-sm">
            <h3 class="mb-3">История ваших заявок</h3>
            <?php if (empty($myRequests)): ?>
                <p class="text-muted">Вы пока не оставляли заявок.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Тип</th>
                                <th>Автомобиль</th>
                                <th>Дата / Время</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($myRequests as $req): ?>
                                <tr>
                                    <td><?= htmlspecialchars($req['type']) ?></td>
                                    <td><?= htmlspecialchars(($req['brand'] ?? '') . ' ' . ($req['model'] ?? '—')) ?></td>
                                    <td><?= htmlspecialchars($req['date'] ?? 'Срочно') ?></td>
                                    <td>
                                        <span class="badge bg-<?= $req['status'] === 'new' ? 'warning' : 'success' ?>">
                                            <?= htmlspecialchars($req['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>