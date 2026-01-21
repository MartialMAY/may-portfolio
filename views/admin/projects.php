<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Projets | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
    </style>
</head>
<body class="bg-[#f8f8f8]">
    <nav class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center fixed top-0 w-full z-50">
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Projets</h1>
        <a href="/testportfolio/admin" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-6xl mx-auto">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Management</span>
                <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Mes Projets</h2>
            </div>
            <a href="/testportfolio/admin/projects/add" class="bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-800 transition-all flex items-center gap-3">
                <i data-feather="plus" class="w-4 h-4"></i> Ajouter un projet
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $proj): ?>
                <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm group">
                    <div class="h-48 overflow-hidden bg-gray-100">
                        <img src="/testportfolio/<?php echo $proj['image_url']; ?>" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-8">
                        <span class="text-[9px] font-bold uppercase tracking-widest text-blue-600 block mb-2"><?php echo $proj['category']; ?></span>
                        <h3 class="display-title text-xl font-bold mb-4"><?php echo htmlspecialchars($proj['title']); ?></h3>
                        <div class="flex gap-4 pt-4 border-t border-gray-50">
                            <a href="/testportfolio/admin/projects/edit?id=<?php echo $proj['id']; ?>" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-black hover:text-white transition-all">
                                <i data-feather="edit-2" class="w-4 h-4"></i>
                            </a>
                            <a href="/testportfolio/admin/projects/delete?id=<?php echo $proj['id']; ?>" onclick="return confirm('Supprimer ce projet ?')" class="flex-1 flex justify-center p-3 bg-gray-50 rounded-xl hover:bg-red-500 hover:text-white transition-all text-red-500">
                                <i data-feather="trash-2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
