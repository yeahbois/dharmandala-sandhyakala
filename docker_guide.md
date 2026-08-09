# 🐳 Docker Guide — Dharmandala Sandhyakala (Laravel + Vite + MySQL)

## 📖 How Docker Works (Quick Explanation)

Think of Docker like a **shipping container** for your app.

| Old Way (XAMPP) | Docker Way |
|---|---|
| You install PHP, MySQL, Apache on your PC | Docker installs them **inside isolated containers** |
| Works only on your machine (maybe) | Works on **any machine** — Windows, Mac, Linux |
| Have to start XAMPP, php artisan serve, npm run dev manually | One command: `docker compose up` |
| Your teammate installs broken versions | They get the **exact same environment** as you |

### Key Concepts

- **Image** — A blueprint (recipe). Like a class in OOP. Example: `php:8.2-fpm` image.
- **Container** — A running instance of an image. Like an object created from a class.
- **Dockerfile** — Instructions to build a custom image. Like a setup script.
- **docker-compose.yml** — Orchestrates **multiple containers** (PHP + MySQL + Node) as one unit.
- **Volume** — A link between your local folder and the container folder. So code edits on your PC reflect inside the container instantly.
- **Network** — Containers talk to each other via an internal Docker network (e.g., the PHP container connects to MySQL via hostname `db`).

### What You Share / What You DON'T Share

> [!IMPORTANT]
> You **NEVER share the `vendor/` or `node_modules/` folders** — those get installed inside the container.
> You only share/commit the **Dockerfile** and **docker-compose.yml** files to GitHub.

```
You commit to GitHub:         Docker rebuilds from scratch:
├── Dockerfile          →     installs PHP extensions
├── docker-compose.yml  →     spins up MySQL, PHP, Node
├── .env.docker         →     sets up environment
├── app/                →     your actual code
├── resources/
├── routes/
└── composer.json       →     composer install happens inside container
```

---

## 🗂️ Project File Structure You'll Create

```
dharmandala-sandhyakala/
├── Dockerfile              ← PHP app image
├── docker-compose.yml      ← Orchestrates everything
├── .env.docker             ← Docker-specific env vars
├── docker/
│   └── nginx/
│       └── default.conf    ← Nginx web server config
```

---

## Step 1 — Create `.env.docker`

> [!NOTE]
> This is a separate `.env` for Docker. The original `.env` is for your local XAMPP setup.

```env
APP_NAME=DharmandalaSandhyakala
APP_ENV=local
APP_KEY=base64:fbU4/BdHopK+xpttp0kANNekRTt+EkYXBEXuWdXLMyY=
APP_DEBUG=true
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=dharmakala
DB_USERNAME=dharmakala_user
DB_PASSWORD=Dharmandala123

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

VITE_APP_NAME="${APP_NAME}"
```

> [!CAUTION]
> `DB_HOST=db` — This is the name of the MySQL **container** (not `127.0.0.1`). Docker containers talk to each other by service name.

---

## Step 2 — Create `Dockerfile`

```dockerfile
# ─── Stage 1: Node (Vite build) ───────────────────────────────────────────────
FROM node:20-alpine AS node_builder

WORKDIR /app

# Copy package files first (for layer caching)
COPY package.json package-lock.json ./

# Install Node dependencies
RUN npm ci

# Copy all source files
COPY . .

# Copy Docker-specific env as .env so Vite can read APP vars
COPY .env.docker .env

# Build frontend assets (compiles Tailwind, JS, etc.)
RUN npm run build

# ─── Stage 2: PHP App ─────────────────────────────────────────────────────────
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev

# Install PHP extensions required by Laravel
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Use the Docker-specific .env
COPY .env.docker .env

# Copy built Vite assets from Stage 1
COPY --from=node_builder /app/public/build ./public/build

# Install PHP dependencies (no dev packages in production)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Fix storage permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage

# Expose PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
```

### 🔍 How the Dockerfile Works (Line by Line)

| Section | What it does |
|---|---|
| `FROM node:20-alpine AS node_builder` | Start with a Node.js image to build frontend assets |
| `COPY package.json ...` | Copy deps manifest first (Docker caches this layer) |
| `RUN npm ci` | Install all Node packages |
| `RUN npm run build` | Build Vite/Tailwind → outputs to `public/build/` |
| `FROM php:8.2-fpm-alpine` | Start fresh with PHP image (two-stage build) |
| `RUN apk add ...` | Install Linux packages needed by PHP extensions |
| `RUN docker-php-ext-install pdo_mysql ...` | Install PHP extensions (talks to MySQL, etc.) |
| `COPY --from=composer:latest ...` | Grab Composer binary from official image |
| `COPY --from=node_builder /app/public/build` | Copy the built frontend from Stage 1 |
| `RUN composer install` | Install PHP dependencies |
| `chown -R www-data` | Fix file permissions so PHP/Nginx can read/write |

