<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Artvault Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        body { font-family: 'Lato', sans-serif; background-color: #f8f9fa; }
        .title-font { font-family: 'Cinzel', serif; }
        .sidebar-gradient { background: linear-gradient(180deg, #1f3c88 0%, #162a61 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
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
            <a href="/admin" class="flex items-center gap-4 py-3.5 px-5 rounded-xl bg-white/10 text-[#f4c430] font-bold shadow-inner border border-white/5 transition">
                <i class="fa-solid fa-chart-line text-xl w-8"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/users" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                <i class="fa-solid fa-users text-xl w-8 group-hover:scale-110 transition"></i>
                <span>Manage Users</span>
            </a>
            <a href="/admin/artworks" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                <i class="fa-solid fa-palette text-xl w-8 group-hover:scale-110 transition"></i>
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
                <h2 class="title-font text-2xl font-bold text-[#1f3c88]">Dashboard</h2>
                <p class="text-sm text-gray-500">Welcome back, <?= $_SESSION['user_name']; ?>!</p>
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

        <!-- DASHBOARD CONTENT -->
        <div class="flex-1 overflow-y-auto p-10 space-y-10">
            
            <!-- STAT CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 border-l-[6px] border-[#1f3c88] card-hover flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase tracking-wider">Total Users</h3>
                        <p class="text-4xl font-black text-gray-800 mt-2"><?= $data['total_users']; ?></p>
                    </div>
                    <div class="w-16 h-16 bg-[#1f3c88]/5 rounded-2xl flex items-center justify-center text-[#1f3c88]">
                        <i class="fa-solid fa-users text-3xl"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 border-l-[6px] border-[#f4c430] card-hover flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase tracking-wider">Total Artworks</h3>
                        <p class="text-4xl font-black text-gray-800 mt-2"><?= $data['total_artworks']; ?></p>
                    </div>
                    <div class="w-16 h-16 bg-[#f4c430]/10 rounded-2xl flex items-center justify-center text-[#f4c430]">
                        <i class="fa-solid fa-palette text-3xl"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 border-l-[6px] border-green-500 card-hover flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase tracking-wider">System Status</h3>
                        <p class="text-4xl font-black text-green-600 mt-2">Active</p>
                    </div>
                    <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-500">
                        <i class="fa-solid fa-circle-check text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- WELCOME BANNER -->
            <div class="bg-white rounded-3xl shadow-sm p-12 border border-gray-100 relative overflow-hidden group">
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-[#1f3c88]/5 rounded-full group-hover:scale-110 transition duration-700"></div>
                <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-[#f4c430]/5 rounded-full group-hover:scale-110 transition duration-700"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-[#1f3c88] rounded-2xl flex items-center justify-center mb-6 shadow-xl shadow-[#1f3c88]/20">
                        <i class="fa-solid fa-shield-halved text-3xl text-[#f4c430]"></i>
                    </div>
                    <h3 class="title-font text-3xl font-bold text-[#1f3c88] mb-4">Artvault Control Center</h3>
                    <p class="text-gray-500 max-w-2xl leading-relaxed text-lg italic">
                        "Inspiring creativity and managing excellence." 
                    </p>
                    <div class="mt-8 flex gap-4">
                        <button class="bg-[#1f3c88] text-white px-8 py-3 rounded-full font-bold hover:bg-[#162a61] transition shadow-lg">System Logs</button>
                        <button class="bg-white border-2 border-[#1f3c88] text-[#1f3c88] px-8 py-3 rounded-full font-bold hover:bg-gray-50 transition">Settings</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
