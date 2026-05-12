<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks - Artvault Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        body { font-family: 'Lato', sans-serif; background-color: #f8f9fa; }
        .title-font { font-family: 'Cinzel', serif; }
        .sidebar-gradient { background: linear-gradient(180deg, #1f3c88 0%, #162a61 100%); }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-72 sidebar-gradient text-white flex flex-col shadow-2xl z-50">
        <div class="p-8 text-center border-b border-white/10">
            <img src="/img/logo/Artvault-white.png" alt="Logo" class="w-28 mx-auto mb-4 drop-shadow-lg">
            <h1 class="title-font text-2xl font-bold tracking-widest text-[#f4c430]">ADMIN</h1>
        </div>
        
        <nav class="flex-1 px-6 py-8 space-y-4 overflow-y-auto">
            <a href="/admin" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                <i class="fa-solid fa-chart-line text-xl w-8 group-hover:scale-110 transition"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/users" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                <i class="fa-solid fa-users text-xl w-8 group-hover:scale-110 transition"></i>
                <span>Manage Users</span>
            </a>
            <a href="/admin/artworks" class="flex items-center gap-4 py-3.5 px-5 rounded-xl bg-white/10 text-[#f4c430] font-bold shadow-inner border border-white/5 transition">
                <i class="fa-solid fa-palette text-xl w-8"></i>
                <span>Manage Arts</span>
            </a>
            <div class="pt-8 border-t border-white/10">
                <a href="/" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                    <i class="fa-solid fa-house text-xl w-8"></i>
                    <span>View Website</span>
                </a>
            </div>
        </nav>

        <div class="p-6 border-t border-white/10 bg-black/10 text-center">
            <a href="/logout" class="flex items-center justify-center gap-3 py-3 px-6 rounded-xl bg-red-500/80 hover:bg-red-600 text-white font-bold transition shadow-lg">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col overflow-hidden">
        
        <!-- HEADER -->
        <header class="h-24 bg-white border-b border-gray-200 px-10 flex justify-between items-center shadow-sm">
            <div class="flex flex-col">
                <h2 class="title-font text-2xl font-bold text-[#1f3c88]">Manage Artworks</h2>
                <p class="text-sm text-gray-500">Exhibition gallery control.</p>
            </div>
            <div class="flex items-center gap-6 bg-gray-50 px-6 py-2.5 rounded-full border border-gray-100 shadow-sm">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800 leading-none"><?= $_SESSION['user_name']; ?></p>
                    <p class="text-[10px] uppercase tracking-widest text-[#1f3c88] font-bold mt-1">Super Admin</p>
                </div>
                <div class="w-12 h-12 rounded-full border-2 border-[#f4c430] p-0.5 shadow-md">
                    <img src="/img/icon/user.png" alt="Admin" class="w-full h-full rounded-full object-cover">
                </div>
            </div>
        </header>

        <!-- GRID CONTENT -->
        <div class="flex-1 overflow-y-auto p-10">
            <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-8">
                <?php foreach ($data['artworks'] as $art): ?>
                <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition duration-500 flex flex-col">
                    <!-- Image Preview -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="/img/gallery/<?= $art['file_path']; ?>" alt="<?= $art['title']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                            <span class="text-white text-xs font-bold tracking-widest uppercase">ID: #<?= $art['id']; ?></span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="title-font text-xl font-bold text-gray-800 leading-tight"><?= $art['title']; ?></h3>
                            <div class="flex gap-2">
                                <a href="/admin/artworks/edit/<?= $art['id']; ?>" class="w-9 h-9 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </a>
                                <a href="/admin/artworks/delete/<?= $art['id']; ?>" class="w-9 h-9 bg-red-50 text-red-600 rounded-xl flex items-center justify-center hover:bg-red-600 hover:text-white transition" onclick="return confirm('Erase this artwork?')">
                                    <i class="fa-solid fa-trash-can text-sm"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mt-auto">
                            <div class="flex items-center gap-3 text-sm text-gray-500 bg-gray-50 p-3 rounded-2xl border border-gray-100">
                                <i class="fa-solid fa-user-nib text-[#1f3c88]"></i>
                                <span class="font-bold text-gray-700"><?= $art['author_name']; ?></span>
                            </div>
                            <div class="flex items-center gap-3 text-xs text-gray-400 pl-3">
                                <i class="fa-regular fa-clock"></i>
                                <span>Uploaded on <?= date('M d, Y', strtotime($art['upload_time'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

</body>
</html>
