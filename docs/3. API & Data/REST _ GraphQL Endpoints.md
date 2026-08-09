# REST Endpoints

This document registers the critical RESTful API routes exposed by the platform.

---

## 1. Public Content APIs

### 1.1 Fetch Live Ticket Stats & Quota
*   **Route**: `GET /jvlyn/api/datareal`
*   **Controller**: `TicketController@getLiveQuota`
*   **Description**: Queries the active Supabase project directly to obtain remaining tickets and category quotas in real-time.
*   **Response Payload Sample**:
    ```json
    {
      "festival": 642,
      "vip_random": 108,
      "vip_seat": 92
    }
    ```

### 1.2 Fetch Dynamic Layout Config
*   **Route**: `GET /jvlyn/api/data`
*   **Controller**: `JVLYNController@data`
*   **Description**: Pulls static metadata and configuration structures for the ticketing modules.

---

## 2. Protected System APIs (Requires Authenticated Session)

### 2.1 Ticket Scanner Verification
*   **Route**: `GET /jvlyn/api/scan`
*   **Controller**: `JVLYNController@scanTicket`
*   **Description**: Executed by staff scanning QR codes at the venue. Checks the ticket status, ensures `ticket_status` is valid, checks for double-entry (via `is_scanned` timestamp), and returns expanded order details.
*   **Response Payload Sample (Success)**:
    ```json
    {
      "status": "success",
      "buyer_name": "Rian Hermawan",
      "buyer_email": "rian@example.com",
      "ticket_type": "Festival",
      "referral_code": "JVLYNXALUMNI",
      "message": "Ticket scanned successfully!"
    }
    ```

---

## 3. Secured Dynamic Content APIs (Requires `X-Admin-Secret` Header)

These REST endpoints are handled by `Api\ContentController` to support programmatic creation of dynamic site content.

### 3.1 Create Achievement (Prestasi)
*   **Route**: `POST /api/prestasi`
*   **Payload Required**:
    ```json
    {
      "title": "Juara 1 Lomba Cerdas Cermat Nasional",
      "category": "Akademik",
      "image_url": "https://cdn.example.com/prestasi.png",
      "description": "Prestasi membanggakan siswa..."
    }
    ```

### 3.2 Delete Achievement
*   **Route**: `DELETE /api/prestasi/{id}`

### 3.3 Create Program Kerja
*   **Route**: `POST /api/programkerja`

### 3.4 Delete Program Kerja
*   **Route**: `DELETE /api/programkerja/{id}`
