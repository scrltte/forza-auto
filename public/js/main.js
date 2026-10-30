document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('ajaxRequestForm');
    
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            
            try {
                const response = await fetch('/requests/store', {
                    method: 'POST',
                    body: formData
                });
                
                if (response.ok) {
                    alert('Заявка успешно отправлена! Менеджер свяжется с вами.');
                    const modalEl = document.getElementById('requestModal');
                    if (modalEl) {
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) modal.hide();
                    }
                    form.reset();
                } else {
                    alert('Произошла ошибка при отправке заявки.');
                }
            } catch (err) {
                console.error(err);
                alert('Сетевая ошибка.');
            }
        });
    }
});