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
            <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === 'flazened@ski.sch.id'): ?>
                <li><a href="/admin">Admin</a></li>
            <?php endif; ?>
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

    <style>
        /* Motive Section */
        .motive-section {
            padding: 80px 60px;
            background-color: #fdfdfd;
        }
        .motive-container {
            display: flex;
            gap: 50px;
            align-items: stretch;
            max-width: 1200px;
            margin: 0 auto;
        }
        .motive-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .motive-left img {
            width: 100%;
            height: auto;
            max-width: 500px;
        }
        .motive-right {
            flex: 1.5;
            background-color: #fff;
            padding: 80px 50px;
            position: relative;
            border: 1px solid #eee;
            /* Lined paper effect: Light blue lines, red horizontal line near top */
            background-image: 
                linear-gradient(to bottom, transparent 79px, #ff9999 79px, #ff9999 81px, transparent 81px),
                linear-gradient(#e5f3ff 1px, transparent 1px);
            background-size: 100% 100%, 100% 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .motive-right h2 {
            font-family: 'Cinzel', serif;
            font-weight: 700;
            color: #1A1F2C;
            font-size: 2.5rem;
            max-width: 300px;
            margin: 0;
            line-height: 1.2;
            text-align: left;
        }
        .clipboard-container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            perspective: 1000px;
        }
        .clipboard-card {
            width: 340px;
            background-color: #d2b48c; /* Tan board */
            padding: 12px;
            border-radius: 8px;
            transform: rotate(-2deg);
            box-shadow: 15px 15px 35px rgba(0,0,0,0.1);
            position: relative;
            margin-top: 20px;
        }
        /* Pure CSS Metal Clip */
        .clip-metal {
            width: 90px;
            height: 40px;
            background: linear-gradient(to bottom, #ccc, #999);
            margin: -32px auto 10px;
            border-radius: 10px 10px 0 0;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .clip-metal::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 15px;
            background: #666;
            top: 6px;
            left: 20px;
            border-radius: 8px;
        }
        .clipboard-paper {
            background-color: #fff9e6; /* Beige paper */
            padding: 35px 25px;
            min-height: 300px;
            font-family: 'Lato', sans-serif;
            color: #333;
            font-size: 1.05rem;
            line-height: 28px;
            /* Ruled lines on paper */
            background-image: linear-gradient(#d1eaff 1px, transparent 1px);
            background-size: 100% 28px;
            border-top: 2px solid #ff9999;
        }

        /* Team Section */
        .team-section {
            padding: 100px 60px;
            background-color: #fff;
            position: relative;
            overflow: hidden;
            /* Subtle topo pattern using CSS SVG */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath d='M0 50 Q 25 25, 50 50 T 100 50' fill='none' stroke='%23f0f0f0' stroke-width='1'/%3E%3Cpath d='M0 70 Q 25 45, 50 70 T 100 70' fill='none' stroke='%23f0f0f0' stroke-width='1'/%3E%3C/svg%3E");
        }
        .team-title {
            font-family: 'Cinzel', serif;
            font-size: 3.2rem;
            color: #1A1F2C;
            text-align: center;
            margin-bottom: 10px;
        }
        .team-desc {
            text-align: center;
            font-family: 'Lato', sans-serif;
            color: #666;
            max-width: 650px;
            margin: 0 auto 60px;
            font-size: 1.1rem;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .team-card {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 45px rgba(0,0,0,0.04);
            text-align: center;
            border: 1px solid #f9f9f9;
            transition: transform 0.3s;
        }
        .team-card:hover {
            transform: translateY(-5px);
        }
        .avatar-circle {
            width: 120px;
            height: 120px;
            background-color: #f7f7f7;
            border-radius: 50%;
            margin: 0 auto 25px;
            border: 4px solid #FFD700;
        }
        .team-card h3 {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #1A1F2C;
            margin-bottom: 5px;
        }
        .team-card p {
            font-family: 'Lato', sans-serif;
            color: #999;
            font-size: 1rem;
        }
    </style>

    <!-- Motive Section -->
    <section class="motive-section">
        <div class="motive-container">
            <div class="motive-left">
                <img src="/img/banner/left-note.png" alt="Motive Illustration">
            </div>
            <div class="motive-right">
                <h2>What Is Our Motives?</h2>
                <div class="clipboard-container">
                    <div class="clipboard-card">
                        <div class="clip-metal"></div>
                        <div class="clipboard-paper">
                            <p>Our motives is to reach some students that couldn't possibly keep their art on sight and prevent it from being swallowed by time and age. Artvault was made to prevent some event like this, we will display their art and show the audience how great our students were.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="Box-1"></div>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="team-title">Meet our artvault team</h2>
        <p class="team-desc">The creative minds behind the platform dedicated to student artists. We are committed to showcasing the best talent in our school.</p>
        <div class="team-grid">
            <div class="team-card">
                <div class="avatar-circle"></div>
                <h3>Michael Yusliardy</h3>
                <p>Front End Developer</p>
            </div>
            <div class="team-card">
                <div class="avatar-circle"></div>
                <h3>Devon Austin Vintjhe</h3>
                <p>Back End Developer</p>
            </div>
            <div class="team-card">
                <div class="avatar-circle"></div>
                <h3>Nicholas Jonathan G</h3>
                <p>UI/UX Designer</p>
            </div>
            <div class="team-card">
                <div class="avatar-circle"></div>
                <h3>Felix Yonathan</h3>
                <p>UI/UX Designer</p>
            </div>
        </div>
    </section>

    <div class="Box-1"></div>

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
