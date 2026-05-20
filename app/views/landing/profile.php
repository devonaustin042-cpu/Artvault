<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>

    <div class="profile-page">
        <!-- HEADER -->
        <div class="profile-header">
            <div class="profile-banner-wrap">
                <img src="/assets/banner/<?= $user['banner_path']; ?>" alt="Banner" class="profile-banner">
            </div>
            
            <a href="javascript:history.back()" class="btn-back-profile">
                <img src="/assets/icon/back.png" alt="Back">
            </a>

            <!-- SETTINGS BUTTON -->
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user['id']): ?>
                <button class="btn-settings-profile" onclick="toggleSettingsPopup()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </button>

                <!-- SETTINGS POPUP -->
                <div id="settingsPopup" class="settings-popup-overlay">
                    <div class="settings-popup-content">
                        <div class="settings-popup-header">
                            <h3>Settings</h3>
                            <button onclick="toggleSettingsPopup()" class="btn-close-settings">&times;</button>
                        </div>
                        <ul class="settings-list">
                            <li><a href="javascript:void(0)" onclick="toggleLogoutConfirm()" class="settings-item exit"><img src="/assets/icon/sampah.png" style="width:20px; filter: invert(1);"> Exit Account</a></li>
                            <li><a href="#" class="settings-item">Edit Profile</a></li>
                            <li><a href="#" class="settings-item">Edit Background</a></li>
                            <li><a href="#" class="settings-item">Change Password</a></li>
                            <li><a href="#" class="settings-item">Change Name</a></li>
                        </ul>
                        </div>
                        </div>

                        <!-- LOGOUT CONFIRM POPUP -->
                        <div id="logoutConfirmPopup" class="settings-popup-overlay">
                        <div class="settings-popup-content logout-confirm">
                        <div class="logout-confirm-body">
                            <div class="logout-icon-wrap">
                                <img src="/assets/icon/user.png" alt="Logout">
                            </div>
                            <h3>Logout?</h3>
                            <p>Are you sure you want to log out of Artvault?</p>
                            <div class="logout-confirm-actions">
                                <button onclick="location.href='/logout'" class="btn-confirm-logout">Logout</button>
                                <button onclick="toggleLogoutConfirm()" class="btn-cancel-logout">Cancel</button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <?php endif; ?>

            <div class="profile-info-card">
                <div class="profile-avatar-wrap">
                    <img src="/assets/icon/<?= $user['avatar_path']; ?>" alt="Avatar" class="profile-avatar">
                </div>
                <div class="profile-details">
                    <div class="profile-name-row">
                        <h1 class="profile-name"><?= $user['full_name']; ?></h1>
                        <img src="/assets/icon/edu-con.png" alt="Icon" style="width: 30px;">
                    </div>
                    <p class="profile-id"><?= $user['student_id']; ?></p>
                    
                    <div class="profile-tags">
                        <?php foreach($tags as $tag): ?>
                            <div class="profile-tag" style="background: <?= $tag['tag_color']; ?>22; border-color: <?= $tag['tag_color']; ?>;">
                                <img src="/assets/icon/<?= $tag['tag_icon']; ?>" alt="Tag" style="width: 20px;">
                                <span style="color: #000;"><?= $tag['tag_name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                        
                        <!-- Default tags if empty -->
                        <?php if (empty($tags)): ?>
                            <div class="profile-tag" style="border-color: #ff4d4d; background: #ff4d4d11;">
                                <img src="/assets/icon/user.png" alt="Tag" style="width: 18px; filter: grayscale(1);">
                                <span>Experienced User</span>
                            </div>
                            <div class="profile-tag" style="border-color: #9c27b0; background: #9c27b011;">
                                <img src="/assets/icon/paint.png" alt="Tag" style="width: 18px;">
                                <span>Author</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-value"><?= $stats['following']; ?></span>
                        <span class="stat-label">Following</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value"><?= $stats['followers']; ?></span>
                        <span class="stat-label">Follower</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value"><?= $stats['total_likes']; ?></span>
                        <span class="stat-label">Like</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABS -->
        <div class="profile-tabs-wrap">
            <div class="profile-tabs">
                <div class="tab-item" onclick="switchTab('draft')">Draft</div>
                <div class="tab-item active" onclick="switchTab('your-art')">Your Art</div>
                <div class="tab-item" onclick="switchTab('favorite')">Favorite</div>
            </div>
        </div>

        <!-- GRID CONTENT -->
        <div class="profile-grid-container">
            <!-- Your Art Tab -->
            <div id="your-art" class="tab-content active">
                <div class="profile-art-grid">
                    <?php foreach($userArtworks as $art): ?>
                        <a href="/art/<?= $art['id']; ?>" class="art-card">
                            <div class="art-img-container">
                                <img src="/assets/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>">
                            </div>
                            <div class="art-info">
                                <p class="art-title"><?= $art['title']; ?></p>
                                <p class="art-author">Made by : <?= $art['author_name']; ?></p>
                                <div class="art-like">
                                    <img src="/assets/icon/like.png" class="art-like-img">
                                    <span><?= $art['like_count']; ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php if (empty($userArtworks)): ?>
                        <p style="grid-column: span 4; text-align: center; padding: 3rem; color: #999;">No artworks uploaded yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Favorite Tab -->
            <div id="favorite" class="tab-content">
                <div class="profile-art-grid">
                    <?php foreach($favorites as $art): ?>
                        <a href="/art/<?= $art['id']; ?>" class="art-card">
                            <div class="art-img-container">
                                <img src="/assets/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>">
                            </div>
                            <div class="art-info">
                                <p class="art-title"><?= $art['title']; ?></p>
                                <p class="art-author">Made by : <?= $art['author_name']; ?></p>
                                <div class="art-like liked">
                                    <img src="/assets/icon/like.png" class="art-like-img">
                                    <span><?= $art['like_count']; ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php if (empty($favorites)): ?>
                        <p style="grid-column: span 4; text-align: center; padding: 3rem; color: #999;">No favorite artworks yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Draft Tab (Static Placeholder) -->
            <div id="draft" class="tab-content">
                <p style="text-align: center; padding: 5rem; color: #999; font-size: 1.2rem;">Drafts are private and only visible to you.</p>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <!-- ... existing footer content ... -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script>
        function switchTab(tabId) {
            // Update Tab Buttons
            document.querySelectorAll('.tab-item').forEach(btn => {
                btn.classList.remove('active');
                if (btn.innerText.toLowerCase().replace(' ', '-') === tabId) {
                    btn.classList.add('active');
                }
            });

            // Update Tab Content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
        }

        function toggleFollow(userId) {
            // Future implementation for following
        }

        function toggleSettingsPopup() {
            const popup = document.getElementById('settingsPopup');
            popup.classList.toggle('active');
        }

        function toggleLogoutConfirm() {
            const popup = document.getElementById('logoutConfirmPopup');
            popup.classList.toggle('active');
        }
        </script>
    <script src="/js/script.js"></script>
</body>
</html>
