<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Sources RSS | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Sources RSS</h1>
        <a href="<?php echo $this->base; ?>/admin/veille" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour à la veille</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <!-- Add Source Form -->
        <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm mb-12">
            <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-6 block">Ajouter une Source</span>
            <form method="POST" class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Nom de la source</label>
                        <input type="text" name="name" required placeholder="Ex: Frandroid" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL du flux RSS</label>
                        <input type="url" name="url" required placeholder="Ex: https://..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-black text-white px-8 py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-blue-600 transition-all">
                        Enregistrer la source
                    </button>
                </div>
            </form>
        </div>

        <!-- Sources List -->
        <div class="space-y-4">
            <h2 class="display-title text-3xl font-extrabold uppercase tracking-tighter mb-8">Mes Sources Enregistrées</h2>
            <?php if (empty($sources)): ?>
                <p class="text-gray-400 text-sm">Aucune source enregistrée pour le moment.</p>
            <?php else: ?>
                <div class="grid gap-4">
                    <?php foreach ($sources as $source): ?>
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 flex justify-between items-center group hover:border-black transition-all">
                            <div>
                                <h3 class="font-bold text-lg"><?php echo htmlspecialchars($source['name']); ?></h3>
                                <p class="text-xs text-gray-400 font-mono"><?php echo htmlspecialchars($source['url']); ?></p>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="copyToClipboard('<?php echo $source['url']; ?>')" class="p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all" title="Copier l'URL">
                                    <i data-feather="copy" class="w-4 h-4"></i>
                                </button>
                                <a href="/testportfolio/admin/veille/sources/delete?id=<?php echo $source['id']; ?>" onclick="return confirm('Supprimer cette source ?')" class="p-3 bg-gray-50 rounded-xl hover:bg-red-50 hover:text-white transition-all text-red-500">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        feather.replace();
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('URL copiée !');
            });
        }
    </script>
</body>
</html>
