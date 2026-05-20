# ARTVAULT - Technical Standards (Updated May 19, 2026)

## 1. Project Overview
Artvault is a specialized web-based gallery platform for school art exhibitions. It allows students to showcase their work, interact with others through likes and comments, and follow their favorite artists.

## 2. Tech Stack
- **Backend:** PHP Custom MVC (Namespace: `App\Controllers`, `App\Core`)
- **Frontend:** Tailwind CSS v4 (Compiled from `app/resources/css/input.css` to `public/css/index.css`)
- **Database:** MySQL (`db_gallery_sekolah`) using PDO with persistent connections.
- **Interactions:** Vanilla JS with Fetch API for AJAX (Likes, Follows) and a custom page loader.

## 3. Core Architecture
- **Router:** Custom regex-based router supporting dynamic parameters like `{id}`. Located in `app/core/Router.php`.
- **Database Wrapper:** Base `Database` class in `app/core/Database.php` providing the PDO connection.
- **Models:**
    - `Art_model`: Handles artworks, categories, likes, and threaded comments.
    - `User_model`: Handles registration, authentication, user profiles, stats, and follow system.
- **Controllers:**
    - `HomeController`: Manages landing pages (Home, About, Contact).
    - `AuthController`: Handles registration, login, and session management.
    - `ArtController`: Manages gallery display, detail view, artwork CRUD, and social interactions.
    - `UserController`: Handles user profiles, stats, and follow/unfollow logic.
    - `AdminController`: Provides a protected dashboard for system-wide user and artwork management.

## 4. Database Schema (`db_gallery_sekolah`)
- **`users`**: Stores user data, credentials, roles (`viewer`, `author`, `admin`), and profile paths (avatar/banner).
- **`artworks`**: Stores artwork metadata, file paths, and associations to users and categories.
- **`categories`**: Lookup table for artwork types (e.g., Painting, Digital Art).
- **`comments`**: Stores user comments on artworks, supporting nested/threaded replies via `parent_id`.
- **`likes`**: Junction table for the many-to-many relationship between users and artworks.
- **`follows`**: Junction table for user-to-user follows.
- **`user_tags`**: Dynamic badges/tags assigned to users.

## 5. Route Mapping
| Method | URI | Controller | Action |
|---|---|---|---|
| GET | `/` | HomeController | `index` |
| GET | `/gallery` | ArtController | `gallery` |
| GET | `/art/{id}` | ArtController | `detail` |
| POST | `/art/upload` | ArtController | `uploadArt` |
| POST | `/art/update/{id}` | ArtController | `updateArt` |
| GET | `/art/delete/{id}` | ArtController | `deleteArt` |
| POST | `/art/comment/{id}`| ArtController | `postComment` |
| POST | `/art/like/{id}` | ArtController | `toggleLike` (AJAX) |
| GET | `/admin` | AdminController | `index` |
| GET | `/admin/users` | AdminController | `users` |
| POST | `/admin/users/update/{id}` | AdminController | `postEditUser` |
| GET | `/login` | AuthController | `login` |
| POST | `/post-login` | AuthController | `handleLogin` |
| GET | `/profile` | UserController | `profile` |
| POST | `/follow/{id}` | UserController | `toggleFollow` (AJAX) |

## 6. Key Features & Business Logic
### Authentication & Roles
- **Standard Roles:** `viewer` (can like/comment), `author` (can upload art), `admin` (full control).
- **Admin Access:** Special email `flazened@ski.sch.id` or `admin` role grants access to the `/admin` dashboard.
- **Registration:** Automatically assigns `author` role to emails ending in `@ski.sch.id`.

### Art Management
- **Upload/Edit:** Authors and Admins can manage artworks. File system cleanup (unlinking old images) is performed on edit/delete.
- **Filtering:** Gallery supports filtering by category via query parameters (e.g., `/gallery?category=1`).
- **Recommendations:** Detail pages feature a "View other art too!" section with random suggestions.

### Social Interaction
- **AJAX Likes:** Real-time like/unlike with status synchronization and count updates.
- **Threaded Comments:** Supports one level of replies with integrated emoji pickers.
- **Follow System:** Users can follow others; stats (followers, following, total likes) are displayed on profiles.

### Admin Panel
- **Integrated Modals:** User and Artwork editing happens via centered overlay popups on the listing pages.
- **Security:** CSRF-protected routes and strict role checks in `AdminController::__construct`.

## 7. Directory Structure
- `app/config/`: Configuration files (e.g., `root.php`).
- `app/core/`: Core engine files (Router, Database).
- `app/controllers/`: Application business logic.
- `app/models/`: Data access layer.
- `app/resources/`: Source frontend assets (CSS, JS).
- `app/views/`: PHP template files organized by feature (admin, landing).
- `public/`: Entry point, compiled assets, and uploaded media (`assets/gallery`, `assets/banner`, `assets/profile`).

## 8. Development Commands
- **Tailwind Watch:** `npm run dev`
- **Tailwind Build:** `npx @tailwindcss/cli -i ./app/resources/css/input.css -o ./public/css/index.css`
