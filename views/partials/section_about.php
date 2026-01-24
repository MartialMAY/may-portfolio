<!-- 
    ===========================================================
    PARTIAL : SECTION À PROPOS
    ===========================================================
    
    Composant : Section "À propos" du portfolio
    Contient : Présentation personnelle et bouton d'accès au CV
    
    Utilisation : Affiche une introduction sur Martial MAYAMOU, son cursus BTS SIO SLAM
                  et permet d'ouvrir la modale contenant le CV
    
    Dépendances :
    - modal_about.php (pour le CV)
    - main.js (gestion événement bouton)
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="about" class="py-24 md:py-40 bg-transparent">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-16">
                <div class="lg:col-span-4">
                    <span class="label-caps text-blue-600 block mb-6">Qui suis-je ?</span>
                    <h2 class="display-title text-5xl md:text-7xl">Profil</h2>
                </div>

                <div class="lg:col-span-8 space-y-16">
                    <div class="space-y-8">
                        <p class="text-xl text-gray-500 font-light leading-relaxed">
                            Je m'appelle <span class="text-black font-bold">MAYAMOU BATETANA Martial</span> !
                            Actuellement étudiant en deuxième année de <span class="text-black font-medium">BTS SIO</span> (Services Informatiques aux Organisations), avec une spécialité <span class="text-black font-medium">SLAM</span> (Solutions Logicielles et Applications Métier), je suis en voie de formation dans le secteur du développement, des bases de données ainsi que des systèmes d'information.
                        </p>
                        <p class="text-xl text-gray-500 font-light leading-relaxed">
                            Étudiant au lycée <span class="text-black font-medium">Paul Claudel à Laon</span>, l'établissement me permet de me former afin de répondre au mieux aux besoins des entreprises en concevant des solutions logicielles adaptées.
                        </p>
                    </div>
                    
                    <button id="about-btn" class="flex items-center gap-6 group">
                        <div class="w-14 h-14 rounded-full border border-black flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all">
                            <i data-feather="arrow-right" class="text-xl"></i>
                        </div>
                        <span class="label-caps">Mon curriculum vitae</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
