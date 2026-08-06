# Repository Security & Codebase Cleanup Analysis

This document provides a highly detailed analysis of unused/unuseful files, archives, and garbage within this codebase, and answers critical safety, security, and visibility questions for making this repository public.

---

## Part 1: Garbage, Archives, and Unused Files Identification

During a deep audit of the codebase, we identified several groups of files and folders that are either no longer active, represent stale legacy features, or are backup files/large media assets that do not belong in a clean repository.

### 1. Stale / Archived Feature Directories
These folders contain legacy code from retired features. They are kept as "archives" but are not active or registered in routes.
*   **`resources/views/archive_pudobooth/`**: Contains Blade templates (`admin.blade.php`, `camera.blade.php`, etc.) for an inactive "Pudobooth" photo-booth feature.
*   **`resources/views/archive_program-kerja/`**: Contains subfolders (`akademis`, `dhl`, `k3or`, `rohani`, `sasbud`) with retired or hardcoded static proker pages. The live application currently loads program-kerja dynamic items from the database.
*   **`app/Http/Controllers/PudoBoothAdmin.php`**, **`app/Http/Controllers/QueueController.php`**, **`app/Http/Controllers/FormController.php`**, **`app/Http/Controllers/OpenHouseController.php`**, **`app/Http/Controllers/TicketController.php`**, **`app/Http/Controllers/GoogleController.php`**: These controllers are either unused by any active web route in `routes/web.php` or pertain to the retired Pudobooth and legacy spreadsheet ticketing mechanics.

### 2. Large Media Files and LFS Artifacts
These files are not code, consume massive repository space, and can cause overhead during cloning and deployments.
*   **`public/videos/MVI_7285.MOV`**: This is a large video file tracked via Git LFS. Large media assets should ideally be served from a dedicated CDN (e.g., Google Drive CDN, AWS S3, or Supabase Storage) rather than being bundled inside the Git source tree.
*   **`database/data/cabinet_backup.json`**: An old backup of the cabinet member list. The active application exclusively queries `database/data/cabinet.json` or uses the MySQL `admins` database model.

### 3. Temporary, Scrap, and Script Files
These files are local development leftovers.
*   **`tmp/`** and **`tmp/update.py`**: Leftover temporary directory with a Python update script.
*   **`server.log`**: Standard local server output file.
*   **Various script.py / dimmer.py files**:
    *   `public/images/logo/mpk/script.py`
    *   `public/images/logo/osis/script.py`
    *   `public/images/logo/general/script.py`
    *   `public/images/proker/bph/stuban_smkn8/dimmer.py`
    These script files are local helpers used during development (e.g., resizing logos or setting dimensions) and have no runtime function in the deployed website.

---

## Part 2: Repository Security for Public Sharing

Making a private repository public is a wonderful milestone, but it presents specific security risks regarding credentials and file visibility. Below is a comprehensive analysis of your questions.

### 1. Is it safe to just use `.gitignore` and `.dockerignore`?
**Yes, but only under two critical conditions:**

1.  **Strict Avoidance of Storing Secrets in Version History:**
    Any file ignored by `.gitignore` (such as `.env`) is never committed *forward*. However, if a secret file was committed in a previous Git history revision, **simply adding it to `.gitignore` does not delete it from history**. Anyone who clones the public repository can inspect the Git history (`git log`, `git reflog`, or commit history on GitHub) and retrieve your old passwords, API tokens, and database credentials.
    *   *Solution:* Always inspect your history before making it public. If `.env` or any `credentials.json` were ever committed, use a tool like `git-filter-repo` or BFG Repo-Cleaner to permanently purge them from your Git history.

2.  **Explicit Rules in `.gitignore`:**
    Your `.gitignore` must be fully robust. Your current `.gitignore` is highly complete and correctly blocks the following files:
    *   `/vendor` and `/node_modules` (Dependency folders)
    *   `.env`, `.env.backup`, `.env.production`, `.env.docker` (Secret environmental credentials)
    *   `storage/*.key` and `/storage` temporary files (Encryption keys and user data)
    *   `package-lock.json` and `package.json` (these are checked in, but your `.gitignore` lists them at the bottom. **Note:** Best practice is to keep `package.json` and `package-lock.json` tracked to preserve dependency versions, which you are doing successfully. Only block actual runtime session, cache, and upload files).

### 2. How can I safely publish the repository? (Recommended Setup)
To safely publish this repository to a public hosting platform (e.g., GitHub):

1.  **Initialize `.env.example`:**
    Maintain an updated `.env.example` in your repository. It should contain all necessary configuration keys but with **empty or mock values**. For example:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    GOOGLE_CLIENT_ID=mock_id
    GOOGLE_CLIENT_SECRET=mock_secret
    ...
    ```
2.  **Separate Code from Credentials:**
    Ensure no database passwords, Supabase keys, or Google API secrets are hardcoded in any PHP or JS files. All endpoints must pull from the environment using Laravel's `config()` helper (e.g., `config('services.supabase.key')` or `config('google.key')`), which reads from `.env`.

### 3. Will ignored files still be visible to my hosting that uses Git?
**It depends on how your hosting platform pulls your codebase:**

*   **Case A: Deploying via Direct Git Sync (e.g., GitHub Actions, Vercel, Hostinger Git Integration)**
    When your host pulls directly from your public repository, **ignored files (like `.env`) will NOT be present in the repository, and therefore will NOT be pulled/synced**.
    *   *How to handle this:* You must manually log in to your hosting server's panel (such as Hostinger's File Manager) and create/update the `.env` file directly on the server. The application will read this local `.env` successfully.

*   **Case B: Deploying via SSH / FTP / Local Build Upload**
    If your deployment script or deployment software does a local build and zips/FTPs the directory directly from your computer, it might upload ignored files unless explicitly excluded by your FTP client/build script.
    *   *How to handle this:* Ensure your build tool or FTP client excludes `.env` and `node_modules` during the upload phase.

*   **Case C: Dockerized Deployments**
    If your server deploys the app as a Docker container (using the `Dockerfile` and `docker-compose.yml`), the `.dockerignore` file prevents Docker from copying `.env`, `vendor`, and `node_modules` into the built Docker image.
    *   *How to handle this:* You should pass environment variables to your Docker container at runtime (using the `environment` section in `docker-compose.yml` or using a secure orchestration vault) instead of baking the `.env` file into the public container image.

---

## Part 3: Actionable Recommendations for a Clean & Secure Public Release

To transition this codebase into a pristine public repository, apply the following steps:

1.  **Purge Unused Assets:** Remove leftover development scrap such as the `tmp/` folder and the local dimension/logo python scripts (`*.py`).
2.  **Migrate Video Content:** Move `public/videos/MVI_7285.MOV` out of the version control tree. Upload the asset to Google Drive, Vimeo, or Supabase Storage, and reference its CDN URL in the codebase.
3.  **Confirm No Secrets Committed:** Ensure that no real private keys (`credentials.json`) are currently tracked under `/storage`. Verify that `/storage` is properly ignored to prevent storing uploaded user payment proofs in public Git history.
