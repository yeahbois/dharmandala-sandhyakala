# Code Standards

Maintaining consistent code styling and coding standards makes our codebase highly readable and maintainable.

---

## 1. PHP Coding Standards (PSR-12)

The backend follows the official **PSR-12 Extended Coding Style Guide**:
*   **Indentation**: Code must use 4 spaces for indenting, not tabs.
*   **Naming Conventions**:
    *   *Classes*: PascalCase (e.g., `JVLYNController`).
    *   *Methods*: camelCase (e.g., `storeOrder`).
    *   *Variables*: camelCase (e.g., `ticketType`).
*   **Strict Typing**: Declare return types on controller methods and model operations whenever possible.

---

## 2. Dynamic Component & Blade Guidelines

*   **Theme Compliance**: Use semantic Tailwind classes and existing CSS variables (e.g., `var(--theme-primary-600)`) for uniform UI experiences.
*   **Input Elements**: Ensure all text inputs and textareas use solid backgrounds (`bg-surface-variant` or `bg-surface`) and clear contrasting colors (`text-on-surface`) so they render perfectly across both light, dark, and ultra-dark layout themes.
*   **Script Injections**: Write clean script components encapsulated inside `@push('scripts')` stacks rather than inline scripts within standard body structures.

---

## 3. Configuration Management

*   **Never Use `env()` Outside Custom Configs**:
    To avoid empty values when Laravel's configuration is cached (`php artisan config:cache`), always define env parameters inside files under `config/` (e.g., `config/google.php`) and access them in models or controllers using the `config('google.key')` helper.
*   **Autoload Hook**: Ensure any critical automated commands (like migrations or cache clearing) are declared within `post-autoload-dump` inside `composer.json` to streamline continuous integration deployments.
