<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['show' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['show' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="modal-overlay <?php echo e($show ? 'show' : ''); ?>" id="contactModal">
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
<?php /**PATH D:\GIT\timber-home\resources\views/components/contact-modal.blade.php ENDPATH**/ ?>