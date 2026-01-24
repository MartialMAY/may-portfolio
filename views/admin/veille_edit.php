<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article ? 'Modifier' : 'Ajouter'; ?> Article | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Edition Veille</h1>
        <a href="<?php echo $this->base; ?>/admin/veille" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <form method="POST" enctype="multipart/form-data" class="space-y-12">
            <input type="hidden" name="id" value="<?php echo $article['id'] ?? ''; ?>">
            
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-4 block">Contenu de l'Article</span>
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre de l'article</label>
                            <input type="text" name="title" required value="<?php echo htmlspecialchars($article['title'] ?? ''); ?>" placeholder="Ex: Intelligence Artificielle en 2025" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie(s) (ex: IA, Web, Cloud)</label>
                                <input type="text" name="category" required value="<?php echo htmlspecialchars($article['category'] ?? ''); ?>" placeholder="Ex: IA, WEB, CLOUD" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Source (ex: Le Monde)</label>
                                <input type="text" name="source_name" required value="<?php echo htmlspecialchars($article['source_name'] ?? ''); ?>" placeholder="Nom du média" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Date et Heure de publication</label>
                            <input type="datetime-local" name="published_at" required value="<?php echo isset($article['published_at']) ? date('Y-m-d\TH:i', strtotime($article['published_at'])) : date('Y-m-d\TH:i'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Lien source</label>
                            <input type="text" name="article_url" required value="<?php echo htmlspecialchars($article['article_url'] ?? ''); ?>" placeholder="Ex: https://..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Mon Avis (Optionnel)</label>
                            <textarea name="opinion" rows="3" placeholder="Partage ton point de vue sur cet article..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($article['opinion'] ?? ''); ?></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description / Résumé</label>
                            <textarea name="summary" required rows="4" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($article['summary'] ?? ''); ?></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Image d'illustration</label>
                            <?php if (isset($article['image_url'])): ?>
                                <div class="mb-4 h-32 w-48 rounded-xl overflow-hidden border border-gray-100">
                                    <img src="<?php echo $this->base; ?>/<?php echo $article['image_url']; ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                    </div>
                </div>

                <div class="pt-8 text-right">
                    <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                        Enregistrer l'article
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
