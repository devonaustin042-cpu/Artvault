# ARTVAULT - Technical Standards

## 1. Tech Stack
- PHP Custom MVC
- Tailwind CSS v4
- Database: MySQL (`db_gallery_sekolah`)

## 2. Authentication (Simple Mode)
- **Primary Admin:** `flazened@ski.sch.id`
- **Default Password:** `123`
- **Admin Redirect:** Any user with `role: admin` or email `flazened@ski.sch.id` is redirected to `/admin`.

## 3. Directory Rules
- **CSS Source:** Edit in `app/resources/css/`.
- **CSS Build:** Run `npx @tailwindcss/cli -i ./app/resources/css/input.css -o ./public/css/index.css`.
- **Images:** Gallery images in `public/img/gallery/`.

## 4. Database Mapping
- 12 Student artworks have been synced with their real names (e.g., Chisa Evelyn, Odin Madun, etc.).
- Account emails for authors use the `@ski.sch.id` domain.
