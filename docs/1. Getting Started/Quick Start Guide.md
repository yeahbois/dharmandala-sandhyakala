# Quick Start Guide

Welcome to the Dharmandala Sandhyakala platform documentation. This guide helps you get the application up and running as quickly as possible.

## 1. Fast Track to Development

Assuming you have PHP, Composer, Node.js, and a MySQL-compatible database installed, execute these commands in your terminal:

```bash
# 1. Clone the repository
git clone https://github.com/yeahbois/dharmandala-sandhyakala.git
cd dharmandala-sandhyakala

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies and compile assets
npm install
npm run build

# 4. Copy environment template
cp .env.example .env

# 5. Generate secure app key
php artisan key:generate
```

## 2. Prepare the Database

1. Create a database named `dharmandala` on your local MySQL server.
2. Edit your `.env` file to match your database login:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=dharmandala
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Run the migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

## 3. Run the Dev Server

Start your Laravel local server:

```bash
php artisan serve
```

Your web app is now live at `http://127.0.0.1:8000`! You can log into the Admin Dashboard with the credentials seeded by `AdminSeeder.php` (defaulting to the admin entries in `database/seeders/AdminSeeder.php`).
