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


        <div class="nav-actions">
            <img src="/img/icon/user.png" alt="User Icon" class="user-icon" onclick="toggleUserMenu()">
        </div>
    </nav>        


    <!-- Starting Point FONK FONK FONK -->

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
 
                <!-- Teks pendek (default tampil) -->
                <div class="art-desc-short">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style. At the top of the artwork, the large title "TRASH HUNT" appears in bright, colorful letters that resemble a game logo or an adventure title. This immediately gives the impression that the artwork is related to a mission or an exciting adventure focused on collecting or dealing with trash.</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Read For More...</button>
                </div>
 
                <!-- Teks panjang (tersembunyi) -->
                <div class="art-desc-full" id="descFull">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style. At the top of the artwork, the large title "TRASH HUNT" appears in bright, colorful letters that resemble a game logo or an adventure title. This immediately gives the impression that the artwork is related to a mission or an exciting adventure focused on collecting or dealing with trash.</p>
                    <br>
                    <p>In the center of the composition, two main characters are depicted wearing green uniforms that resemble those of sanitation workers or environmental rescue team members. One of the characters appears in the foreground in an active pose, as if they are controlling or pushing through a stream of water mixed with trash. The character looks energetic and determined, with a facial expression that reflects enthusiasm and dedication to their task.</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Show Less</button>
                </div>
 
                <!-- Edit / Delete -->
                <div class="art-detail-actions">
                    <button class="btn-edit" onclick="openEditWork()">Edit</button>
                    <span class="art-action-or">Or</span>
                    <button class="btn-delete" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
 
        </div>
 
        <!-- View Other Art -->
        <div class="art-other-section">
            <div class="art-other-header">
                <span>View other art too!</span>
            </div>
            <div class="art-other-grid">
 
                <a href="/art-detail" class="art-card-sm">
                    <img src="/img/gallery/ayo-punya-cita-cita.png" alt="Ayo punya cita-cita">
                    <div class="art-info">
                        <p class="art-title">Ayo punya cita-cita</p>
                        <p class="art-author">Made by : Faysal Pratama Agung</p>
                    </div>
                </a>
 
                <a href="/art-detail" class="art-card-sm">
                    <img src="/img/gallery/billie-eilish.png" alt="Billie Eilish">
                    <div class="art-info">
                        <p class="art-title">Billie Eilish</p>
                        <p class="art-author">Made by : Depon Vintjai</p>
                    </div>
                </a>
 
                <a href="/art-detail" class="art-card-sm">
                    <img src="/img/gallery/A-positive-spin-on.png" alt="A positive spin on n...">
                    <div class="art-info">
                        <p class="art-title">A positive spin on n...</p>
                        <p class="art-author">Made by : Tang You Hoong</p>
                    </div>
                </a>
 
                <a href="/art-detail" class="art-card-sm">
                    <img src="/img/gallery/menggapai-indonesia.png" alt="Menggapai Indonese...">
                    <div class="art-info">
                        <p class="art-title">Menggapai Indonese...</p>
                        <p class="art-author">Made by : Marcello Adil</p>
                    </div>
                </a>
 
            </div>
        </div>
 
    </div>
        <!-- POPUP EDIT WORK -->
    <div class="add-work-overlay" id="editWorkOverlay">
        <div class="add-work-popup">

            <div class="add-work-header">
                <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="add-work-logo">
                <span>Manage your artwork here edit or remove it anytime!</span>
                <img src="/img/icon/user.png" alt="User" class="user-icon">
            </div>

            <div class="add-work-body">
                <button class="btn-back-popup" onclick="closeEditWork()">
                    <img src="/img/icon/back.png" alt="Back" class="back-icon-2">
                </button>

                <!-- Preview gambar -->
                <div class="upload-area" onclick="document.getElementById('editFileInput').click()">
                    <input type="file" id="editFileInput" accept="image/*" style="display:none" onchange="previewEditImage(event)">
                    <img id="editPreviewImg" src="/img/gallery/trash-hunt.png" alt="Trash Hunt" style="width:100%; height:100%; object-fit:cover; border-radius:8px;">
                </div>

                <!-- Name -->
                <div class="add-work-field">
                    <input type="text" value="Trash Hunt">
                </div>

                <!-- Description -->
                <div class="add-work-field">
                    <textarea rows="4">The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style. At the top of the artwork, the large title "TRASH HUNT" appears in bright, colorful letters that resemble a game logo or an adventure title. This immediately gives the impression that the artwork is related to a mission or an exciting adventure focused on collecting or dealing with trash...</textarea>
                </div>

                <!-- Submit -->
                <button class="btn-add-submit">Done!</button>

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
 
        // Default: sembunyikan deskripsi panjang
        document.getElementById('descFull').style.display = 'none';

        function confirmDelete() {
    const overlay = document.createElement('div');
    overlay.className = 'confirm-overlay';
    overlay.innerHTML = `
        <div class="confirm-box">
            <img src="/img/icon/sampah.png" alt="Delete" class="confirm-icon">
            <h3>Delete Art?</h3>
            <p>Are you sure to delete your Art?</p>
            <div class="confirm-actions">
                <button class="confirm-no" onclick="closeConfirm()">Cancel</button>
                <button class="confirm-yes" onclick="location.href='/delete-art'">Delete</button>
            </div>
        </div>
    `;
    overlay.id = 'confirmOverlay';
    document.body.appendChild(overlay);

}

function closeConfirm() {
    const overlay = document.getElementById('confirmOverlay');
    if (overlay) overlay.remove();
}
function openEditWork() {
    document.getElementById('editWorkOverlay').classList.add('active');
}

function closeEditWork() {
    document.getElementById('editWorkOverlay').classList.remove('active');
}

function previewEditImage(event) {
    const file = event.target.files[0];
    if (!file) return;
    document.getElementById('editPreviewImg').src = URL.createObjectURL(file);
}
    </script>

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
                        <li><a href="/gallery.php">Gallery</a></li>
                        <li><a href="/about.php">About</a></li>
                        <li><a href="/contact.php">Contact</a></li>
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