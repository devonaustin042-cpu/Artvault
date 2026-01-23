<?php
// index.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ARTVAULT | Home</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
    <div class="logo">ARTVAULT</div>

    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>

    <div class="auth-buttons">
        <button class="btn login">Login</button>
        <button class="btn register">Register</button>
    </div>
</nav>

<!-- ===== HOME SECTION ===== -->
<section id="home" class="home">
    <div class="home-content">
        <h1>ARTVAULT</h1>
        <h2>Pameran Digital Karya Siswa</h2>
        <p>
            Platform digital untuk menyimpan, menampilkan, dan mengelola karya siswa
            secara terpusat sebagai dokumentasi dan portofolio internal sekolah.
        </p>

        <div class="home-buttons">
            <button class="btn primary">Jelajahi Galeri</button>
            <button class="btn secondary">Mulai Sekarang</button>
        </div>
    </div>

    <div class="home-image">
        <img src="https://via.placeholder.com/450x300" alt="Art Preview">
    </div>
</section>

<script src="assets/js/main.js"></script>
</body>
</html>
