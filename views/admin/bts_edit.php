<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $realisation ? 'Modifier' : 'Ajouter'; ?> Réalisation | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Edition BTS</h1>
        <a href="<?php echo url('/admin'); ?>" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black transition-colors">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <form method="POST" class="space-y-12">
            <?php echo \App\Core\Security::csrfField(); ?>
            <input type="hidden" name="id" value="<?php echo $realisation['id'] ?? ''; ?>">
            
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-4 block">Informations Générales</span>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre de la réalisation</label>
                            <input type="text" name="title" required value="<?php echo htmlspecialchars($realisation['title'] ?? ''); ?>" placeholder="Ex: Développement module PHP" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Période</label>
                            <input type="text" name="periode" required value="<?php echo htmlspecialchars($realisation['periode'] ?? ''); ?>" placeholder="Ex: Oct 2023 - Nov 2023" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Type de parcours</label>
                            <select name="type" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                                <option value="formation" <?php echo (isset($realisation['type']) && $realisation['type'] == 'formation') ? 'selected' : ''; ?>>Formation (E4)</option>
                                <option value="pro_1" <?php echo (isset($realisation['type']) && $realisation['type'] == 'pro_1') ? 'selected' : ''; ?>>Stage Pro (1ère année)</option>
                                <option value="pro_2" <?php echo (isset($realisation['type']) && $realisation['type'] == 'pro_2') ? 'selected' : ''; ?>>Stage Pro (2ème année)</option>
                            </select>
                        </div>
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Ordre d'affichage</label>
                            <input type="number" name="display_order" value="<?php echo $realisation['display_order'] ?? 0; ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-100">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-6 block">Compétences mises en œuvre</span>
                    <div class="space-y-4">
                        <?php foreach ($competences as $comp): ?>
                            <label class="flex items-start gap-4 p-4 bg-gray-50 rounded-2xl cursor-pointer hover:bg-gray-100 transition-colors">
                                <input type="checkbox" name="competences[]" value="<?php echo $comp['id']; ?>" 
                                    <?php echo (isset($realisation['competence_ids']) && in_array($comp['id'], $realisation['competence_ids'])) ? 'checked' : ''; ?>
                                    class="mt-1 w-5 h-5 accent-blue-600">
                                <div>
                                    <span class="block text-sm font-bold uppercase tracking-tight"><?php echo htmlspecialchars($comp['label']); ?></span>
                                    <span class="block text-[10px] text-gray-400 mt-1 leading-relaxed"><?php echo htmlspecialchars($comp['description']); ?></span>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="pt-8 text-right">
                    <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                        Enregistrer la réalisation
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
