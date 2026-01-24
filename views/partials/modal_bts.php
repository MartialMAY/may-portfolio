<!-- 
    Modal BTS SIO - Tableau de synthèse E4 
    Présentation du tableau de synthèse des réalisations professionnelles.
-->
<div id="bts-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-7xl max-h-[95vh] flex flex-col rounded-[2rem] shadow-2xl scale-95 opacity-0 transition-all duration-300">
        
        <!-- Bouton de fermeture -->
        <button id="bts-close" class="absolute top-6 right-6 md:top-8 md:right-8 w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors z-20">
            <i data-feather="x"></i>
        </button>
        
        <!-- Contenu scrollable -->
        <div class="overflow-y-auto overscroll-contain p-6 md:p-12 h-full rounded-[2rem]" data-lenis-prevent>
            <div class="space-y-16 py-10">
                <div>
                    <!-- En-tête avec bouton de téléchargement -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12">
                        <div>
                            <span class="label-caps text-blue-600 mb-4 block">Épreuve E4</span>
                            <h4 class="display-title text-3xl md:text-5xl tracking-tight leading-none">Tableau de synthèse<br/>des réalisations</h4>
                        </div>
                        <a href="assets/tableauE4.pdf" download class="inline-flex items-center gap-3 px-8 py-4 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all font-bold shadow-lg">
                            <i data-feather="download"></i>
                            <span>Télécharger PDF</span>
                        </a>
                    </div>
                    
                    <!-- Tableau de synthèse des réalisations -->
                    <div class="bts-table-container shadow-sm overflow-x-auto">
                        <table class="bts-table">
                            <thead>
                                <tr>
                                    <th class="bts-diagonal">
                                        <div class="top-right">Compétences mises en œuvre</div>
                                        <div class="bottom-left">Réalisations professionnelles</div>
                                    </th>
                                    <th class="vertical-text-header">
                                        <div class="header-content">Période</div>
                                    </th>
                                    <?php foreach ($bts_competences as $comp): ?>
                                        <th class="vertical-text-header">
                                            <div class="header-content">
                                                <?php echo htmlspecialchars($comp['label']); ?>
                                            </div>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Catégories de réalisations
                                $types = [
                                    'formation' => 'Réalisation en cours de formation',
                                    'pro_1' => 'Réalisations en milieu professionnel en cours de première année',
                                    'pro_2' => 'Réalisations en milieu professionnel en cours de seconde année'
                                ];
                                
                                // Itération par catégorie
                                foreach ($types as $type_key => $type_label): 
                                    $filtered = array_filter($bts_realisations, function($r) use ($type_key) { return $r['type'] === $type_key; });
                                ?>
                                    <!-- Ligne de catégorie -->
                                    <tr class="category-row">
                                        <td colspan="<?php echo count($bts_competences) + 2; ?>" class="py-2 bg-gray-50 border-y border-black">
                                            <?php echo $type_label; ?>
                                        </td>
                                    </tr>
                                    
                                    <?php if (empty($filtered)): ?>
                                        <tr>
                                            <td colspan="<?php echo count($bts_competences) + 2; ?>" class="text-center py-8 text-gray-300 italic">Aucune réalisation enregistrée</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filtered as $real): ?>
                                            <tr>
                                                <td class="p-4 font-bold text-gray-800 sticky-col"><?php echo htmlspecialchars($real['title']); ?></td>
                                                <td class="text-center whitespace-nowrap text-gray-500 px-4"><?php echo htmlspecialchars($real['periode']); ?></td>
                                                <?php foreach ($bts_competences as $comp): ?>
                                                    <td class="text-center p-0">
                                                        <?php if (in_array($comp['id'], $real['competence_ids'])): ?>
                                                            <div class="flex items-center justify-center text-blue-600">
                                                                <i data-feather="check" class="w-4 h-4"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Note explicative -->
                    <div class="mt-12 p-8 bg-blue-50/50 rounded-2xl border border-blue-100 flex items-start gap-4">
                        <i data-feather="info" class="text-blue-600 flex-shrink-0 mt-1"></i>
                        <p class="text-sm text-blue-900 leading-relaxed font-medium mt-1">
                            Ce tableau constitue le document obligatoire pour l'épreuve E4. Il atteste de la variété et de la complexité des situations professionnelles rencontrées.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
