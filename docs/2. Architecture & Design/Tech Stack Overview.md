# Tech Stack Overview

The Dharmandala Sandhyakala platform is engineered as a highly responsive, secure, and modern web application. Below is an overview of the key components of our tech stack.

```
                    ┌──────────────────────────────┐
                    │      Frontend Interface      │
                    │  Tailwind CSS + Alpine.js   │
                    │   Vite Bundler / Blade UI    │
                    └──────────────┬───────────────┘
                                   │
                                   ▼
                    ┌──────────────────────────────┐
                    │      Backend Application     │
                    │      Laravel Framework       │
                    └──────┬───────────────┬───────┘
                           │               │
      (Persistent State)   │               │   (Real-time State)
                           ▼               ▼
                    ┌──────────────┐┌──────────────┐
                    │  MySQL DB    ││ Supabase API │
                    │ (Orders/Main)││ (Quota/VIP) │
                    └──────────────┘└──────────────┘
```

## 1. Core Framework
*   **Laravel 11**: The backbone of the application's backend architecture. Laravel handles MVC routing, secure controller execution, database migrations, middleware authorization, model relations (Eloquent ORM), and email dispatch.

## 2. Databases & State (Dual-Database Architecture)
To maximize throughput and ensure real-time user experiences, the platform operates a hybrid dual-database setup:
*   **MySQL / MariaDB**: Handles primary persistent relational data, including user records, admin login directories, division mappings, dynamic program kerjas, posts, and confirmed order payloads.
*   **Supabase (PostgreSQL + PostgREST)**: Provides real-time transaction synchronization for the **JVLYN Ticketing System**. It tracks the current remaining inventory quota, temporary cart holds, and seat locks (`vip_seats`), ensuring two concurrent users cannot double-book a single VIP seat.

## 3. Frontend Technology
*   **Blade Templating**: Traditional, server-side rendered templates for highly secure execution and fast initial page load speeds.
*   **TailwindCSS**: CSS framework utilizing utility classes for fully responsive layouts, styling, and seamless transitions.
*   **Vite**: The build bundler powering compile pipelines, combining resources, executing tree-shaking, and optimizing client-side assets into `public/build`.
*   **Alpine.js / JavaScript**: Implemented selectively for dynamic client-side DOM interactions (e.g., ticket category selection, real-time ticket calculations, interactive carousels).

## 4. Third-Party Integrations
*   **Google Drive API & Sheets API**: Enables dynamic media upload and retrieval of configuration details directly from Google storage repositories, managed securely under `config/google.php`.
*   **Simple QrCode (Bacon QrCode)**: Generates highly crisp, verifiable QR code payloads rendered on the fly for ticket confirmation and check-in pages.
