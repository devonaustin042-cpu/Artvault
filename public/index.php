<?php
// contoh PHP sederhana (bisa dikembangkan nanti)
$title = "ArtVault - Home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="assets/css/s.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <img src="assets/image/logo.png" class="logo" alt="Logo">
    </div>

    <ul class="nav-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">Gallery</a></li>
        <li><a href="features.php">About</a></li>
        <li><a href="gallery.php">Contact</a></li>
    </ul>

    <div class="nav-right">
        <button class="btn login">Log In</button>
        <button class="btn signup">Sign Up</button>
    </div>
</nav>

<!-- HERO / HOME SECTION -->
 <div class="B1"><h1>.</h1></div>
<section class="hero">
    <img src="assets/image/Banner-Top.png" class="hero-img" alt="Banner">


<script src="assets/js/home.js"></script>
</body>
</html>
