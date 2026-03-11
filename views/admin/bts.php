<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS SIO E4 | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
        .sidebar-link.active { background: black; color: white; }
    </style>
</head>
<body class="bg-[#f8f8f8]">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center fixed top-0 w-full z-50">
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Admin Panel</h1>
        <div class="flex items-center gap-6">
            <span class="text-xs font-bold uppercase tracking-widest text-gray-400"><?php echo $_SESSION['admin']; ?></span>
            <a href="<?php echo url('/logout'); ?>" class="text-red-500 hover:text-red-700 transition-colors">
                <i data-feather="log-out" class="w-5 h-5"></i>
            </a>
        </div>
    </nav>

    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-100 h-[calc(100vh-80px)] fixed left-0 overflow-y-auto p-6 space-y-2">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 block">Navigation</span>
            <a href="<?php echo url('/admin'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="home" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="<?php echo url('/admin/bts'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="grid" class="w-4 h-4"></i> BTS SIO (E4)
            </a>
            <a href="<?php echo url('/admin/projects'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="layers" class="w-4 h-4"></i> Projets
            </a>
            <a href="<?php echo url('/admin/veille'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="eye" class="w-4 h-4"></i> Veille Tech
            </a>
            <a href="<?php echo url('/admin/timeline'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="calendar" class="w-4 h-4"></i> Parcours
            </a>
            <a href="<?php echo url('/admin/cv'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="file-text" class="w-4 h-4"></i> Mon CV
            </a>
            <a href="<?php echo url('/admin/messages'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="mail" class="w-4 h-4"></i> Messages
            </a>
            <a href="<?php echo url('/admin/logs'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="activity" class="w-4 h-4"></i> Journal (Logs)
            </a>
            <div class="pt-6">
                <a href="<?php echo url('/'); ?>" target="_blank" class="flex items-center gap-3 p-3 text-blue-600 rounded-xl text-sm font-medium hover:bg-blue-50 transition-all">
                    <i data-feather="external-link" class="w-4 h-4"></i> Voir le site
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-12">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Management</span>
                    <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Tableau BTS SIO</h2>
                </div>
                <a href="<?php echo url('/admin/bts/add'); ?>" class="bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-800 transition-all flex items-center gap-3">
                    <i data-feather="plus" class="w-4 h-4"></i>
                    Ajouter une réalisation
                </a>
            </div>

            <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Période</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Type</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Compétences</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        <?php foreach ($realisations as $real): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-6 font-bold"><?php echo htmlspecialchars($real['title']); ?></td>
                                <td class="p-6 text-gray-500 uppercase text-[10px]"><?php echo htmlspecialchars($real['periode']); ?></td>
                                <td class="p-6">
                                    <span class="px-3 py-1 bg-gray-100 rounded-full text-[9px] font-bold uppercase tracking-widest">
                                        <?php echo $real['type']; ?>
                                    </span>
                                </td>
                                <td class="p-6">
                                    <div class="flex gap-1">
                                        <span class="w-5 h-5 rounded-full flex items-center justify-center bg-blue-100 text-blue-600 text-[10px] font-bold">
                                            <?php echo count($real['competence_ids']); ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="p-6 text-right">
                                    <div class="flex justify-end gap-4">
                                        <a href="<?php echo url('/admin/bts/edit?id=' . $real['id']); ?>" class="p-2 bg-gray-100 rounded-full hover:bg-black hover:text-white transition-all">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>
                                        <a href="<?php echo url('/admin/bts/delete?id=' . $real['id']); ?>" onclick="return confirm('Supprimer ?')" class="p-2 bg-gray-100 rounded-full hover:bg-red-500 hover:text-white transition-all text-red-500">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
