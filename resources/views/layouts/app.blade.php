<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Timber Home' }}</title>
    <link rel="stylesheet" href="/css/app.css?v=2">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a href="/" class="logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </a>
                    <nav>
                        <a href="/">Главная</a>
                        <a href="/catalog">Каталог</a>
                        <a href="/blog">Блог</a>
                        <a href="#" onclick="openModal(); return false;">Контакты</a>
                    </nav>
                </div>
                <div class="cart-icon-box">
                    <img src="/images/cart-icon.png" alt="Cart" >
                </div>
            </div>
            <div class="header-stripe"></div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-top">
                    <div class="footer-logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </div>
                </div>
                <div class="footer-divider"></div>
                <div class="footer-bottom">
                    <div class="footer-links">
                        <div class="copyright">&copy; 2025, «Название компании»</div>
                        <div class="copyleft">Политика конфиденциальности</div>
                        <div class="copyleft">Реквизиты</div>
                    </div>
                    <div class="copyleft">Разработано в Вятка IT</div>
                </div>
            </div>
        </div>
    </footer>

    <x-contact-modal/>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('contactModal');
        const closeModalBtn = document.getElementById('closeModal');

        function openModal() {
            if (modal) {
                modal.classList.add('show');
            }
        }

        function closeModal() {
            if (modal) {
                modal.classList.remove('show');
            }
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        document.querySelectorAll('.quantity-selector').forEach(function (selector) {
            const minus = selector.querySelector('.qty-btn:first-of-type');
            const plus = selector.querySelector('.qty-btn:last-of-type');
            const value = selector.querySelector('.qty-value');
            if (!minus || !plus || !value) return;

            minus.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const qty = parseInt(value.textContent, 10) || 1;
                if (qty > 1) value.textContent = qty - 1;
            });

            plus.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const qty = parseInt(value.textContent, 10) || 0;
                value.textContent = qty + 1;
            });
        });

        // Contact form validation and phone formatting
        const contactForm = document.getElementById('contactForm');
        const nameInput = document.getElementById('nameInput');
        const phoneInput = document.getElementById('phoneInput');
        const messageInput = document.getElementById('messageInput');
        const consentCheckbox = document.getElementById('consentCheckbox');
        const nameError = document.getElementById('nameError');
        const phoneError = document.getElementById('phoneError');
        const consentError = document.getElementById('consentError');
        const messageCharCount = document.getElementById('messageCharCount');

        // Phone number formatting
        function formatPhoneNumber(value) {
            let digits = value.replace(/\D/g, '');

            if (digits.length === 0) {
                return '';
            }

            if (digits[0] === '7' || digits[0] === '8') {
                digits = digits.substring(1);
            }

            let formatted = '+7';
            if (digits.length > 0) {
                formatted += ' (' + digits.substring(0, 3);
            }
            if (digits.length >= 3) {
                formatted += ') ' + digits.substring(3, 6);
            }
            if (digits.length >= 6) {
                formatted += '-' + digits.substring(6, 8);
            }
            if (digits.length >= 8) {
                formatted += '-' + digits.substring(8, 10);
            }

            return formatted;
        }

        phoneInput.addEventListener('input', function(e) {
            const oldValue = e.target.value;
            const oldCursor = e.target.selectionStart;
            const oldDigitsBeforeCursor = oldValue.substring(0, oldCursor).replace(/\D/g, '').length;

            const newValue = formatPhoneNumber(e.target.value);
            e.target.value = newValue;

            let newCursor = newValue.length;
            let digitsCount = 0;
            for (let i = 0; i < newValue.length; i++) {
                if (/\d/.test(newValue[i])) {
                    digitsCount++;
                }
                if (digitsCount >= oldDigitsBeforeCursor) {
                    newCursor = i + 1;
                    break;
                }
            }

            e.target.setSelectionRange(newCursor, newCursor);
            validateField(phoneInput, phoneError, validatePhone);
        });

        // Character count for message
        messageInput.addEventListener('input', function(e) {
            const currentLength = e.target.value.length;
            const maxLength = e.target.getAttribute('maxlength');
            messageCharCount.textContent = currentLength + '/' + maxLength;
            
            if (currentLength >= maxLength) {
                messageCharCount.style.color = '#ef4444';
            } else {
                messageCharCount.style.color = '#6b7280';
            }
        });

        // Real-time validation
        nameInput.addEventListener('blur', function() {
            validateField(nameInput, nameError, validateName);
        });

        phoneInput.addEventListener('blur', function() {
            validateField(phoneInput, phoneError, validatePhone);
        });

        consentCheckbox.addEventListener('change', function() {
            validateField(consentCheckbox, consentError, validateConsent);
        });

        // Validation functions
        function validateName(value) {
            if (!value || value.length < 2) {
                return 'Имя должно содержать минимум 2 символа';
            }
            if (value.length > 50) {
                return 'Имя не должно превышать 50 символов';
            }
            if (!/^[А-Яа-яA-Za-z\s]+$/.test(value)) {
                return 'Имя может содержать только буквы';
            }
            return '';
        }

        function validatePhone(value) {
            const phonePattern = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/;
            if (!value) {
                return 'Введите номер телефона';
            }
            if (!phonePattern.test(value)) {
                return 'Введите номер в формате +7 (XXX) XXX-XX-XX';
            }
            return '';
        }

        function validateConsent(checkbox) {
            if (!checkbox.checked) {
                return 'Необходимо согласие на обработку данных';
            }
            return '';
        }

        function validateField(input, errorElement, validationFn) {
            const value = input.type === 'checkbox' ? input : input.value;
            const error = validationFn(value);
            
            if (error) {
                errorElement.textContent = error;
                errorElement.classList.add('show');
                if (input.type !== 'checkbox') {
                    input.classList.add('invalid');
                }
                return false;
            } else {
                errorElement.textContent = '';
                errorElement.classList.remove('show');
                if (input.type !== 'checkbox') {
                    input.classList.remove('invalid');
                }
                return true;
            }
        }

        // Form submission
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNameValid = validateField(nameInput, nameError, validateName);
                const isPhoneValid = validateField(phoneInput, phoneError, validatePhone);
                const isConsentValid = validateField(consentCheckbox, consentError, validateConsent);
                
                if (isNameValid && isPhoneValid && isConsentValid) {
                    // Form is valid, submit it
                    alert('Форма успешно отправлена!');
                    contactForm.reset();
                    messageCharCount.textContent = '0/500';
                    closeModal();
                }
            });
        }

        window.openModal = openModal;
    });
    </script>
</body>
</html>