> [!TIP]
> The **two-stage build** means the final image doesn't contain Node.js at all — smaller image size!

---

## Step 3 — Create `docker/nginx/default.conf`

```nginx
server {
    listen 80;
    server_name localhost;
    root /var/www/html/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass   app:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include        fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

> [!NOTE]
> `fastcgi_pass app:9000` — Nginx forwards PHP requests to the `app` container (PHP-FPM) on port 9000. This is the Docker internal network talking.

---

## Step 4 — Create `docker-compose.yml` (The One-Command File)

```yaml
services:

  # ── MySQL Database ──────────────────────────────────────────────────────────
  db:
    image: mysql:8.0
    container_name: dharmakala_db
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: dharmakala
      MYSQL_USER: dharmakala_user
      MYSQL_PASSWORD: Dharmandala123
      MYSQL_ROOT_PASSWORD: rootpassword123
    volumes:
      - db_data:/var/lib/mysql
    networks:
      - dharmakala_net
    healthcheck:
      test: ["CMD", "mysqladmin", "ping", "-h", "localhost"]
      interval: 10s
      timeout: 5s
      retries: 5

  # ── Laravel PHP-FPM App ─────────────────────────────────────────────────────
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: dharmakala_app
    restart: unless-stopped
    volumes:
      - .:/var/www/html           # Live code sync (your edits = instant effect)
      - /var/www/html/vendor      # Keep vendor inside container (don't sync)
      - /var/www/html/node_modules
    networks:
      - dharmakala_net
    depends_on:
      db:
        condition: service_healthy

  # ── Nginx Web Server ────────────────────────────────────────────────────────
  nginx:
    image: nginx:alpine
    container_name: dharmakala_nginx
    restart: unless-stopped
    ports:
      - "8080:80"                 # Visit http://localhost:8080
    volumes:
      - .:/var/www/html
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
    networks:
      - dharmakala_net
    depends_on:
      - app

  # ── Vite Dev Server (for hot reload during development) ────────────────────
  vite:
    image: node:20-alpine
    container_name: dharmakala_vite
    working_dir: /app
    volumes:
      - .:/app
      - /app/node_modules         # Keep node_modules inside container
    ports:
      - "5000:5000"               # Vite runs on port 5000 (matches vite.config.js)
    networks:
      - dharmakala_net
    command: sh -c "npm ci && npm run dev -- --host 0.0.0.0"
    depends_on:
      - app

volumes:
  db_data:                        # Persistent MySQL data (survives container restarts)

networks:
  dharmakala_net:
    driver: bridge
```

---

## Step 5 — Update `vite.config.js` for Docker

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import FullReload from 'vite-plugin-full-reload';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        FullReload([
            'resources/views/**',
        ]),
    ],
    server: {
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
        host: '0.0.0.0',        // Changed: allow Docker to expose this
        port: 5000,
        allowedHosts: true,
        hmr: {
            host: 'localhost',   // Browser connects to localhost
        },
    },
});
```

---

## 🚀 One Command to Rule Them All

After creating all the files above, run:

```bash
docker compose up --build
```

That's it. This one command will:
1. ✅ Build the PHP app image (installs PHP extensions, Composer deps)
2. ✅ Build Vite assets (npm install, npm run build)
3. ✅ Start MySQL 8.0 with a fresh database
4. ✅ Start Nginx on `http://localhost:8080`
5. ✅ Start Vite dev server on port 5000 for hot reload

### After First Run — Run Migrations

Open a **second terminal** and run:

```bash
docker compose exec app php artisan migrate --seed
```

Or on repeat visits, just run:

```bash
docker compose up
```

### Stop Everything

```bash
docker compose down
```

### Stop + Delete Database Data

```bash
docker compose down -v
```

---

## 📤 How to Share on GitHub

### What to Commit

Your `.gitignore` already excludes `vendor/`, `node_modules/`, `.env`. Add these additions:

```gitignore
# Add to .gitignore
.env
.env.docker
/public/build
/public/hot
```

> [!CAUTION]
> Never commit `.env` or `.env.docker` to GitHub — they contain passwords!
> Commit `.env.example` and `.env.docker.example` (with fake values) instead.

### Push to GitHub

```bash
git add Dockerfile docker-compose.yml docker/ .env.docker.example
git commit -m "feat: add Docker setup"
git push origin main
```

