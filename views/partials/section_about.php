<?php
function renderBold($text) {
    $escaped = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    return preg_replace('/\*\*(.*?)\*\*/', '<span class="text-black font-medium">$1</span>', $escaped);
}
$about1 = $settings['about_paragraph1'] ?? 'Je m\'appelle **MAYAMOU BATETANA Martial** ! Actuellement étudiant en deuxième année de **BTS SIO** (Services Informatiques aux Organisations), avec une spécialité **SLAM** (Solutions Logicielles et Applications Métier), je suis en voie de formation dans le secteur du développement, des bases de données ainsi que des systèmes d\'information.';
$about2 = $settings['about_paragraph2'] ?? 'Étudiant au lycée **Paul Claudel à Laon**, l\'établissement me permet de me former afin de répondre au mieux aux besoins des entreprises en concevant des solutions logicielles adaptées.';
?>

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
                            <?php echo renderBold($about1); ?>
                        </p>
                        <p class="text-xl text-gray-500 font-light leading-relaxed">
                            <?php echo renderBold($about2); ?>
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
