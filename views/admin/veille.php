<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Veille | Admin</title>
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
            <a href="<?php echo url('/admin/bts'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="grid" class="w-4 h-4"></i> BTS SIO (E4)
            </a>
            <a href="<?php echo url('/admin/projects'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="layers" class="w-4 h-4"></i> Projets
            </a>
            <a href="<?php echo url('/admin/veille'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
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
                    <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Veille Technologique</h2>
                </div>
                <div class="flex gap-4">
                    <a href="<?php echo url('/admin/veille/sources'); ?>" class="bg-gray-100 text-gray-500 px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-200 transition-all flex items-center gap-3">
                        <i data-feather="settings" class="w-4 h-4"></i> Sources
                    </a>
                    <a href="<?php echo url('/admin/veille/rss'); ?>" class="bg-blue-600 text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-black transition-all flex items-center gap-3 shadow-lg shadow-blue-600/20">
                        <i data-feather="rss" class="w-4 h-4"></i> Importer
                    </a>
                    <a href="<?php echo url('/admin/veille/add'); ?>" class="bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-800 transition-all flex items-center gap-3">
                        <i data-feather="plus" class="w-4 h-4"></i> Ajouter
                    </a>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($articles as $art): ?>
                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm group">
                        <div class="h-48 overflow-hidden bg-gray-100">
                            <img src="<?php echo url($art['image_url']); ?>" alt="" class="w-full h-full object-cover">
                        </div>
                        <div class="p-8">
                            <span class="text-[9px] font-bold uppercase tracking-widest text-blue-600 block mb-2"><?php echo $art['category']; ?></span>
                            <h3 class="display-title text-xl font-bold mb-4 line-clamp-1"><?php echo htmlspecialchars($art['title']); ?></h3>
                            <div class="flex gap-4 pt-4 border-t border-gray-50">
                                <a href="<?php echo url('/admin/veille/edit?id=' . $art['id']); ?>" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-black hover:text-white transition-all">
                                    <i data-feather="edit-2" class="w-4 h-4"></i>
                                </a>
                                <a href="<?php echo url('/admin/veille/delete?id=' . $art['id']); ?>" onclick="return confirm('Supprimer cet article ?')" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-red-500 hover:text-white transition-all text-red-500">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
