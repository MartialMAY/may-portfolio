<!-- 
    ===========================================================
    PARTIAL : SECTION BTS SIO
    ===========================================================
    
    Composant : Section "BTS SIO" du portfolio
    Contient : Présentation du BTS SIO et de ses deux options (SLAM et SISR)
    
    Éléments :
    - Description du BTS SIO
    - Carte Option SLAM (choix de l'étudiant)
    - Carte Option SISR
    - Bouton vers le tableau de synthèse (modal_bts.php)
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="bts" class="py-24 md:py-40 bg-transparent">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-16">
                
                <div class="lg:col-span-4">
                    <span class="label-caps text-blue-600 block mb-6">Cursus</span>
                    <h2 class="display-title text-5xl md:text-7xl">BTS SIO</h2>
                </div>

                <div class="lg:col-span-8 space-y-12">
                    <div class="space-y-8">
                        <p class="text-3xl md:text-4xl font-light leading-tight tracking-tight text-gray-800">
                            Qu'est-ce que le <span class="text-black font-bold uppercase">BTS SIO</span> ?
                        </p>
                        <p class="text-xl text-gray-500 font-light leading-relaxed">
                            Le <span class="text-black font-medium">Brevet de Technicien Supérieur (BTS)</span> aux Services Informatiques aux Organisations (SIO) est une filière d'étude <span class="text-blue-600 font-semibold">POST BAC</span>, après un Bac Professionnel Systèmes Numériques par exemple. Dans ce BTS, on peut s'y former en matière de développement web ou application, en réseau et dans le domaine des bases de données.
                        </p>
                        <p class="text-xl text-gray-500 font-light leading-relaxed italic">
                            Le BTS SIO possède deux options :
                        </p>
                    </div>

                    <!-- Cartes des deux options -->
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Option SLAM -->
                        <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                            <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                                <i data-feather="code" class="w-48 h-48"></i>
                            </div>
                            <div class="relative z-10">
                                <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                                    Option SLAM
                                    <span class="text-[9px] px-2 py-1 bg-blue-600 text-white rounded-full font-bold">Mon choix</span>
                                </h3>
                                <p class="text-gray-500 font-light leading-relaxed group-hover:text-white/60 transition-colors duration-500">
                                    L'option <span class="text-black font-medium group-hover:text-white">Solutions Logicielles et Applications Métiers</span> (SLAM) est un cursus intégral axé sur le développement et la gestion de solutions logicielles, formant les étudiants de manière efficace aux professions du développement informatique.
                                </p>
                            </div>
                        </div>

                        <!-- Option SISR -->
                        <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                            <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                                <i data-feather="server" class="w-48 h-48"></i>
                            </div>
                            <div class="relative z-10">
                                <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                                    Option SISR
                                </h3>
                                <p class="text-gray-500 font-light leading-relaxed group-hover:text-white/60 transition-colors duration-500">
                                    L'option <span class="text-black font-medium group-hover:text-white">Solutions d'Infrastructure Systèmes et Réseaux</span> (SISR) forme les étudiants pour devenir des experts qualifiés dans la gestion et la sécurisation des systèmes et réseaux informatiques.
                                </p>
                            </div>
                        </div>
                    </div>

                    <button id="bts-btn" class="flex items-center gap-6 group pt-8">
                        <div class="w-14 h-14 rounded-full border border-black flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all">
                            <i data-feather="arrow-right"></i>
                        </div>
                        <span class="label-caps font-bold">Mon tableau de synthèse des réalisations professionnelles en BTS SIO</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
