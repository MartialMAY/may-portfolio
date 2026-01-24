<!-- 
    ===========================================================
    PARTIAL : SECTION COMPÉTENCES
    ===========================================================
    
    Composant : Section "Compétences" du portfolio
    Contient : Grille de cartes affichant les compétences techniques
    
    Catégories :
    - Programmation & Développement (HTML, CSS, PHP, JavaScript, Flutter, etc.)
    - Bases de données (MySQL, Firebase)
    - Réseaux & Sécurité (Cybersécurité, Virtualisation, GLPI, Script Bash)
    - Gestion de projet (GANTT, Notion, GitHub)
    - Graphisme & Design (Illustrator, Photoshop, Figma, InDesign)
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="skills" class="py-24 md:py-40 bg-transparent">
        <div class="container-main">
            <div class="mb-20">
                <span class="label-caps text-blue-600 block mb-6">Toolbox</span>
                <h2 class="display-title text-5xl md:text-7xl tracking-tighter uppercase">Compétences</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Programmation & Développement -->
                <div class="lg:col-span-2 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                        <i data-feather="code" class="w-72 h-72"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                            Programmation & Développement
                            <i data-feather="code" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-4">
                            <?php foreach(['HTML & CSS', 'PHP', 'JavaScript', 'Flutter', 'WordPress', 'Python', 'C#', 'SQL'] as $skill): ?>
                            <div class="flex items-center gap-4 group/item cursor-default">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                                <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Bases de données -->
                <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                        <i data-feather="database" class="w-64 h-64"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                            Bases de données
                            <i data-feather="database" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </h3>
                        <div class="flex flex-col gap-4">
                            <?php foreach(['MySQL', 'Firebase'] as $skill): ?>
                            <div class="flex items-center gap-4 group/item cursor-default">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                                <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Réseaux & Sécurité -->
                <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                        <i data-feather="shield" class="w-64 h-64"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                            Réseaux & Sécurité
                            <i data-feather="shield" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </h3>
                        <div class="flex flex-col gap-4">
                            <?php foreach(['Cybersécurité', 'Virtualisation', 'GLPI', 'Script Bash'] as $skill): ?>
                            <div class="flex items-center gap-4 group/item cursor-default">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                                <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Gestion de projet -->
                <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                        <i data-feather="clipboard" class="w-64 h-64"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                            Gestion de projet
                            <i data-feather="clipboard" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </h3>
                        <div class="flex flex-col gap-4">
                            <?php foreach(['GANTT', 'Notion', 'GitHub'] as $skill): ?>
                            <div class="flex items-center gap-4 group/item cursor-default">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                                <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Graphisme & Design -->
                <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                        <i data-feather="feather" class="w-64 h-64"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                            Graphisme & Design
                            <i data-feather="feather" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </h3>
                        <div class="flex flex-col gap-4">
                            <?php foreach(['Illustrator', 'Logo Design', 'Photoshop', 'Figma', 'InDesign'] as $skill): ?>
                            <div class="flex items-center gap-4 group/item cursor-default">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                                <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
