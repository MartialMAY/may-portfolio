<!-- 
    Modal Projet 
    Affiche les détails d'un projet sélectionné.
    Le contenu est injecté dynamiquement via JavaScript.
-->
<div id="project-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full modal-container max-h-[95vh] overflow-y-auto rounded-[2.5rem] p-6 md:p-10 shadow-2xl scale-95 opacity-0 transition-all duration-500" data-lenis-prevent>
        
        <!-- Contenu du projet (injecté par JS) -->
        <div id="modal-content"></div>
    </div>
</div>
