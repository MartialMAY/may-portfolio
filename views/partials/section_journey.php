<!-- 
    ===========================================================
    PARTIAL : SECTION PARCOURS (TIMELINE)
    ===========================================================
    
    Composant : Section "Parcours" du portfolio
    Contient : Timeline filtrée avec formations, expériences et certifications
    
    Fonctionnement :
    - 3 catégories filtrables (Formations, Expériences, Certifications)
    - Rendu dynamique via JavaScript (main.js)
    - Données injectées depuis data_bridge.php
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="journey" class="py-24 md:py-48 bg-transparent">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4">
                    <span class="text-[10px] font-bold uppercase tracking-[0.5em] text-blue-600 mb-6 block">Chronologie</span>
                    <h2 class="text-5xl md:text-7xl font-extrabold font-['Space_Grotesk'] uppercase tracking-tighter leading-none mb-12">Parcours</h2>
                    
                    <!-- Filtres de catégories -->
                    <div class="relative flex flex-col items-start gap-4 p-2 bg-gray-50/50 rounded-2xl max-w-[280px]">
                        <div id="timeline-indicator" class="hidden lg:block absolute left-2 top-2 w-[calc(100%-1rem)] h-[38px] bg-black rounded-lg transition-all duration-500 ease-out z-0"></div>
                        
                        <button data-category="formation" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-white w-full text-left">Formations</button>
                        <button data-category="experience" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-gray-400 hover:text-black w-full text-left">Expériences</button>
                        <button data-category="certification" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-gray-400 hover:text-black w-full text-left">Certifications</button>
                    </div>
                </div>

                <!-- Zone d'affichage des éléments de chronologie (remplie par JS) -->
                <div class="lg:col-span-8">
                    <div id="timeline-container" class="relative border-l border-gray-100 ml-4 pl-12 min-h-[400px] space-y-16">
                        <!-- Rendu dynamique via JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
