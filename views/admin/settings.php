<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres Profil | Admin</title>
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
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Paramètres Profil</h1>
        <a href="<?php echo url('/admin'); ?>" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">

        <?php if (isset($_GET['saved'])): ?>
        <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl text-sm font-medium">
            Paramètres sauvegardés avec succès.
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-8">
            <?php echo \App\Core\Security::csrfField(); ?>

            <!-- Hero Section -->
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] block">Section Hero</span>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Votre nom</label>
                    <input type="text" name="hero_name" value="<?php echo htmlspecialchars($settings['hero_name'] ?? 'Martial MAYAMOU'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre ligne 1 (ex: Développeur)</label>
                        <input type="text" name="hero_title_line1" value="<?php echo htmlspecialchars($settings['hero_title_line1'] ?? 'Développeur'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                    </div>
                    <div class="space-y-4">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre ligne 2 (ex: Web)</label>
                        <input type="text" name="hero_title_line2" value="<?php echo htmlspecialchars($settings['hero_title_line2'] ?? 'Web'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description / Bio</label>
                    <textarea name="hero_description" rows="4" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($settings['hero_description'] ?? ''); ?></textarea>
                </div>
            </div>

            <!-- Section À propos -->
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] block mb-1">Section À propos</span>
                    <p class="text-xs text-gray-400">Utilisez <code class="bg-gray-100 px-1 rounded">**mot**</code> pour mettre un mot en <strong>gras</strong>.</p>
                </div>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Paragraphe 1</label>
                    <textarea name="about_paragraph1" rows="5" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors font-mono text-sm"><?php echo htmlspecialchars($settings['about_paragraph1'] ?? ''); ?></textarea>
                </div>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Paragraphe 2</label>
                    <textarea name="about_paragraph2" rows="4" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors font-mono text-sm"><?php echo htmlspecialchars($settings['about_paragraph2'] ?? ''); ?></textarea>
                </div>
            </div>

            <!-- Liens sociaux -->
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] block">Réseaux Sociaux</span>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL LinkedIn</label>
                    <input type="url" name="linkedin_url" value="<?php echo htmlspecialchars($settings['linkedin_url'] ?? 'https://linkedin.com'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                </div>

                <div class="space-y-4">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL GitHub</label>
                    <input type="url" name="github_url" value="<?php echo htmlspecialchars($settings['github_url'] ?? 'https://github.com'); ?>" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                    Enregistrer
                </button>
            </div>
        </form>
    </main>

    <script>feather.replace();</script>
</body>
</html>
