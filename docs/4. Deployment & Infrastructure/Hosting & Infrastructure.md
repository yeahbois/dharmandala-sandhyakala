# Hosting & Infrastructure

Guidance for hosting and running this application in professional environments.

---

## 1. Hosting on Shared Environments (e.g., Hostinger)

Deploying a Laravel application to standard web hosting environments like Hostinger requires specific file system and configuration considerations:

### A. Directory Mapping
For security, shared hosts utilize a public-facing folder (often `public_html`).
1.  Upload the entire project repository to your host's root directory (e.g., at `/home/username/project`).
2.  Configure your host's domain to point its Document Root directly to the public folder: `/home/username/project/public`.
3.  Ensure your `.htaccess` inside `public/` is active to rewrite incoming URL traffic through `index.php`.

### B. Configuration Caching (Crucial for Speed & Credentials)
Shared hosting environments frequently suffer from stale cache problems when `.env` configurations are updated. After every code sync:
1.  Clear config cache: `php artisan config:clear`
2.  Rebuild secure configurations: `php artisan config:cache`

*Warning:* In Laravel, if you run `php artisan config:cache`, any direct call to `env()` inside controllers will return `null`. Always ensure controllers query values using the `config()` helper (e.g., `config('google.key')` instead of `env('GOOGLE_KEY')`), with configuration mapped inside custom configuration files like `config/google.php`.

### C. Folder Permissions
Ensure the following directories have read/write access allowed for the web server user (typically `chmod -R 775` or `755`):
*   `storage/` (For session payloads, logs, and temporary compile views)
*   `bootstrap/cache/` (For route and config mapping caches)

---

## 2. Containerized Environments (Docker)

For local development or cloud virtual servers (AWS, DigitalOcean, GCP), you can run the application inside self-contained Docker structures:

### A. Quick Launch
To spin up the web environment with Nginx and PHP:
```bash
docker-compose up -d --build
```
This maps Nginx onto localhost port `8080`, running PHP 8.2 processes natively.

### B. Accessing Container Shell
To perform database migrations or clear caches inside the container:
```bash
docker-compose exec app bash
```
Inside the container terminal, run:
```bash
php artisan migrate --force
```
