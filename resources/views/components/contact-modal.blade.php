@props(['show' => false])

<div class="modal-overlay {{ $show ? 'show' : '' }}" id="contactModal">
    <div class="modal-content">
        <button class="modal-close" id="closeModal">&times;</button>
        <h2 class="modal-title">Оставьте заявку</h2>
        <p class="modal-subtitle">Мы свяжемся с Вами в ближайшее время</p>
        
        <form class="modal-form">
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Ваше имя" required>
            </div>
            <div class="form-group">
                <input type="tel" class="form-input" placeholder="Телефон" required>
            </div>
            <div class="form-group">
                <textarea class="form-textarea" placeholder="Сообщение" rows="4"></textarea>
            </div>
            <div class="form-group checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" class="form-checkbox" required>
                    <span>Даю согласие на обработку персональных данных</span>
                </label>
            </div>
            <button type="submit" class="modal-submit">Отправить</button>
        </form>
    </div>
</div>
