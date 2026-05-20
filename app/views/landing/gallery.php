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
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/assets/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
            <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === 'flazened@ski.sch.id'): ?>
                <li><a href="/">Home</a></li>
                <li><a href="/gallery" class="active">Gallery</a></li>
                <li><a href="/admin">Admin</a></li>
            <?php else: ?>
                <li><a href="/">Home</a></li>
                <li><a href="/gallery" class="active">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">About</a></li>
            <?php endif; ?>
        </ul>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/profile"><img src="/assets/icon/user.png" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>

    <!-- GALLERY -->
    <div class="gallery-page">

        <div class="gallery-topbar">
            <div class="filter-category">
                <button class="btn-filter" onclick="location.href='/gallery'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6H21M6 12H18M10 18H14" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="category-dropdown">
                    <button class="btn-category" onclick="toggleCategoryMenu()">
                        <?= isset($_GET['category']) ? 'Filtered' : 'Category' ?>
                    </button>
                    <div id="categoryMenu" class="category-menu">
                        <a href="/gallery">All Categories</a>
                        <?php foreach($categories as $cat): ?>
                            <a href="/gallery?category=<?= $cat['id'] ?>"><?= $cat['category_name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search....">
                <button class="search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="gallery-grid">
            <?php foreach ($artworks as $row): ?>
            <div class="art-card">
                <a href="/art/<?= $row['id']; ?>" class="art-img-container">
                    <img src="/assets/gallery/<?= $row['file_path']; ?>" alt="<?= $row['title']; ?>">
                </a>
                <div class="art-info">
                    <a href="/art/<?= $row['id']; ?>" class="art-title"><?= $row['title']; ?></a>
                    <p class="art-author">Made by : <?= $row['author_name']; ?></p>
                    <div class="art-like <?= in_array($row['id'], $likedArtIds) ? 'liked' : '' ?>" onclick="toggleLike(<?= $row['id']; ?>, this)">
                        <img src="/assets/icon/like.png" class="art-like-img">
                        <span><?= $row['like_count']; ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

         <div class="add-work-wrap">
            <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'author' || $_SESSION['user_role'] === 'admin')): ?>
                <button class="btn-add-work" onclick="openAddWork()">+ Add your Art !</button>
                
                <!-- POPUP ADD WORK -->
                <div class="add-work-overlay" id="addWorkOverlay">
                    <div class="add-work-popup">
                        <div class="add-work-header">
                            <img src="/assets/logo/Artvault.png" alt="Artvault Logo" class="add-work-logo">
                            <div class="header-user-icon">
                                <img src="/assets/icon/user.png" alt="User">
                            </div>
                        </div>

                        <div class="add-work-container">
                            <form action="/art/upload" method="POST" enctype="multipart/form-data" class="add-work-form">
                                <!-- Upload Section -->
                                <div class="upload-section">
                                    <div class="upload-preview-box" onclick="document.getElementById('fileInput').click()">
                                        <input type="file" name="art_image" id="fileInput" accept="image/*" style="display:none" onchange="previewImage(event)" required>
                                        <div id="uploadPlaceholder" class="upload-placeholder">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 16L8.586 11.414C9.367 10.633 10.633 10.633 11.414 11.414L16 16M14 14L15.586 12.414C16.367 11.633 17.633 11.633 18.414 12.414L20 14M14 8H14.01M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <img id="previewImg" src="" alt="" style="display:none;">
                                        <button type="button" class="btn-add-photo">Add photo</button>
                                    </div>
                                </div>

                                <!-- Inputs Section -->
                                <div class="form-inputs">
                                    <div class="input-group">
                                        <input type="text" name="title" placeholder="Title..." required>
                                    </div>
                                    <div class="input-group">
                                        <textarea name="description" placeholder="Description..." rows="5"></textarea>
                                    </div>
                                    <div class="input-group">
                                        <label>Category</label>
                                        <div class="select-wrapper">
                                            <select name="category_id">
                                                <option value="">No Category</option>
                                                <?php foreach($categories as $cat): ?>
                                                    <option value="<?= $cat['id']; ?>"><?= $cat['category_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="form-actions">
                                    <button type="submit" class="btn-submit-art">Upload Art</button>
                                    <span class="action-or">Or</span>
                                    <button type="button" class="btn-cancel-art" onclick="closeAddWork()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>

    <!-- FOOTER -->
    <div class="box-2"></div>
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <img src="/assets/logo/Artvault-white.png" alt="Artvault Logo" class="footer-logo">
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
                        <span class="contact-icon"><img src="/assets/icon/mail.png" alt="Email" class="contact-icon-img"></span>
                        <span>Artvault@gmail.com</span>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="/assets/icon/location.png" alt="Location" class="contact-icon-img"></span>
                        <span>Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="/assets/icon/telephone.png" alt="Phone" class="contact-icon-img"></span>
                        <span>+62 897 3871 170</span>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-heading">Help & Center</h4>
                <ul class="footer-links">
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Terms and Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cancellation and Refund Policy</a></li>
                </ul>
            </div>
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
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>
    <script>
            function toggleCategoryMenu() {
        document.getElementById("categoryMenu").classList.toggle("show");
    }

    async function toggleLike(artworkId, element) {
        try {
            const response = await fetch('/art/like/' + artworkId, {
                method: 'POST'
            });
            const data = await response.json();
            
            if (data.status === 'success') {
                const span = element.querySelector('span');
                span.innerText = data.like_count;
                
                if (data.like_status === 'liked') {
                    element.classList.add('liked');
                } else {
                    element.classList.remove('liked');
                }
            } else if (data.status === 'error') {
                alert(data.message);
                if (data.message.includes('login')) {
                    window.location.href = '/login';
                }
            }
        } catch (error) {
            console.error('Error toggling like:', error);
        }
    }

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.btn-category')) {
            var dropdowns = document.getElementsByClassName("category-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    });

    function openAddWork() {
        document.getElementById('addWorkOverlay').classList.add('active');
    }

    function closeAddWork() {
        document.getElementById('addWorkOverlay').classList.remove('active');
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const preview = document.getElementById('previewImg');
        const placeholder = document.getElementById('uploadPlaceholder');
        
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        placeholder.style.display = 'none';
    }
    </script>
    
    <script src="/js/script.js"></script>
</body>
</html>
