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

    <!-- HERO BANNER -->
    <section class="hero" style="margin-bottom: 40px;">
        <img src="/img/banner/about-us.png" alt="Artvault Banner" class="w-full h-auto">
    </section>

    
    <section style="border: 2px solid #1F3C88; border-radius: 16px; padding: 40px; background: #faf8f4;">
        <div class="w-full text-center">
            <p class="font-serif text-[#2c1f14] text-base md:text-lg leading-relaxed mb-5">
                More than just a storage space, <strong class="font-semibold text-[#5a3e2b]">Artvault</strong> serves as the primary platform
                for young creators to appreciate their work. We believe that schools are not just places
                to learn, but also <span class="italic text-[#9b7355]">suburban fields where brilliant ideas grow.</span>
            </p>

            <p class="font-serif text-[#2c1f14] text-base md:text-lg leading-relaxed" >
                Here, every stroke of art, line of code, and string of words created by students has
                a life and a story of its own. We dedicate this website to ensuring that their hard work
                and imagination are not lost to time, but rather
                <span class="italic text-[#9b7355]">live forever as a legacy of achievement worthy of celebration and recognition.</span>
            </p>
        </div>
    </section>

    

    <section style="display: flex; align-items: center; background: #f3f4f6; width: 100%; padding: 40px 60px; gap: 40px;">

    <!-- Gambar Kiri -->
        <div style="flex-shrink: 0; width: 580px; height: 580px;">
            <img src="/img/banner/left-about.png" alt="Who We Are" 
                style="width: 100%; height: 100%; border-radius: 16px; border: 4px solid #1F3C88; object-fit: cover;">
        </div>

    <!-- Konten Kanan -->
        <div style="display: flex; flex-direction: column; gap: 16px; flex: 1;">
        
            <div>
                <h2 style="font-size: 3.3rem; font-weight: 800; color: #1a1a1a; margin-bottom: 8px;">Who We Are</h2>
                <hr style="border: none; border-top: 4px solid #1F3C88; width: 60px; margin: 0;">
            </div>

            <p style="color: #333; font-size: 1.75rem; line-height: 1.8; margin: 0;">
                We are students passionate about technology, design, and digital creativity. 
                Coming from the TKJ environment, we came together to build this platform to 
                showcase work that is not only innovative but also has a story behind it.
            </p>

            <a href="#" 
                style="display: inline-flex; width: fit-content; align-items: center; gap: 10px; border: 2px solid #1F3C88; color: #1F3C88; font-weight: 600; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 0.95rem; transition: all 0.3s ease;"
                onmouseover="this.style.background='#F4C430'; this.style.color='#fff'; this.style.borderColor='#F4C430';"
                onmouseout="this.style.background='transparent'; this.style.color='#1F3C88'; this.style.borderColor='#1F3C88';">
                    Get to know us →
            </a>

        </div>

    </section>


    <section style="background: #f3f4f6; width: 100%; padding: 50px 60px;">

        <!-- Judul -->
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2.3rem; font-weight: 800; color: #1a1a1a; margin-bottom: 8px;">Mission & Vision</h2>
            <hr style="border: none; border-top: 4px solid #1F3C88; width: 60px; margin: 0 auto;">
        </div>

        <!-- Kartu -->
        <div style="display: flex; gap: 30px; justify-content: center;">

            <!-- Mission -->
            <div style="background: #6b8cba; border-radius: 16px; padding: 30px; display: flex; align-items: center; gap: 20px; width: 45%;">
                <!-- Icon Target -->
                <div style="flex-shrink: 0;">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="28" stroke="#f0c040" stroke-width="4" fill="none"/>
                        <circle cx="30" cy="30" r="18" stroke="#f0c040" stroke-width="4" fill="none"/>
                        <circle cx="30" cy="30" r="8" fill="#f0c040"/>
                    </svg>
                </div>
                <p style="color: #fff; font-size: 1rem; line-height: 1.7; margin: 0; text-align: right;">
                    To be a place of appreciation and inspiration for everyone through innovative and useful creative work.
                </p>
            </div>

            <!-- Vision -->
            <div style="background: #6b8cba; border-radius: 16px; padding: 30px; display: flex; align-items: center; gap: 20px; width: 45%;">
                <!-- Icon Eye -->
                <div style="flex-shrink: 0;">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="30" cy="30" rx="26" ry="16" stroke="#f0c040" stroke-width="4" fill="none"/>
                        <circle cx="30" cy="30" r="8" fill="none" stroke="#f0c040" stroke-width="4"/>
                        <circle cx="30" cy="30" r="3" fill="#f0c040"/>
                    </svg>
                </div>
                <p style="color: #fff; font-size: 1rem; line-height: 1.7; margin: 0; text-align: right;">
                    Become a widely known digital creator and have a positive impact on young creators in the future.
                </p>
            </div>

        </div>

    </section>


    <section style="background: #f3f4f6; width: 100%; padding: 50px 60px;">

        <!-- Judul -->
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2.3rem; font-weight: 800; color: #1a1a1a; margin-bottom: 8px;">What We Showcase</h2>
            <hr style="border: none; border-top: 4px solid #1F3C88; width: 60px; margin: 0 auto;">
        </div>

        <!-- Grid 4 Karya -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">

            <!-- Kartu 1 -->
            <div>
                <p style="text-align: center; font-size: 0.9rem; color: #444; margin-bottom: 8px; font-weight: 700;">Handmade</p>
                <a href="#" style="text-decoration: none; display: block; background: #fff; border-radius: 12px; overflow: hidden; border: 2px solid #e5e7eb;">
                    <div style="width: 100%; aspect-ratio: 1/1; overflow: hidden;">
                        <img src="/img/gallery/claymonster.png" alt="Claymonster" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 12px;">
                        <p style="font-size: 1rem; font-weight: 700; color: #1a1a1a; margin: 0 0 4px 0;">Claymonster</p>
                        <p style="font-size: 0.85rem; color: #555; margin: 0 0 10px 0;">Made by : Chisa Evelyn</p>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="/img/icon/like.png" style="width: 18px; height: 18px;">
                            <span style="font-size: 0.85rem; color: #333;">25</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 2 -->
            <div>
                <p style="text-align: center; font-size: 0.9rem; color: #444; margin-bottom: 8px; font-weight: 700;">Digital art</p>
                <a href="#" style="text-decoration: none; display: block; background: #fff; border-radius: 12px; overflow: hidden; border: 2px solid #e5e7eb;">
                    <div style="width: 100%; aspect-ratio: 1/1; overflow: hidden;">
                        <img src="/img/gallery/A-Chill-Doomsday.png" alt="A Chill Doomsday" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 12px;">
                        <p style="font-size: 1rem; font-weight: 700; color: #1a1a1a; margin: 0 0 4px 0;">A Chill Doomsday</p>
                        <p style="font-size: 0.85rem; color: #555; margin: 0 0 10px 0;">Made by : Nicholas Jo</p>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="/img/icon/like.png" style="width: 18px; height: 18px;">
                            <span style="font-size: 0.85rem; color: #333;">324</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 3 -->
            <div>
                <p style="text-align: center; font-size: 0.9rem; color: #444; margin-bottom: 8px; font-weight: 700;">Painting art</p>
                <a href="#" style="text-decoration: none; display: block; background: #fff; border-radius: 12px; overflow: hidden; border: 2px solid #e5e7eb;">
                    <div style="width: 100%; aspect-ratio: 1/1; overflow: hidden;">
                        <img src="/img/gallery/Mercusuar.png" alt="Mercusuar" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 12px;">
                        <p style="font-size: 1rem; font-weight: 700; color: #1a1a1a; margin: 0 0 4px 0;">Mercusuar</p>
                        <p style="font-size: 0.85rem; color: #555; margin: 0 0 10px 0;">Made by : Nicholas Jo</p>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="/img/icon/like.png" style="width: 18px; height: 18px;">
                            <span style="font-size: 0.85rem; color: #333;">92</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 4 -->
            <div>
                <p style="text-align: center; font-size: 0.9rem; color: #444; margin-bottom: 8px; font-weight: 700;">Hand drawn</p>
                <a href="#" style="text-decoration: none; display: block; background: #fff; border-radius: 12px; overflow: hidden; border: 2px solid #1F3C88;">
                    <div style="width: 100%; aspect-ratio: 1/1; overflow: hidden;">
                        <img src="/img/gallery/Melody-in-Guitar.png" alt="Melody in Guitar" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 12px;">
                        <p style="font-size: 1rem; font-weight: 700; color: #1a1a1a; margin: 0 0 4px 0;">Melody in Guitar</p>
                        <p style="font-size: 0.85rem; color: #555; margin: 0 0 10px 0;">Made by : Jo Halimawan</p>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="/img/icon/like.png" style="width: 18px; height: 18px;">
                            <span style="font-size: 0.85rem; color: #333;">106</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </section>


    <section style="background: #f3f4f6; width: 100%; padding: 50px 60px;">

    <!-- Judul -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="font-size: 2.3rem; font-weight: 800; color: #1a1a1a; margin-bottom: 8px;">Our Values</h2>
        <hr style="border: none; border-top: 4px solid #1F3C88; width: 60px; margin: 0 auto;">
    </div>

    <!-- 3 Kolom -->
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; align-items: start;">

        <!-- Creative -->
        <div style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="flex-shrink: 0; font-size: 4rem;">💡</div>
            <div>
                <h3 style="font-size: 1.8rem; font-weight: 800; color: #1a1a1a; margin: 0 0 10px 0;">Creative</h3>
                <p style="font-size: 1.1rem; color: #444; line-height: 1.7; margin: 0;">Always looking for new ideas and daring to express them.</p>
            </div>
        </div>

        <!-- Collaboration -->
        <div style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="flex-shrink: 0; font-size: 4rem;">👥</div>
            <div>
                <h3 style="font-size: 1.8rem; font-weight: 800; color: #1a1a1a; margin: 0 0 10px 0;">Collaboration</h3>
                <p style="font-size: 1.1rem; color: #444; line-height: 1.7; margin: 0;">Work together and support each other in creating work</p>
            </div>
        </div>

        <!-- Innovation -->
        <div style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="flex-shrink: 0; font-size: 4rem;">🚀</div>
            <div>
                <h3 style="font-size: 1.8rem; font-weight: 800; color: #1a1a1a; margin: 0 0 10px 0;">Innovation</h3>
                <p style="font-size: 1.1rem; color: #444; line-height: 1.7; margin: 0;">Keep learning and creating useful solutions</p>
            </div>
        </div>

    </div>

</section>

    
<!-- FOOTER --> 
   <div class="Box-1"></div>
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

        <script src="/js/script.js"></script>
        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>
    

   




    

    
</body>
</html>
