// Data
let PROJECTS = (window.PHP_PROJECTS && window.PHP_PROJECTS.length > 0) ? window.PHP_PROJECTS : [];
let TECH_WATCH = (window.PHP_VEILLE && window.PHP_VEILLE.length > 0) ? window.PHP_VEILLE : [];
let TIMELINE = (window.PHP_TIMELINE && window.PHP_TIMELINE.length > 0) ? window.PHP_TIMELINE : [
  {
    id: 't1',
    title: 'BTS SIO - Option SLAM',
    organization: 'Lycée XYZ - Ville',
    period: '2023 - Présent',
    description: 'Services Informatiques aux Organisations. Spécialité Solutions Logicielles et Applications Métiers.',
    category: 'formation'
  },
  {
    id: 't2',
    title: 'Stage Développeur Fullstack',
    organization: 'Tech-Innova',
    period: 'Mai 2024 - Juin 2024',
    description: 'Développement de nouvelles fonctionnalités sur une plateforme SaaS existante. Refonte de composants UI et optimisation des requêtes SQL.',
    category: 'experience'
  },
  {
    id: 't3',
    title: 'Certification Oracle Database',
    organization: 'Oracle Academy',
    period: '2024',
    description: 'Database Programming with SQL.',
    category: 'certification'
  },
  {
    id: 't4',
    title: 'Baccalauréat Général',
    organization: 'Lycée ABC',
    period: '2020 - 2023',
    description: 'Spécialités Mathématiques et Numérique & Sciences Informatiques (NSI).',
    category: 'formation'
  }
];

// Lenis Scroll
let lenis;
if (typeof Lenis !== 'undefined') {
  lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
    wheelMultiplier: 1,
    touchMultiplier: 2,
    lerp: 0.1,
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
}

// Custom Cursor
const cursor = document.querySelector('.custom-cursor');
const cursorDot = document.querySelector('.custom-cursor-dot');

