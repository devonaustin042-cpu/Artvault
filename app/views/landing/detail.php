<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Detail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/app/resources/css/detail.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
        </ul>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="javascript:void(0)" onclick="toggleLogoutPopup()"><img src="/img/icon/user.png" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
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


    <!-- ART DETAIL PAGE -->
    <div class="art-detail-page">
 
        <!-- Header -->
        <div class="art-detail-header">
            <a href="javascript:history.back()" class="btn-back"><img src="/img/icon/back.png"></a>
            <h2>This is the detail of the work!</h2>
        </div>
 
        <!-- Main Content -->
        <div class="art-detail-main">
 
            <!-- Gambar -->
            <div class="art-detail-img-wrap">
                <img src="/img/gallery/trash-hunt.png" alt="Trash Hunt" class="art-detail-img">
            </div>
 
            <!-- Info -->
            <div class="art-detail-info">
                <h1 class="art-detail-title">Trash Hunt</h1>
                <p class="art-detail-author">by Viktor Wembu</p>
                <hr class="art-detail-divider">
 
                <p class="art-detail-label">Description :</p>
 
                <!-- Teks pendek -->
                <div class="art-desc-short">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Read For More...</button>
                </div>
 
                <!-- Teks panjang -->
                <div class="art-desc-full" id="descFull">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Show Less</button>
                </div>

                <div class="art-detail-actions">
                    <button class="btn-edit" onclick="openEditWork()">Edit</button>
                    <span class="art-action-or">or</span>
                    <button class="btn-delete" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
 
        </div>
    </div>

    <!-- FOOTER --> 
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <img src="/img/logo/Artvault-white.png" alt="Artvault Logo" class="footer-logo">
                <span class="footer-brand-name">Artvault</span>
            </div>
        </div>
        <div class="footer-main">
            <!-- Navigation -->
            <div class="footer-col">
                <h4 class="footer-heading">Navigation</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4 class="footer-heading">Contact</h4>
                <ul class="footer-contact">
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/mail.png" alt="Email Icon" class="contact-icon-img">
                        </span>
                        <span>Artvault@gmail.com</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/location.png" alt="Location Icon" class="contact-icon-img">
                        </span>
                        <span>Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/telephone.png" alt="Phone Icon" class="contact-icon-img">
                        </span>
                        <span>+62 897 3871 170</span>
                    </li>
                </ul>
            </div>

            <!-- Help & Center -->
            <div class="footer-col">
                <h4 class="footer-heading">Help & Center</h4>
                <ul class="footer-links">
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Terms and Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cancellation and Refund Policy</a></li>
                </ul>
            </div>

            <!-- Logo + Sosmed -->
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

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script src="/js/script.js"></script>
</body>
</html>