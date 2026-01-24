<!-- 
    Modal "À propos" - Curriculum Vitae 
    Affichage du CV en JPG avec options de téléchargement.
-->
<div id="about-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-[2rem] p-8 md:p-12 shadow-2xl scale-95 opacity-0 transition-all duration-300" data-lenis-prevent>
        
        <!-- Bouton de fermeture -->
        <div class="absolute top-8 right-8 z-10 flex items-center gap-4">
            <button id="about-close" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors">
                <i data-feather="x"></i>
            </button>
        </div>
        
        <div class="py-10">
            <h2 class="display-title text-3xl md:text-5xl mb-12 text-center uppercase tracking-tighter">Curriculum Vitae</h2>
            
            <!-- Aperçu du CV -->
            <div class="max-w-4xl mx-auto shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <img src="assets/images/CV_Martial_MAYAMOU.jpg" alt="CV Martial MAYAMOU" class="w-full h-auto block" />
            </div>
            
            <!-- Boutons de téléchargement -->
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                <a href="assets/images/CV_Martial_MAYAMOU.jpg" download class="inline-flex items-center gap-3 px-8 py-4 border border-black rounded-full label-caps hover:bg-gray-50 transition-all font-bold">
                    <i data-feather="image"></i>
                    <span>Télécharger (JPG)</span>
                </a>
                <a href="assets/CV_Martial_MAYAMOU.pdf" download class="inline-flex items-center gap-3 px-8 py-4 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all font-bold shadow-xl">
                    <i data-feather="file-text"></i>
                    <span>Télécharger (PDF)</span>
                </a>
            </div>
        </div>
    </div>
</div>
