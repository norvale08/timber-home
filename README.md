# Laravel Project with Blade Templates

A Laravel project foundation set up with Blade templates.

## Installation

1. Install dependencies:
```bash
composer install
```

2. Copy environment file:
```bash
copy .env.example .env
```

3. Generate application key:
```bash
php artisan key:generate
```

4. Configure your database in `.env` file

5. Run the development server:
```bash
php artisan serve
```

## Project Structure

- `app/Http/Controllers/` - Application controllers
- `resources/views/` - Blade templates
- `routes/` - Application routes
- `public/` - Public entry point

## Available Routes

- `/` - Home page
- `/about` - About page

## Features

- Blade template engine
- Layout inheritance
- MVC architecture
- Clean project structure
