<!-- 
    Modal Projet 
    Affiche les détails d'un projet sélectionné.
    Le contenu est injecté dynamiquement via JavaScript.
-->
<div id="project-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-[2rem] p-8 md:p-12 shadow-2xl scale-95 opacity-0 transition-all duration-300" data-lenis-prevent>
        
        <!-- Bouton de fermeture -->
        <button id="modal-close" class="absolute top-8 right-8 w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors z-10">
            <i data-feather="x"></i>
        </button>
        
        <!-- Titre du projet -->
        <div class="mb-10">
            <h2 id="modal-title" class="display-title text-3xl md:text-5xl"></h2>
        </div>
        
        <!-- Contenu du projet (injecté par JS) -->
        <div id="modal-content"></div>
    </div>
</div>
