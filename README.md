# Timber Home

A Laravel-based e-commerce website for timber home construction materials, featuring a product catalog, blog, and category browsing.

## Technologies Used

- **PHP**: 8.2+
- **Laravel**: 11.0
- **Database**: SQLite
- **Frontend**: Blade Templates
- **CSS**: Custom styles

## Requirements

- PHP >= 8.2
- Composer
- SQLite extension enabled

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd timber-home
```

2. Install dependencies:
```bash
composer install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations and seed the database:
```bash
php artisan migrate --seed
```

6. Start the development server:
```bash
php artisan serve
```

## Environment Setup

The project uses SQLite by default. Ensure your `.env` file contains:

```env
DB_CONNECTION=sqlite
```

The SQLite database file will be automatically created at `database/database.sqlite` when you run migrations.

## Running the Application

The application will be available at `http://127.0.0.1:8000` after running `php artisan serve`.

## Main Routes

| Route | Description |
|-------|-------------|
| `/` | Home page with featured products and articles |
| `/catalog` | Product catalog with categories |
| `/catalog/{slug}` | Category page with product filtering |
| `/product/{id}` | Individual product page |
| `/blog` | Blog listing |
| `/blog/{id}` | Individual article page |
| `/about` | About page |

## Database Structure

### Products Table
- `id` - Primary key
- `title` - Product name
- `slug` - URL-friendly identifier (unique)
- `description` - Product description
- `price` - Product price (decimal)
- `image` - Product image URL (nullable)
- `created_at`, `updated_at` - Timestamps

### Articles Table
- `id` - Primary key
- `title` - Article title
- `slug` - URL-friendly identifier (unique)
- `content` - Article content
- `image` - Article image URL (nullable)
- `created_at`, `updated_at` - Timestamps

## Seed Data

The database is seeded with:
- **12 Products**: Various timber construction materials (brus, doska, vagonka, etc.)
- **6 Articles**: Blog posts about wooden construction and timber materials

## Project Structure

```
app/
├── Http/
│   └── Controllers/     # Application controllers
├── Models/              # Eloquent models (Product, Article)

config/
└── catalog.php          # Category configuration

database/
├── migrations/          # Database migrations
└── seeders/             # Database seeders

resources/
└── views/               # Blade templates
```

## Architecture Notes

- **Models**: Follow Laravel conventions with proper fillable fields and casts
- **Controllers**: Thin controllers using Eloquent directly for data access
- **Configuration**: Static category data stored in `config/catalog.php`
- **No Service Layer**: Removed unnecessary abstraction - Eloquent is sufficient for this scope
- **No Relationships**: Products and articles are standalone entities per current UI requirements

## Development Notes

- Categories are currently static (no database model needed for current UI)
- Product filtering and pagination handled via Eloquent query builder
- All Blade views and CSS remain unchanged from original Figma implementation
