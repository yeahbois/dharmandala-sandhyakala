# Build Pipelines (CI/CD)

This document provides a standard workflow for integrating continuous integration and deployment pipelines for the application.

---

## 1. Local Compilation Pipeline
Because some shared hosting panels (like Hostinger) do not reliably execute Node/NPM scripts in production environments, the default build strategy is to compile frontend assets locally:

1.  **Frontend Pipeline**:
    *   Command: `npm run build`
    *   Result: Compiles source assets located in `resources/css` and `resources/js` into production bundles and records them in the manifest under `public/build/`.
    *   *Note:* The compiled `public/build` directory is tracked and committed to version control. This guarantees that your host has instant access to working frontend code immediately upon git pull without having to run an NPM build server on the production instance.

2.  **Composer Autoload Optimization**:
    *   Command: `composer dump-autoload -o` or `composer install --no-dev --optimize-autoloader`
    *   Result: Maps all PHP classes into a static optimized array, speeding up router and model resolution.

---

## 2. GitHub Actions CI Pipeline (Example Template)

To automate quality verification on every push or pull request to the `main` branch, you can establish a GitHub Action inside `.github/workflows/ci.yml`:

```yaml
name: Run Integration Tests

on:
  push:
    branches: [ main ]
  pull_request:
    branches: [ main ]

jobs:
  laravel-tests:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout Code
      uses: actions/checkout@v4

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.2'
        extensions: mbstring, dom, curl, sqlite, libxml

    - name: Setup Node.js
      uses: actions/setup-node@v3
      with:
        node-version: '18'

    - name: Copy Env
      run: php -r "copy('.env.example', '.env');"

    - name: Install Dependencies
      run: |
        composer install --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
        npm install

    - name: Compile Assets
      run: npm run build

    - name: Generate Key
      run: php artisan key:generate

    - name: Run Pest Tests
      run: php artisan test
```
