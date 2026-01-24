<!-- 
    Pied de page (Footer) 
    Informations légales, liens et navigation rapide.
-->
<footer class="py-16 bg-transparent border-t border-gray-100">
    <div class="container-main flex flex-col md:flex-row items-center justify-between gap-10">
        <!-- Copyright -->
        <div class="label-caps text-gray-400">
            © 2025 Martial MAYAMOU • SLAM STUDENT
        </div>
        
        <!-- Liens externes -->
        <div class="flex items-center gap-10">
            <a href="#" target="_blank" rel="noopener noreferrer" class="label-caps text-gray-400 hover:text-black transition-colors">LinkedIn</a>
            <a href="#" target="_blank" rel="noopener noreferrer" class="label-caps text-gray-400 hover:text-black transition-colors">GitHub</a>
            <a href="<?php echo url('/login'); ?>" class="label-caps text-gray-200 hover:text-black transition-colors">Admin</a>
        </div>

        <!-- Retour en haut de page -->
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-3 label-caps text-gray-400 hover:text-black transition-all group">
            <span>Scroll Top</span> <i data-feather="arrow-up" class="group-hover:-translate-y-1 transition-transform"></i>
        </button>
    </div>
</footer>
