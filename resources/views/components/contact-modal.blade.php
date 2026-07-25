@props(['show' => false])

<div class="modal-overlay {{ $show ? 'show' : '' }}" id="contactModal">
    <div class="modal-content">
        <button class="modal-close" id="closeModal" aria-label="Закрыть">
            <img src="/images/close.svg" alt="" width="24" height="24">
        </button>
        <h2 class="modal-title">Оставьте заявку</h2>
        <p class="modal-subtitle">Мы свяжемся с Вами в ближайшее время</p>

        <form class="modal-form" id="contactForm" novalidate>
            <div class="form-group">
                <input type="text" class="form-input" id="nameInput" placeholder="Ваше имя" required minlength="2" maxlength="50" pattern="[А-Яа-яA-Za-z\s]+">
                <span class="form-error" id="nameError"></span>
            </div>
            <div class="form-group">
                <input type="tel" class="form-input" id="phoneInput" placeholder="Телефон" required maxlength="18" pattern="\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}">
                <span class="form-error" id="phoneError"></span>
            </div>
            <div class="form-group">
                <textarea class="form-textarea" id="messageInput" placeholder="Сообщение" rows="4" maxlength="500"></textarea>
                <span class="form-char-count" id="messageCharCount">0/500</span>
            </div>
            <div class="form-group checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" class="form-checkbox" id="consentCheckbox" required>
                    <span class="checkbox-custom">
                        <img src="/images/check.svg" alt="" width="14" height="14">
                    </span>
                    <span class="checkbox-text">Даю согласие на <span class="checkbox-link">обработку персональных данных</span></span>
                </label>
                <span class="form-error" id="consentError"></span>
            </div>
            <button type="submit" class="modal-submit">Отправить</button>
        </form>
    </div>
</div>
