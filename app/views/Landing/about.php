<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - About</title>
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
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/about" class="active">About</a></li>
        </ul>
        <div class="nav-actions">
            <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
            <button class="btn btn-signup" onclick="location.href='/signup'">Sign Up</button>
        </div>
    </nav>

    <div class="about-section">
        <div class="about-text">
            <h1>About Artvault</h1>
            <p>
                Artvault is a digital sanctuary for student creativity. We believe that every 
                piece of art tells a story and deserves to be preserved and celebrated. 
                Our mission is to provide a platform where young artists can showcase 
                their talents to the world.
            </p>
        </div>
        <div class="about-image">
            <img src="/img/gallery/Homeimg.png" alt="Artvault Community">
        </div>
    </div>

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
                </ul>
            </div>
            <div class="footer-col footer-social-col">
                <img src="/img/logo/Artvault-white.png" alt="Artvault" class="footer-logo-big">
                <div class="social-icons">
                    <a href="#"><img src="/img/icon/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/img/icon/facebook.png" alt="Facebook"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>