if (cursor && cursorDot) {
  let mouseX = 0;
  let mouseY = 0;
  let cursorX = 0;
  let cursorY = 0;
  let dotX = 0;
  let dotY = 0;

  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  function animateCursor() {
    // Smooth follow for main cursor
    const distX = mouseX - cursorX;
    const distY = mouseY - cursorY;
    cursorX += distX * 0.1;
    cursorY += distY * 0.1;

    cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0) translate(-50%, -50%)`;

    // Faster follow for dot
    const dotDistX = mouseX - dotX;
    const dotDistY = mouseY - dotY;
    dotX += dotDistX * 0.2;
    dotY += dotDistY * 0.2;

    cursorDot.style.transform = `translate3d(${dotX}px, ${dotY}px, 0) translate(-50%, -50%)`;

    requestAnimationFrame(animateCursor);
  }
  animateCursor();

  // Hover effects
  function updateCursorHovers() {
    const interactiveElements = document.querySelectorAll('a, button, input, textarea, .cursor-pointer');
    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => cursor.classList.add('scale-150'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('scale-150'));
    });
  }
  updateCursorHovers();
}

// Navbar Scroll Effect
const navbar = document.querySelector('nav');
window.addEventListener('scroll', () => {
  if (window.scrollY > 40) {
    if (navbar) {
      navbar.classList.add('bg-white', 'border-b', 'border-gray-100', 'py-4');
      navbar.classList.remove('bg-transparent', 'py-8');
    }
  } else {
    if (navbar) {
      navbar.classList.remove('bg-white', 'border-b', 'border-gray-100', 'py-4');
      navbar.classList.add('bg-transparent', 'py-8');
    }
  }
});

// Smooth Scroll to Anchors
document.querySelectorAll('a[href^="#"], button[data-scroll-to]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href')?.substring(1) || this.getAttribute('data-scroll-to');
    const targetElement = document.getElementById(targetId);

    if (targetElement) {
      if (lenis) {
        const offset = 80;
        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = targetElement.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;
        lenis.scrollTo(offsetPosition, { duration: 1.5 });
      } else {
        targetElement.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
});

// Timeline Tabs
const timelineContainer = document.getElementById('timeline-container');
const timelineTabs = document.querySelectorAll('.timeline-tab');

if (timelineContainer && timelineTabs.length > 0) {
  function renderTimeline(category) {
    const items = TIMELINE.filter(item => item.category === category);
    const icons = {
      'formation': 'book-open',
      'experience': 'briefcase',
      'certification': 'award'
    };

    timelineContainer.innerHTML = items.map(item => `
      <div class="relative group fade-in">
        <!-- Vertical Line & Dot Enhancement -->
        <div class="absolute -left-[54px] top-1.5 w-3 h-3 bg-white border-2 border-black rounded-full z-10 group-hover:bg-blue-600 group-hover:border-blue-600 transition-colors duration-500"></div>
        
        <!-- Card Content -->
        <div class="bg-white/40 backdrop-blur-sm border border-gray-100 rounded-2xl p-8 hover:bg-black transition-all duration-500 relative overflow-hidden group/card">
          <!-- Category Background Icon -->
          <div class="absolute right-6 top-6 text-gray-100/50 group-hover/card:text-white/5 transition-colors duration-500">
            <i data-feather="${icons[category] || 'minus'}" class="w-16 h-16"></i>
          </div>
          
          <div class="relative z-10">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-4 group-hover/card:text-white/40 transition-colors">${item.period}</span>
            <h3 class="text-2xl md:text-3xl font-extrabold font-['Space_Grotesk'] uppercase tracking-tight group-hover/card:text-white transition-colors duration-500">${item.title}</h3>
            <div class="flex items-center gap-3 mt-3 mb-6">
              <div class="w-8 h-px bg-blue-600"></div>
              <p class="text-blue-600 font-bold text-[11px] uppercase tracking-widest">${item.organization}</p>
            </div>
            <p class="text-gray-500 text-base md:text-lg font-light leading-relaxed max-w-2xl group-hover/card:text-white/60 transition-colors">${item.description}</p>
          </div>
        </div>
      </div>
    `).join('');

    if (typeof feather !== 'undefined') feather.replace();
    observeElements();
  }

  const indicator = document.getElementById('timeline-indicator');

  timelineTabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
      // Update active state
      timelineTabs.forEach(t => {
        t.classList.remove('text-white');
        t.classList.add('text-gray-400', 'hover:text-black');
      });
      tab.classList.remove('text-gray-400', 'hover:text-black');
      tab.classList.add('text-white');

      // Move Indicator
      if (indicator) {
        const offset = index * (38 + 16); // height + gap
        indicator.style.transform = `translateY(${offset}px)`;
      }

      renderTimeline(tab.dataset.category);
    });
  });

  // Initial render
  renderTimeline('formation');
}

// Projects Render (Home)
function renderHomeProjects() {
  const projectsGrid = document.getElementById('projects-grid');
  if (projectsGrid) {
    projectsGrid.innerHTML = PROJECTS.slice(0, 4).map((project, idx) => `
        <div class="group cursor-pointer bg-white/40 backdrop-blur-sm border border-gray-100 rounded-[2rem] p-6 md:p-8 space-y-8 hover:bg-black transition-all duration-700 fade-in-up shadow-sm hover:shadow-2xl" onclick="openProjectModal('${project.id}')" style="transition-delay: ${idx * 100}ms">
          <!-- Image Wrapper -->
          <div class="aspect-[16/10] overflow-hidden rounded-[1.5rem] bg-gray-100 border border-gray-100 relative">
            <img 
              src="${project.image_url || project.thumbnail}" 
              alt="${project.title}" 
              class="w-full h-full object-cover grayscale opacity-90 transition-all duration-1000 group-hover:scale-110 group-hover:grayscale-0 group-hover:opacity-100"
            />
            <div class="absolute top-6 right-6 w-12 h-12 rounded-full bg-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 scale-90 group-hover:scale-100">
              <i data-feather="arrow-up-right" class="text-black"></i>
            </div>
          </div>
          
          <div class="flex justify-between items-end pb-2">
            <div class="space-y-3">
              <div class="flex gap-4">
                <span class="px-3 py-1 bg-white border border-gray-100 rounded-lg text-[9px] font-bold tracking-widest text-black uppercase group-hover:bg-white/10 group-hover:text-white group-hover:border-white/10 transition-colors duration-500">
                  ${project.category || 'PROJET'}
                </span>
              </div>
              <h3 class="text-2xl md:text-3xl font-bold uppercase font-['Space_Grotesk'] tracking-tight group-hover:text-white transition-colors duration-500">${project.title}</h3>
            </div>
            <span class="label-caps text-gray-200 group-hover:text-white/20 transition-colors duration-500 text-2xl font-black">0${idx + 1}</span>
          </div>
        </div>
      `).join('');
    if (typeof feather !== 'undefined') feather.replace();
  }
}

// Modal Scroll Management
function disableScroll() {
  document.body.style.overflow = 'hidden';
  if (lenis) lenis.stop();
}

function enableScroll() {
  document.body.style.overflow = '';
  if (lenis) lenis.start();
}

// Modal Logic
const modal = document.getElementById('project-modal');
const modalContent = document.getElementById('modal-content');
const modalClose = document.getElementById('modal-close');
const modalTitle = document.getElementById('modal-title');

function openProjectModal(projectId) {
  disableScroll();
  const project = PROJECTS.find(p => p.id == projectId);
  if (!project) return;

  if (modalTitle) modalTitle.textContent = project.title;
  if (modalContent) {
    modalContent.innerHTML = `
        <div class="space-y-10">
          <div class="aspect-video bg-gray-100 rounded-xl overflow-hidden">
            <img src="${project.image_url || project.thumbnail}" alt="${project.title}" class="w-full h-full object-cover" />
          </div>

          <div class="grid md:grid-cols-3 gap-12">
            <div class="md:col-span-2 space-y-6">
              <div>
                <h4 class="text-lg font-bold mb-3">Description</h4>
                <p class="text-gray-600 leading-relaxed">
                  ${project.description || project.fullDescription}
                </p>
              </div>
              
              <div class="flex flex-wrap gap-4 pt-4">
                ${project.project_url ? `
                  <a href="${project.project_url}" target="_blank" class="flex items-center gap-2 bg-black text-white px-6 py-2.5 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">
                    <i data-feather="external-link"></i>
                    <span>Lien direct</span>
                  </a>
                ` : ''}
              </div>
            </div>

            <div class="space-y-8">
              <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Catégorie</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-50 text-black text-[11px] font-bold rounded-lg border border-gray-100">
                      ${project.category}
                    </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
  }

  if (modal) {
    modal.classList.remove('hidden');
    setTimeout(() => {
      modal.classList.remove('opacity-0');
      const inner = modal.querySelector('.scale-95');
      if (inner) {
        inner.classList.remove('scale-95', 'opacity-0');
        inner.classList.add('scale-100', 'opacity-100');
      }
    }, 10);
  }

  if (typeof feather !== 'undefined') feather.replace();
}

