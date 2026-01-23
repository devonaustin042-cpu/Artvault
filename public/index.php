<?php
// contoh PHP sederhana (bisa dikembangkan nanti)
$title = "ArtVault - Home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <img src="img/logo.png" class="logo" alt="Logo">
    </div>

    <ul class="nav-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contact</a></li>
    </ul>

    <div class="nav-right">
        <button class="btn login">Log In</button>
        <button class="btn signup">Sign Up</button>
    </div>
</nav>

<!-- HERO / HOME SECTION -->
<section class="hero">
    <img src="img/banner.jpg" class="hero-img" alt="Banner">

    <div class="hero-overlay">
        <h1>ARTVAULT</h1>
        <p>Website that holds art made by our students.</p>
    </div>
</section>

<script src="assets/js/home.js"></script>
</body>
</html>
