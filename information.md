# ARTVAULT - Technical Standards (Updated)

## 1. Tech Stack
- **Backend:** PHP Custom MVC
- **Frontend:** Tailwind CSS v4
- **Database:** MySQL (`db_gallery_sekolah`)
- **Interactions:** Vanilla JS with Fetch API (AJAX)

## 2. Authentication & Authorization
- **Admin:** `flazened@ski.sch.id` (Password: `123`) has full access to all features.
- **Roles:** `viewer`, `author`, `admin`.
- **Ownership Rule:** Only the original uploader (Owner) or an Admin can Edit or Delete an artwork.
- **Session Data:** Stores `user_id`, `user_name`, `user_email`, and `user_role`.

## 3. Directory & Assets
- **CSS Source:** `app/resources/css/` (Build to `public/css/index.css`).
- **Images:** Stored in `public/img/gallery/` with unique filenames (`uniqid`).
- **Icons:** Located in `public/img/icon/`.

## 4. Key Features
- **Gallery:** Dynamic filtering by categories.
- **Art Management:** Fully functional Upload, Edit, and Delete (with file cleanup).
- **Categories (English):** Painting, Digital Art, Sculpture, Sketch, Photography, Illustration.
- **Social Interaction:**
    - **Like System:** Real-time toggle (AJAX) with blue "pop" animation.
    - **Comment System:** Users can leave and view comments on artworks.
- **Detail Page:** Features "View other art too!" with 4 random artwork suggestions.

## 5. UI/UX Standards
- **Theme Color:** Linear Gradient Header (#1F3C88 to #3E4052) and Artvault Gold (#f4c430).
- **Pop-ups:** Redesigned based on Figma standards for Add and Edit actions.
- **Layout Safety:** Implemented `word-break` and `min-width` rules to prevent UI breakage from long strings.
