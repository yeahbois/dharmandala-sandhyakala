# Core Features & Deep Explanations

This document delivers an in-depth, technical tour of all primary features of the Dharmandala Sandhyakala platform.

---

## 1. Architectural Feature Tour (Page by Page)

The platform consists of several responsive frontend pages and back-office management interfaces:

### 1.1 Dynamic Cabinet Directory (`/kabinet/osis` & `/kabinet/mpk`)
*   **Theming**: Custom CSS variables (e.g., `--theme-primary-600`) dynamically style the container backgrounds and layouts.
*   **Cabinet Members**: Rendered dynamically by parsing `database/data/cabinet.json` combined with corresponding database overrides in the `admins` table.
*   **Full Names & Clickable Handles**: Cabinet portraits list full names without truncation (ranging between `text-[11px]` on mobile to `text-sm` on desktop) with active Instagram links mapped as `https://instagram.com/handle`.
*   **View More/Less Toggle**: Long quotes have an interactive accordion toggle ensuring quotes are expandable without layout shifts.

### 1.2 Interactive Program Kerja Directory (`/programkerja`)
*   **Categorization**: Organizes initiatives dynamically by division (OSIS) and bidangs (MPK).
*   **Detail Portal (`/programkerja/{id}`)**: Standardized Blade templates pull direct metrics, execution logs, and embedded photo carousels representing past programs.

### 1.3 Prestasi Sliders & Carousels (`/publikasiprestasi`)
*   **Touch Carousels**: Implements a responsive CSS-snap carousel with explicit arrow buttons (`scrollSlider`) and interactive dot indicators (`updateDots`) injected via script tags to guarantee flawless mobile navigation.

### 1.4 Thanos Challenge Board (`/thanos`)
*   **Thanos Challenge System**: An essay-style answer system designed for engagement campaigns.
*   **Right Answer Schema**: Evaluates user answers case-insensitively, supporting multiple correct variations stored as comma-separated strings inside the database.
*   **Leaderboard**: Submissions are automatically ordered first by correctness (points) and secondarily by speed, showing submission timestamps in **GMT+07:00 WIB** format.
*   **Access**: Restricted to the 'Akademis' group and Superadmins on the back-office dashboard.

---

## 2. Specialized System: JVLYN Ticketing System

The ticketing engine is a robust, production-ready system managing inventory, real-time ticket statuses, pricing calculations, discount allocations, and QR scanning workflows.

### 2.1 Dual-Database Mechanics
Ticketing architectures must prevent double-booking while ensuring low-latency checkouts:
*   **MySQL (Source of Truth)**: Records persistent, transactional orders (`orders`) and finalized tickets (`jvlyn_tickets`).
*   **Supabase (Real-Time State Engine)**: Drives live user interactions. Contains the remaining ticket categories, temporary hold quotas, and individual VIP seat maps (`vip_seats`).

### 2.2 Quota & VIP Seating Locks
1.  **Quota Holding**: Adding a Festival or VIP Random ticket triggers an RPC call `adjust_quota(cat_key, delta)` which reserves the ticket instantly.
2.  **Seat Grid Locks**: Selecting a physical VIP seat updates the status in `vip_seats` in Supabase to `locked`.
3.  **Auto-Expiration**: Booking sessions have a strict 10-minute timeout. If a user drops off, a cleanup script invokes `adjust_quota` to restore quota numbers and resets locked seats back to `available`.
4.  **Admin Reversion**: Deleting an order or ticket via the dashboard checker restores VIP seats to `available` and updates Supabase category quotas automatically.

### 2.3 Pricing Logic & Discount Codes
Pricing is managed inside `JVLYNController@storeOrder` to calculate transaction costs securely:
*   **Festival Pass**: Base Price IDR 150,000.
*   **VIP Seat Pass**: Base Price IDR 325,000 (with physical grid selection).
*   **VIP Random Pass**: Base Price IDR 300,000 (random seat allocated upon checkout).

The platform supports specialized, hardcoded discount and referral codes:
*   `JVLYNXALUMNI`: Lowers Festival Pass to IDR 85,000.
*   `JVLYNXMHT18`: Lowers Festival Pass to IDR 132,000.
*   `DONASIFEST`: Festival Pass complimentary cost of IDR 0.
*   `DONASIVIP`: VIP Random Pass complimentary cost of IDR 0.
*   `JOSHUAS1T0RU5`: Master administrative override, granting free tickets for Festival + VIP Random passes.

