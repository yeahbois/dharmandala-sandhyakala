# Directory Structure

An overview of where code, templates, migrations, and static assets live in this repository.

## 1. Application Directory Map

```
dharmandala-sandhyakala/
├── app/                              # Core Laravel application logic
│   ├── Http/
│   │   ├── Controllers/             # Controllers handling routes and business logic
│   │   │   ├── Api/
│   │   │   │   └── ContentController.php # Secure REST API for admin dynamic modules
│   │   │   ├── DashboardController.php # OSIS MPK main dashboard controller
│   │   │   ├── JVLYNController.php     # Complex ticket processing, quotas & admin checker
│   │   │   ├── ThanosController.php    # Thanos challenge system logic
│   │   │   └── ThamNetController.php   # ThamNet CMS and blogging engine
│   ├── Models/                      # Eloquent ORM Models mapping to MySQL tables
│   │   ├── Admin.php                # Admin credential & role authorizations
│   │   ├── JvlynTicket.php          # Ticket entity model (Festival, VIP Random, VIP Seat)
│   │   ├── Order.php                # Customer checkout transaction record
│   │   └── ...                      # Divisi, Post, Prestasi, ProgramKerja, Thanos models
│   ├── Providers/                   # Application Service Providers
│   └── Services/                    # Specialized external connections
│       ├── GoogleSheetService.php   # Google integration adapter
│       └── SupabaseService.php      # Supabase direct REST client wrapper
│
├── config/                           # Application configuration files (Google, DB, Mail)
├── database/                         # Database schema records and setups
│   ├── data/
│   │   └── cabinet.json             # Core structure and members of OSIS/MPK cabinets
│   ├── migrations/                  # Schema definition and structural update scripts
│   └── seeders/                     # Initial database population scripts
│
├── docs/                             # Full developer and architectural documentation
│
├── public/                           # Web server entry point and static resources
│   ├── build/                       # Compiled CSS/JS production-ready assets (Vite)
│   ├── images/                      # Cabinet photos, banners, and static icons
│   └── index.php                    # Front Controller launching the application
│
├── resources/                        # Source view and script directories
│   ├── css/                         # CSS development files (Tailwind imports)
│   ├── js/                          # Client-side JavaScript modules
│   └── views/                       # Blade templates powering the frontend UI
│       ├── components/              # Reusable template components (layout, portrait, countdown)
│       ├── dharman_kabinet/         # OSIS/MPK Cabinet and division information pages
│       ├── dharman_homepage/        # Homepage, proker listings, and achievement details
│       ├── dharman_thanos/          # Thanos public response challenge
│       ├── dharman_thamnet/         # ThamNet blog directory and inline editor
│       ├── jvlyn/                   # JVLYN Ticket store, seats, summary & scanner layouts
│       └── dashboard.blade.php      # Admin panel for dynamic system modules
│
├── routes/                           # Route definition registries
│   └── web.php                      # Application routes (Web + Middleware guards)
│
└── tests/                            # Unit and Feature automated tests (Pest / PHPUnit)
```
