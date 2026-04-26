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
            <li><a href="/about">About</a></li>
        </ul>

        <div class="nav-actions">
            <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
            <button class="btn btn-signup" onclick="location.href='/signup'">Sign Up</button>
        </div>
    </nav>

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
                <img src="/img/gallery/Trash-Hunt.png" alt="Trash Hunt" class="art-detail-img">
            </div>
 
            <!-- Info -->
            <div class="art-detail-info">
                <h1 class="art-detail-title">Trash Hunt</h1>
                <p class="art-detail-author">by Viktor Wembu</p>
                <hr class="art-detail-divider">
 
                <p class="art-detail-label">Description :</p>
 
                <!-- Teks pendek (default tampil) -->
                <div class="art-desc-short">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style. At the top of the artwork, the large title "TRASH HUNT" appears in bright, colorful letters that resemble a game logo or an adventure title...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Read For More...</button>
                </div>
 
                <!-- Teks panjang (tersembunyi) -->
                <div class="art-desc-full" id="descFull">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style...</p>
                    <br>
                    <p>In the center of the composition, two main characters are depicted wearing green uniforms that resemble those of sanitation workers...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Show Less</button>
                </div>

            </div>
 
        </div>
 
        <!-- View Other Art -->
        <div class="art-other-section">
            <div class="art-other-header">
                <span>View other art too!</span>
            </div>
            <div class="art-other-grid">
 
                <a href="/gallery/5" class="art-card-sm">
                    <img src="/img/gallery/Ayo-punya-cita-cita.png" alt="Ayo punya cita-cita">
                    <div class="art-info">
                        <p class="art-title">Ayo punya cita-cita</p>
                        <p class="art-author">Made by : Faysal Pratama Agung</p>
                    </div>
                </a>
 
                <a href="/gallery/6" class="art-card-sm">
                    <img src="/img/gallery/Billie-Eilish.png" alt="Billie Eilish">
                    <div class="art-info">
                        <p class="art-title">Billie Eilish</p>
                        <p class="art-author">Made by : Depon Vintjai</p>
                    </div>
                </a>
 
                <a href="/gallery/7" class="art-card-sm">
                    <img src="/img/gallery/A-positive-spin-on.png" alt="A positive spin on n...">
                    <div class="art-info">
                        <p class="art-title">A positive spin on n...</p>
                        <p class="art-author">Made by : Tang You Hoong</p>
                    </div>
                </a>
 
                <a href="/gallery/8" class="art-card-sm">
                    <img src="/img/gallery/Menggapai-Indonesia.png" alt="Menggapai Indonese...">
                    <div class="art-info">
                        <p class="art-title">Menggapai Indonese...</p>
                        <p class="art-author">Made by : Marcello Adil</p>
                    </div>
                </a>
 
            </div>
        </div>
 
    </div>

    <script>
        function toggleDesc() {
            const full = document.getElementById('descFull');
            const isHidden = full.style.display === 'none' || full.style.display === '';
            full.style.display = isHidden ? 'block' : 'none';
            document.querySelector('.art-desc-short').style.display = isHidden ? 'none' : 'block';
        }
        document.getElementById('descFull').style.display = 'none';
    </script>

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
</body>
</html>
