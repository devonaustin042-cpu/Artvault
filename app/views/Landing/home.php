<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Home</title>

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
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/about">About</a></li>
        </ul>

        <div class="nav-actions">
            <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
            <button class="btn btn-signup" onclick="location.href='/signup'">Sign Up</button>
        </div>
    </nav>

    <div class="Box-1"></div>

        <!-- HERO BANNER -->
        <section class="hero">
            <img src="/img/banner/Banner-1.png" alt="Artvault Banner" class="hero-img">
            </div>

    <div class="Box-1"></div>

                <!-- About Our Website -->

    <section class="about-section">
    <div class="about-text">
        <h1>More About Our Website</h1>
        <p>
        More than just a storage space, Artvault serves as the primary platform for
        young creators to appreciate their work. We believe that schools are not just
        places to learn, but also suburban fields where brilliant ideas grow.
        Here, every stroke of art, line of code, and string of words created by
        students has a life and a story of its own. We believe this website to
        ensuring that their hard work and imagination are not lost to time, but rather
        live forever as a legacy of achievement worthy of celebration and recognition.
        </p>
    </div>
    <div class="about-image">
        <img src="/img/gallery/Homeimg.png" alt="Colorful classroom">
    </div>
    </section>

    <div class="Box-1"></div>

    <section class="art-of-the-day" style="background-image: url('/img/banner/background.png');">
        <h2>Art Of The Day</h2>
            <div class="art-grid">
                    <div class="art-card">
                        <p class="art-credit">Made By : Nicho</p>
                        <img src="/img/gallery/sparkle-1.png" alt="Art 1">
                    </div>
                    <div class="art-card">
                        <p class="art-credit">Made By : Nicho</p>
                        <img src="/img/gallery/haze-1.png" alt="Art 2">
                    </div>
                    <div class="art-card">
                        <p class="art-credit">Made By : Nicho</p>
                        <img src="/img/gallery/Mei-1.png" alt="Art 3">
                    </div>
            </div>
    </section>

    <div class="Box-1"></div>
    <!-- Pembatas saja ini ya diingat ! (diapus aja kalau udah ada konten lain) -->

        </section>
    <div class="margin-pembatas-sementara"></div>
    <div class="box-2"></div>


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