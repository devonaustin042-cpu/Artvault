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
    <link rel="stylesheet" href="/app/resources/css/detail.css">
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
            <button class="btn btn-signup" onclick="location.href='/signin'">Sign Up</button>
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
                <img src="/img/gallery/trash-hunt.png" alt="Trash Hunt" class="art-detail-img">
            </div>
 
            <!-- Info -->
            <div class="art-detail-info">
                <h1 class="art-detail-title">Trash Hunt</h1>
                <p class="art-detail-author">by Viktor Wembu</p>
                <hr class="art-detail-divider">
 
                <p class="art-detail-label">Description :</p>
 
                <!-- Teks pendek -->
                <div class="art-desc-short">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Read For More...</button>
                </div>
 
                <!-- Teks panjang -->
                <div class="art-desc-full" id="descFull">
                    <p>The illustration titled "Trash Hunt" presents a vibrant and imaginative urban scene with a dynamic visual style...</p>
                    <button class="btn-read-more" onclick="toggleDesc()">Show Less</button>
                </div>

                <div class="art-detail-actions">
                    <button class="btn-edit" onclick="openEditWork()">Edit</button>
                    <span class="art-action-or">or</span>
                    <button class="btn-delete" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
 
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
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
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script src="/js/script.js"></script>
</body>
</html>