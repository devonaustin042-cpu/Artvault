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
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/profile"><img src="/img/icon/user.png" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>

    <div class="profile-page">
        <!-- HEADER -->
        <div class="profile-header">
            <div class="profile-banner-wrap">
                <img src="/img/banner/<?= $user['banner_path']; ?>" alt="Banner" class="profile-banner">
            </div>
            
            <a href="javascript:history.back()" class="btn-back-profile">
                <img src="/img/icon/back.png" alt="Back">
            </a>

            <div class="profile-info-card">
                <div class="profile-avatar-wrap">
                    <img src="/img/icon/<?= $user['avatar_path']; ?>" alt="Avatar" class="profile-avatar">
                </div>
                <div class="profile-details">
                    <div class="profile-name-row">
                        <h1 class="profile-name"><?= $user['full_name']; ?></h1>
                        <img src="/img/icon/edu-con.png" alt="Icon" style="width: 30px;">
                    </div>
                    <p class="profile-id"><?= $user['student_id']; ?></p>
                    
                    <div class="profile-tags">
                        <?php foreach($tags as $tag): ?>
                            <div class="profile-tag" style="background: <?= $tag['tag_color']; ?>22; border-color: <?= $tag['tag_color']; ?>;">
                                <img src="/img/icon/<?= $tag['tag_icon']; ?>" alt="Tag" style="width: 20px;">
                                <span style="color: #000;"><?= $tag['tag_name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                        
                        <!-- Default tags if empty -->
                        <?php if (empty($tags)): ?>
                            <div class="profile-tag" style="border-color: #ff4d4d; background: #ff4d4d11;">
                                <img src="/img/icon/user.png" alt="Tag" style="width: 18px; filter: grayscale(1);">
                                <span>Experienced User</span>
                            </div>
                            <div class="profile-tag" style="border-color: #9c27b0; background: #9c27b011;">
                                <img src="/img/icon/paint.png" alt="Tag" style="width: 18px;">
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
                                <img src="/img/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>">
                            </div>
                            <div class="art-info">
                                <p class="art-title"><?= $art['title']; ?></p>
                                <p class="art-author">Made by : <?= $art['author_name']; ?></p>
                                <div class="art-like">
                                    <img src="/img/icon/like.png" class="art-like-img">
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
                                <img src="/img/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>">
                            </div>
                            <div class="art-info">
                                <p class="art-title"><?= $art['title']; ?></p>
                                <p class="art-author">Made by : <?= $art['author_name']; ?></p>
                                <div class="art-like liked">
                                    <img src="/img/icon/like.png" class="art-like-img">
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

        async function toggleFollow(userId) {
            // Future implementation for following
        }
    </script>
</body>
</html>
