<!-- 
    ===========================================================
    PARTIAL : SECTION PROJETS
    ===========================================================
    
    Composant : Section "Projets" du portfolio
    Contient : Grille de projets avec rendu dynamique
    
    Fonctionnement :
    - Grille de projets générée par JavaScript
    - Données injectées depuis data_bridge.php
    - Clic sur un projet ouvre modal_project.php
    
    @author  Martial MAYAMOU
    @version 1.0.0
    ===========================================================
-->

<div class="section-border">
    <section id="projects" class="py-24 md:py-40 bg-transparent">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-16 mb-24 md:mb-32">
                <div class="lg:col-span-4">
                    <span class="label-caps text-blue-600 block mb-6">Sélection</span>
                    <h2 class="display-title text-5xl md:text-7xl">Projets</h2>
                </div>
            </div>

            <!-- Grille de projets (remplie par JS) -->
            <div id="projects-grid" class="grid md:grid-cols-2 gap-x-12 gap-y-24">
                <!-- Rendu dynamique via JavaScript -->
            </div>
        </div>
    </section>
</div>
