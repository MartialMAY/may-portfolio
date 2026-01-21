<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Parcours | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Parcours</h1>
        <a href="/testportfolio/admin" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-6xl mx-auto">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Management</span>
                <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Expériences & Formations</h2>
            </div>
            <a href="/testportfolio/admin/timeline/add" class="bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-gray-800 transition-all flex items-center gap-3">
                <i data-feather="plus" class="w-4 h-4"></i> Ajouter une étape
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Période</th>
                        <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre / Organisation</th>
                        <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie</th>
                        <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm">
                    <?php if (empty($items)): ?>
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-400 italic">Aucune donnée enregistrée</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($items as $item): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-6 font-bold whitespace-nowrap"><?php echo htmlspecialchars($item['period']); ?></td>
                                <td class="p-6">
                                    <div class="font-bold text-gray-900"><?php echo htmlspecialchars($item['title']); ?></div>
                                    <div class="text-[10px] text-blue-600 font-bold uppercase tracking-widest mt-1"><?php echo htmlspecialchars($item['organization']); ?></div>
                                </td>
                                <td class="p-6 capitalize text-xs font-medium text-gray-500"><?php echo $item['category']; ?></td>
                                <td class="p-6 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="/testportfolio/admin/timeline/edit?id=<?php echo $item['id']; ?>" class="p-2 bg-gray-50 rounded-full hover:bg-black hover:text-white transition-all">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>
                                        <a href="/testportfolio/admin/timeline/delete?id=<?php echo $item['id']; ?>" onclick="return confirm('Supprimer ?')" class="p-2 bg-gray-50 rounded-full hover:bg-red-500 hover:text-white transition-all text-red-500">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
