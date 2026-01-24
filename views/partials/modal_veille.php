<!-- 
    Modal Veille Technologique 
    Affichage d'un article de veille dans une iframe avec panneau latéral d'opinion.
-->
<div id="veille-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-md"></div>
    <div class="relative bg-white w-full max-w-[95vw] h-[90vh] overflow-hidden rounded-[2.5rem] shadow-2xl scale-95 opacity-0 transition-all duration-300 flex flex-col md:flex-row">
        
        <!-- Iframe de contenu (source de l'article) -->
        <div class="flex-grow h-full relative bg-gray-50">
            <!-- Loader pendant le chargement de l'iframe -->
            <div id="veille-loader" class="absolute inset-0 flex items-center justify-center bg-white z-20 transition-opacity duration-500">
                <div class="flex flex-col items-center gap-4">
                    <div class="w-12 h-12 border-4 border-gray-100 border-t-blue-600 rounded-full animate-spin"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Chargement de la source...</span>
                </div>
            </div>
            <iframe id="veille-iframe" class="w-full h-full border-none relative z-10" src=""></iframe>
        </div>

        <!-- Panneau latéral : informations et avis -->
        <div id="veille-side-panel" class="w-full md:w-[400px] h-auto md:h-full bg-white border-l border-gray-100 p-8 md:p-12 flex flex-col justify-between overflow-y-auto" data-lenis-prevent>
            <div class="space-y-10">
                <!-- En-tête avec catégorie et bouton de fermeture -->
                <div class="flex justify-between items-center">
                    <span id="veille-modal-category" class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-bold uppercase tracking-widest"></span>
                    <button id="veille-close" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center hover:bg-black hover:text-white transition-colors">
                        <i data-feather="x"></i>
                    </button>
                </div>
                
                <!-- Titre et métadonnées de l'article -->
                <div class="space-y-4">
                    <h2 id="veille-modal-title" class="display-title text-2xl md:text-3xl font-bold uppercase leading-tight tracking-tighter"></h2>
                    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                        <span id="veille-modal-source"></span>
                        <span class="w-1 h-1 rounded-full bg-gray-200"></span>
                        <span id="veille-modal-date"></span>
                    </div>
                </div>

                <!-- Avis personnel (optionnel) -->
                <div id="veille-opinion-container" class="hidden space-y-4 pt-10 border-t border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-600/20">
                            <i data-feather="message-circle" class="w-4 h-4"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600">Mon Avis</span>
                    </div>
                    <p id="veille-modal-opinion" class="text-gray-600 text-sm leading-relaxed italic font-medium bg-gray-50 p-6 rounded-2xl border border-gray-100"></p>
                </div>
            </div>

            <!-- Bouton pour ouvrir la source dans un nouvel onglet -->
            <div class="pt-10">
                <a id="veille-modal-link" href="#" target="_blank" class="w-full py-5 bg-black text-white rounded-2xl font-bold uppercase tracking-widest text-[10px] flex items-center justify-center gap-3 hover:bg-blue-600 transition-all shadow-xl shadow-black/10">
                    Ouvrir dans un nouvel onglet
                    <i data-feather="external-link" class="w-3 h-3"></i>
                </a>
            </div>
        </div>
    </div>
</div>
