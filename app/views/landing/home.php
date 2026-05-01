<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Showcase Your Creativity</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/app/resources/css/home.css">
    <style>
        .feature-section {
            padding: 80px 60px;
            background-color: #fff;
            text-align: center;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }
        .feature-card {
            padding: 30px;
            border-radius: 15px;
            background: #f9f9f9;
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            object-fit: contain;
        }
        .feature-card h3 {
            font-family: 'Cinzel', serif;
            color: #1F3C88;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        .cta-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/img/banner/Background-2.png') center/cover no-repeat;
            padding: 100px 60px;
            text-align: center;
            color: white;
        }
        .cta-content h2 {
            font-family: 'Cinzel', serif;
            font-size: 3.5rem;
            margin-bottom: 20px;
        }
        .cta-content p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-large {
            padding: 15px 40px;
            font-size: 1.2rem;
            background-color: var(--gold);
            color: #1F3C88;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-large:hover {
            background-color: #fff;
            transform: scale(1.05);
        }
        .note-section {
            display: flex;
            align-items: center;
            padding: 80px 60px;
            background-color: #f0f2f5;
            flex-wrap: wrap;
            justify-content: center;
        }
        .note-img {
            width: 400px;
            max-width: 100%;
            height: auto;
        }
        .note-text {
            flex: 1;
            padding-left: 50px;
            min-width: 300px;
        }
        .note-text h2 {
            font-family: 'Cinzel', serif;
            color: #1F3C88;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .note-text {
                padding-left: 0;
                padding-top: 40px;
                text-align: center;
            }
        }
    </style>
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
            <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <section class="hero">
        <img src="/img/banner/Banner-1.png" alt="Artvault Banner" class="w-full h-auto">
    </section>

    <div class="Box-1"></div>

    <!-- About Our Website -->
    <section class="about-section">
        <div class="about-text">
            <h1>More About Our Website</h1>
            <p>
            More than just a storage space, Artvault serves as the primary platform for
            young creators to appreciate their work. We believe that schools are not just
            places to learn, but also suburban fields where brilliant ideas grow.
            Every stroke of art, line of code, and string of words created by
            students has a life and a story of its own.
            </p>
            <button class="btn-large" style="margin-top: 2rem;" onclick="location.href='/about'">Learn More</button>
        </div>
        <div class="about-image">
            <img src="/img/gallery/Homeimg.png" alt="Colorful classroom">
        </div>
    </section>

    <div class="Box-1"></div>

    <!-- Features Section -->
    <section class="feature-section">
        <h2 style="font-family: 'Cinzel', serif; font-size: 3rem; color: #1F3C88;">Why Choose Artvault?</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <img src="/img/icon/paint.png" alt="Paint" class="feature-icon">
                <h3>Unleash Creativity</h3>
                <p>A dedicated space for students to showcase their artistic talents and reach a wider audience within the school community.</p>
            </div>
            <div class="feature-card">
                <img src="/img/icon/Like.png" alt="Like" class="feature-icon">
                <h3>Get Appreciated</h3>
                <p>Receive feedback and likes from fellow students and teachers, encouraging growth and confidence in your craft.</p>
            </div>
            <div class="feature-card">
                <img src="/img/icon/user.png" alt="User" class="feature-icon">
                <h3>Connect & Inspire</h3>
                <p>Follow your favorite student artists and get inspired by the diverse range of works exhibited in our digital gallery.</p>
            </div>
        </div>
    </section>

    <div class="Box-1"></div>

    <!-- Art Of The Day -->
    <section class="art-of-the-day">
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

    <!-- Note Section -->
    <section class="note-section">
        <img src="/img/banner/left-note.png" alt="Note" class="note-img">
        <div class="note-text">
            <h2>A Message to Creators</h2>
            <p style="font-size: 1.5rem; line-height: 1.6; color: #555;">
                "Your imagination is your only limit. Artvault is here to ensure that your voice is heard and your vision is seen. Start your journey with us today and leave a lasting legacy."
            </p>
        </div>
    </section>

    <div class="Box-1"></div>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Ready to Exhibit?</h2>
            <p>Join hundreds of student artists today and start sharing your masterpieces with the world.</p>
            <button class="btn-large" onclick="location.href='/register'">Join Now</button>
        </div>
    </section>

    <div class="box-2"></div>

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

        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script src="/js/script.js"></script>
</body>
</html>