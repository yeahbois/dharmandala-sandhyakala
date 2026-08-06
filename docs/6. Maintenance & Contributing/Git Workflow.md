# Git Workflow Guide

We maintain a structured Git branching and merge strategy to keep codebase progression clean, traceable, and conflict-free.

---

## 1. Branch Naming Conventions

*   **Feature Branches**: For new capabilities, views, or database tables.
    *   *Naming*: `feat/short-description` (e.g., `feat/jvlyn-ticketing-system`).
*   **Bug Fixes**: For resolving bugs or UI adjustments.
    *   *Naming*: `fix/short-description` (e.g., `fix/theme-darkmode-inputs`).
*   **Documentation**: For editing guides or help manuals.
    *   *Naming*: `docs/short-description` (e.g., `docs/architecture-guides`).

---

## 2. Commit Message Standards

Every commit message should start with a prefix indicating its scope, using a clear body explaining *why* the change was applied:

```
feat(jvlyn): implement real-time seat lock API with Supabase

- Hook up checkout seat grid selecting interactions to trigger locks.
- Prevent double-booking on simultaneous user sessions.
```

Common prefixes:
*   `feat`: A new feature.
*   `fix`: A bug fix.
*   `docs`: Documentation changes.
*   `style`: Formatting, missing semi-colons, etc.
*   `refactor`: Code restructuring without functional behavior shifts.

---

## 3. Merge Flow

1.  **Pull Latest**: Always rebase or pull from `origin/main` before starting work.
2.  **Local Testing**: Ensure all automated tests (`php artisan test`) run successfully before opening pull requests.
3.  **Reviews**: Peer review is required for core architecture shifts or migration alterations.
