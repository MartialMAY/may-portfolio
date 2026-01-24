<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project ? 'Modifier' : 'Ajouter'; ?> Projet | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Edition Projet</h1>
        <a href="<?php echo url('/admin/projects'); ?>" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <form method="POST" enctype="multipart/form-data" class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-10">
            <?php echo \App\Core\Security::csrfField(); ?>
            <input type="hidden" name="id" value="<?php echo $project['id'] ?? ''; ?>">
            
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-4 block">Contenu du Projet</span>
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre du projet</label>
                            <input type="text" name="title" required value="<?php echo htmlspecialchars($project['title'] ?? ''); ?>" placeholder="Ex: E-commerce Website" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie</label>
                                <input type="text" name="category" required value="<?php echo htmlspecialchars($project['category'] ?? ''); ?>" placeholder="Ex: WEB DESIGN / PHP" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL du projet</label>
                                <input type="text" name="project_url" value="<?php echo htmlspecialchars($project['project_url'] ?? ''); ?>" placeholder="Ex: https://github.com/..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description</label>
                            <textarea name="description" required rows="6" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($project['description'] ?? ''); ?></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Image du projet</label>
                            <?php if (isset($project['image_url'])): ?>
                                <div class="mb-4 h-32 w-48 rounded-xl overflow-hidden border border-gray-100">
                                    <img src="<?php echo url($project['image_url']); ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                    </div>
                </div>

                <div class="pt-8 text-right">
                    <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                        Enregistrer le projet
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
