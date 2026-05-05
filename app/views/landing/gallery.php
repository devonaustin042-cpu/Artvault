<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Gallery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery" class="active">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
        </ul>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="javascript:void(0)" onclick="toggleLogoutPopup()"><img src="/img/icon/user.png" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/signup'">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>

    <!-- LOGOUT POPUP -->
    <div id="logoutPopup" class="logout-popup-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div class="logout-popup-content" style="background: white; padding: 2rem; border-radius: 15px; text-align: center; max-width: 400px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            <img src="/img/icon/user.png" alt="User" style="width: 60px; height: 60px; margin-bottom: 1rem; border-radius: 50%;">
            <h3 style="font-family: 'Cinzel', serif; margin-bottom: 0.5rem;">Logout?</h3>
            <p style="color: #666; margin-bottom: 1.5rem;">Are you sure you want to log out of Artvault?</p>
            <div style="display: flex; gap: 10px; justify-content: center;">
                <button onclick="location.href='/logout'" style="background: #ff4d4d; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: bold;">Logout</button>
                <button onclick="toggleLogoutPopup()" style="background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: bold;">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function toggleLogoutPopup() {
            const popup = document.getElementById('logoutPopup');
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'flex';
            } else {
                popup.style.display = 'none';
            }
        }
    </script>

    <!-- GALLERY -->
    <div class="gallery-page">

        <div class="gallery-topbar">
            <div class="filter-category">
                <button class="btn-filter">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6H21M6 12H18M10 18H14" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="btn-category">Category</button>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search....">
                <button class="search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="gallery-grid">
            <?php foreach ($artworks as $row): ?>
            <a href="/art/<?= $row['id']; ?>" class="art-card">
                <div class="art-img-container">
                    <img src="/img/gallery/<?= $row['file_path']; ?>" alt="<?= $row['judul']; ?>">
                </div>
                <div class="art-info">
                    <p class="art-title"><?= $row['judul']; ?></p>
                    <p class="art-author">Made by : <?= $row['author_name']; ?></p>
                    <div class="art-like">
                        <img src="/img/icon/like.png" class="art-like-img">
                        <span>25</span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

         <div class="add-work-wrap">
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'author'): ?>
                <button class="btn-add-work" onclick="openAddWork()">+ Add your Art !</button>
                
                <!-- POPUP ADD WORK (Only for Authors) -->
                <div class="add-work-overlay" id="addWorkOverlay">
                    <div class="add-work-popup">

                        <div class="add-work-header">
                            <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="add-work-logo">
                            <span>Come on, submit your interesting work to be exhibited!</span>
                            <img src="/img/icon/user.png" alt="User" class="user-icon">
                        </div>

                        <div class="add-work-body">
                        <button class="btn-back-popup" onclick="closeAddWork()">
                                <img src="/img/icon/back.png" alt="Back" class="back-icon-2">
                            </button>
                            <!-- Upload Area -->
                            <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                                <input type="file" id="fileInput" accept="image/*" style="display:none" onchange="previewImage(event)">
                                <img id="previewImg" src="" alt="" style="display:none; width:100%; height:100%; object-fit:cover; border-radius:8px;">
                                <button class="btn-upload" id="uploadBtn">Upload your art</button>
                            </div>

                            <!-- Name -->
                            <div class="add-work-field">
                                <input type="text" placeholder="Add the name of your Art!">
                            </div>

                            <!-- Description -->
                            <div class="add-work-field">
                                <textarea placeholder="Add your description!" rows="3"></textarea>
                            </div>

                            <!-- Submit -->
                            <button class="btn-add-submit">Add</button>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>

    <!-- FOOTER -->
    <div class="box-2"></div>
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <img src="/img/logo/Artvault-white.png" alt="Artvault Logo" class="footer-logo">
                <span class="footer-brand-name">Artvault</span>
            </div>
        </div>
        <div class="footer-main">
            <div class="footer-col">
                <h4 class="footer-heading">Navigation</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-heading">Contact</h4>
                <ul class="footer-contact">
                    <li>
                        <span class="contact-icon"><img src="/img/icon/mail.png" alt="Email" class="contact-icon-img"></span>
                        <span>Artvault@gmail.com</span>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="/img/icon/location.png" alt="Location" class="contact-icon-img"></span>
                        <span>Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="/img/icon/telephone.png" alt="Phone" class="contact-icon-img"></span>
                        <span>+62 897 3871 170</span>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-heading">Help & Center</h4>
                <ul class="footer-links">
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Terms and Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cancellation and Refund Policy</a></li>
                </ul>
            </div>
            <div class="footer-col footer-social-col">
                <img src="/img/logo/Artvault-white.png" alt="Artvault" class="footer-logo-big">
                <div class="footer-social">
                    <p class="footer-follow">Follow Us</p>
                    <div class="social-icons">
                        <a href="#"><img src="/img/icon/instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="/img/icon/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="/img/icon/tiktok.png" alt="TikTok"></a>
                        <a href="#"><img src="/img/icon/youtube.png" alt="YouTube"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>
    <script>
            function openAddWork() {
        document.getElementById('addWorkOverlay').classList.add('active');
    }

    function closeAddWork() {
        document.getElementById('addWorkOverlay').classList.remove('active');
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const preview = document.getElementById('previewImg');
        const uploadBtn = document.getElementById('uploadBtn');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        uploadBtn.style.display = 'none';
        
    }
    </script>
    
    <script src="/js/script.js"></script>
</body>
</html>