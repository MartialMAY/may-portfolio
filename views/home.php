<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Martial MAYAMOU | Portfolio Développeur</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
  
  <!-- Icons & Scroll Library -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://unpkg.com/lenis@1.0.45/dist/lenis.min.js"></script>
  
  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
  <!-- Injecting PHP Data to JS -->
  <script>
    window.PHP_PROJECTS = <?php echo json_encode($projects); ?>;
    window.PHP_STATS = <?php echo json_encode($stats); ?>;
    window.PHP_VEILLE = <?php echo json_encode($veille ?? []); ?>;
    window.PHP_TIMELINE = <?php echo json_encode($timeline ?? []); ?>;
  </script>

  <div class="grain-overlay"></div>
  <div class="bg-grid"></div>
  
  <!-- Custom Cursor -->
  <div class="custom-cursor"></div>
  <div class="custom-cursor-dot"></div>

  <!-- Structural Lines -->
  <div class="fixed inset-0 pointer-events-none z-[-1]">
    <div class="container-main h-full flex justify-between pointer-events-none">
      <div class="relative h-full w-20 -mx-10 pointer-events-auto group">
        <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
      </div>
      <div class="relative h-full w-20 -mx-10 pointer-events-auto group hidden md:block">
        <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
      </div>
      <div class="relative h-full w-20 -mx-10 pointer-events-auto group hidden lg:block">
        <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
      </div>
      <div class="relative h-full w-20 -mx-10 pointer-events-auto group">
        <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-8">
    <div class="container-main flex items-center justify-between">
      <a href="/" class="flex items-center">
        <div class="w-10 h-10 bg-black text-white flex items-center justify-center text-[12px] font-bold tracking-tighter">MM</div>
      </a>

      <div class="hidden lg:flex items-center gap-12">
        <button data-scroll-to="about" class="label-caps text-gray-400 hover:text-black transition-colors">À propos</button>
        <button data-scroll-to="skills" class="label-caps text-gray-400 hover:text-black transition-colors">Compétences</button>
        <button data-scroll-to="projects" class="label-caps text-gray-400 hover:text-black transition-colors">Projets</button>
        <button data-scroll-to="bts" class="label-caps text-gray-400 hover:text-black transition-colors">BTS SIO</button>
      </div>

      <div class="flex items-center gap-4 md:gap-6">
        <div class="hidden sm:flex items-center gap-4">
          <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition-all duration-300" aria-label="LinkedIn">
            <i data-feather="linkedin" class="w-4 h-4"></i>
          </a>
          <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-400 hover:text-black hover:border-black transition-all duration-300" aria-label="GitHub">
            <i data-feather="github" class="w-4 h-4"></i>
          </a>
        </div>
        
        <button data-scroll-to="contact" class="px-6 md:px-8 py-3 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all">
          Contact
        </button>
      </div>
    </div>
  </nav>

  <div class="flex flex-col min-h-screen">
    <main class="flex-grow">
      
      <!-- Hero -->
      <section class="min-h-screen flex flex-col justify-center bg-transparent relative overflow-hidden">
        <div class="container-main pt-44 pb-20 relative z-10">
          <div class="grid lg:grid-cols-12 gap-y-12 items-start">
            
            <div class="lg:col-span-12 space-y-10">
              <div class="space-y-6">
                <div class="overflow-hidden">
                  <p class="label-caps text-gray-500 font-medium tracking-[0.2em] !text-[12px] md:!text-[16px] fade-in">
                    Salut, je suis <span class="text-black font-bold">Martial MAYAMOU</span>
                  </p>
                </div>

                <div class="overflow-hidden">
                  <h1 class="display-title text-[12vw] md:text-[9vw] leading-[0.82] tracking-tighter fade-in-up" style="transition-delay: 200ms;">
                    Développeur<br/>
                    <span class="text-transparent" style="-webkit-text-stroke: 1.5px #000;">Web</span>
                  </h1>
                </div>
              </div>
            </div>

            <div class="lg:col-span-6 mt-8 md:mt-12">
              <p class="text-[14px] md:text-[16px] text-gray-400 leading-relaxed font-light tracking-tight max-w-md fade-in" style="transition-delay: 400ms;">
                Étudiant en <span class="text-black font-semibold">BTS SIO SLAM</span>, je vous présente mon portfolio, un espace où vous allez découvrir mon parcours scolaire et les différents projets que j'ai réalisés au cours de ma formation.
              </p>
            </div>

            <div class="lg:col-start-10 lg:col-span-3 flex justify-end items-end md:mt-0 mt-12">
              <div class="fade-in" style="transition-delay: 600ms;">
                <button data-scroll-to="projects" class="w-32 h-32 md:w-52 md:h-52 rounded-full border border-gray-100 flex items-center justify-center group hover:border-black transition-all duration-700 relative overflow-hidden bg-white shadow-sm hover:shadow-xl">
                  <div class="absolute inset-0 bg-black translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></div>
                  <span class="label-caps text-center relative z-10 transition-colors duration-500 group-hover:text-white leading-relaxed">
                    Découvrir<br/>mes projets
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="absolute bottom-20 left-1/2 -translate-x-1/2 flex flex-col items-center gap-4 z-10 fade-in" style="transition-delay: 800ms;">
          <span class="label-caps text-[8px] text-gray-300">Scroll</span>
          <div class="w-px h-12 bg-gradient-to-b from-black to-transparent animate-pulse"></div>
        </div>
      </section>

      <!-- About -->
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
                    Je m’appelle <span class="text-black font-bold">MAYAMOU BATETANA Martial</span> !
                    Actuellement étudiant en deuxième année de <span class="text-black font-medium">BTS SIO</span> (Services Informatiques aux Organisations), avec une spécialité <span class="text-black font-medium">SLAM</span> (Solutions Logicielles et Applications Métier), je suis en voie de formation dans le secteur du développement, des bases de données ainsi que des systèmes d’information.
                  </p>
                  <p class="text-xl text-gray-500 font-light leading-relaxed">
                    Étudiant au lycée <span class="text-black font-medium">Paul Claudel à Laon</span>, l’établissement me permet de me former afin de répondre au mieux aux besoins des entreprises en concevant des solutions logicielles adaptées.
                  </p>
                </div>
                
                <!-- <div class="grid sm:grid-cols-3 gap-8 border-y border-gray-100 py-16">
                  <?php //foreach ($stats as $stat): ?>
                  <div class="space-y-2">
                    <span class="text-4xl font-bold font-['Space_Grotesk']"><?php //echo htmlspecialchars($stat['value']); ?></span>
                    <span class="label-caps text-gray-400 block"><?php //echo htmlspecialchars($stat['label']); ?></span>
                  </div>
                  <?php //endforeach; ?>
                </div> -->

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

      <!-- Skills -->
      <div class="section-border">
        <section id="skills" class="py-24 md:py-40 bg-transparent">
          <div class="container-main">
            <div class="mb-20">
              <span class="label-caps text-blue-600 block mb-6">Toolbox</span>
              <h2 class="display-title text-5xl md:text-7xl tracking-tighter uppercase">Compétences</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Development - Large Card -->
              <div class="lg:col-span-2 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                  <i data-feather="code" class="w-72 h-72"></i>
                </div>
                <div class="relative z-10">
                  <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                    Programmation & Développement
                    <i data-feather="code" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                  </h3>
                  <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-4">
                    <?php foreach(['HTML & CSS', 'PHP', 'JavaScript', 'Flutter', 'WordPress', 'Python', 'C#', 'SQL'] as $skill): ?>
                    <div class="flex items-center gap-4 group/item cursor-default">
                      <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                      <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              
              <!-- Databases -->
              <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                  <i data-feather="database" class="w-64 h-64"></i>
                </div>
                <div class="relative z-10">
                  <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                    Bases de données
                    <i data-feather="database" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                  </h3>
                  <div class="flex flex-col gap-4">
                    <?php foreach(['MySQL', 'Firebase'] as $skill): ?>
                    <div class="flex items-center gap-4 group/item cursor-default">
                      <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                      <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>

              <!-- Network & Security -->
              <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                  <i data-feather="shield" class="w-64 h-64"></i>
                </div>
                <div class="relative z-10">
                  <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                    Réseaux & Sécurité
                    <i data-feather="shield" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                  </h3>
                  <div class="flex flex-col gap-4">
                    <?php foreach(['Cybersécurité', 'Virtualisation', 'GLPI', 'Script Bash'] as $skill): ?>
                    <div class="flex items-center gap-4 group/item cursor-default">
                      <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                      <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>

              <!-- Management -->
              <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                  <i data-feather="clipboard" class="w-64 h-64"></i>
                </div>
                <div class="relative z-10">
                  <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                    Gestion de projet
                    <i data-feather="clipboard" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                  </h3>
                  <div class="flex flex-col gap-4">
                    <?php foreach(['GANTT', 'Notion', 'GitHub'] as $skill): ?>
                    <div class="flex items-center gap-4 group/item cursor-default">
                      <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                      <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>

              <!-- Design - Spanning on larger screens -->
              <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 md:p-12 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                  <i data-feather="feather" class="w-64 h-64"></i>
                </div>
                <div class="relative z-10">
                  <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                    Graphisme & Design
                    <i data-feather="feather" class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                  </h3>
                  <div class="flex flex-col gap-4">
                    <?php foreach(['Illustrator', 'Logo Design', 'Photoshop', 'Figma', 'InDesign'] as $skill): ?>
                    <div class="flex items-center gap-4 group/item cursor-default">
                      <div class="w-1.5 h-1.5 rounded-full bg-blue-600 opacity-0 group-hover/item:opacity-100 transition-opacity"></div>
                      <span class="label-caps text-[11px] text-gray-500 group-hover:text-white/60 transition-colors duration-500"><?php echo $skill; ?></span>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Timeline -->
      <div class="section-border">
        <section id="journey" class="py-24 md:py-48 bg-transparent">
          <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-12">
              <div class="lg:col-span-4">
                <span class="text-[10px] font-bold uppercase tracking-[0.5em] text-blue-600 mb-6 block">Chronologie</span>
                <h2 class="text-5xl md:text-7xl font-extrabold font-['Space_Grotesk'] uppercase tracking-tighter leading-none mb-12">Parcours</h2>
                
                <div class="relative flex flex-col items-start gap-4 p-2 bg-gray-50/50 rounded-2xl max-w-[280px]">
                  <!-- Active Indicator Background (Hidden on Mobile) -->
                  <div id="timeline-indicator" class="hidden lg:block absolute left-2 top-2 w-[calc(100%-1rem)] h-[38px] bg-black rounded-lg transition-all duration-500 ease-out z-0"></div>
                  
                  <button data-category="formation" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-white w-full text-left">Formations</button>
                  <button data-category="experience" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-gray-400 hover:text-black w-full text-left">Expériences</button>
                  <button data-category="certification" class="timeline-tab relative z-10 px-6 py-2.5 rounded-lg text-[10px] font-bold uppercase tracking-[0.4em] transition-all text-gray-400 hover:text-black w-full text-left">Certifications</button>
                </div>
              </div>

              <div class="lg:col-span-8">
                <div id="timeline-container" class="relative border-l border-gray-100 ml-4 pl-12 min-h-[400px] space-y-16">
                  <!-- Rendered by JS -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Projects -->
      <div class="section-border">
        <section id="projects" class="py-24 md:py-40 bg-transparent">
          <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-16 mb-24 md:mb-32">
              <div class="lg:col-span-4">
                <span class="label-caps text-blue-600 block mb-6">Sélection</span>
                <h2 class="display-title text-5xl md:text-7xl">Projets</h2>
              </div>
              <div class="lg:col-span-8 flex justify-end items-end">
                <a href="#" class="label-caps border-b border-black pb-1 hover:text-blue-600 hover:border-blue-600 transition-all">
                  Tout l'archive
                </a>
              </div>
            </div>

            <div id="projects-grid" class="grid md:grid-cols-2 gap-x-12 gap-y-24">
              <!-- Rendered by JS -->
            </div>
          </div>
        </section>
      </div>

      <!-- BTS SIO -->
      <div class="section-border">
        <section id="bts" class="py-24 md:py-40 bg-transparent">
          <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-16">
              
              <div class="lg:col-span-4">
                <span class="label-caps text-blue-600 block mb-6">Cursus</span>
                <h2 class="display-title text-5xl md:text-7xl">BTS SIO</h2>
              </div>

              <div class="lg:col-span-8 space-y-12">
                <div class="space-y-8">
                  <p class="text-3xl md:text-4xl font-light leading-tight tracking-tight text-gray-800">
                    Qu'est-ce que le <span class="text-black font-bold uppercase">BTS SIO</span> ?
                  </p>
                  <p class="text-xl text-gray-500 font-light leading-relaxed">
                    Le <span class="text-black font-medium">Brevet de Technicien Supérieur (BTS)</span> aux Services Informatiques aux Organisations (SIO) est une filière d'étude <span class="text-blue-600 font-semibold">POST BAC</span>, après un Bac Professionnel Systèmes Numériques par exemple. Dans ce BTS, on peut s'y former en matière de développement web ou application, en réseau et dans le domaine des bases de données.
                  </p>
                  <p class="text-xl text-gray-500 font-light leading-relaxed italic">
                    Le BTS SIO possède deux options :
                  </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                  <!-- SLAM Card -->
                  <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                      <i data-feather="code" class="w-48 h-48"></i>
                    </div>
                    <div class="relative z-10">
                      <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                        Option SLAM
                        <span class="text-[9px] px-2 py-1 bg-blue-600 text-white rounded-full font-bold">Mon choix</span>
                      </h3>
                      <p class="text-gray-500 font-light leading-relaxed group-hover:text-white/60 transition-colors duration-500">
                        L'option <span class="text-black font-medium group-hover:text-white">Solutions Logicielles et Applications Métiers</span> (SLAM) est un cursus intégral axé sur le développement et la gestion de solutions logicielles, formant les étudiants de manière efficace aux professions du développement informatique.
                      </p>
                    </div>
                  </div>

                  <!-- SISR Card -->
                  <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-10 space-y-8 hover:bg-black transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute right-0 top-10 text-gray-100/60 group-hover:text-white/5 opacity-0 group-hover:opacity-100 group-hover:translate-x-4 group-hover:translate-y-4 transition-all duration-700">
                      <i data-feather="server" class="w-48 h-48"></i>
                    </div>
                    <div class="relative z-10">
                      <h3 class="text-xl font-bold uppercase tracking-tight font-['Space_Grotesk'] border-b border-gray-100 pb-6 mb-8 flex justify-between items-center group-hover:text-white group-hover:border-white/10 transition-all duration-500">
                        Option SISR
                      </h3>
                      <p class="text-gray-500 font-light leading-relaxed group-hover:text-white/60 transition-colors duration-500">
                        L'option <span class="text-black font-medium group-hover:text-white">Solutions d'Infrastructure Systèmes et Réseaux</span> (SISR) forme les étudiants pour devenir des experts qualifiés dans la gestion et la sécurisation des systèmes et réseaux informatiques.
                      </p>
                    </div>
                  </div>
                </div>

                <button id="bts-btn" class="flex items-center gap-6 group pt-8">
                  <div class="w-14 h-14 rounded-full border border-black flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all">
                    <i data-feather="arrow-right"></i>
                  </div>
                  <span class="label-caps font-bold">Mon tableau de synthèse des réalisations professionnelles en BTS SIO</span>
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Tech Watch -->
      <div class="section-border">
        <section id="veille" class="py-24 md:py-48 bg-transparent">
          <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-12 mb-24">
              <div class="lg:col-span-8 space-y-8">
                <span class="text-[10px] font-bold uppercase tracking-[0.5em] text-blue-600 mb-6 block">Recherche</span>
                <h2 class="text-5xl md:text-7xl font-extrabold font-['Space_Grotesk'] uppercase tracking-tighter leading-none">Veille Technologique</h2>
                
                <div class="space-y-6 max-w-4xl pt-8">
                  <p class="text-2xl md:text-3xl font-light leading-tight tracking-tight text-gray-800">
                    Qu'est-ce que la <span class="text-black font-bold uppercase">veille technologique</span> ?
                  </p>
                  <p class="text-lg text-gray-500 font-light leading-relaxed">
                    La veille technologique est un processus organisé de collecte, de traitement et de diffusion d'informations sur des innovations techniques, produits, procédés de fabrication, matériaux, brevets, normes, réglementation, concurrents dans un domaine donné.
                  </p>
                  <p class="text-lg text-gray-500 font-light leading-relaxed">
                    Son objectif principal est <span class="text-blue-600 font-semibold">d'anticiper les évolutions technologiques</span>, d'identifier les opportunités et les menaces, de faire évoluer l'innovation et de renforcer la compétitivité d'une organisation ou d'un individu.
                  </p>

                  <div class="pt-10">
                    <p class="label-caps text-gray-400 mb-8">Mes axes de veille stratégique</p>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                      <!-- Programming -->
                      <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                          <i data-feather="code" class="w-5 h-5"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Développement</span>
                      </div>
                      <!-- Security -->
                      <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                        <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                          <i data-feather="shield" class="w-5 h-5"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Cybersécurité</span>
                      </div>
                      <!-- AI -->
                      <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                          <i data-feather="cpu" class="w-5 h-5"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Intelligence Artificielle</span>
                      </div>
                      <!-- UI/UX -->
                      <div class="flex items-center gap-4 p-4 bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-black group transition-all duration-500">
                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-white/10 group-hover:text-white transition-colors">
                          <i data-feather="layout" class="w-5 h-5"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-800 group-hover:text-white transition-colors">Design UX/UI</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="tech-watch-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <!-- Rendered by JS -->
            </div>

            <!-- Feedly Bento Card -->
            <div class="mt-12 group relative overflow-hidden rounded-[2.5rem] border border-gray-100 bg-white/40 backdrop-blur-md p-8 md:p-12 shadow-sm hover:bg-black transition-all duration-700 fade-in">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-12">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-500 group-hover:bg-white/10 group-hover:border-white/10">
                                <img src="assets/images/feedly_logo_icon_169177.png" alt="Feedly Logo" class="w-6 h-6 object-contain group-hover:brightness-0 group-hover:invert transition-all">
                            </div>
                            <div>
                                <h3 class="display-title text-2xl font-bold uppercase tracking-tighter group-hover:text-white transition-colors">Veille sur Feedly.com</h3>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em] group-hover:text-white/40 transition-colors">Collecteur de flux RSS</p>
                            </div>
                        </div>
                        <p class="text-lg text-gray-500 font-light leading-relaxed max-w-3xl mb-10 group-hover:text-white/60 transition-colors">
                            En complément de cette section, j'utilise <span class="text-[#2bb24c] font-bold group-hover:text-[#4ade80]">Feedly</span> au quotidien pour centraliser et organiser mes sources d'informations. C'est l'outil qui me permet de rester à la pointe des innovations en un coup d'œil.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture001.png" alt="Capture Feedly 1" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture002.png" alt="Capture Feedly 2" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="group/img relative aspect-video rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group-hover:border-white/10">
                                <img src="assets/images/feedly-capture003.png" alt="Capture Feedly 3" class="w-full h-full object-cover grayscale opacity-80 group-hover/img:grayscale-0 group-hover/img:opacity-100 transition-all duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background Decoration -->
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-[#2bb24c]/[0.02] rounded-full blur-3xl pointer-events-none group-hover:bg-[#2bb24c]/[0.1] transition-colors duration-700"></div>
            </div>
          </div>
        </section>
      </div>

      <!-- Contact -->
      <div class="section-border">
        <section id="contact" class="py-24 md:py-40 bg-black/90 backdrop-blur-md text-white">
          <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-20">
              
              <div class="lg:col-span-4">
                <span class="label-caps text-blue-400 block mb-6">Contact</span>
                <h2 class="display-title text-5xl md:text-7xl">Parlons.<br/>Projets.</h2>
                <div class="mt-12 space-y-6">
                  <div class="space-y-1">
                    <span class="label-caps text-gray-500 block">Email direct</span>
                    <a href="mailto:martial.mayamou@bts.fr" class="text-2xl font-bold hover:text-blue-400 transition-colors">martial.mayamou@bts.fr</a>
                  </div>
                </div>
              </div>

              <div class="lg:col-span-8">
                <form class="space-y-12">
                  <div class="grid md:grid-cols-2 gap-12">
                    <div class="space-y-4">
                      <label class="label-caps text-gray-500">Nom complet</label>
                      <input required type="text" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light" placeholder="John Doe" />
                    </div>
                    <div class="space-y-4">
                      <label class="label-caps text-gray-500">Email professionnel</label>
                      <input required type="email" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light" placeholder="john@company.com" />
                    </div>
                  </div>
                  <div class="space-y-4">
                    <label class="label-caps text-gray-500">Votre message</label>
                    <textarea required rows="4" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light resize-none" placeholder="Décrivez votre projet..."></textarea>
                  </div>
                  <button type="submit" class="w-full md:w-auto px-16 py-6 bg-white text-black rounded-full label-caps hover:bg-blue-500 hover:text-white transition-all font-bold">
                    Envoyer la demande
                  </button>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>

    </main>

    <!-- Footer -->
    <footer class="py-16 bg-transparent border-t border-gray-100">
      <div class="container-main flex flex-col md:flex-row items-center justify-between gap-10">
        <div class="label-caps text-gray-400">
          © 2025 Martial MAYAMOU • SLAM STUDENT
        </div>
        
        <div class="flex items-center gap-10">
          <a href="#" target="_blank" rel="noopener noreferrer" class="label-caps text-gray-400 hover:text-black">LinkedIn</a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="label-caps text-gray-400 hover:text-black">GitHub</a>
          <a href="./login" class="label-caps text-gray-200 hover:text-black transition-colors">Admin</a>
        </div>

        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-3 label-caps text-gray-400 hover:text-black transition-all group">
          <span>Scroll Top</span> <i data-feather="arrow-up" class="group-hover:-translate-y-1 transition-transform"></i>
        </button>
      </div>
    </footer>
  </div>

  <!-- Modals -->
  
  <!-- Project Modal -->
  <div id="project-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-[2rem] p-8 md:p-12 shadow-2xl scale-95 opacity-0 transition-all duration-300" data-lenis-prevent>
      <button id="modal-close" class="absolute top-8 right-8 w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors z-10">
        <i data-feather="x"></i>
      </button>
      <div class="mb-10">
        <h2 id="modal-title" class="display-title text-3xl md:text-5xl"></h2>
      </div>
      <div id="modal-content"></div>
    </div>
  </div>

  <!-- About Modal -->
  <div id="about-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-[2rem] p-8 md:p-12 shadow-2xl scale-95 opacity-0 transition-all duration-300" data-lenis-prevent>
      <div class="absolute top-8 right-8 z-10 flex items-center gap-4">
        <button id="about-close" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="py-10">
          <h2 class="display-title text-3xl md:text-5xl mb-12 text-center uppercase tracking-tighter">Curriculum Vitae</h2>
          <div class="max-w-4xl mx-auto shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
              <img src="assets/images/CV-MartialMAY.jpg" alt="CV Martial MAYAMOU" class="w-full h-auto block" />
          </div>
          
          <div class="mt-12 flex flex-wrap justify-center gap-4">
            <a href="assets/images/CV-MartialMAY.jpg" download class="inline-flex items-center gap-3 px-8 py-4 border border-black rounded-full label-caps hover:bg-gray-50 transition-all font-bold">
              <i data-feather="image"></i>
              <span>Télécharger (JPG)</span>
            </a>
            <a href="assets/CV-MartialMAY--V1.4.pdf" download class="inline-flex items-center gap-3 px-8 py-4 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all font-bold shadow-xl">
              <i data-feather="file-text"></i>
              <span>Télécharger (PDF)</span>
            </a>
          </div>
      </div>
    </div>
  </div>

  <!-- BTS Modal -->
  <div id="bts-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-7xl max-h-[95vh] flex flex-col rounded-[2rem] shadow-2xl scale-95 opacity-0 transition-all duration-300">
      <button id="bts-close" class="absolute top-6 right-6 md:top-8 md:right-8 w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-colors z-20">
        <i data-feather="x"></i>
      </button>
      
      <div class="overflow-y-auto overscroll-contain p-6 md:p-12 h-full rounded-[2rem]" data-lenis-prevent>
        <div class="space-y-16 py-10">
          <div>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12">
              <div>
                <span class="label-caps text-blue-600 mb-4 block">Épreuve E4</span>
                <h4 class="display-title text-3xl md:text-5xl tracking-tight leading-none">Tableau de synthèse<br/>des réalisations</h4>
              </div>
              <a href="assets/tableauE4.pdf" download class="inline-flex items-center gap-3 px-8 py-4 bg-black text-white rounded-full label-caps hover:bg-blue-600 transition-all font-bold shadow-lg">
                <i data-feather="download"></i>
                <span>Télécharger PDF</span>
              </a>
            </div>
            
            <div class="bts-table-container shadow-sm overflow-x-auto">
              <table class="bts-table">
                <thead>
                  <tr>
                    <th class="bts-diagonal">
                      <div class="top-right">Compétences mises en œuvre</div>
                      <div class="bottom-left">Réalisations professionnelles</div>
                    </th>
                    <th class="vertical-text-header">
                      <div class="header-content">Période</div>
                    </th>
                    <?php foreach ($bts_competences as $comp): ?>
                      <th class="vertical-text-header">
                        <div class="header-content">
                          <?php echo htmlspecialchars($comp['label']); ?>
                        </div>
                      </th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $types = [
                    'formation' => 'Réalisation en cours de formation',
                    'pro_1' => 'Réalisations en milieu professionnel en cours de première année',
                    'pro_2' => 'Réalisations en milieu professionnel en cours de seconde année'
                  ];
                  
                  foreach ($types as $type_key => $type_label): 
                    $filtered = array_filter($bts_realisations, function($r) use ($type_key) { return $r['type'] === $type_key; });
                  ?>
                    <tr class="category-row">
                      <td colspan="<?php echo count($bts_competences) + 2; ?>" class="py-2 bg-gray-50 border-y border-black">
                        <?php echo $type_label; ?>
                      </td>
                    </tr>
                    
                    <?php if (empty($filtered)): ?>
                      <tr>
                        <td colspan="<?php echo count($bts_competences) + 2; ?>" class="text-center py-8 text-gray-300 italic">Aucune réalisation enregistrée</td>
                      </tr>
                    <?php else: ?>
                      <?php foreach ($filtered as $real): ?>
                        <tr>
                          <td class="p-4 font-bold text-gray-800 sticky-col"><?php echo htmlspecialchars($real['title']); ?></td>
                          <td class="text-center whitespace-nowrap text-gray-500 px-4"><?php echo htmlspecialchars($real['periode']); ?></td>
                          <?php foreach ($bts_competences as $comp): ?>
                            <td class="text-center p-0">
                              <?php if (in_array($comp['id'], $real['competence_ids'])): ?>
                                <div class="flex items-center justify-center text-blue-600">
                                  <i data-feather="check" class="w-4 h-4"></i>
                                </div>
                              <?php endif; ?>
                            </td>
                          <?php endforeach; ?>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            
            <div class="mt-12 p-8 bg-blue-50/50 rounded-2xl border border-blue-100 flex items-start gap-4">
               <i data-feather="info" class="text-blue-600 flex-shrink-0 mt-1"></i>
               <p class="text-sm text-blue-900 leading-relaxed font-medium mt-1">
                 Ce tableau constitue le document obligatoire pour l'épreuve E4. Il atteste de la variété et de la complexité des situations professionnelles rencontrées.
               </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tech Watch Modal -->
  <div id="veille-modal" class="fixed inset-0 z-[100] flex items-center justify-center px-4 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-md"></div>
    <div class="relative bg-white w-full max-w-[95vw] h-[90vh] overflow-hidden rounded-[2.5rem] shadow-2xl scale-95 opacity-0 transition-all duration-300 flex flex-col md:flex-row">
      <!-- Iframe Content -->
      <div class="flex-grow h-full relative bg-gray-50">
          <div id="veille-loader" class="absolute inset-0 flex items-center justify-center bg-white z-20 transition-opacity duration-500">
              <div class="flex flex-col items-center gap-4">
                  <div class="w-12 h-12 border-4 border-gray-100 border-t-blue-600 rounded-full animate-spin"></div>
                  <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Chargement de la source...</span>
              </div>
          </div>
          <iframe id="veille-iframe" class="w-full h-full border-none relative z-10" src=""></iframe>
      </div>

      <!-- Side Opinion Panel -->
      <div id="veille-side-panel" class="w-full md:w-[400px] h-auto md:h-full bg-white border-l border-gray-100 p-8 md:p-12 flex flex-col justify-between overflow-y-auto" data-lenis-prevent>
          <div class="space-y-10">
              <div class="flex justify-between items-center">
                  <span id="veille-modal-category" class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-bold uppercase tracking-widest"></span>
                  <button id="veille-close" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center hover:bg-black hover:text-white transition-colors">
                    <i data-feather="x"></i>
                  </button>
              </div>
              
              <div class="space-y-4">
                  <h2 id="veille-modal-title" class="display-title text-2xl md:text-3xl font-bold uppercase leading-tight tracking-tighter"></h2>
                  <div class="flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                      <span id="veille-modal-source"></span>
                      <span class="w-1 h-1 rounded-full bg-gray-200"></span>
                      <span id="veille-modal-date"></span>
                  </div>
              </div>

              <div id="veille-opinion-container" class="hidden space-y-4 pt-10 border-t border-gray-100">
                  <div class="flex items-center gap-3">
                      <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-600/20">
                          <i data-feather="message-circle" class="w-4 h-4"></i>
                      </div>
                      <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600">Mon Avis</span>
                  </div>
                  <p id="veille-modal-opinion" class="text-gray-600 text-sm leading-relaxed italic italic font-medium bg-gray-50 p-6 rounded-2xl border border-gray-100"></p>
              </div>
          </div>

          <div class="pt-10">
              <a id="veille-modal-link" href="#" target="_blank" class="w-full py-5 bg-black text-white rounded-2xl font-bold uppercase tracking-widest text-[10px] flex items-center justify-center gap-3 hover:bg-blue-600 transition-all shadow-xl shadow-black/10">
                  Ouvrir dans un nouvel onglet
                  <i data-feather="external-link" class="w-3 h-3"></i>
              </a>
          </div>
      </div>
    </div>
  </div>

  <script src="assets/js/main.js?v=1.0.1"></script>
</body>
</html>