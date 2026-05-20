# ArtVault

A school art gallery platform built with a custom PHP MVC framework. Students upload and showcase artwork, interact through likes and comments, follow artists, and manage their profiles. Admins oversee the platform through a dedicated dashboard.

---

## Tech Stack

- **Backend** — PHP 8, custom MVC (no framework). Namespaced under `App\Controllers` and `App\Core`.
- **Database** — MySQL (`db_gallery_sekolah`), accessed via PDO with persistent connections.
- **Frontend** — Tailwind CSS v4, compiled from source. Vanilla JS with Fetch API for AJAX. Google Fonts (Cinzel + Lato). Font Awesome icons.
- **Page Transitions** — Custom JS page loader (`script.js`) with a branded animated overlay, dark mode support, and `prefers-reduced-motion` awareness.

---

## Project Structure

```
Artvault/
├── app/
│   ├── config/
│   │   └── root.php
│   ├── core/
│   │   ├── Router.php       # Regex-based front router
│   │   └── Database.php     # PDO wrapper (base class for models)
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── AuthController.php
│   │   ├── ArtController.php
│   │   ├── UserController.php
│   │   └── AdminController.php
│   ├── models/
│   │   ├── Art_model.php    # Artworks, categories, likes, comments
│   │   └── User_model.php   # Users, follows, tags, stats
│   ├── resources/
│   │   ├── css/input.css    # Tailwind source
│   │   └── js/script.js     # Page loader source
│   └── views/
│       ├── admin/           # Dashboard, user & artwork management
│       └── landing/         # Home, gallery, detail, profile, auth pages
└── public/                  # Web root
    ├── index.php            # Front controller + all route definitions
    ├── css/index.css        # Compiled Tailwind output
    ├── js/script.js         # Compiled JS
    └── img/
        ├── gallery/         # Uploaded artwork images
        ├── profile/         # User avatar uploads
        └── banner/          # User banner uploads
```

---

## Setup

### Requirements

- PHP 8+
- MySQL
- Node.js + npm (for Tailwind)
- A local server with the web root pointed at `/public` (Laragon recommended)

### Steps

**1. Clone and enter the project**
```bash
git clone https://github.com/devonaustin042-cpu/Artvault.git
cd Artvault
```

**2. Create the database**

Create a MySQL database named `db_gallery_sekolah` and import your schema.

**3. Configure the database connection**

Edit `app/core/Database.php`:
```php
private $host = "localhost";
private $user = "root";
private $pass = "";           // your MySQL password
private $db   = "db_gallery_sekolah";
```

**4. Create upload directories**
```bash
mkdir -p public/img/gallery public/img/profile public/img/banner
```

**5. Install and build Tailwind**
```bash
npm install

# Development (watch mode)
npm run dev

# Production build
npx @tailwindcss/cli -i ./app/resources/css/input.css -o ./public/css/index.css
```

**6. Point your server's document root to `/public`**

`public/index.php` is the front controller. All requests must go through it.

---

## Demo Accounts

Three accounts are available for testing. Each one unlocks a different level of access.

| Role | Email | Password | Access |
|---|---|---|---|
| **Admin** | `flazened@ski.sch.id` | `admin123` | Full dashboard at `/admin` — manage all users and artworks |
| **Author** | any `@ski.sch.id` email | *(your password)* | Upload, edit, and delete own artworks |
| **Viewer** | any `@gmail.com` email | *(your password)* | Browse gallery, like artworks, post comments |

> **Admin access is locked to one account only.**
> `/admin` is exclusively accessible by `flazened@ski.sch.id`. No other account — including other `@ski.sch.id` addresses — can reach it. Attempting to visit `/admin` while logged in as anyone else redirects immediately to `/login`. This is enforced in `AdminController::__construct()` on every single request.

For Author and Viewer accounts, simply register at `/register` using the appropriate email domain — the role is assigned automatically, no manual setup needed.

---

## How It Works

### Routing

`public/index.php` defines all routes and boots a `Router` instance. The router matches requests using regex patterns — `{id}` segments compile to `([0-9]+)`. On a match, it requires the controller file, instantiates the class, and calls the method.

```
GET  /gallery            → ArtController::gallery()
GET  /art/{id}           → ArtController::detail($id)
POST /art/like/{id}      → ArtController::toggleLike($id)   ← JSON response
POST /follow/{id}        → UserController::toggleFollow($id) ← JSON response
GET  /admin              → AdminController::index()
GET  /profile/{id}       → UserController::profile($id)
```

### Authentication & Roles

Registration hashes passwords with `password_hash()`. The email address used at signup determines the account role automatically — no manual assignment needed. See [Demo Accounts](#demo-accounts) for ready-to-use credentials covering all three roles.

### Artwork Management

Authors upload JPG/JPEG/PNG files via `ArtController::uploadArt()`. The controller generates a unique filename with `uniqid()` and moves the file to `public/img/gallery/`. On edit or delete, the old file is unlinked from disk before the database record is updated.

Only the artwork owner or an admin can edit or delete a piece — enforced in `updateArt()` and `deleteArt()` by comparing `$art['user_id']` against the session.

### AJAX Interactions

Likes and follows don't reload the page. Both endpoints return JSON:

```json
// Like toggle
{ "status": "success", "like_status": "liked", "like_count": 42 }

// Follow toggle
{ "status": "success", "follow_status": "followed", "follower_count": 13 }
```

Unauthenticated requests return `{ "status": "error", "message": "..." }`.

### Comments

Comments support one level of threading via `parent_id`. The `getCommentsByArtworkId()` query joins the `users` table to resolve display names, ordered by `created_at ASC`.

### Profiles

`/profile` loads the current session user. `/profile/{id}` loads any user. Each profile shows: user artworks, liked artworks (favorites), follower count, following count, total likes received, and user tags. The follow button checks `isFollowing()` before rendering.

### Page Loader

Every navigation click triggers a full-screen branded overlay (the `artvault-loader`) before the browser navigates. It respects `prefers-reduced-motion` (disables animation) and `prefers-color-scheme: dark` (inverts the palette). Forms also trigger it on submit. The loader is injected into the DOM dynamically — no HTML changes needed.

---

## Database Tables

| Table | Purpose |
|---|---|
| `users` | Accounts — name, email, hashed password, role, avatar/banner path, student ID |
| `artworks` | Artwork records — title, description, file path, category, uploader, upload time |
| `categories` | Lookup table for artwork types (e.g. Painting, Digital Art) |
| `comments` | Per-artwork comments with `parent_id` for threaded replies |
| `likes` | Join table linking users to liked artworks |
| `follows` | Join table linking follower users to following users |
| `user_tags` | Dynamic badges/labels assigned to individual users |

---

## Notes

- `Database.php` has hardcoded credentials. Move these to environment variables or a config file before deploying.
- The `AdminController` restricts access by checking `$_SESSION['user_role'] === 'admin'` in its constructor — unauthenticated or non-admin requests are immediately redirected to `/login`.
- Artwork files are stored on disk (`public/img/gallery/`), not in the database. The database holds only the filename.
- The gallery supports category filtering via `?category={id}` query parameters, handled entirely in `Art_model::getAllArtworks()`.
