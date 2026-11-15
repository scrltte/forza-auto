<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="fw-bold">Контакты автосалона Forza</h1>
            <p class="text-muted">Свяжитесь с нами любым удобным способом или посетите наш автосалон</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Блок с контактной информацией -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100 p-4">
                <h3 class="card-title fw-bold mb-4">Наш автосалон</h3>
                
                <div class="mb-3 d-flex align-items-start">
                    <i class="bi bi-geo-alt-fill text-primary fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Адрес</h6>
                        <p class="text-muted mb-0">г. Екатеринбург, ул. Автомагистральная, 12</p>
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-start">
                    <i class="bi bi-telephone-fill text-primary fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Телефон</h6>
                        <p class="text-muted mb-0"><a href="tel:+73430000000" class="text-decoration-none text-muted">+7 (343) 000-00-00</a></p>
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-start">
                    <i class="bi bi-envelope-fill text-primary fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Email</h6>
                        <p class="text-muted mb-0"><a href="mailto:info@forza-auto.local" class="text-decoration-none text-muted">info@forza-auto.local</a></p>
                    </div>
                </div>

                <div class="mb-4 d-flex align-items-start">
                    <i class="bi bi-clock-fill text-primary fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Режим работы</h6>
                        <p class="text-muted mb-0">Пн - Вс: с 09:00 до 21:00 (без выходных)</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок с формой обратной связи -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="card-title fw-bold mb-4">Остались вопросы? Напишите нам</h3>
                
                <form action="/requests/store" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Ваше имя</label>
                        <input type="text" name="name" class="form-control" placeholder="Иван" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Номер телефона</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+7 (999) 000-00-00" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Сообщение / Вопрос</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Интересует автомобиль..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>