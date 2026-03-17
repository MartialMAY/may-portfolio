<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion CV | Admin</title>
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
            <a href="<?php echo url('/admin/veille'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="eye" class="w-4 h-4"></i> Veille Tech
            </a>
            <a href="<?php echo url('/admin/timeline'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="calendar" class="w-4 h-4"></i> Parcours
            </a>
            <a href="<?php echo url('/admin/cv'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
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
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Management</span>
                <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Mise à jour du CV</h2>
            </div>

            <?php if (isset($success)): ?>
                <div class="mb-8 p-6 bg-green-50 text-green-600 border border-green-100 rounded-[2rem] flex items-center gap-4">
                    <i data-feather="check-circle" class="w-6 h-6"></i>
                    <span class="font-bold uppercase tracking-widest text-xs"><?php echo $success; ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
                <?php echo \App\Core\Security::csrfField(); ?>
                <!-- PDF Upload -->
                <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mb-4">
                        <i data-feather="file" class="w-10 h-10"></i>
                    </div>
                    <h3 class="display-title text-2xl font-bold uppercase tracking-tight">Format PDF</h3>
                    <p class="text-xs text-gray-400 leading-relaxed italic">Utilisé pour le bouton de téléchargement direct sur le site.</p>
                    
                    <div class="w-full">
                        <label class="block w-full cursor-pointer bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-6 hover:border-black transition-all">
                            <input type="file" name="cv_pdf" class="hidden" onchange="this.form.submit()">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Choisir le fichier PDF</span>
                        </label>
                    </div>
                </div>

                <!-- JPG Upload -->
                <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-500 rounded-3xl flex items-center justify-center mb-4">
                        <i data-feather="image" class="w-10 h-10"></i>
                    </div>
                    <h3 class="display-title text-2xl font-bold uppercase tracking-tight">Format JPG</h3>
                    <p class="text-xs text-gray-400 leading-relaxed italic">Utilisé pour l'aperçu visuel dans le modal "À Propos".</p>
                    
                    <div class="w-full">
                        <label class="block w-full cursor-pointer bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-6 hover:border-black transition-all">
                            <input type="file" name="cv_jpg" class="hidden" onchange="this.form.submit()">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Choisir l'image JPG</span>
                        </label>
                    </div>
                </div>
            </form>

            <div class="mt-12 p-8 bg-black text-white rounded-[2rem] flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                        <i data-feather="info" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm uppercase tracking-widest">Aperçu en direct</h4>
                        <p class="text-[10px] text-gray-500 mt-1 uppercase tracking-tight">Les fichiers seront renommés automatiquement</p>
                    </div>
                </div>
                <a href="<?php echo url('/assets/CV_Martial_MAYAMOU.pdf'); ?>" target="_blank" class="px-6 py-3 bg-white text-black text-[10px] font-bold uppercase tracking-widest rounded-full hover:bg-gray-200 transition-all">Vérifier le PDF</a>
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
