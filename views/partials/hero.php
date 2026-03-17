<!--
    Section d'accueil (Hero Section)
    Mise en avant du profil et de la spécialisation.
-->
<section class="min-h-screen flex flex-col justify-center bg-transparent relative overflow-hidden">
    <div class="container-main pt-44 pb-20 relative z-10">
        <div class="grid lg:grid-cols-12 gap-y-12 items-start">

            <div class="lg:col-span-12 space-y-10">
                <div class="space-y-6">
                    <div class="overflow-hidden">
                        <p class="label-caps text-gray-500 font-medium tracking-[0.2em] !text-[12px] md:!text-[16px] fade-in">
                            Salut, je suis <span class="text-black font-bold"><?php echo htmlspecialchars($settings['hero_name'] ?? 'Martial MAYAMOU'); ?></span>
                        </p>
                    </div>

                    <div class="overflow-hidden">
                        <h1 class="display-title text-[12vw] md:text-[9vw] leading-[0.82] tracking-tighter fade-in-up" style="transition-delay: 200ms;">
                            <?php echo htmlspecialchars($settings['hero_title_line1'] ?? 'Développeur'); ?><br/>
                            <span class="text-transparent" style="-webkit-text-stroke: 1.5px #000;"><?php echo htmlspecialchars($settings['hero_title_line2'] ?? 'Web'); ?></span>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 mt-8 md:mt-12">
                <p class="text-xl text-gray-400 leading-relaxed font-light tracking-tight max-w-2xl fade-in" style="transition-delay: 400ms;">
                    <?php echo htmlspecialchars($settings['hero_description'] ?? 'Étudiant en BTS SIO SLAM, je vous présente mon portfolio, un espace où vous allez découvrir mon parcours scolaire et les différents projets que j\'ai réalisés au cours de ma formation.'); ?>
                </p>
            </div>

            <!-- Call to Action circulaire -->
            <div class="lg:col-start-10 lg:col-span-3 flex justify-end items-start md:mt-0 mt-12 lg:-mt-32">
                <div class="fade-in" style="transition-delay: 600ms;">
                    <button data-scroll-to="projects" class="w-44 h-44 md:w-72 md:h-72 rounded-full border border-gray-100 flex items-center justify-center group hover:border-black transition-all duration-700 relative overflow-hidden bg-white shadow-sm hover:shadow-xl">
                        <div class="absolute inset-0 bg-black translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></div>
                        <span class="label-caps text-base md:text-xl text-center relative z-10 transition-colors duration-500 group-hover:text-white leading-tight">
                            Découvrir<br/>mes projets
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Indicateur de défilement (Scroll Indicator) -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-4 z-10 fade-in" style="transition-delay: 800ms;">
        <span class="label-caps text-[8px] text-gray-300">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-black to-transparent animate-pulse"></div>
    </div>

</section>
