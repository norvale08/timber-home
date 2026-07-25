# Timber Home

A Laravel-based e-commerce website for timber home construction materials.

## Requirements

- PHP >= 8.2
- Composer
- SQLite extension enabled

## Installation

```bash
git clone <repository-url>
cd timber-home
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.
