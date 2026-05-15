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
        .modal-open { overflow: hidden; }
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
                            <h3 class="title-font text-xl font-bold text-gray-800 leading-tight"><?= htmlspecialchars($art['title']); ?></h3>
                            <div class="flex gap-2">
                                <button type="button"
                                        class="w-9 h-9 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        aria-label="Edit <?= htmlspecialchars($art['title']); ?>"
                                        onclick='openArtworkEditModal(<?= json_encode([
                                            'id' => $art['id'],
                                            'title' => $art['title'],
                                            'description' => $art['description'] ?? '',
                                            'category_id' => $art['category_id'] ?? '',
                                            'file_path' => $art['file_path'] ?? ''
                                        ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>)'>
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <a href="/admin/artworks/delete/<?= $art['id']; ?>" class="w-9 h-9 bg-red-50 text-red-600 rounded-xl flex items-center justify-center hover:bg-red-600 hover:text-white transition" onclick="return confirm('Erase this artwork?')">
                                    <i class="fa-solid fa-trash-can text-sm"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mt-auto">
                            <div class="flex items-center gap-3 text-sm text-gray-500 bg-gray-50 p-3 rounded-2xl border border-gray-100">
                                <i class="fa-solid fa-user-nib text-[#1f3c88]"></i>
                                <span class="font-bold text-gray-700"><?= htmlspecialchars($art['author_name']); ?></span>
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

    <div id="artworkEditModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/60 px-4 backdrop-blur-sm">
        <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between bg-[#1f3c88] px-8 py-5 text-white">
                <div>
                    <h3 class="title-font text-xl font-bold">Edit Artwork</h3>
                    <p class="text-xs text-white/70">Update gallery title, category, and description.</p>
                </div>
                <button type="button" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition" onclick="closeArtworkEditModal()" aria-label="Close edit panel">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form id="artworkEditForm" method="POST" enctype="multipart/form-data" class="p-8 grid gap-6 md:grid-cols-[180px_1fr]">
                <div class="space-y-3">
                    <div class="rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 h-44">
                        <img id="editArtworkPreview" src="" alt="" class="w-full h-full object-cover">
                    </div>
                    <label for="editArtworkImage" class="flex items-center justify-center gap-2 w-full rounded-xl bg-blue-50 px-4 py-3 text-sm font-black text-blue-600 hover:bg-blue-100 transition cursor-pointer">
                        <i class="fa-solid fa-image"></i>
                        Change Image
                    </label>
                    <input id="editArtworkImage" name="art_image" type="file" accept="image/png,image/jpeg" class="hidden" onchange="previewAdminArtworkImage(event)">
                </div>

                <div class="space-y-5">
                    <div>
                        <label for="editArtworkTitle" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Title</label>
                        <input id="editArtworkTitle" name="title" type="text" required class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                    </div>

                    <div>
                        <label for="editArtworkCategory" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Category</label>
                        <select id="editArtworkCategory" name="category_id" required class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['category_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="editArtworkDescription" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Description</label>
                        <textarea id="editArtworkDescription" name="description" rows="4" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-600 font-bold hover:bg-gray-200 transition" onclick="closeArtworkEditModal()">Cancel</button>
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#f4c430] text-[#1f3c88] font-black hover:bg-[#e7b728] transition shadow-sm">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const artworkEditModal = document.getElementById('artworkEditModal');
        const artworkEditForm = document.getElementById('artworkEditForm');

        function openArtworkEditModal(artwork) {
            artworkEditForm.action = `/admin/artworks/update/${artwork.id}`;
            document.getElementById('editArtworkTitle').value = artwork.title || '';
            document.getElementById('editArtworkDescription').value = artwork.description || '';
            document.getElementById('editArtworkCategory').value = artwork.category_id || '';
            document.getElementById('editArtworkPreview').src = `/img/gallery/${artwork.file_path || ''}`;
            document.getElementById('editArtworkPreview').alt = artwork.title || 'Artwork preview';
            document.getElementById('editArtworkImage').value = '';
            artworkEditModal.classList.remove('hidden');
            artworkEditModal.classList.add('flex');
            document.body.classList.add('modal-open');
        }

        function previewAdminArtworkImage(event) {
            const file = event.target.files[0];
            if (!file) {
                return;
            }

            document.getElementById('editArtworkPreview').src = URL.createObjectURL(file);
        }

        function closeArtworkEditModal() {
            artworkEditModal.classList.add('hidden');
            artworkEditModal.classList.remove('flex');
            document.body.classList.remove('modal-open');
        }

        artworkEditModal.addEventListener('click', function (event) {
            if (event.target === artworkEditModal) {
                closeArtworkEditModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !artworkEditModal.classList.contains('hidden')) {
                closeArtworkEditModal();
            }
        });
    </script>
</body>
</html>
