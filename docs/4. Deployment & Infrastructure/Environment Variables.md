# Environment Variables

The application's runtime is fully parameterized using environment variables. This keeps secrets secure and out of public source code.

---

## 1. Local and Production Configurations

Your `.env` file should declare the following keys:

### System Core
*   `APP_NAME`: Name of the application (e.g., `Dharmandala`).
*   `APP_ENV`: Deployment stage (`local`, `production`, `testing`).
*   `APP_KEY`: Application encryption key generated via `php artisan key:generate`.
*   `APP_DEBUG`: Set to `true` for detailed local debugging, and `false` in production.
*   `APP_URL`: Complete public domain (e.g., `https://dharmandala-sandhyakala.com`).

### Database (MySQL / MariaDB)
*   `DB_CONNECTION`: System defaults to `mysql` Connection.
*   `DB_HOST`: Database server IP or domain.
*   `DB_PORT`: Database port (default `3306`).
*   `DB_DATABASE`: Target database schema name.
*   `DB_USERNAME`: Database login user.
*   `DB_PASSWORD`: Database login password.

### Mail Integration (Ticket Email Deliveries)
*   `MAIL_MAILER`: Mail protocol (`smtp`).
*   `MAIL_HOST`: SMTP server address (e.g., `smtp.hostinger.com`).
*   `MAIL_PORT`: Port used by the mail server (usually `465` or `587`).
*   `MAIL_USERNAME`: Authentication login email.
*   `MAIL_PASSWORD`: Authentication email password.
*   `MAIL_ENCRYPTION`: Encryption security standard (`ssl` or `tls`).
*   `MAIL_FROM_ADDRESS`: Sender address visible on ticket confirmations.

### Supabase Integration (Real-Time Ticketing)
*   `SUPABASE_URL`: Endpoint of your active Supabase project.
*   `SUPABASE_KEY`: Public anonymous or service role token.

### Google APIs Integration
*   `GOOGLE_CLIENT_ID`: Google OAuth Application ID.
*   `GOOGLE_CLIENT_SECRET`: Google OAuth Application Secret password.
*   `GOOGLE_REDIRECT_URI`: OAuth validation endpoint (e.g., `https://yourdomain.com/google/callback`).
*   `GOOGLE_DRIVE_ID`: Target Google Drive root Folder ID for file uploads.
*   `ADMIN_SECRET`: Secret key used to authorize Google OAuth setups (`https://yourdomain.com/google/redirect?key=SECRET`).
