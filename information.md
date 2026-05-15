# ARTVAULT - Technical Standards (Latest Update)

## 1. Tech Stack
- **Backend:** PHP Custom MVC
- **Frontend:** Tailwind CSS v4
- **Database:** MySQL (`db_gallery_sekolah`)
- **Interactions:** Vanilla JS with Fetch API (AJAX)

## 2. Authentication & Authorization
- **Admin:** `flazened@ski.sch.id` (Password: `123`) has full access.
- **Roles:** `viewer`, `author`, `admin`.
- **Ownership Rule:** Only the original uploader (Owner) or an Admin can Edit or Delete an artwork.
- **User IDs:** Standardized 8-digit format starting from `80000000` (stored as `student_id`).

## 3. Key Features
### User Profile
- **Personalized Header:** Banner image and Avatar support.
- **Social Stats:** Following count, Follower count, and Total Likes received.
- **Badges/Tags:** Dynamic badges (e.g., "Author", "Experienced User") visible on profile.
- **Tabbed Content:** Navigation between "Draft", "Your Art", and "Favorite".
- **Settings Menu:** Gear icon popup with options for Exit Account, Profile/Background editing, and Security updates.
- **Security:** Confirmation popup for Logout action.

### Social Interaction
- **Advanced Commenting:**
    - **Threaded Replies:** Support for parent-child comment structure (replies).
    - **Emoji Picker:** Integrated emoji selection bar for comments and replies.
- **Like System:**
    - Real-time toggle using AJAX.
    - Interactive blue "pop" animation and status synchronization across Gallery and Detail pages.

### Art Management
- **Gallery:** Dynamic category filtering (Painting, Digital Art, etc.).
- **Operations:** Fully functional Upload, Edit, and Delete with automated file system cleanup.
- **Suggestions:** "View other art too!" section on detail pages featuring random artwork recommendations.

### Admin Panel
- **User Management:** Admin can edit any user account, including admin users, through an in-page popup edit panel.
- **Editable User Fields:** Full name, email, student ID, and role (`viewer`, `author`, `admin`).
- **Artwork Management:** Admin artwork cards use an in-page popup edit panel for title, category, description, and optional image replacement.
- **Route Handling:** Admin edit buttons post to `/admin/users/update/{id}` and `/admin/artworks/update/{id}`; old direct edit routes redirect back to their listing pages.
- **Deletion Rule:** Admin users remain protected from deletion in the table UI, while non-admin users and artworks can still be deleted by admin.

## 4. UI/UX Standards
- **Color Palette:**
    - **Primary:** Deep Purple/Navy Gradient (`#1F3C88` to `#3E4052`).
    - **Secondary:** Artvault Gold (`#f4c430`).
- **Responsiveness:** Implemented `min-width` and `word-break` safety rules to handle long text (e.g., in descriptions or comments).
- **Admin Modals:** Edit actions use centered overlay popups with click-outside and Escape-key closing behavior.
- **Navigation:** Navbar user icon now links directly to the `/profile` route.

## 5. Directory Structure
- **CSS:** `app/resources/css/` (Sources) -> `public/css/index.css` (Build).
- **Images:** `public/img/gallery/` (Artworks), `public/img/banner/` (Profile Banners), `public/img/icon/` (System Icons).
- **Admin Views:** `app/views/admin/users/index.php` and `app/views/admin/artworks/index.php` contain the admin edit popup UI.
- **Admin Logic:** `app/controllers/AdminController.php` handles admin update routes; `app/models/User_model.php` persists editable user fields.
