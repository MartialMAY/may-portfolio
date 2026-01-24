<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import RSS | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Import RSS</h1>
        <a href="<?php echo $this->base; ?>/admin/veille" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour à la veille</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-6xl mx-auto">
        <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm mb-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4">
                <a href="<?php echo $this->base; ?>/admin/veille/sources" class="text-[9px] font-bold uppercase tracking-widest text-blue-600 hover:text-black flex items-center gap-2">
                    <i data-feather="settings" class="w-3 h-3"></i> Gérer mes sources
                </a>
            </div>
            
            <form method="POST" class="space-y-8">
                <div class="grid md:grid-cols-2 gap-8 items-end">
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Choisir une source enregistrée</label>
                        <select onchange="document.getElementById('manual_url').value = this.value" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors text-sm">
                            <option value="">-- Sélectionner une source --</option>
                            <?php foreach ($saved_sources as $src): ?>
                                <option value="<?php echo htmlspecialchars($src['url']); ?>"><?php echo htmlspecialchars($src['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Ou saisir une URL manuellement</label>
                        <input type="url" name="feed_url" id="manual_url" required value="<?php echo htmlspecialchars($feed_url); ?>" placeholder="Ex: https://..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors text-sm">
                    </div>
                </div>
                
                <div class="text-right">
                    <button type="submit" class="bg-black text-white px-12 py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-blue-600 transition-all shadow-xl">
                        Récupérer les flux
                    </button>
                </div>
            </form>
        </div>

        <?php if (!empty($articles)): ?>
            <form method="POST" class="space-y-12">
                <input type="hidden" name="feed_url" value="<?php echo htmlspecialchars($feed_url); ?>">
                <input type="hidden" name="import" value="1">
                
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Résultats</span>
                        <h2 class="display-title text-4xl font-extrabold uppercase tracking-tighter">Sélectionner les articles</h2>
                    </div>
                    <div class="flex items-center gap-6">
                         <div class="flex flex-col gap-2">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie cible</label>
                            <input type="text" name="category" placeholder="Ex: IA, TECH" class="px-6 py-3 bg-white border border-gray-100 rounded-full outline-none focus:border-black text-xs font-bold uppercase tracking-widest transition-all">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-black transition-all shadow-xl">
                            Importer la sélection
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <?php foreach ($articles as $index => $art): ?>
                        <div class="bg-white border border-gray-100 rounded-[1.5rem] p-6 flex gap-6 group hover:border-black transition-all">
                            <div class="flex-shrink-0 pt-1">
                                <input type="checkbox" name="selected_articles[]" value="<?php echo $index; ?>" class="w-5 h-5 rounded border-gray-200 text-black focus:ring-black">
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <span class="text-[9px] font-bold uppercase tracking-widest text-gray-400"><?php echo $art['source']; ?></span>
                                    <span class="text-[9px] font-medium text-gray-300"><?php echo date('d/m/Y H:i', strtotime($art['pubDate'])); ?></span>
                                </div>
                                <h3 class="font-bold text-lg leading-tight group-hover:text-blue-600 transition-colors"><?php echo htmlspecialchars($art['title']); ?></h3>
                                <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($art['description']); ?></p>
                                
                                <!-- Hidden inputs for import data -->
                                <input type="hidden" name="titles[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($art['title']); ?>">
                                <input type="hidden" name="links[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($art['link']); ?>">
                                <input type="hidden" name="descriptions[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($art['description']); ?>">
                                <input type="hidden" name="dates[<?php echo $index; ?>]" value="<?php echo $art['pubDate']; ?>">
                                <input type="hidden" name="source_names[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($art['source']); ?>">
                                <input type="hidden" name="image_urls[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($art['image_url']); ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        <?php endif; ?>
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
