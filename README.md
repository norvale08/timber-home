# Timber Home

A Laravel 11 storefront for timber home products, categories, and editorial content. The interface is built with Blade templates and component-scoped CSS.

## Stack

- PHP 8.2+
- Laravel 11
- Blade
- SQLite
- PHPUnit 11

## Local setup

1. Install PHP 8.2+ with the SQLite extension and Composer.
2. Create and configure the environment:

   ```powershell
   Copy-Item .env.example .env
   composer install
   php artisan key:generate
   ```

3. Create the SQLite database, migrate, and seed it:

   ```powershell
   New-Item database/database.sqlite -ItemType File
   php artisan migrate --seed
   ```

4. Run the application:

   ```powershell
   php artisan serve
   ```

Open `http://127.0.0.1:8000`.

## Docker

Build and run:

```powershell
docker build -t timber-home .
docker run -p 8080:80 timber-home
```

Open `http://localhost:8080`.

The Dockerfile automatically creates the SQLite database, runs migrations, and seeds data during build.

## Render deployment

Set environment variable:

```
DB_CONNECTION=sqlite
```

Render will build the Docker image which includes the database setup.

## Pages

| Path | Description |
| --- | --- |
| `/` | Home page |
| `/catalog` | Product catalog |
| `/catalog/{slug}` | Category page |
| `/product/{id}` | Product page |
| `/blog` | Blog index |
| `/blog/{id}` | Article page |

## Project structure

- `app/Http/Controllers` — page controllers
- `app/Models` — `Product` and `Article` models
- `database/migrations` — database schema
- `database/seeders` — sample catalog and article data
- `resources/views` — Blade layouts, pages, and reusable components
- `public/css` — global, page, and component CSS
- `routes/web.php` — public routes

## Development

Run the test suite:

```powershell
php artisan test
```

Clear generated application caches when configuration or view changes are not reflected:

```powershell
php artisan optimize:clear
```

## Responsive styling

Desktop styles are the baseline. Responsive overrides are kept in the relevant stylesheet under `public/css` and target tablet and mobile widths. When changing a component, keep its base desktop rules intact and add breakpoint-specific adjustments only where needed.
