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
    <link rel="stylesheet" href="/app/resources/css/gallery.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
            <li><a href="/" class="">Home</a></li>
            <li><a href="/gallery" class="active">Gallery</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/about">About</a></li>
        </ul>

        <div class="nav-actions">
            <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
            <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
        </div>
    </nav>

    <!-- GALLERY -->
    <div class="gallery-page">

        <div class="gallery-topbar">
            <button class="btn-category">Category</button>
            <div class="search-box">
                <input type="text" placeholder="Search....">
                <button class="search-btn">🔍</button>
            </div>
        </div>

        <div class="gallery-grid">
            <a href="/art/1" class="art-card">
                <img src="/img/gallery/Claymonster.png" alt="Claymonster">
                <div class="art-info">
                    <p class="art-title">Claymonster</p>
                    <p class="art-author">Made by : Chisa Evelyn</p>
                    <p class="art-like"><img src="/img/icon/like.png" class="Art-like-img">25</p>
                </div>
            </a>
            <a href="/art/2" class="art-card">
                <img src="/img/gallery/Koi-Pond.png" alt="Koi Pond">
                <div class="art-info">
                    <p class="art-title">Koi Pond</p>
                    <p class="art-author">Made by : Odin Madun</p>
                    <p class="art-like"><img src="/img/icon/like.png" class="Art-like-img">49</p>
                </div>
            </a>
            <a href="/art/3" class="art-card">
                <img src="/img/gallery/Trash-Hunt.png" alt="Trash Hunt">
                <div class="art-info">
                    <p class="art-title">Trash Hunt</p>
                    <p class="art-author">Made by : Viktor Wembu</p>
                    <p class="art-like"><img src="/img/icon/like.png" class="Art-like-img">78</p>
                </div>
            </a>
            <a href="/art/4" class="art-card">
                <img src="/img/gallery/Cherish-the-moment.png" alt="Cherish the moment">
                <div class="art-info">
                    <p class="art-title">Cherish the moment</p>
                    <p class="art-author">Made by : Daniel Caesar</p>
                    <p class="art-like"><img src="/img/icon/like.png" class="Art-like-img">65</p>
                </div>
            </a>
        </div>
    </div>

         <!-- FOOTER --> 

          <!-- Brand -->
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