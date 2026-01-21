<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item ? 'Modifier' : 'Ajouter'; ?> Etape | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Edition Parcours</h1>
        <a href="/testportfolio/admin/timeline" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <form method="POST" class="space-y-12">
            <input type="hidden" name="id" value="<?php echo $item['id'] ?? ''; ?>">
            
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-4 block">Détails de l'étape</span>
                    <div class="space-y-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Intitulé (Titre)</label>
                                <input type="text" name="title" required value="<?php echo htmlspecialchars($item['title'] ?? ''); ?>" placeholder="Ex: Développeur Web" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Organisation / Ecole</label>
                                <input type="text" name="organization" required value="<?php echo htmlspecialchars($item['organization'] ?? ''); ?>" placeholder="Ex: Lycée Janetti" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Période</label>
                                <input type="text" name="period" required value="<?php echo htmlspecialchars($item['period'] ?? ''); ?>" placeholder="Ex: 2023 - 2025" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie</label>
                                <select name="category" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                                    <option value="formation" <?php echo (isset($item['category']) && $item['category'] == 'formation') ? 'selected' : ''; ?>>Formation</option>
                                    <option value="experience" <?php echo (isset($item['category']) && $item['category'] == 'experience') ? 'selected' : ''; ?>>Expérience</option>
                                    <option value="certification" <?php echo (isset($item['category']) && $item['category'] == 'certification') ? 'selected' : ''; ?>>Certification</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description (Optionnel)</label>
                            <textarea name="description" rows="4" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($item['description'] ?? ''); ?></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Ordre d'affichage</label>
                            <input type="number" name="display_order" value="<?php echo $item['display_order'] ?? 0; ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                    </div>
                </div>

                <div class="pt-8 text-right">
                    <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                        Enregistrer l'étape
                    </button>
                </div>
            </div>
        </form>
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