function closeModal() {
  enableScroll();
  if (modal) {
    modal.classList.add('opacity-0');
    const inner = modal.querySelector('.scale-100');
    if (inner) {
      inner.classList.remove('scale-100', 'opacity-100');
      inner.classList.add('scale-95', 'opacity-0');
    }

    setTimeout(() => {
      modal.classList.add('hidden');
    }, 300);
  }
}

if (modalClose) {
  modalClose.addEventListener('click', closeModal);
}
if (modal) {
  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });
}

// Intersection Observer for Animations
function observeElements() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-in');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-in, .fade-in-up').forEach(el => {
    observer.observe(el);
  });
}

// Helpers for Tech Watch
function getRelativeTime(dateString) {
  const date = new Date(dateString);
  const now = new Date();
  const diffInSeconds = Math.floor((now - date) / 1000);

  if (diffInSeconds < 60) return `Il y a quelques secondes`;
  if (diffInSeconds < 3600) return `Il y a ${Math.floor(diffInSeconds / 60)} min`;
  if (diffInSeconds < 86400) return `Il y a ${Math.floor(diffInSeconds / 3600)}h`;
  if (diffInSeconds < 604800) return `Il y a ${Math.floor(diffInSeconds / 86400)}j`;

  return date.toLocaleDateString('fr-FR');
}

