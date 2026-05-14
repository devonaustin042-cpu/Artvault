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

## 4. UI/UX Standards
- **Color Palette:**
    - **Primary:** Deep Purple/Navy Gradient (`#1F3C88` to `#3E4052`).
    - **Secondary:** Artvault Gold (`#f4c430`).
- **Responsiveness:** Implemented `min-width` and `word-break` safety rules to handle long text (e.g., in descriptions or comments).
- **Navigation:** Navbar user icon now links directly to the `/profile` route.

## 5. Directory Structure
- **CSS:** `app/resources/css/` (Sources) -> `public/css/index.css` (Build).
- **Images:** `public/img/gallery/` (Artworks), `public/img/banner/` (Profile Banners), `public/img/icon/` (System Icons).
