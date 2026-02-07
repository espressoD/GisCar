# GisCar - Geographic Information System for Car Listings

A Laravel-based web application for managing and displaying geolocated car and product listings with map integration capabilities.

## 🎯 About

GisCar is a Geographic Information System (GIS) application designed for managing car and product listings with location-based data. It allows administrators to create, update, and manage products with geographic coordinates (latitude/longitude), making it easy to display items on interactive maps.

## ✨ Features

### Product Management
- ✅ **CRUD Operations** - Full Create, Read, Update, Delete functionality for products
- ✅ **Image Handling** - Support for both local uploads and external image URLs
- ✅ **Image Processing** - Automatic image optimization (resize to 500x380, JPEG conversion)
- ✅ **Geographic Data** - Store and manage latitude/longitude coordinates
- ✅ **Admin Panel** - Dedicated admin interface for product management

### Image Features
- Upload images directly or provide external URLs
- Automatic image resizing and optimization
- Max upload size: 50MB
- Supported formats: JPEG, PNG, JPG, GIF, SVG, WEBP
- Square aspect ratio optimization (500x380)

### Location Features
- Store precise geographic coordinates (Lat/Long)
- Map integration capabilities
- Location-based product filtering (ready for implementation)

## 🛠 Tech Stack

### Backend
- **PHP** 8.2+
- **Laravel Framework** 12.0
- **SQLite/MySQL** - Database
- **Laravel Sanctum** - API Authentication
- **Intervention Image** 3.11 - Image Processing

### Frontend
- **Vite** - Asset bundling
- **Bootstrap** - CSS Framework
- **JavaScript** - Interactive features
- Custom CSS animations and templates

### Development Tools
- **Composer** - Dependency management
- **PHPUnit** - Testing
- **Laravel Pint** - Code style
- **Laravel Sail** - Docker development environment
- **Prepros** - Asset compilation and browser sync

## 📦 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM (for frontend assets)
- SQLite extension (or MySQL)
- GD or Imagick PHP extension (for image processing)
- Apache/Nginx web server

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd GisCar
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node Dependencies
```bash
npm install
```

### 4. Environment Configuration
```bash
# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Database Setup
```bash
# Create SQLite database (default)
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### 6. Storage Link
**CRITICAL:** Create symbolic link for public storage
```bash
php artisan storage:link
```

### 7. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server
```bash
php artisan serve
```

## ⚙️ Configuration

### Database Configuration
Edit `.env` file:
```env
# SQLite (Default)
DB_CONNECTION=sqlite

# OR MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=giscar
DB_USERNAME=root
DB_PASSWORD=
```

### Image Processing
The application automatically processes images:
- Resizes to 500x380 pixels
- Converts to JPEG format
- 90% quality compression
- Stores in `storage/app/public/products/`

### Session Configuration
```env
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

### Cache Configuration
```env
CACHE_STORE=database
```

## 📖 Usage

### Admin Access
1. Register/Login to admin panel
2. Navigate to Products section
3. Create new products with:
   - Title (Judul)
   - Type (Jenis)
   - Contact info (Kontak)
   - Latitude & Longitude
   - Image (upload or URL)`

## 📁 Project Structure

```
GisCar/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Admin/
│   │   │       └── ProductAdminController.php  # Product CRUD
│   │   └── Middleware/
│   └── Models/
│       ├── Product.php                         # Product model
│       ├── Seller.php                          # Seller model
│       └── User.php                            # User model
├── config/                                     # Configuration files
├── database/
│   ├── migrations/                             # Database migrations
│   └── seeders/                                # Database seeders
├── public/                                     # Public assets
│   ├── css/                                    # Stylesheets
│   ├── js/                                     # JavaScript files
│   └── storage/                                # Symlink to storage
├── resources/
│   ├── views/                                  # Blade templates
│   │   ├── admin/                              # Admin views
│   │   ├── products/                           # Product views
│   │   └── layouts/                            # Layout templates
│   ├── css/                                    # Source CSS
│   └── js/                                     # Source JavaScript
├── routes/
│   ├── web.php                                 # Web routes
│   └── api.php                                 # API routes
└── storage/
    ├── app/
    │   └── public/
    │       └── products/                       # Product images
    └── logs/                                   # Application logs
```
