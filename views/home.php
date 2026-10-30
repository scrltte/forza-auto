<?php require_once __DIR__ . '/layouts/header.php'; ?>

<!-- Баннер / Слайдер -->
<div class="p-5 mb-5 bg-dark text-white rounded-3 shadow">
    <div class="container-fluid py-5">
        <h1 class="display-4 fw-bold text-orange">Автосалон «Форза»</h1>
        <p class="col-md-8 fs-4">Широкий ассортимент новых автомобилей и с пробегом. Профессиональный подбор, тест-драйв и выгодные условия покупки.</p>
        <a href="/cars" class="btn btn-primary btn-lg mt-3">Смотреть каталог</a>
    </div>
</div>

<!-- Преимущества -->
<div class="row text-center mb-5">
    <h2 class="mb-4">Почему выбирают нас</h2>
    <div class="col-md-3 mb-3">
        <div class="card p-3 h-100 shadow-sm">
            <h5>Гарантия качества</h5>
            <p class="text-muted small">Все автомобили проходят тщательную юридическую и техническую проверку.</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3 h-100 shadow-sm">
            <h5>Тест-драйв</h5>
            <p class="text-muted small">Запишитесь на пробную поездку в удобное для вас время.</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3 h-100 shadow-sm">
            <h5>Выгодный кредит</h5>
            <p class="text-muted small">Партнерские программы от ведущих банков с низкими ставками.</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3 h-100 shadow-sm">
            <h5>Поддержка 24/7</h5>
            <p class="text-muted small">Наши менеджеры всегда готовы ответить на любые ваши вопросы.</p>
        </div>
    </div>
</div>

<!-- Форма быстрой заявки на консультацию -->
<div class="card bg-light p-4 mb-5 shadow-sm">
    <h3 class="mb-3">Остались вопросы? Закажите консультацию</h3>
    <form action="/requests/store" method="POST" class="row g-3">
        <input type="hidden" name="type" value="consultation">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="phone" class="form-control" placeholder="+7 (XXX) XXX-XX-XX" required>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Отправить заявку</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>