# Project ARTVAULT - Technical Standards

## 1. Tech Stack & Architecture
- **Framework:** Custom PHP MVC (Model-View-Controller).
- **Architecture Pattern:**
  - `app/core/`: Core classes (Router, Database).
  - `app/controllers/`: Application logic.
  - `app/models/`: Data handling/Database interactions.
  - `app/views/`: PHP templates (served via Controllers).
  - `public/`: Web root (index.php entry point, static assets).
- **CSS Framework:** Tailwind CSS v4.
- **Build Process:**
  - Input: `app/resources/css/input.css` (Source file).
  - Output: `public/css/index.css` (Generated file, **DO NOT EDIT DIRECTLY**).
  - CLI: `npx @tailwindcss/cli -i ./app/resources/css/input.css -o ./public/css/index.css --watch`.

## 2. Directory Structure Rules
- **CSS Source:** All CSS edits MUST be made in `app/resources/css/`.
  - Main styling: `input.css`.
  - Modular styling: `detail.css`, `gallery.css`, `contact.css` (imported in `input.css`).
- **Static Assets:** Images, icons, and final CSS reside in `public/`.
- **Views:** All `.php` files in `app/views/landing/` should point to `/css/index.css` for their styling.

## 3. Important Mandates
- **NEVER** edit `public/css/index.css` directly. It will be overwritten by the Tailwind build process.
- **NEVER** link CSS files directly to `app/resources/css/` in the HTML (`<link>` tags). Browsers cannot access this folder directly for security reasons. Always use `/css/index.css`.
- **Database:** Connect via `app/core/Database.php`. Credentials should be handled with care (currently root:123).
- **Routing:** Managed in `public/index.php` via `App\Core\Router`.

## 5. Artwork & Author Mapping (Figma Reference)
To ensure data consistency with the design, use the following mapping for artwork authors. All author accounts MUST use the `@ski.sch.id` domain to be granted the `author` role.

| Artwork Title | File Name | Author Name (Real Name) | Suggested Email |
|---------------|-----------|-------------------------|-----------------|
| Claymonster | Claymonster.png | Chisa Evelyn | chisa@ski.sch.id |
| Koi Pond | Koi-Pond.png | Odin Madun | odin@ski.sch.id |
| Trash Hunt | Trash-Hunt.png | Viktor Wembu | viktor@ski.sch.id |
| Cherish the moment | Cherish-the-moment.png | Daniel Caesar | daniel@ski.sch.id |
| Ayo punya cita-cita | Ayo-punya-cita-cita.png | Faysal Pratama | faysal@ski.sch.id |
| Billie Eilish | Billie-Eilish.png | Depon Vintjai | depon@ski.sch.id |
| A positive spin on... | A-positive-spin-on.png | Tang Yau Hoong | tang@ski.sch.id |
| Menggapai Indonesia | Menggapai-Indonesia.png | Marcello Adil | marcello@ski.sch.id |
| Vibrant River | Vibrant-River.png | Reyfan Andika | reyfan@ski.sch.id |
| Anonymous Protagonist | Anonymous-Protagonis.png | Felicia Chiao | felicia@ski.sch.id |
| A Chill Doomsday | A-Chill-Doomsday.png | Nicholas Jo | nicholas@ski.sch.id |
| Melody in Guitar | Melody-in-Guitar.png | Jo Halimawan | jo@ski.sch.id |

## 6. Development Notes
- **User Roles:** 
  - Domain `@ski.sch.id` -> `role: author` (Can upload/edit artworks).
  - Other domains (e.g., `@gmail.com`) -> `role: viewer` (Can only view/like).
- **Password Standard:** For development accounts, use `Password123!` unless specified otherwise.
- **Database Sync:** [COMPLETED] 12 Real Author accounts and artworks have been synced to `db_gallery_sekolah`.
- **Author Identity:** The "Made by" text in the gallery now dynamically pulls the real names of authors from the database (e.g., Chisa Evelyn instead of Viewer Amboi).


YOU SHALL Rewrite information.md with newest information so the next AI agent will know how to code in this directory and minimize bug risk.