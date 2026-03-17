<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
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
            <a href="<?php echo url('/admin'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="home" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="<?php echo url('/admin/bts'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
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
            <a href="<?php echo url('/admin/settings'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="settings" class="w-4 h-4"></i> Paramètres
            </a>
            <div class="pt-6">
                <a href="<?php echo url('/'); ?>" target="_blank" class="flex items-center gap-3 p-3 text-blue-600 rounded-xl text-sm font-medium hover:bg-blue-50 transition-all">
                    <i data-feather="external-link" class="w-4 h-4"></i> Voir le site
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-12">
            <div class="mb-12">
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Statistiques</span>
                <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Bienvenue, <?php echo $_SESSION['admin']; ?></h2>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <i data-feather="layers"></i>
                    </div>
                    <span class="text-3xl font-bold display-title block mb-1"><?php echo $stats['projects_count']; ?></span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Projets publics</span>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <i data-feather="mail"></i>
                    </div>
                    <span class="text-3xl font-bold display-title block mb-1"><?php echo $stats['messages_count']; ?></span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Messages reçus</span>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <i data-feather="eye"></i>
                    </div>
                    <span class="text-3xl font-bold display-title block mb-1"><?php echo $stats['veille_count']; ?></span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Articles Veille</span>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 <?php echo $stats['security_alerts'] > 0 ? 'bg-red-50 text-red-600' : 'bg-gray-50 text-gray-400'; ?> rounded-2xl flex items-center justify-center mb-6">
                        <i data-feather="shield"></i>
                    </div>
                    <span class="text-3xl font-bold display-title block mb-1"><?php echo $stats['security_alerts']; ?></span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Alertes Sécurité</span>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Recent Activity -->
                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <h3 class="display-title text-xl font-bold uppercase tracking-tight">Activité Récente</h3>
                        <a href="<?php echo url('/admin/logs'); ?>" class="text-[10px] font-bold text-blue-600 uppercase tracking-widest hover:underline">Voir tout</a>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                        <div class="divide-y divide-gray-50">
                            <?php foreach ($recentLogs as $log): ?>
                            <div class="p-6 flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="activity" class="w-4 h-4 text-gray-400"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800"><?php echo htmlspecialchars($log['action']); ?></p>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">
                                        <?php echo date('d/m H:i', strtotime($log['created_at'])); ?> • <?php echo $log['module']; ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Last Messages -->
                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <h3 class="display-title text-xl font-bold uppercase tracking-tight">Derniers Messages</h3>
                        <a href="<?php echo url('/admin/messages'); ?>" class="text-[10px] font-bold text-blue-600 uppercase tracking-widest hover:underline">Voir tout</a>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                        <div class="divide-y divide-gray-50">
                            <?php if (empty($recentMessages)): ?>
                                <div class="p-12 text-center text-gray-400 italic text-sm">Aucun message.</div>
                            <?php endif; ?>
                            <?php foreach ($recentMessages as $msg): ?>
                            <div class="p-6 flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="mail" class="w-4 h-4 text-blue-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-gray-800 truncate"><?php echo htmlspecialchars($msg['name']); ?></p>
                                    <p class="text-xs text-gray-500 truncate"><?php echo htmlspecialchars($msg['message']); ?></p>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">
                                        <?php echo date('d/m', strtotime($msg['created_at'])); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
