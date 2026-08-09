# System Flow Diagrams

This section visually details the transactional pathways for the two main operational modules of the platform.

---

## 1. JVLYN Ticket Purchase & Real-Time Lock Workflow

Below is the execution flow from ticket selection through quota reservation, payment verification, and ticket delivery.

```
 [ Buyer UI ]            [ Supabase API ]            [ App Backend ]            [ MySQL DB ]
      │                         │                           │                         │
      │── 1. Selects Ticket ───>│                           │                         │
      │   Category & Seats      │                           │                         │
      │                         │── 2. Run RPC call ───────>│                         │
      │                         │   `adjust_quota` &        │                         │
      │                         │   locks VIP seat          │                         │
      │                         │                           │                         │
      │── 3. Submit Checkout ──────────────────────────────>│                         │
      │   (Uploads payment proof)                           │── 4. Create Order ─────>│
      │                                                     │   & Ticket payload      │
      │                                                     │   with status 'Pending' │
      │                                                     │                         │
      │                       [ Admin Review ]              │                         │
      │                              │                      │                         │
      │                              │── 5. Approve Order ─>│                         │
      │                              │                      │── 6. Update Status ────>│
      │                              │                      │   to 'Paid' & Permanent │
      │                              │                      │   locks seat in Supabase│
      │                              │                      │                         │
      │                              │                      │── 7. Generate Ticket ──>│
      │                              │                      │   QR payload & Email    │
      │                              │                      │   confirmation code     │
```

---

## 2. Dynamic CMS & Post Editor Lifecycle

The publishing pathway for blogs and proker dynamic modules through the administrator CMS dashboard:

```
[ Admin Editor UI ]         [ Authentication Middleware ]          [ App Backend ]          [ MySQL DB ]
        │                                 │                             │                        │
        │── 1. Clicks Create Post ───────>│                             │                        │
        │   or Dynamic Component          │── 2. Validates session ─────>│                        │
        │                                 │   (Superadmin/Media/Akad)   │                        │
        │                                                               │                        │
        │── 3. Submit Title & Content ─────────────────────────────────>│                        │
        │   (Optionally links Drive CDN)                                │── 4. Map media URLs ──>│
        │                                                               │   & write record       │
        │                                                               │                        │
        │<── 6. Directs to Feed/Details ────────────────────────────────│<── 5. Confirm Save ────│
```
