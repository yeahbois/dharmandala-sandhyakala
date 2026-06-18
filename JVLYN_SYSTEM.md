# JVLYN Ticketing System Documentation

This document provides a comprehensive overview of the JVLYN ticketing system, covering its architecture, database schemas, real-time mechanics, and pricing logic.

## 1. System Architecture

The JVLYN system uses a dual-database architecture to balance data persistence with real-time interactivity:

- **MySQL (Main Database):** Stores the source of truth for orders, finalized tickets, and administrative logs.
- **Supabase (Real-time Database):** Manages the shopping cart, real-time ticket quotas, and seat availability to prevent double-booking and provide a live experience for users.

## 2. Database Schema

### 2.1 MySQL Tables

#### `orders`
Stores the main order information.
- `id`: Primary Key.
- `buyer_name`: Full name of the purchaser.
- `buyer_email`: Email address for ticket delivery.
- `buyer_phone`: Contact number.
- `price`: Total price of the order.
- `payment_proof`: URL to the uploaded payment proof image.
- `total_tickets`: Total number of tickets in the order.
- `order_status`: Status of the order (`pending`, `paid`, `declined`).

#### `jvlyn_tickets`
Stores individual ticket details linked to an order.
- `id`: Primary Key.
- `order_id`: Foreign key to `orders`.
- `ticket_type`: Category of the ticket (`festival`, `vip-seat`, `vip-random`).
- `ticket_status`: Status of the individual ticket (`pending_delivery`, `sent`, `failed`, `fail_order`).
- `is_scanned`: Boolean indicating if the ticket has been used at the venue.
- `referral_code`: The code used to obtain a discount or special ticket.
- `ticket_id`: Unique alphanumeric ID (e.g., `FESTALUM12ABC`).
- `seat_number`: Assigned seat (for VIP Seat category).
- `price`: Price paid for this specific ticket.

#### `mailbox_counters`
Tracks email sending usage.
- `mailbox_email`: Primary Key.
- `current_usage`: Number of emails sent.
- `last_reset`: Date of the last usage reset.

### 2.2 Supabase Tables

#### `ticket_categories`
- `category_name`: 'Festival', 'VIP Seat', 'VIP Random'.
- `available_quota`: Remaining tickets available for purchase.
- `price`: Base price.
- `selled`: Total count of tickets finalized in MySQL.

#### `vip_seats`
- `seat_number`: Unique identifier (e.g., `A01`, `B12`).
- `status`: `available`, `locked` (in a cart), `sold`.

#### `cart_items`
- `session_id`: Unique identifier for the user session.
- `items`: JSONB array of ticket objects currently in the user's cart.

## 3. Real-time Mechanics

### 3.1 Quota Management
When a user adds a ticket to their cart, the `available_quota` in Supabase is decremented via a stored procedure (RPC) called `adjust_quota`. This ensures that the quota is reserved immediately. If the session expires or the item is removed, the quota is incremented back.

### 3.2 VIP Seating
VIP seats are locked in Supabase as soon as they are added to a cart. Once an order is placed, the status in `vip_seats` is permanently set to `sold`. If an order or ticket is deleted by an admin, the status reverts to `available`.

### 3.3 Session Timeout
Booking sessions last for 10 minutes. A background process (and frontend logic) purges expired `cart_items` and restores the reserved quotas to the `ticket_categories` table.

## 4. Pricing and Discounts

Pricing is calculated in `JVLYNController@storeOrder` based on the ticket category and referral code.

### 4.1 Ticket Categories
- **Festival:** Base IDR 150,000.
- **VIP Seat:** IDR 325,000.
- **VIP Random:** IDR 300,000.

### 4.2 Referral and Discount Codes
The following codes are currently implemented:

| Code | Applied To | Resulting Price | Notes |
| :--- | :--- | :--- | :--- |
| `JVLYNXALUMNI` | Festival | IDR 85,000 | Alumni discount. |
| `JVLYNXMHT18` | Festival | IDR 132,000 | Special cohort discount. |
| `DONASIFEST` | Festival | IDR 0 | Donation/Complimentary ticket. |
| `DONASIVIP` | VIP Random | IDR 0 | Donation/Complimentary ticket. |
| `JOSHUAS1T0RU5`| Festival/VIP | IDR 0 | Special master code (Festival + VIP Random). |

### 4.3 Adding New Codes
To add or edit referral codes, modify the logic in `app/Http/Controllers/JVLYNController.php` within the `storeOrder` method. Look for the conditional blocks checking `$itemRef`.

## 5. Administrative Controls

The `/jvlyn/panit/dashboard` provides several controls:
- **Order Checker:** Review pending orders and approve/decline them based on payment proof.
- **Sale Toggle:** Admins can "Close Sale" or "Open Sale" for any category. Closing a sale sets the `available_quota` in Supabase to `0`, which disables the selection on the frontend.
- **Scanner:** Real-time QR code scanning for venue entry. It validates `ticket_status` and ensures tickets aren't scanned twice.
