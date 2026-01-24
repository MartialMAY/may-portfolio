<!-- 
    ===========================================================
    PORTFOLIO MARTIAL MAYAMOU - BTS SIO SLAM
    ===========================================================
    
    Page d'accueil du portfolio professionnel
    
    Architecture modulaire avec partials pour une maintenabilité optimale.
    Chaque section est découpée en fichiers séparés dans /views/partials/
    
    @author  Martial MAYAMOU
    @version 2.0.0
    @date    2025-01-24
    ===========================================================
-->

<?php 
// ===== EN-TÊTE HTML =====
// Meta-tags, styles, scripts externe (Tailwind, Feather, Lenis)
include 'partials/head.php'; 

// ===== INJECTION PHP → JAVASCRIPT =====
// Expose les données serveur (projects, timeline, veille, stats) au client
include 'partials/data_bridge.php';

// ===== ÉLÉMENTS STRUCTURELS =====
// Overlays, grilles, curseurs personnalisés
include 'partials/structural.php';

// ===== NAVIGATION PRINCIPALE =====
include 'partials/nav.php';
?>

<!-- Conteneur principal du site -->
<div class="flex flex-col min-h-screen">
    <main class="flex-grow">
        
        <?php 
        // ===== SECTION HERO =====
        include 'partials/hero.php'; 
        
        // ===== SECTION À PROPOS =====
        include 'partials/section_about.php';
        
        // ===== SECTION COMPÉTENCES =====
        include 'partials/section_skills.php';
        
        // ===== SECTION PARCOURS (TIMELINE) =====
        include 'partials/section_journey.php';
        
        // ===== SECTION PROJETS =====
        include 'partials/section_projects.php';
        
        // ===== SECTION BTS SIO =====
        include 'partials/section_bts.php';
        
        // ===== SECTION VEILLE TECHNOLOGIQUE =====
        include 'partials/section_veille.php';
        
        // ===== SECTION CONTACT =====
        include 'partials/contact_section.php'; 
        ?>

    </main>

    <?php 
    // ===== PIED DE PAGE (FOOTER) =====
    include 'partials/footer.php'; 
    ?>
</div>

<!-- ===== MODALS (Fenêtres modales) ===== -->
<?php 
include 'partials/modal_project.php';
include 'partials/modal_about.php';
include 'partials/modal_bts.php';
include 'partials/modal_veille.php';
?>

<!-- ===== SCRIPTS JAVASCRIPT ===== -->
<?php include 'partials/scripts.php'; ?>