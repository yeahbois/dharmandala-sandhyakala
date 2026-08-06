# System Requirements

To run, build, and deploy this project successfully, your system should meet the following baseline requirements.

## 1. Backend Environment

*   **PHP**: Version `8.2` or newer (Required for modern Laravel 11 features, including strict types and optimized class discovery).
*   **Composer**: Version `2.x` (For PHP dependency management).
*   **Database Server**: MySQL `8.0+` or MariaDB `10.4+` (A MySQL database connection is hardcoded as a fallback, ensuring compatibility).
*   **PHP Extensions Required**:
    *   `openssl`
    *   `pdo`
    *   `mbstring`
    *   `tokenizer`
    *   `xml`
    *   `ctype`
    *   `json`
    *   `bcmath`

## 2. Frontend Build Environment

*   **Node.js**: Version `18.x` or `20.x` (LTS versions recommended).
*   **NPM / Bun / Yarn**: NPM `9.x` or newer (Used to run the Vite bundler and build compiled assets).

## 3. Third-Party Integrations & Accounts

To run the full feature set (especially JVLYN Ticketing and ThamNet Google integration), you need:
1.  **Supabase Account**: A live Supabase project containing real-time tables for tickets, VIP seats, and quotas.
2.  **Google Cloud Developer Console Project**: Enable the Google Drive and Sheets API and generate OAuth credentials to allow admins to upload images and pull spreadsheet information.
3.  **Mail Server**: An SMTP email server credentials (such as Gmail or Mailgun) to dispatch ticket purchases to buyer emails.
