# Local Installation Guide

This guide details each step of the local installation process, including dependency compilation, environment setup, and seeding.

---

## Step 1: Install PHP Dependencies

This project is built using Laravel 11. Run Composer to download and bind all package dependencies:

```bash
composer install --prefer-dist --no-interaction
```

*Note:* If you are deploying or building in a strict production environment, run `composer install --no-dev --optimize-autoloader`.

---

## Step 2: Configure Environment Variables

Laravel reads from a file named `.env` at the project root directory. Copy the sample file:

```bash
cp .env.example .env
```

Open `.env` in your text editor and update the following blocks:

### Database Settings
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dharmandala_sandhyakala
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### Google API Settings (Required for Google Drive storage and Sheets integration)
Configure these keys after setting up a project in Google Developer Console:
```env
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/google/callback
GOOGLE_DRIVE_ID=your-google-drive-folder-id
ADMIN_SECRET=your-secret-key-for-auth
```

### Supabase Settings (Required for real-time JVLYN tickets and VIP seating)
```env
SUPABASE_URL=https://your-project.supabase.co
SUPABASE_KEY=your-supabase-anon-or-service-key
```

---

## Step 3: Key Generation and Cache Clear

Generate the unique application encryption key to secure user sessions and encrypted data:

```bash
php artisan key:generate
```

To avoid stale configurations, clear any existing cached settings:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## Step 4: Run Migrations and Seeders

Run Laravel's migrations to establish the database schemas in MySQL/MariaDB:

```bash
php artisan migrate
```

To populate basic records, divisions, dynamic sections, and default administrator entries:

```bash
php artisan db:seed
```

---

## Step 5: Frontend Build

This project uses **Vite** with TailwindCSS. You must compile the frontend assets to generate public-ready CSS and JS bundles:

```bash
# Install assets
npm install

# Build compiled bundles inside public/build
npm run build
```

---

## Step 6: Start Server

Run the development server locally:

```bash
php artisan serve
```

The website is now accessible at `http://localhost:8000`. You can test administrative pages and logins using seeded admin accounts.
