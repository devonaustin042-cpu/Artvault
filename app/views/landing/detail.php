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
                    <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === 'flazened@ski.sch.id'): ?>
                        <li><a href="/">Home</a></li>
                        <li><a href="/gallery" class="active">Gallery</a></li>
                        <li><a href="/admin">Admin</a></li>
                    <?php else: ?>
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
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
                <img src="/img/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>" class="art-detail-img">
            </div>
 
            <!-- Info -->
            <div class="art-detail-info">
                <div class="art-detail-title-row">
                    <h1 class="art-detail-title"><?= $art['title']; ?></h1>
                    <div class="art-detail-likes <?= $isLiked ? 'liked' : '' ?>" onclick="toggleLike(<?= $art['id']; ?>, this)">
                        <img src="/img/icon/like.png" alt="Like">
                        <span><?= $art['like_count']; ?></span>
                    </div>
                </div>
                <p class="art-detail-author">by: <?= $art['author_name']; ?></p>
                <hr class="art-detail-divider">
 
                <p class="art-detail-label">Description :</p>
 
                <!-- Teks pendek -->
                <div class="art-desc-short" id="descShort">
                    <p><?= substr($art['description'], 0, 150); ?>...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Read For More...</button>
                </div>
 
                <!-- Teks panjang -->
                <div class="art-desc-full" id="descFull" style="display:none;">
                    <p><?= $art['description']; ?></p>
                    <button class="btn-read-more" onclick="toggleDesc()">Show Less</button>
                </div>

                <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $art['user_id'] || $_SESSION['user_role'] === 'admin')): ?>
                <div class="art-detail-actions">
                    <button class="btn-edit" onclick="openEditWork()">Edit</button>
                    <span class="art-action-or">or</span>
                    <button class="btn-delete" onclick="confirmDelete(<?= $art['id']; ?>)">Delete</button>
                </div>

                <!-- POPUP EDIT WORK -->
                <div class="add-work-overlay" id="editWorkOverlay">
                    <div class="add-work-popup">
                        <div class="add-work-header">
                            <img src="/img/logo/Artvault-white.png" alt="Artvault Logo" class="add-work-logo">
                            <div class="header-user-icon">
                                <img src="/img/icon/user.png" alt="User">
                            </div>
                        </div>

                        <div class="add-work-container">
                            <form action="/art/update/<?= $art['id']; ?>" method="POST" enctype="multipart/form-data" class="add-work-form">
                                <!-- Upload Section -->
                                <div class="upload-section">
                                    <div class="upload-preview-box" onclick="document.getElementById('editFileInput').click()">
                                        <input type="file" name="art_image" id="editFileInput" accept="image/*" style="display:none" onchange="previewEditImage(event)">
                                        <img id="editPreviewImg" src="/img/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>" style="display:block;">
                                        <button type="button" class="btn-add-photo">Change photo</button>
                                    </div>
                                </div>

                                <!-- Inputs Section -->
                                <div class="form-inputs">
                                    <div class="input-group">
                                        <input type="text" name="title" placeholder="Title..." value="<?= $art['title']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <textarea name="description" placeholder="Description..." rows="5"><?= $art['description']; ?></textarea>
                                    </div>
                                    <div class="input-group">
                                        <label>Category</label>
                                        <div class="select-wrapper">
                                            <select name="category_id">
                                                <option value="">No Category</option>
                                                <?php foreach($categories as $cat): ?>
                                                    <option value="<?= $cat['id']; ?>" <?= $art['category_id'] == $cat['id'] ? 'selected' : ''; ?>>
                                                        <?= $cat['category_name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="form-actions">
                                    <button type="submit" class="btn-submit-art">Save Changes</button>
                                    <span class="action-or">Or</span>
                                    <button type="button" class="btn-cancel-art" onclick="closeEditWork()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
 
        </div>

        <!-- COMMENT SECTION -->
        <div class="comment-section">
            <h3 class="comment-heading">Comments (<?= count($comments); ?>)</h3>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="/art/comment/<?= $art['id']; ?>" method="POST" class="comment-form" id="mainCommentForm">
                    <div class="comment-input-wrap">
                        <img src="/img/icon/user.png" alt="User" class="comment-user-avatar">
                        <div class="textarea-container">
                            <textarea name="comment_text" id="mainCommentText" placeholder="Add a comment..." required></textarea>
                            <div class="emoji-picker">
                                <span onclick="addEmoji('😀', 'mainCommentText')">😀</span>
                                <span onclick="addEmoji('😍', 'mainCommentText')">😍</span>
                                <span onclick="addEmoji('🔥', 'mainCommentText')">🔥</span>
                                <span onclick="addEmoji('👏', 'mainCommentText')">👏</span>
                                <span onclick="addEmoji('🎨', 'mainCommentText')">🎨</span>
                                <span onclick="addEmoji('❤️', 'mainCommentText')">❤️</span>
                                <span onclick="addEmoji('✨', 'mainCommentText')">✨</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-post-comment">Post Comment</button>
                </form>
            <?php else: ?>
                <p class="login-to-comment">Please <a href="/login">Log In</a> to leave a comment.</p>
            <?php endif; ?>

            <div class="comments-list">
                <?php 
                // Separate parents and children
                $parents = array_filter($comments, function($c) { return is_null($c['parent_id']); });
                $children = array_filter($comments, function($c) { return !is_null($c['parent_id']); });
                
                foreach($parents as $comment): ?>
                    <div class="comment-group">
                        <div class="comment-item" id="comment-<?= $comment['id']; ?>">
                            <img src="/img/icon/user.png" alt="User" class="comment-avatar">
                            <div class="comment-content">
                                <div class="comment-header">
                                    <span class="comment-author"><?= $comment['user_name']; ?></span>
                                    <span class="comment-date"><?= date('M d, Y', strtotime($comment['created_at'])); ?></span>
                                </div>
                                <p class="comment-text"><?= nl2br(htmlspecialchars($comment['comment_text'])); ?></p>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <button class="btn-reply-toggle" onclick="toggleReplyForm(<?= $comment['id']; ?>)">Reply</button>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Reply Form (Hidden) -->
                        <div id="reply-form-<?= $comment['id']; ?>" class="reply-form-container" style="display: none;">
                            <form action="/art/comment/<?= $art['id']; ?>" method="POST" class="comment-form reply-form">
                                <input type="hidden" name="parent_id" value="<?= $comment['id']; ?>">
                                <div class="comment-input-wrap">
                                    <textarea name="comment_text" id="replyText-<?= $comment['id']; ?>" placeholder="Reply to <?= $comment['user_name']; ?>..." required></textarea>
                                    <div class="emoji-picker">
                                        <span onclick="addEmoji('😀', 'replyText-<?= $comment['id']; ?>')">😀</span>
                                        <span onclick="addEmoji('😍', 'replyText-<?= $comment['id']; ?>')">😍</span>
                                        <span onclick="addEmoji('🔥', 'replyText-<?= $comment['id']; ?>')">🔥</span>
                                        <span onclick="addEmoji('👏', 'replyText-<?= $comment['id']; ?>')">👏</span>
                                    </div>
                                </div>
                                <div class="reply-actions">
                                    <button type="submit" class="btn-post-comment btn-sm">Post Reply</button>
                                    <button type="button" class="btn-cancel-reply" onclick="toggleReplyForm(<?= $comment['id']; ?>)">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <!-- Sub-comments (Replies) -->
                        <div class="replies-list">
                            <?php 
                            $replies = array_filter($children, function($c) use ($comment) { return $c['parent_id'] == $comment['id']; });
                            foreach($replies as $reply): ?>
                                <div class="comment-item reply-item">
                                    <img src="/img/icon/user.png" alt="User" class="comment-avatar sm">
                                    <div class="comment-content">
                                        <div class="comment-header">
                                            <span class="comment-author"><?= $reply['user_name']; ?></span>
                                            <span class="comment-date"><?= date('M d, Y', strtotime($reply['created_at'])); ?></span>
                                        </div>
                                        <p class="comment-text"><?= nl2br(htmlspecialchars($reply['comment_text'])); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if (empty($parents)): ?>
                    <p class="no-comments">No comments yet. Be the first to comment!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- VIEW OTHER ART -->
    <div class="view-other-bar">
        <h3>View other art too!</h3>
    </div>

    <div class="other-artworks-container">
        <div class="other-artworks-grid">
            <?php foreach($otherArtworks as $other): ?>
            <a href="/art/<?= $other['id']; ?>" class="other-art-card">
                <div class="other-art-img-wrap">
                    <img src="/img/gallery/<?= $other['file_path']; ?>" alt="<?= $other['title']; ?>">
                </div>
                <div class="other-art-info">
                    <h4><?= $other['title']; ?></h4>
                    <p>Made by: <?= $other['author_name']; ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

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

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script>
        function toggleDesc() {
            const short = document.getElementById('descShort');
            const full = document.getElementById('descFull');
            if (full.style.display === 'none') {
                full.style.display = 'block';
                short.style.display = 'none';
            } else {
                full.style.display = 'none';
                short.style.display = 'block';
            }
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

        function openEditWork() {
            document.getElementById('editWorkOverlay').classList.add('active');
        }

        function closeEditWork() {
            document.getElementById('editWorkOverlay').classList.remove('active');
        }

        function previewEditImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            const preview = document.getElementById('editPreviewImg');
            preview.src = URL.createObjectURL(file);
        }

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this artwork? This action cannot be undone.')) {
                location.href = '/art/delete/' + id;
            }
        }

        function toggleReplyForm(commentId) {
            const form = document.getElementById('reply-form-' + commentId);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function addEmoji(emoji, targetId) {
            const textarea = document.getElementById(targetId);
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            textarea.value = text.substring(0, start) + emoji + text.substring(end);
            textarea.focus();
            textarea.selectionStart = textarea.selectionEnd = start + emoji.length;
        }
    </script>
    <script src="/js/script.js"></script>
</body>
</html>
