<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - About Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body class="about-page">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/assets/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
            <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === 'flazened@ski.sch.id'): ?>
                <li><a href="/">Home</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/admin">Admin</a></li>
            <?php else: ?>
                <li><a href="/">Home</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about" class="active">About</a></li>
            <?php endif; ?>
        </ul>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php 
                    $avatar = $_SESSION['user_avatar'] ?? 'user.png';
                    $avatarPath = (strpos($avatar, 'avatar_') === 0) ? '/assets/users/' . $avatar : '/assets/icon/' . $avatar;
                ?>
                <a href="/profile"><img src="<?= $avatarPath; ?>" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <header class="about-hero">
    </header>

    <!-- INTRO TEXT -->
    <section class="about-intro-section">
        <p class="about-intro-text">
            ArtVault is a website platform designed to showcase various forms of creativity, such as handmade art, digital art, painting, and hand-drawn artwork. The name “ArtVault” comes from the combination of the words Art and Vault, symbolizing a valuable and secure place to store, display, and appreciate creative works. With its modern, elegant, and professional impression, ArtVault serves as a digital exhibition space where creators can share their ideas and talents with a wider audience. More than just a gallery, ArtVault is also a place that supports young creators by preserving their creativity, inspiring others, and turning every artwork into a meaningful achievement worth appreciating.
        </p>
    </section>

    <!-- WHO WE ARE -->
    <section class="who-we-are-section">
        <div class="who-we-are-image">
            <img src="/assets/banner/left-about.png" alt="Who We Are">
        </div>
        <div class="who-we-are-content">
            <div class="section-title-container">
                <h2 class="section-title">Who We Are</h2>
                <hr class="section-underline">
            </div>
            <p class="who-we-are-text">
                We are students passionate about technology, design, and digital creativity. 
                Coming from the TKJ environment, we came together to build this platform to 
                showcase work that is not only innovative but also has a story behind it.
            </p>
            <a href="/gallery" class="btn-know-us">Get to know us <span>→</span></a>
        </div>
    </section>

    <!-- MISSION & VISION -->
    <section class="mission-vision-section">
        <div class="section-title-container">
            <h2 class="section-title">Mission & Vision</h2>
            <hr class="section-underline center-underline">
        </div>
        <div class="mission-vision-grid">
            <!-- Mission -->
            <div class="mv-card">
                <div class="mv-icon">
                    <svg width="80" height="80" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="28" stroke="#f0c040" stroke-width="4" fill="none"/>
                        <circle cx="30" cy="30" r="18" stroke="#f0c040" stroke-width="4" fill="none"/>
                        <circle cx="30" cy="30" r="8" fill="#f0c040"/>
                    </svg>
                </div>
                <p class="mv-text">
                    To be a place of appreciation and inspiration for everyone through innovative and useful creative work.
                </p>
            </div>
            <!-- Vision -->
            <div class="mv-card">
                <div class="mv-icon">
                    <svg width="80" height="80" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 30C5 30 15 12 30 12C45 12 55 30 55 30C55 30 45 48 30 48C15 48 5 30 5 30Z" stroke="#f0c040" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="30" cy="30" r="8" stroke="#f0c040" stroke-width="4"/>
                        <circle cx="30" cy="30" r="3" fill="#f0c040"/>
                    </svg>
                </div>
                <p class="mv-text">
                    Become a widely known digital creator and have a positive impact on young creators in the future.
                </p>
            </div>
        </div>
    </section>

    <!-- WHAT WE SHOWCASE -->
    <section class="showcase-section">
        <div class="section-title-container">
            <h2 class="section-title">What We Showcase</h2>
            <hr class="section-underline center-underline">
        </div>
        <div class="showcase-grid">
            <!-- Handmade -->
            <div class="showcase-card-container">
                <p class="category-label">Handmade</p>
                <div class="showcase-card">
                    <div class="showcase-img-wrapper">
                        <img src="/assets/gallery/Claymonster.png" alt="Claymonster">
                    </div>
                    <div class="showcase-info">
                        <h3 class="showcase-title">Claymonster</h3>
                        <p class="showcase-author">Made by : Chisa Evelyn</p>
                        <div class="showcase-stats">
                            <img src="/assets/icon/like.png" class="like-icon" alt="Likes">
                            <span class="like-count">25</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Digital art -->
            <div class="showcase-card-container">
                <p class="category-label">Digital art</p>
                <div class="showcase-card">
                    <div class="showcase-img-wrapper">
                        <img src="/assets/gallery/A-Chill-Doomsday.png" alt="A Chill Doomsday">
                    </div>
                    <div class="showcase-info">
                        <h3 class="showcase-title">A Chill Doomsday</h3>
                        <p class="showcase-author">Made by : Nicholas Jo</p>
                        <div class="showcase-stats">
                            <img src="/assets/icon/like.png" class="like-icon" alt="Likes">
                            <span class="like-count">324</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Painting art -->
            <div class="showcase-card-container">
                <p class="category-label">Painting art</p>
                <div class="showcase-card">
                    <div class="showcase-img-wrapper">
                        <img src="/assets/gallery/Mercusuar.png" alt="Mercusuar">
                    </div>
                    <div class="showcase-info">
                        <h3 class="showcase-title">Mercusuar</h3>
                        <p class="showcase-author">Made by : Nicholas Jo</p>
                        <div class="showcase-stats">
                            <img src="/assets/icon/like.png" class="like-icon" alt="Likes">
                            <span class="like-count">92</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hand drawn -->
            <div class="showcase-card-container">
                <p class="category-label">Hand drawn</p>
                <div class="showcase-card">
                    <div class="showcase-img-wrapper">
                        <img src="/assets/gallery/Melody-in-Guitar.png" alt="Melody in Guitar">
                    </div>
                    <div class="showcase-info">
                        <h3 class="showcase-title">Melody in Guitar</h3>
                        <p class="showcase-author">Made by : Jo Halimawan</p>
                        <div class="showcase-stats">
                            <img src="/assets/icon/like.png" class="like-icon" alt="Likes">
                            <span class="like-count">106</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR VALUES -->
    <section class="values-section">
        <div class="section-title-container">
            <h2 class="section-title">Our Values</h2>
            <hr class="section-underline center-underline">
        </div>
        <div class="values-grid">
            <!-- Creative -->
            <div class="value-item">
                <div class="value-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18h6M10 22h4M12 2v1M5.22 5.22l.71.71M2 12h1M5.22 18.78l.71-.71M18.78 5.22l-.71.71M22 12h-1M18.78 18.78l-.71-.71M9 11.3V8a3 3 0 0 1 6 0v3.3M12 11.3V14"/>
                        <path d="M12 18a6 6 0 0 1-6-6c0-1.66.67-3.16 1.76-4.24A6.002 6.002 0 0 1 12 6a6 6 0 0 1 6 6c0 1.66-.67 3.16-1.76 4.24A6.002 6.002 0 0 1 12 18Z"/>
                    </svg>
                </div>
                <div class="value-content">
                    <h3>Creative</h3>
                    <p>Always looking for new ideas and daring to express them.</p>
                </div>
            </div>
            <!-- Collaboration -->
            <div class="value-item">
                <div class="value-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="value-content">
                    <h3>Collaboration</h3>
                    <p>Work together and support each other in creating work</p>
                </div>
            </div>
            <!-- Innovation -->
            <div class="value-item">
                <div class="value-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/>
                        <path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/>
                        <path d="M9 12H4s.5-1 1-4c2 1 3 3 3 3z"/>
                        <path d="M15 15v5s-1-.5-4-1c1-2 3-3 3-3z"/>
                        <line x1="15" y1="9" x2="15.01" y2="9"/>
                    </svg>
                </div>
                <div class="value-content">
                    <h3>Innovation</h3>
                    <p>Keep learning and creating useful solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER --> 
    <div class="Box-1"></div>
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <img src="/assets/logo/Artvault-white.png" alt="Artvault Logo" class="footer-logo">
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
                            <img src="/assets/icon/mail.png" alt="Email Icon" class="contact-icon-img">
                        </span>
                        <span>Artvault@gmail.com</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/assets/icon/location.png" alt="Location Icon" class="contact-icon-img">
                        </span>
                        <span>Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/assets/icon/telephone.png" alt="Phone Icon" class="contact-icon-img">
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
                <img src="/assets/logo/Artvault-white.png" alt="Artvault" class="footer-logo-big">
                <div class="footer-social">
                    <p class="footer-follow">Follow Us</p>
                    <div class="social-icons">
                        <a href="#"><img src="/assets/icon/instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="/assets/icon/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="/assets/icon/tiktok.png" alt="TikTok"></a>
                        <a href="#"><img src="/assets/icon/youtube.png" alt="YouTube"></a>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/script.js"></script>
        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>
    
</body>
</html>