*Backend Safe Calculation:* Calculations occur per-item on the backend. This prevents donation codes from zeroing out other paid tickets in the same checkout order.

### 2.4 Ticket ID & Status Schema
*   **Ticket ID Format**: Generated using a strict alphanumeric pattern: `[FEST/VIP1/VIP2][NORM/ALUM/MH18/DONA][2 random numbers + 3 random letters]` (e.g., `FESTALUM12ABC`).
*   **Status Lifecycle**:
    *   `pending_delivery`: Default status upon checkout submission.
    *   `sent`: Switched when payment is approved and ticket PDFs are mailed.
    *   `failed`: Represents mail server or delivery errors.
    *   `fail_order`: Assigned to declined order transactions.

### 2.5 Verification & Scan Endpoint (`/jvlyn/api/scan`)
*   Operates via the `/jvlyn/panit/scanner` interface.
*   The scanner endpoint checks whether a ticket has been scanned by analyzing the `is_scanned` column.
*   If `is_scanned` is a timestamp, the scanner errors with "Ticket already scanned!" to prevent duplicate entry.
*   On a successful first scan, it updates `is_scanned` to the current timestamp and returns buyer metadata (`buyer_name`, `buyer_email`, `buyer_phone`, `ticket_type`, `referral_code`) to the scanner UI.

---

## 3. Specialized System: Dashboard Database System

The administrator dashboard (`/dashboard`) provides a command-and-control center for the website content and metadata.

### 3.1 Permissions, Roles & Groups
Dashboard features are split into widgets which authenticate through the logged-in administrator profile:
*   **Thanos Widget**: Governed by the `auth` middleware; restricted strictly to the "Akademis" group and "Superadmins". Positioned elegantly below personal configurations.
*   **Multimedia Widget**: Supports embedded normalization using `getEmbedUrlAttribute` on the `Multimedia` model to render YouTube video embeds, Instagram Reels, and TikTok clips cleanly.
*   **Mailbox Counters Widget**: Displays email dispatch statistics and tracks daily quota limits to prevent host SMTP blocking.
*   **Thalations Widget**: Updates global settings, visitor countdown metrics, and the platform visitor count (`jumlah_pengunjung`).

---

## 4. Guide for Recording Your Website Demo Video

To create a professional and comprehensive video demonstration of your website, record your screen performing the following step-by-step flows.

### 4.1 What Features and Pages to Record
Your video should be divided into two main chapters:

#### Chapter 1: The User & Checkout Journey (Public Views)
1.  **Homepage & Navigation**: Scroll through the homepage, demonstrating the interactive cabinet portraits (click the view more/less toggle on quotes) and the dynamic countdown component.
2.  **Program Kerja**: Navigate to `/programkerja`, filter by division, and click a proker to show the detail page.
3.  **JVLYN Ticket Booking**:
    *   Navigate to `/jvlyn` and explain the ticket categories.
    *   Proceed to checkout, input user details, select a seat on the interactive VIP seating layout (note the scrollable mobile layout), type a discount code (e.g., `JVLYNXALUMNI`), and upload a dummy payment proof image.
    *   Submit the order and present the **Order Summary** page (`/jvlyn/summary/{id}`) with individual ticket prices.

#### Chapter 2: The Back-Office Control (Admin Views)
1.  **Admin Login**: Access `/login` and authenticate using an admin user.
2.  **Dashboard Hub**: Showcase the widgets (adding a news post, embedding a TikTok video, updating the thalations countdown, viewing SMTP mailbox counters).
3.  **Thanos Board**: Navigate to the Thanos response center, explain correct/incorrect responses, and view the submission WIB order.
4.  **JVLYN Checker & Scanner**:
    *   Navigate to `/jvlyn/panit/dashboard`. Find the pending ticket order you placed in Chapter 1.
    *   Examine the payment proof, click **Approve**, and show the state transitioning to approved.
    *   Open `/jvlyn/panit/scanner`. Mock scan the generated ticket code, proving that the entry pass is validated and blocks double-scans successfully.

### 4.2 Where to Upload and Embed
Once your video is recorded:
1.  **Host the Video**: Upload the file to **YouTube** (as unlisted/public) or store it directly in **Supabase Storage** in a public bucket.
2.  **Embed in Documentation**: Edit this file or create an `Overview.md` inside `/docs` and embed the video:
    ```html
    <iframe width="560" height="315" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" frameborder="0" allowfullscreen></iframe>
    ```
