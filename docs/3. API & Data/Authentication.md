# Authentication

The application implements standard, robust authentication patterns to secure both the main admin dashboards, CMS endpoints, and specific organizational section portals.

---

## 1. Web Session Authentication

For administrators managing the platform via the browser, the platform leverages Laravel's native **Session-based Authentication**:

*   **Database-Driven Sessions**: Configured to store session metadata in the `sessions` database table, maintaining continuous state across load balancers and deployment restarts.
*   **Authentication Guard**: The `auth` middleware secures sensitive administrative routes in `routes/web.php` (e.g., `/dashboard`, `/jvlyn/panit/*`, `/admin/makethanos`, and dynamic API content creation).
*   **Permissions Matrix**: The `admins` table maps individual administrators via their `role` and `group` fields to dictate granular accessibility rules:
    *   *Superadmin*: Unrestricted master access across all boards.
    *   *Akad (Akademis)*: Authorized to update student achievements and modify the Thanos challenge board.
    *   *Media*: Authorized to edit posts, multimedia embeds, and write blogs in the ThamNet editor.
    *   *Prestasi / ThamNet / Macapi*: Granular role permissions for managing targeted page areas.

---

## 2. API Endpoint Authorization (`X-Admin-Secret`)

For headless system integrations and dynamic administrative actions managed via external HTTP REST clients, endpoints in `ContentController` (such as `/api/prestasi` and `/api/programkerja`) are secured using a headers-based approach:

*   **Validation Mechanism**: Request payloads must supply a valid `X-Admin-Secret` header.
*   **Matching Rules**: The backend controller intercepts incoming REST requests and validates this header value against the host server's local `ADMIN_SECRET` environment variable configured in `.env`.
*   **Result**: If the secret key is invalid or absent, the API returns a standard `401 Unauthorized` JSON payload.
