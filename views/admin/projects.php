<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Projets | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
        .sidebar-link.active { background: black; color: white; }
        .project-card { cursor: grab; }
        .project-card:active { cursor: grabbing; }
        .sortable-ghost { opacity: 0.4; }
        .sortable-drag { opacity: 1; box-shadow: 0 20px 60px rgba(0,0,0,0.15); transform: rotate(1deg); }
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
            <a href="<?php echo url('/admin/projects'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
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
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Management</span>
                    <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Mes Projets</h2>
                    <p class="text-gray-400 text-sm mt-2 flex items-center gap-2">
                        <i data-feather="move" class="w-3 h-3"></i>
                        Glissez-déposez les cartes pour changer l'ordre d'affichage
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Save order button (hidden by default) -->
                    <button id="save-order-btn" onclick="saveOrder()" class="hidden bg-green-500 text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-green-600 transition-all flex items-center gap-3">
                        <i data-feather="check" class="w-4 h-4"></i> Sauvegarder l'ordre
                    </button>
                    <a href="<?php echo url('/admin/projects/add'); ?>" class="bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-800 transition-all flex items-center gap-3">
                        <i data-feather="plus" class="w-4 h-4"></i> Ajouter un projet
                    </a>
                </div>
            </div>

            <!-- Toast notification -->
            <div id="toast" class="fixed bottom-8 right-8 z-50 hidden">
                <div id="toast-inner" class="px-6 py-4 rounded-2xl text-sm font-bold text-white shadow-xl flex items-center gap-3">
                    <i id="toast-icon" class="w-4 h-4"></i>
                    <span id="toast-msg"></span>
                </div>
            </div>

            <div id="projects-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($projects as $proj): ?>
                    <div class="project-card bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm group transition-all hover:shadow-md"
                         data-id="<?php echo $proj['id']; ?>">
                        <!-- Drag handle indicator -->
                        <div class="flex items-center justify-between px-6 pt-4 pb-0">
                            <span class="text-[9px] font-bold uppercase tracking-widest text-gray-300 flex items-center gap-1">
                                <i data-feather="menu" class="w-3 h-3"></i> Glisser pour réordonner
                            </span>
                            <span class="text-[9px] font-bold text-gray-200">#<?php echo $proj['id']; ?></span>
                        </div>
                        <div class="h-48 overflow-hidden bg-gray-100 flex items-center justify-center text-gray-400 mx-4 mt-2 rounded-2xl">
                            <?php
                            $img_url = $proj['cover_image'] ?: explode('|', explode(',', $proj['image_url'])[0])[0];
                            ?>
                            <img src="<?php echo url(trim($img_url)); ?>" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 rounded-2xl" onerror="this.src='https://placehold.co/400x300?text=Indisponible'">
                        </div>
                        <div class="p-8">
                            <span class="text-[9px] font-bold uppercase tracking-widest text-blue-600 block mb-2"><?php echo $proj['category']; ?></span>
                            <h3 class="display-title text-xl font-bold mb-4"><?php echo htmlspecialchars($proj['title']); ?></h3>
                            <div class="flex gap-4 pt-4 border-t border-gray-50">
                                <a href="<?php echo url('/admin/projects/edit?id='); ?><?php echo $proj['id']; ?>" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-black hover:text-white transition-all">
                                    <i data-feather="edit-2" class="w-4 h-4"></i>
                                </a>
                                <a href="<?php echo url('/admin/projects/delete?id=' . $proj['id']); ?>" onclick="return confirm('Supprimer ce projet ?')" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-red-500 hover:text-white transition-all text-red-500">
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

        const grid = document.getElementById('projects-grid');
        const saveBtn = document.getElementById('save-order-btn');
        let orderChanged = false;

        const sortable = Sortable.create(grid, {
            animation: 200,
            ghostClass: 'sortable-ghost',
            dragClass: 'sortable-drag',
            onEnd: function() {
                orderChanged = true;
                saveBtn.classList.remove('hidden');
                feather.replace();
            }
        });

        function saveOrder() {
            const cards = grid.querySelectorAll('.project-card');
            const ids = Array.from(cards).map(c => parseInt(c.dataset.id));

            saveBtn.disabled = true;
            saveBtn.textContent = 'Sauvegarde...';

            fetch('<?php echo url('/admin/projects/reorder'); ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ ids })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    showToast('Ordre sauvegardé !', 'check', 'bg-green-500');
                    saveBtn.classList.add('hidden');
                    orderChanged = false;
                } else {
                    showToast('Erreur lors de la sauvegarde', 'x', 'bg-red-500');
                }
            })
            .catch(() => showToast('Erreur réseau', 'x', 'bg-red-500'))
            .finally(() => {
                saveBtn.disabled = false;
                saveBtn.innerHTML = '<i data-feather="check" class="w-4 h-4"></i> Sauvegarder l\'ordre';
                feather.replace();
            });
        }

        function showToast(msg, icon, colorClass) {
            const toast = document.getElementById('toast');
            const inner = document.getElementById('toast-inner');
            const iconEl = document.getElementById('toast-icon');
            document.getElementById('toast-msg').textContent = msg;
            inner.className = `px-6 py-4 rounded-2xl text-sm font-bold text-white shadow-xl flex items-center gap-3 ${colorClass}`;
            iconEl.setAttribute('data-feather', icon);
            feather.replace();
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 3000);
        }

        window.addEventListener('beforeunload', function(e) {
            if (orderChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>
