# Task Manager — Laravel + Breeze
Simple task manager with authentication, per-user tasks (policy protected), search, filter, and sort.
## Features
- Breeze auth (register/login/logout)
- Tasks CRUD tied to the signed-in user
- Search in name/description (`q`)
- Filter by completion (All/Pending/Completed)
- Sort by latest or due date
- Pagination
- SQLite by default (works on MySQL too)
## Quick Start (SQLite)
```bash
composer install
cp .env.example .env
php artisan key:generate
# create SQLite file (Windows PowerShell)
type nul > database\database.sqlite
npm install
npm run dev
php artisan migrate --force
php artisan db:seed --force
php artisan serve
```
### Seeded logins
- **alice@example.com / password**
- **bob@example.com / password**
## Tech
Laravel 12, Breeze, Vite, Tailwind, SQLite.
## License
MIT — see [LICENSE](LICENSE).

