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
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Lier à un projet du portfolio</label>
                            <select name="project_id" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                                <option value="">-- Aucun --</option>
                                <?php foreach ($projects as $proj): ?>
                                    <option value="<?php echo $proj['id']; ?>" <?php echo (isset($realisation['project_id']) && $realisation['project_id'] == $proj['id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($proj['title']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="space-y-4 md:col-span-2">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description du projet <span class="text-gray-300 normal-case">(contexte, ce qui a été fait)</span></label>
                            <textarea name="description" rows="3" placeholder="Ex: Application web complète développée seul — architecture MVC PHP, admin sécurisé, déploiement Railway..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors resize-none text-sm"><?php echo htmlspecialchars($realisation['description'] ?? ''); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-100">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Compétences mises en œuvre</span>
                    <p class="text-[10px] text-gray-400 mb-6">Cochez la compétence principale, puis précisez les sous-compétences développées.</p>
                    <div class="space-y-3">
                        <?php foreach ($competences as $comp):
                            $isChecked = isset($realisation['competence_ids']) && in_array($comp['id'], $realisation['competence_ids']);
                            $compSous = $sous_competences[$comp['id']] ?? [];
                        ?>
                            <div class="bts-comp-block border border-gray-100 rounded-2xl overflow-hidden">
                                <!-- Compétence principale -->
                                <label class="flex items-start gap-4 p-4 bg-gray-50 cursor-pointer hover:bg-gray-100 transition-colors"
                                       onclick="toggleSousComps(this)">
                                    <input type="checkbox" name="competences[]" value="<?php echo $comp['id']; ?>"
                                        <?php echo $isChecked ? 'checked' : ''; ?>
                                        class="mt-1 w-5 h-5 accent-blue-600 shrink-0 comp-main-checkbox">
                                    <div class="flex-1 min-w-0">
                                        <span class="block text-sm font-bold uppercase tracking-tight"><?php echo htmlspecialchars($comp['label']); ?></span>
                                        <?php if (!empty($compSous)): ?>
                                            <span class="block text-[10px] text-blue-500 mt-1"><?php echo count($compSous); ?> sous-compétence<?php echo count($compSous) > 1 ? 's' : ''; ?> — cliquez pour détailler</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($compSous)): ?>
                                        <i data-feather="chevron-down" class="w-4 h-4 text-gray-400 mt-1 shrink-0 comp-chevron transition-transform duration-200"></i>
                                    <?php endif; ?>
                                </label>

                                <!-- Sous-compétences (accordéon) -->
                                <?php if (!empty($compSous)): ?>
                                    <div class="sous-comps-panel <?php echo $isChecked ? '' : 'hidden'; ?> bg-white border-t border-gray-100">
                                        <div class="px-4 py-3 space-y-2">
                                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400 mb-3">Précisez les sous-compétences développées :</p>
                                            <?php foreach ($compSous as $sc):
                                                $scChecked  = isset($realisation['sous_competence_ids']) && in_array($sc['id'], $realisation['sous_competence_ids']);
                                                $scJustif   = $realisation['justifications'][$sc['id']] ?? '';
                                            ?>
                                                <div class="sc-row rounded-xl border border-transparent hover:border-blue-100 transition-colors <?php echo $scChecked ? 'sc-checked-row' : ''; ?>">
                                                    <label class="flex items-start gap-3 p-3 cursor-pointer group">
                                                        <input type="checkbox" name="sous_competences[]" value="<?php echo $sc['id']; ?>"
                                                            <?php echo $scChecked ? 'checked' : ''; ?>
                                                            onchange="toggleJustif(this)"
                                                            class="mt-0.5 w-4 h-4 accent-blue-600 shrink-0">
                                                        <span class="text-[11px] text-gray-600 group-hover:text-blue-700 transition-colors leading-relaxed font-medium">
                                                            <?php echo htmlspecialchars($sc['label']); ?>
                                                        </span>
                                                    </label>
                                                    <div class="justif-panel <?php echo $scChecked ? '' : 'hidden'; ?> px-3 pb-3">
                                                        <textarea
                                                            name="justifications[<?php echo $sc['id']; ?>]"
                                                            rows="2"
                                                            placeholder="Comment as-tu mis en œuvre cette sous-compétence dans ce projet ?"
                                                            class="w-full p-2.5 text-[11px] bg-blue-50 border border-blue-100 rounded-lg outline-none focus:border-blue-400 transition-colors resize-none text-gray-700"
                                                        ><?php echo htmlspecialchars($scJustif); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
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

        function toggleSousComps(labelEl) {
            const block = labelEl.closest('.bts-comp-block');
            const checkbox = labelEl.querySelector('.comp-main-checkbox');
            const panel = block.querySelector('.sous-comps-panel');
            const chevron = labelEl.querySelector('.comp-chevron');

            // Wait for the checkbox to update its state
            setTimeout(() => {
                if (!panel) return;
                if (checkbox.checked) {
                    panel.classList.remove('hidden');
                    if (chevron) chevron.style.transform = 'rotate(180deg)';
                } else {
                    panel.classList.add('hidden');
                    if (chevron) chevron.style.transform = '';
                    // Uncheck all sous-compétences when parent is unchecked
                    panel.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                }
            }, 0);
        }

        // Initialize chevrons on page load
        document.querySelectorAll('.bts-comp-block').forEach(block => {
            const checkbox = block.querySelector('.comp-main-checkbox');
            const chevron = block.querySelector('.comp-chevron');
            if (checkbox && chevron && checkbox.checked) {
                chevron.style.transform = 'rotate(180deg)';
            }
        });
    </script>
</body>
</html>
