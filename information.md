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

## 4. Design Guidelines
- **Color Palette:**
  - Primary Blue: `#1f3c88` (Gradient based).
  - Gold Accent: `#f4c430`.
  - Text Dark: `#333`.
- **Navbar/Footer:** Standardized across all views. Navbar height is 100px with a specific gradient.
