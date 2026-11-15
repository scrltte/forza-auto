<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <h2 class="mb-4">Регистрация</h2>
        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>
        <form action="/register" method="POST">
            <div class="mb-3">
                <label class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" required minlength="2" maxlength="50">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                <label class="form-label">Номер телефона</label>
                <input type="tel" 
                    name="phone" 
                    class="form-control" 
                    placeholder="+7 (999) 000-00-00" 
                    value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" 
                    required>
                <div class="form-text">Введите номер в формате +7 (999) 000-00-00 или 89990000000</div>
            </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль (мин. 8 символов)</label>
                <input type="password" name="password" class="form-control" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
    </div>
</div>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>