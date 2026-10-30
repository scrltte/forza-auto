<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <h2 class="mb-4">Регистрация</h2>
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
                <label class="form-label">Телефон</label>
                <input type="text" name="phone" class="form-control" placeholder="+7 (XXX) XXX-XX-XX" required>
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