function truncateText(text, limit = 120) {
  if (!text) return '';
  if (text.length <= limit) return text;
  return text.substring(0, limit) + '...';
}

// Initialize Everything
document.addEventListener('DOMContentLoaded', async () => {
  renderHomeProjects();

  const techGrid = document.getElementById('tech-watch-container');
  if (techGrid && window.PHP_VEILLE && window.PHP_VEILLE.length > 0) {
    // Fallback Icons Mapping
    const categoryIcons = {
      'IA': 'cpu',
      'INTELLIGENCE ARTIFICIELLE': 'cpu',
      'CYBERSÉCURITÉ': 'shield',
      'SÉCURITÉ': 'shield',
      'DEVELOPPEMENT': 'code',
      'PROGRAMMATION': 'code',
      'DESIGN': 'layout',
      'UX/UI': 'layout',
      'WEB': 'globe',
      'CLOUD': 'cloud'
    };

    let isVeilleExpanded = false;

    function renderTechWatch() {
      const displayCount = isVeilleExpanded ? TECH_WATCH.length : 3;
      const articlesToShow = TECH_WATCH.slice(0, displayCount);

      techGrid.innerHTML = articlesToShow.map((article, idx) => {
        const categories = (article.category || 'TECH').split(',').map(c => c.trim());
        const firstCategory = categories[0].toUpperCase();
        const icon = categoryIcons[firstCategory] || 'rss';
        const hasOpinion = article.opinion && article.opinion.trim() !== '';

        return `
          <div class="tech-card group relative aspect-[4/5] overflow-hidden rounded-[2rem] border border-gray-100 bg-white/40 backdrop-blur-sm flex flex-col hover:bg-black transition-all duration-700 fade-in shadow-sm hover:-translate-y-2 cursor-pointer" 
               style="transition-delay: ${idx * 100}ms"
               onclick="openVeilleModal(${idx})">
              
              <!-- Icon Section (No more images) -->
              <div class="h-1/2 w-full overflow-hidden relative bg-gradient-to-br from-gray-50 to-gray-100 group-hover:from-gray-900 group-hover:to-black transition-all duration-700 flex items-center justify-center">
                  <i data-feather="${icon}" class="w-16 h-16 text-gray-200 group-hover:text-white/10 group-hover:scale-125 transition-all duration-700"></i>
                  
                  <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent group-hover:from-black/40 transition-all"></div>
                  
                  <div class="absolute top-6 left-6 flex flex-wrap gap-2 z-20">
                     ${categories.map(cat => `
                         <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-lg text-[8px] font-black tracking-widest text-black uppercase shadow-sm group-hover:bg-white/20 group-hover:text-white transition-colors">
                              ${cat}
                          </span>
                     `).join('')}
                  </div>

                  <div class="absolute top-6 right-6 flex flex-col gap-3 z-20">
                      ${hasOpinion ? `
                          <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110" title="Voir mon avis">
                              <i data-feather="message-circle" class="w-4 h-4"></i>
                          </div>
                      ` : ''}
                      <button onclick="event.stopPropagation(); window.open('${article.article_url || article.link}', '_blank')" class="w-8 h-8 bg-white/90 backdrop-blur-md text-black rounded-full flex items-center justify-center shadow-lg transition-all hover:scale-110 hover:!bg-blue-600 hover:!text-white group-hover:bg-white/20 group-hover:text-white" title="Ouvrir dans un nouvel onglet">
                          <i data-feather="external-link" class="w-3.5 h-3.5"></i>
                      </button>
                  </div>
              </div>

              <!-- Content Section -->
              <div class="p-8 flex flex-col justify-between flex-grow bg-white/60 backdrop-blur-md relative z-0 group-hover:bg-transparent transition-colors">
                  <div class="space-y-4">
                      <div class="flex justify-between items-center text-[9px] font-bold text-gray-400 uppercase tracking-widest group-hover:text-white/40 transition-colors">
                          <span>${article.source_name || 'Source Inconnue'}</span>
                          <span>${getRelativeTime(article.published_at)}</span>
                      </div>
                      <h3 class="text-xl font-bold uppercase leading-tight font-['Space_Grotesk'] tracking-tight group-hover:text-white transition-colors line-clamp-3">
                          ${article.title}
                      </h3>
                      <p class="text-xs text-gray-500 font-light leading-relaxed group-hover:text-white/60 transition-colors">
                          ${truncateText(article.summary || article.description, 100)}
                      </p>
                  </div>

                  <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-black/40 group-hover:text-white transition-colors">
                     <span>Découvrir l'article</span>
                     <i data-feather="arrow-right" class="w-3 h-3 translate-x-0 group-hover:translate-x-1 transition-transform"></i>
                  </div>
              </div>
          </div>
        `;
      }).join('');

      // Toggle Button logic
      if (TECH_WATCH.length > 3) {
        let existingBtn = document.getElementById('toggle-veille-container');
        if (!existingBtn) {
          existingBtn = document.createElement('div');
          existingBtn.id = 'toggle-veille-container';
          existingBtn.className = 'col-span-full flex justify-center mt-12';
          techGrid.after(existingBtn);
        }

        existingBtn.innerHTML = `
            <button id="toggle-veille" class="group flex items-center gap-4 px-10 py-5 bg-white border border-gray-100 rounded-2xl hover:bg-black hover:text-white transition-all duration-500 shadow-sm hover:shadow-2xl">
                <span class="text-[10px] font-black uppercase tracking-[0.3em]">${isVeilleExpanded ? 'Réduire' : 'Voir plus d\'articles'}</span>
                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-white/10 transition-colors">
                    <i data-feather="${isVeilleExpanded ? 'chevron-up' : 'chevron-down'}" class="w-4 h-4 text-black group-hover:text-white"></i>
                </div>
            </button>
        `;

        const btn = document.getElementById('toggle-veille');
        btn.onclick = (e) => {
          e.preventDefault();
          isVeilleExpanded = !isVeilleExpanded;
          renderTechWatch();
          if (!isVeilleExpanded) {
            const section = document.getElementById('tech-watch');
            if (section) section.scrollIntoView({ behavior: 'smooth' });
          }
        };
      }

      if (typeof feather !== 'undefined') feather.replace();
      observeElements();
    }
    renderTechWatch();
  }

  observeElements(); // Initial trigger for other elements

  // Modal Veille Logic
  const vModal = document.getElementById('veille-modal');
  const vIframe = document.getElementById('veille-iframe');
  const vLoader = document.getElementById('veille-loader');
  const vClose = document.getElementById('veille-close');
  const vSide = document.getElementById('veille-side-panel');

  window.openVeilleModal = (idx) => {
    const art = window.PHP_VEILLE[idx];
    if (!art) return;

    document.getElementById('veille-modal-title').textContent = art.title;
    document.getElementById('veille-modal-category').textContent = art.category;
    document.getElementById('veille-modal-source').textContent = art.source_name;
    document.getElementById('veille-modal-date').textContent = getRelativeTime(art.published_at);
    document.getElementById('veille-modal-link').href = art.article_url || art.link;

    const opContainer = document.getElementById('veille-opinion-container');
    const opText = document.getElementById('veille-modal-opinion');
    if (art.opinion && art.opinion.trim() !== '') {
      opText.textContent = art.opinion;
      opContainer.classList.remove('hidden');
    } else {
      opContainer.classList.add('hidden');
    }

    vLoader.style.opacity = '1';
    vLoader.classList.remove('hidden');
    vIframe.src = art.article_url || art.link;

    vIframe.onload = () => {
      vLoader.style.opacity = '0';
      setTimeout(() => vLoader.classList.add('hidden'), 500);
    };

    vModal.classList.remove('hidden');
    setTimeout(() => {
      vModal.classList.add('opacity-100');
      vModal.querySelector('.relative').classList.remove('scale-95', 'opacity-0');
    }, 10);

    disableScroll();
  };

  const closeVeille = () => {
    vModal.classList.remove('opacity-100');
    vModal.querySelector('.relative').classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
      vModal.classList.add('hidden');
      vIframe.src = '';
      enableScroll();
    }, 300);
  };

  vClose?.addEventListener('click', closeVeille);
  vModal?.addEventListener('click', (e) => {
    if (e.target === vModal.querySelector('.absolute')) closeVeille();
  });

  if (typeof feather !== 'undefined') feather.replace();

  observeElements();
  if (typeof updateCursorHovers === 'function') updateCursorHovers();
});

