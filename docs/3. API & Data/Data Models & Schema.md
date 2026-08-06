# Data Models & Schema

The platform relies on a relational MySQL schema for persistent state, coupled with a Supabase structure for real-time tracking.

---

## 1. MySQL Relational Schema

```
              ┌──────────────────────────┐
              │          orders          │
              ├──────────────────────────┤
              │ id (PK)                  │
              │ buyer_name               │
              │ buyer_email              │
              │ buyer_phone              │
              │ price                    │
              │ total_tickets            │
              │ order_status             │
              └────────────┬─────────────┘
                           │ (1)
                           │
                           │ (N)
              ┌────────────▼─────────────┐
              │      jvlyn_tickets       │
              ├──────────────────────────┤
              │ id (PK)                  │
              │ order_id (FK)            │
              │ ticket_type              │
              │ ticket_status (ENUM)     │
              │ is_scanned (TIMESTAMP)   │
              │ referral_code            │
              │ ticket_id (UNIQUE)       │
              │ seat_number              │
              │ price                    │
              └──────────────────────────┘
```

### 1.1 `admins`
Maps administrator directory and login access permissions.
*   `id`: Primary Key.
*   `name`: Full name of administrator.
*   `username`: Unique handle used during login.
*   `password`: Bcrypt-hashed password string.
*   `role`: Level of access (`Superadmin`, `Admin`, `User`).
*   `group`: Associated organizational division (`Akad`, `Media`, `Prestasi`, `ThamNet`, `Macapi`, etc.).
*   `quotes`: Optional string rendered dynamically on cabinet pages.
*   `instagram`: Handles formatted as links on portraits.

### 1.2 `orders`
Primary records representing a checkout transaction.
*   `id`: Primary Key.
*   `buyer_name`: Full name of purchaser.
*   `buyer_email`: Target email for PDF ticket deliveries.
*   `buyer_phone`: Contact telephone number.
*   `price`: Calculated final payment total.
*   `payment_proof`: Supabase storage image URL path.
*   `total_tickets`: Aggregate checkout quantity.
*   `order_status`: State of review (`pending`, `paid`, `declined`).

### 1.3 `jvlyn_tickets`
Represents individual tickets issued to buyers, mapped 1:N with parent orders.
*   `id`: Primary Key.
*   `order_id`: Foreign key pointing to `orders.id` (cascade-on-delete).
*   `ticket_type`: Category identifier (`festival`, `vip-seat`, `vip-random`).
*   `ticket_status`: Delivery condition (`pending_delivery`, `sent`, `failed`, `fail_order`).
*   `is_scanned`: Nullable timestamp tracking check-ins at physical venue.
*   `referral_code`: Code applied for discount calculation during checkout.
*   `ticket_id`: Formatted ticket ID (e.g., `FESTALUM12ABC`).
*   `seat_number`: String representing designated VIP seat (e.g., `C04`).
*   `price`: Final calculated price of the ticket after specific referral discounts.

### 1.4 `mailbox_counters`
Ensures strict email dispatch rate limiting.
*   `mailbox_email`: Primary key identifying the sending mail container.
*   `current_usage`: Counts successful dispatches.
*   `last_reset`: Date when usage was last cleared.

---

## 2. Supabase Real-Time Schemas

### 2.1 `ticket_categories`
*   `category_key` (PK): Unique lookup (e.g., `festival`, `vip_seat`, `vip_random`).
*   `category_name`: Human-readable label ('Festival', 'VIP Seat', 'VIP Random').
*   `available_quota`: Absolute remaining items available for realtime carts.
*   `selled`: Complete count of tickets finalized in MySQL.

### 2.2 `vip_seats`
*   `seat_number` (PK): Designated grid identifier (e.g., `A01` through `I12`).
*   `status`: Dynamic status flag (`available`, `locked`, `sold`).
