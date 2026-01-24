<!-- 
    ===========================================================
    PARTIAL : SECTION VEILLE TECHNOLOGIQUE
    ===========================================================
    
    Composant : Section "Veille Technologique" du portfolio
    Contient : Introduction à la veille + articles + section Feedly
    
    Éléments :
    - Définition de la veille technologique
    - 4 axes de veille (Développement, Cybersécurité, IA, Design UX/UI)
    - Grille d'articles (rendu dynamique via JS)
    - Carte Feedly avec captures d'écran
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="veille" class="py-24 md:py-48 bg-transparent">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-12 mb-24">
                <div class="lg:col-span-8 space-y-8">
                    <span class="text-[10px] font-bold uppercase tracking-[0.5em] text-blue-600 mb-6 block">Recherche</span>
                    <h2 class="text-5xl md:text-7xl font-extrabold font-['Space_Grotesk'] uppercase tracking-tighter leading-none">Veille Technologique</h2>
                    
                    <div class="space-y-6 max-w-4xl pt-8">
                        <p class="text-2xl md:text-3xl font-light leading-tight tracking-tight text-gray-800">
                            Qu'est-ce que la <span class="text-black font-bold uppercase">veille technologique</span> ?
                        </p>
                        <p class="text-lg text-gray-500 font-light leading-relaxed">
                            La veille technologique est un processus organisé de collecte, de traitement et de diffusion d'informations sur des innovations techniques, produits, procédés de fabrication, matériaux, brevets, normes, réglementation, concurrents dans un domaine donné.
                        </p>
                        <p class="text-lg text-gray-500 font-light leading-relaxed">
                            Son objectif principal est <span class="text-blue-600 font-semibold">d'anticiper les évolutions technologiques</span>, d'identifier les opportunités et les menaces, de faire évoluer l'innovation et de renforcer la compétitivité d'une organisation ou d'un individu.
                        </p>

                        <!-- Axes de veille -->
                        <div class="pt-10">
                            <p class="label-caps text-gray-400 mb-8">Mes axes de veille stratégique</p>
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                                <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                                        <i data-feather="code" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Développement</span>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                                    <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                                        <i data-feather="shield" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Cybersécurité</span>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                                        <i data-feather="cpu" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Intelligence Artificielle</span>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                                    <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                                        <i data-feather="layout" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Design UX/UI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conteneur d'articles de veille (rempli par JS) -->
            <div id="tech-watch-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Rendu dynamique via JavaScript -->
            </div>

            <!-- Carte Feedly -->
            <div class="mt-12 group relative overflow-hidden rounded-[2.5rem] border border-gray-100 bg-white/40 backdrop-blur-md p-8 md:p-12 shadow-sm hover:bg-black transition-all duration-700 fade-in">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-12">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-500 group-hover:bg-white/10 group-hover:border-white/10">
                                <img src="assets/images/feedly_logo_icon_169177.png" alt="Feedly Logo" class="w-6 h-6 object-contain group-hover:brightness-0 group-hover:invert transition-all">
                            </div>
                            <div>
                                <h3 class="display-title text-2xl font-bold uppercase tracking-tighter group-hover:text-white transition-colors">Veille sur Feedly.com</h3>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em] group-hover:text-white/40 transition-colors">Collecteur de flux RSS</p>
                            </div>
                        </div>
                        <p class="text-lg text-gray-500 font-light leading-relaxed max-w-3xl mb-10 group-hover:text-white/60 transition-colors">
                            En complément de cette section, j'utilise <span class="text-[#2bb24c] font-bold group-hover:text-[#4ade80]">Feedly</span> au quotidien pour centraliser et organiser mes sources d'informations. C'est l'outil qui me permet de rester à la pointe des innovations en un coup d'œil.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture001.png" alt="Capture Feedly 1" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture002.png" alt="Capture Feedly 2" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture003.png" alt="Capture Feedly 3" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-[#2bb24c]/[0.02] rounded-full blur-3xl pointer-events-none group-hover:bg-[#2bb24c]/[0.1] transition-colors duration-700"></div>
            </div>
        </div>
    </section>
</div>