// About Modal
const aboutModal = document.getElementById('about-modal');
const aboutBtn = document.getElementById('about-btn');
const aboutClose = document.getElementById('about-close');

if (aboutModal && aboutBtn && aboutClose) {
  aboutBtn.addEventListener('click', () => {
    disableScroll();
    aboutModal.classList.remove('hidden');
    setTimeout(() => {
      aboutModal.classList.remove('opacity-0');
      const inner = aboutModal.querySelector('.scale-95');
      if (inner) {
        inner.classList.remove('scale-95', 'opacity-0');
        inner.classList.add('scale-100', 'opacity-100');
      }
    }, 10);
  });

  function closeAboutModal() {
    enableScroll();
    aboutModal.classList.add('opacity-0');
    const inner = aboutModal.querySelector('.scale-100');
    if (inner) {
      inner.classList.remove('scale-100', 'opacity-100');
      inner.classList.add('scale-95', 'opacity-0');
    }
    setTimeout(() => aboutModal.classList.add('hidden'), 300);
  }

  aboutClose.addEventListener('click', closeAboutModal);
  aboutModal.addEventListener('click', (e) => {
    if (e.target === aboutModal) closeAboutModal();
  });
}

// BTS Modal
const btsModal = document.getElementById('bts-modal');
const btsBtn = document.getElementById('bts-btn');
const btsClose = document.getElementById('bts-close');

if (btsModal && btsBtn && btsClose) {
  btsBtn.addEventListener('click', () => {
    disableScroll();
    btsModal.classList.remove('hidden');
    setTimeout(() => {
      btsModal.classList.remove('opacity-0');
      const inner = btsModal.querySelector('.scale-95');
      if (inner) {
        inner.classList.remove('scale-95', 'opacity-0');
        inner.classList.add('scale-100', 'opacity-100');
      }
    }, 10);
  });

  function closeBtsModal() {
    enableScroll();
    btsModal.classList.add('opacity-0');
    const inner = btsModal.querySelector('.scale-100');
    if (inner) {
      inner.classList.remove('scale-100', 'opacity-100');
      inner.classList.add('scale-95', 'opacity-0');
    }
    setTimeout(() => btsModal.classList.add('hidden'), 300);
  }

  btsClose.addEventListener('click', closeBtsModal);
  btsModal.addEventListener('click', (e) => {
    if (e.target === btsModal) closeBtsModal();
  });
}