### Your Linux Friend Clones It Like This

```bash
# 1. Clone the repo
git clone https://github.com/YourUsername/dharmandala-sandhyakala.git
cd dharmandala-sandhyakala

# 2. Copy and edit the env file
cp .env.docker.example .env.docker
nano .env.docker   # Set APP_KEY and other values

# 3. One command — same as Windows!
docker compose up --build
```

> [!TIP]
> Docker Desktop on Linux/Mac works identically to Windows. Same `docker compose up` command. No XAMPP needed on any machine!

---

## 🔑 What Each Service Does (Summary)

```
┌─────────────────────────────────────────────────────────────┐
│                     docker-compose.yml                      │
│                                                             │
│  ┌──────────┐    ┌──────────┐    ┌──────────┐              │
│  │  nginx   │───▶│   app    │───▶│    db    │              │
│  │ :8080    │    │ PHP-FPM  │    │  MySQL   │              │
│  │          │    │ :9000    │    │  :3306   │              │
│  └──────────┘    └──────────┘    └──────────┘              │
│                                                             │
│  ┌──────────┐                                              │
│  │   vite   │  (hot reload for CSS/JS in development)      │
│  │  :5000   │                                              │
│  └──────────┘                                              │
└─────────────────────────────────────────────────────────────┘
       ▲
       │
  Your Browser at http://localhost:8080
```

| You visit       | Nginx receives it | Passes to PHP | PHP talks to MySQL |
|---|---|---|---|
| `localhost:8080` | `/var/www/html/public` | `php-fpm:9000` | `db:3306` |

---

## 🛠️ Useful Docker Commands

```bash
# See running containers
docker compose ps

# See logs of all services
docker compose logs -f

# See only PHP logs
docker compose logs -f app

# Run artisan commands
docker compose exec app php artisan migrate
docker compose exec app php artisan cache:clear
docker compose exec app php artisan key:generate

# Enter MySQL shell
docker compose exec db mysql -u dharmakala_user -p dharmakala

# Enter PHP container shell
docker compose exec app sh

# Rebuild after Dockerfile changes
docker compose up --build
```

---

## ✅ Checklist Before Running

- [ ] Docker Desktop installed and running
- [ ] Created `Dockerfile`
- [ ] Created `docker-compose.yml`
- [ ] Created `docker/nginx/default.conf`
- [ ] Created `.env.docker`
- [ ] Updated `vite.config.js` (`host: '0.0.0.0'`)
- [ ] Run `docker compose up --build`
- [ ] Visit `http://localhost:8080`
- [ ] Run `docker compose exec app php artisan migrate`


# **HOW TO RUN ON LINUX**

Since you've essentially built an isolated environment that travels with your project, moving to a Linux machine with Docker Desktop is incredibly seamless. In fact, Docker is native to Linux, so your setup will run even faster there.

Here is the exact step-by-step process you will follow when you move the dharmandala-sandhyakala folder to your Linux machine:

1. Open a Terminal inside the Folder
Once you've copied your entire workspace folder to Linux, right-click inside the folder and select Open in Terminal.

2. Copy the correct .env
Just like we did here, you should make sure your Linux folder is using the Docker database credentials. You can duplicate your Docker .env by running this command:

bash
cp .env.docker .env
3. Build and Start the Containers
Since Docker needs to download the images on your Linux system for the first time, run the command exactly like we did here:

bash
docker compose up -d --build
(Note: depending on the Linux version, you might need to use docker-compose instead of docker compose, or run it with sudo at the beginning if your user isn't in the docker group).

4. ⚠️ Fix Linux Permissions (Crucial Step!)
Windows doesn't care much about file permissions, but Linux does. Because your local Linux files are mounted directly into the container, the container's web server (which runs as a user called www-data) needs permission to write inside your storage and cache folders.

If you skip this, Laravel will crash with a "Permission denied" error. Run this command:

bash
sudo chmod -R 777 storage bootstrap/cache
5. Install Composer Dependencies (If missed)
If your vendor folder didn't transfer correctly, you can install your PHP packages from outside the container by injecting the command into your newly built app service:

bash
docker compose exec app composer install
6. Run your Database Migrations
Since your database on the new Linux machine will be completely empty upon first starting up, you need to populate your tables:

bash
docker compose exec app php artisan migrate
7. You're Done!
Your site is live! You can now open your Linux browser and navigate to exactly the same ports:

Website: http://localhost:8080
phpMyAdmin: http://localhost:8081
That's the beauty of Docker—the "it works on my machine" problem goes away completely because you are shipping the machine along with the code!
