<?php require_once __DIR__ . '/layouts/header.php'; ?>

<h1 class="mb-4">Контакты и информация о салоне</h1>

<div class="row mb-5">
    <div class="col-md-6">
        <div class="card p-4 shadow-sm h-100">
            <h3 class="text-orange mb-3">Автосалон «Форза»</h3>
            <p><strong>Адрес:</strong> г. Екатеринбург, ул. Ленина, д. 104</p>
            <p><strong>Телефон:</strong> +7 (343) 555-35-35</p>
            <p><strong>E-mail:</strong> info@forza-auto.ru</p>
            <p><strong>Режим работы:</strong> Пн-Вс: с 09:00 до 21:00 без перерывов и выходных.</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 shadow-sm h-100">
            <h3 class="mb-3">Обратная связь</h3>
            <form action="/requests/store" method="POST">
                <input type="hidden" name="type" value="consultation">
                <div class="mb-3">
                    <label class="form-label">Ваше имя</label>
                    <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Телефон</label>
                    <input type="text" name="phone" class="form-control" required placeholder="+7 (XXX) XXX-XX-XX">
                </div>
                <div class="mb-3">
                    <label class="form-label">Сообщение</label>
                    <textarea name="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Отправить сообщение</button>
            </form>
        </div>
    </div>
</div>

<!-- Блок с картой (заглушка iframe) -->
<div class="card shadow-sm p-3">
    <h4 class="mb-3">Мы на карте</h4>
    <div class="ratio ratio-16x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2195.4!2d60.6!3d56.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTbCsDQ4JzAwLjAiTiA2MMKwMzYnMDAuMCJF!5e0!3m2!1sru!2sru!4v1600000000000" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>