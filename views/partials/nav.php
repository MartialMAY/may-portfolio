<!-- 
    Barre de Navigation principale 
    Positionnement fixe avec effets de transition au scroll.
-->
<nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-8">
    <div class="container-main flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <div class="w-10 h-10 bg-black text-white flex items-center justify-center text-[12px] font-bold tracking-tighter shadow-xl">MM</div>
        </a>

        <!-- Menu Desktop -->
        <div class="hidden lg:flex items-center gap-12">
            <button data-scroll-to="about" class="label-caps text-gray-400 hover:text-black transition-colors">À propos</button>
            <button data-scroll-to="skills" class="label-caps text-gray-400 hover:text-black transition-colors">Compétences</button>
            <button data-scroll-to="projects" class="label-caps text-gray-400 hover:text-black transition-colors">Projets</button>
            <button data-scroll-to="bts" class="label-caps text-gray-400 hover:text-black transition-colors">BTS SIO</button>
        </div>

        <!-- Réseaux Sociaux & Contact -->
        <div class="flex items-center gap-4 md:gap-6">
            <div class="hidden sm:flex items-center gap-4">
                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition-all duration-300" aria-label="LinkedIn">
                    <i data-feather="linkedin" class="w-4 h-4"></i>
                </a>
                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-400 hover:text-black hover:border-black transition-all duration-300" aria-label="GitHub">
                    <i data-feather="github" class="w-4 h-4"></i>
                </a>
            </div>
            
            <button data-scroll-to="contact" class="px-6 md:px-8 py-3 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all shadow-xl shadow-black/10">
                Me contacter
            </button>
        </div>
    </div>
</nav>
