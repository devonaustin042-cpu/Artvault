<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Artvault</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/assets/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>
        <ul class="nav-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/admin" class="active">Admin</a></li>
        </ul>
        <div class="nav-actions">
            <button class="btn btn-login" onclick="location.href='/logout'">Logout</button>
        </div>
    </nav>

    <main style="max-width: 1100px; margin: 4rem auto; padding: 0 1.5rem;">
        <h1 style="font-family: 'Cinzel', serif; font-size: 3rem; color: #1f3c88; margin-bottom: 1rem;">Admin Panel</h1>
        <p style="font-size: 1.2rem; color: #333;">Only flazened@ski.sch.id can access this page.</p>
    </main>
    <script src="/js/script.js"></script>
</body>
</html>
