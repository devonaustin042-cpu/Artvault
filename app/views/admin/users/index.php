<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Artvault Admin</title>
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
            <img src="/assets/logo/Artvault-white.png" alt="Logo" class="w-28 mx-auto mb-4 drop-shadow-lg">
            <h1 class="title-font text-2xl font-bold tracking-widest text-[#f4c430]">ADMIN</h1>
        </div>
        
        <nav class="flex-1 px-6 py-8 space-y-4 overflow-y-auto">
            <a href="/admin" class="flex items-center gap-4 py-3.5 px-5 rounded-xl hover:bg-white/5 text-gray-300 hover:text-white transition group">
                <i class="fa-solid fa-chart-line text-xl w-8 group-hover:scale-110 transition"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/users" class="flex items-center gap-4 py-3.5 px-5 rounded-xl bg-white/10 text-[#f4c430] font-bold shadow-inner border border-white/5 transition">
                <i class="fa-solid fa-users text-xl w-8"></i>
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
                <h2 class="title-font text-2xl font-bold text-[#1f3c88]">Manage Users</h2>
                <p class="text-sm text-gray-500">View and manage system accounts.</p>
            </div>
            <div class="flex items-center gap-6 bg-gray-50 px-6 py-2.5 rounded-full border border-gray-100 shadow-sm">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800 leading-none"><?= $_SESSION['user_name']; ?></p>
                    <p class="text-[10px] uppercase tracking-widest text-[#1f3c88] font-bold mt-1">Super Admin</p>
                </div>
                <div class="w-12 h-12 rounded-full border-2 border-[#f4c430] p-0.5 shadow-md">
                    <img src="/assets/icon/user.png" alt="Admin" class="w-full h-full rounded-full object-cover">
                </div>
            </div>
        </header>

        <!-- TABLE CONTENT -->
        <div class="flex-1 overflow-y-auto p-10">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#1f3c88] text-white">
                        <tr>
                            <th class="px-8 py-5 title-font tracking-wider uppercase text-sm font-bold">Identity</th>
                            <th class="px-8 py-5 title-font tracking-wider uppercase text-sm font-bold">Email</th>
                            <th class="px-8 py-5 title-font tracking-wider uppercase text-sm font-bold">Account Role</th>
                            <th class="px-8 py-5 title-font tracking-wider uppercase text-sm font-bold">Joined Date</th>
                            <th class="px-8 py-5 title-font tracking-wider uppercase text-sm font-bold text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($data['users'] as $user): ?>
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="block font-bold text-gray-800 break-words"><?= htmlspecialchars($user['full_name']); ?></span>
                                        <span class="block text-xs font-bold text-gray-400">ID: <?= htmlspecialchars($user['student_id'] ?? ''); ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-gray-600 italic">
                                <?= htmlspecialchars($user['email']); ?>
                            </td>
                            <td class="px-8 py-6">
                                <?php if ($user['role'] === 'admin'): ?>
                                    <span class="bg-red-50 text-red-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest border border-red-100">Admin</span>
                                <?php elseif ($user['role'] === 'author'): ?>
                                    <span class="bg-green-50 text-green-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest border border-green-100">Author</span>
                                <?php else: ?>
                                    <span class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest border border-blue-100">Viewer</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-500">
                                <i class="fa-regular fa-calendar-days mr-2"></i>
                                <?= date('M d, Y', strtotime($user['created_at'])); ?>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center gap-3">
                                    <button type="button"
                                            class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"
                                            aria-label="Edit <?= htmlspecialchars($user['full_name']); ?>"
                                            onclick='openUserEditModal(<?= json_encode([
                                                'id' => $user['id'],
                                                'full_name' => $user['full_name'],
                                                'email' => $user['email'],
                                                'student_id' => $user['student_id'] ?? '',
                                                'role' => $user['role']
                                            ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>)'>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <?php if ($user['role'] !== 'admin'): ?>
                                        <a href="/admin/users/delete/<?= $user['id']; ?>" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl flex items-center justify-center hover:bg-red-600 hover:text-white transition shadow-sm" onclick="return confirm('Erase this user account?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="w-10 h-10 bg-gray-50 text-gray-300 rounded-xl flex items-center justify-center shadow-sm" title="Admin deletion is locked">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="userEditModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/60 px-4 backdrop-blur-sm">
        <div class="w-full max-w-xl rounded-2xl bg-white shadow-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between bg-[#1f3c88] px-8 py-5 text-white">
                <div>
                    <h3 class="title-font text-xl font-bold">Edit User</h3>
                    <p class="text-xs text-white/70">Update account identity and access role.</p>
                </div>
                <button type="button" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition" onclick="closeUserEditModal()" aria-label="Close edit panel">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form id="userEditForm" method="POST" class="p-8 space-y-5">
                <div>
                    <label for="editFullName" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Full Name</label>
                    <input id="editFullName" name="full_name" type="text" required class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                </div>

                <div>
                    <label for="editEmail" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Email</label>
                    <input id="editEmail" name="email" type="email" required class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                </div>

                <div>
                    <label for="editStudentId" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Student ID</label>
                    <input id="editStudentId" name="student_id" type="text" required minlength="8" maxlength="20" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                </div>

                <div>
                    <label for="editRole" class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Role</label>
                    <select id="editRole" name="role" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-800 outline-none focus:border-[#1f3c88] focus:ring-4 focus:ring-blue-50">
                        <option value="viewer">Viewer</option>
                        <option value="author">Author</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 pt-3">
                    <button type="button" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-600 font-bold hover:bg-gray-200 transition" onclick="closeUserEditModal()">Cancel</button>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-[#f4c430] text-[#1f3c88] font-black hover:bg-[#e7b728] transition shadow-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const userEditModal = document.getElementById('userEditModal');
        const userEditForm = document.getElementById('userEditForm');

        function openUserEditModal(user) {
            userEditForm.action = `/admin/users/update/${user.id}`;
            document.getElementById('editFullName').value = user.full_name || '';
            document.getElementById('editEmail').value = user.email || '';
            document.getElementById('editStudentId').value = user.student_id || '';
            document.getElementById('editRole').value = user.role || 'viewer';
            userEditModal.classList.remove('hidden');
            userEditModal.classList.add('flex');
            document.body.classList.add('modal-open');
        }

        function closeUserEditModal() {
            userEditModal.classList.add('hidden');
            userEditModal.classList.remove('flex');
            document.body.classList.remove('modal-open');
        }

        userEditModal.addEventListener('click', function (event) {
            if (event.target === userEditModal) {
                closeUserEditModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !userEditModal.classList.contains('hidden')) {
                closeUserEditModal();
            }
        });
    </script>
    <script src="/js/script.js"></script>
</body>
</html>
