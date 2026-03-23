<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project ? 'Modifier' : 'Ajouter'; ?> Projet | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
    </style>
</head>
<body class="bg-[#f8f8f8]">
    <nav class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center fixed top-0 w-full z-50">
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Edition Projet</h1>
        <a href="<?php echo url('/admin/projects'); ?>" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-black">Retour au dashboard</a>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-4xl mx-auto">
        <form method="POST" enctype="multipart/form-data" class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-10">
            <?php echo \App\Core\Security::csrfField(); ?>
            <input type="hidden" name="id" value="<?php echo $project['id'] ?? ''; ?>">
            
            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 md:p-12 shadow-sm space-y-8">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-4 block">Contenu du Projet</span>
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Titre du projet</label>
                            <input type="text" name="title" required value="<?php echo htmlspecialchars($project['title'] ?? ''); ?>" placeholder="Ex: E-commerce Website" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Catégorie</label>
                                <input type="text" name="category" required value="<?php echo htmlspecialchars($project['category'] ?? ''); ?>" placeholder="Ex: WEB DESIGN / PHP" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL du projet</label>
                                <input type="text" name="project_url" value="<?php echo htmlspecialchars($project['project_url'] ?? ''); ?>" placeholder="Ex: https://github.com/..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Description</label>
                            <textarea name="description" required rows="6" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors"><?php echo htmlspecialchars($project['description'] ?? ''); ?></textarea>
                        </div>

                        <!-- Image de Couverture -->
                        <div class="space-y-4 pt-4 border-t border-gray-50">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Image de Couverture (S'affiche sur l'accueil)</label>
                            <div class="flex gap-4 items-center">
                                <div class="w-24 h-24 rounded-2xl bg-gray-50 border border-gray-100 overflow-hidden flex-shrink-0" id="cover-preview">
                                    <img src="<?php echo $project['cover_image'] ? url($project['cover_image']) : 'https://placehold.co/100x100?text=Aperçu'; ?>" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-2">
                                    <div class="flex gap-2">
                                        <input type="text" name="cover_image" id="cover_image_input" 
                                            value="<?php echo htmlspecialchars($project['cover_image'] ?? ''); ?>" 
                                            placeholder="URL de l'image ou upload" 
                                            class="flex-1 p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                                        
                                        <label class="cursor-pointer bg-black text-white p-4 rounded-xl hover:bg-blue-600 transition-all flex items-center justify-center group/cover">
                                            <i data-feather="upload" class="w-5 h-5"></i>
                                            <input type="file" class="hidden" accept="image/*" onchange="uploadCover(this)">
                                        </label>
                                    </div>
                                    <p class="text-[9px] text-gray-400 font-medium">L'image de couverture doit être au format paysage pour un meilleur rendu sur l'accueil.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stack Technique (Badges) -->
                        <div class="space-y-4">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Stack Technique (ex: Next.js, PHP, React...)</label>
                            <div class="flex flex-wrap gap-2 mb-3" id="badge-container">
                                <!-- Badges will be rendered here -->
                            </div>
                            <div class="flex gap-2">
                                <input type="text" id="tech-input" placeholder="Ajouter une techno et appuyer sur Entrée" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors text-sm">
                                <button type="button" onclick="addTechFromInput()" class="px-6 bg-black text-white rounded-xl hover:bg-blue-600 transition-all font-bold text-xs uppercase tracking-widest">
                                    Ajouter
                                </button>
                            </div>
                            <input type="hidden" name="technologies" id="final_technologies" value="<?php echo htmlspecialchars($project['technologies'] ?? ''); ?>">
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Images & Légendes du Carousel</label>
                                <button type="button" onclick="addImageRow()" class="text-[10px] font-bold text-blue-600 uppercase tracking-widest hover:underline flex items-center gap-1">
                                    <i data-feather="plus" class="w-3 h-3"></i> Ajouter une image
                                </button>
                            </div>

                            <div id="images-repeater" class="space-y-4">
                                <!-- Les lignes seront générées ici par JS -->
                            </div>

                            <!-- Input caché qui contient la chaîne finale URL|Légende,URL|Légende -->
                            <input type="hidden" name="image_url" id="final_image_url" value="<?php echo htmlspecialchars($project['image_url'] ?? ''); ?>">

                            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 mt-8">
                                <h4 class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-4 flex items-center gap-2">
                                    <i data-feather="eye" class="w-3 h-3"></i> Aperçu du rendu
                                </h4>
                                <div id="images-preview" class="grid grid-cols-3 gap-4">
                                    <!-- Aperçu dynamique -->
                                </div>
                            </div>
                        </div>

                        <script>
                            let imagesData = [];
                            
                            // Initialisation
                            const initialValue = document.getElementById('final_image_url').value;
                            if (initialValue) {
                                initialValue.split(',').forEach(item => {
                                    const parts = item.split('|');
                                    if(parts[0].trim()) {
                                        imagesData.push({
                                            url: parts[0].trim(),
                                            caption: (parts[1] || "").trim()
                                        });
                                    }
                                });
                            }
                            if (imagesData.length === 0) imagesData.push({ url: '', caption: '' });

                            function renderRepeater() {
                                const container = document.getElementById('images-repeater');
                                container.innerHTML = '';
                                
                                imagesData.forEach((data, index) => {
                                    const row = document.createElement('div');
                                    row.className = 'flex gap-4 items-start bg-gray-50 p-4 rounded-xl border border-gray-100 group';
                                    row.innerHTML = `
                                        <!-- Reorder Buttons -->
                                        <div class="flex flex-col gap-1">
                                            <button type="button" onclick="moveUp(${index})" class="p-1 text-gray-400 hover:text-black transition-colors ${index === 0 ? 'opacity-0 pointer-events-none' : ''}">
                                                <i data-feather="chevron-up" class="w-4 h-4"></i>
                                            </button>
                                            <button type="button" onclick="moveDown(${index})" class="p-1 text-gray-400 hover:text-black transition-colors ${index === imagesData.length - 1 ? 'opacity-0 pointer-events-none' : ''}">
                                                <i data-feather="chevron-down" class="w-4 h-4"></i>
                                            </button>
                                        </div>

                                        <div class="flex-1 space-y-3">
                                            <div class="flex gap-2">
                                                <input type="text" placeholder="Lien de l'image (https://...)" value="${data.url}" 
                                                    oninput="updateData(${index}, 'url', this.value)"
                                                    id="url-input-${index}"
                                                    class="flex-1 p-3 bg-white border border-gray-100 rounded-lg text-sm outline-none focus:border-blue-500 transition-colors">
                                                
                                                <label class="cursor-pointer bg-white border border-gray-100 p-3 rounded-lg hover:border-blue-500 transition-all flex items-center justify-center group/upload" title="Uploader une image">
                                                    <i data-feather="upload" class="w-4 h-4 text-gray-400 group-hover/upload:text-blue-500"></i>
                                                    <input type="file" class="hidden" accept="image/*,image/gif" onchange="uploadImage(${index}, this)">
                                                </label>
                                            </div>
                                            
                                            <input type="text" placeholder="Description courte de l'image" value="${data.caption}" 
                                                oninput="updateData(${index}, 'caption', this.value)"
                                                class="w-full p-3 bg-white border border-gray-100 rounded-lg text-xs outline-none focus:border-blue-500 transition-colors italic">
                                        </div>
                                        
                                        <button type="button" onclick="removeImageRow(${index})" class="p-3 text-gray-400 hover:text-red-500 transition-colors">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    `;
                                    container.appendChild(row);
                                });
                                feather.replace();
                                updateFinalValue();
                                renderPreview();

                                // Drag & drop + paste on each row
                                container.querySelectorAll('.group').forEach((row, index) => {
                                    row.addEventListener('dragover', e => { e.preventDefault(); row.classList.add('border-blue-400', 'bg-blue-50'); });
                                    row.addEventListener('dragleave', () => row.classList.remove('border-blue-400', 'bg-blue-50'));
                                    row.addEventListener('drop', e => {
                                        e.preventDefault();
                                        row.classList.remove('border-blue-400', 'bg-blue-50');
                                        const file = e.dataTransfer.files[0];
                                        if (file && file.type.startsWith('image/')) uploadFileToIndex(index, file, row);
                                    });
                                    const urlInput = row.querySelector('input[type="text"]');
                                    if (urlInput) {
                                        urlInput.addEventListener('paste', e => {
                                            const items = e.clipboardData.items;
                                            for (const item of items) {
                                                if (item.type.startsWith('image/')) {
                                                    e.preventDefault();
                                                    uploadFileToIndex(index, item.getAsFile(), row);
                                                    return;
                                                }
                                            }
                                        });
                                    }
                                });
                            }

                            function moveUp(index) {
                                if (index > 0) {
                                    const temp = imagesData[index];
                                    imagesData[index] = imagesData[index - 1];
                                    imagesData[index - 1] = temp;
                                    renderRepeater();
                                }
                            }

                            function moveDown(index) {
                                if (index < imagesData.length - 1) {
                                    const temp = imagesData[index];
                                    imagesData[index] = imagesData[index + 1];
                                    imagesData[index + 1] = temp;
                                    renderRepeater();
                                }
                            }

                            async function doUpload(file) {
                                const formData = new FormData();
                                formData.append('file', file);
                                const csrfToken = document.querySelector('input[name="csrf_token"]').value;
                                if (csrfToken) formData.append('csrf_token', csrfToken);
                                const response = await fetch('<?php echo url("/admin/upload-ajax"); ?>', { method: 'POST', body: formData });
                                const contentType = response.headers.get("content-type");
                                if (contentType && contentType.includes("application/json")) {
                                    return await response.json();
                                }
                                throw new Error(await response.text());
                            }

                            async function uploadImage(index, input) {
                                if (!input.files || !input.files[0]) return;
                                const row = input.closest('.group');
                                row.classList.add('opacity-50', 'pointer-events-none');
                                try {
                                    const result = await doUpload(input.files[0]);
                                    if (result.success) { updateData(index, 'url', result.url); renderRepeater(); }
                                    else alert("Erreur: " + result.message);
                                } catch(e) { alert("Erreur: " + e.message); }
                                finally { row.classList.remove('opacity-50', 'pointer-events-none'); }
                            }

                            async function uploadFileToIndex(index, file, rowEl) {
                                if (rowEl) rowEl.classList.add('opacity-50', 'pointer-events-none');
                                try {
                                    const result = await doUpload(file);
                                    if (result.success) { updateData(index, 'url', result.url); renderRepeater(); }
                                    else alert("Erreur: " + result.message);
                                } catch(e) { alert("Erreur: " + e.message); }
                                finally { if (rowEl) rowEl.classList.remove('opacity-50', 'pointer-events-none'); }
                            }

                            async function uploadCover(input) {
                                const file = input && input.files ? input.files[0] : input;
                                if (!file) return;
                                const previewContainer = document.getElementById('cover-preview');
                                previewContainer.classList.add('opacity-50');
                                try {
                                    const result = await doUpload(file);
                                    if (result.success) {
                                        document.getElementById('cover_image_input').value = result.url;
                                        previewContainer.querySelector('img').src = result.url;
                                    } else alert("Erreur: " + result.message);
                                } catch(e) { alert("Erreur: " + e.message); }
                                finally { previewContainer.classList.remove('opacity-50'); }
                            }

                            function addImageRow() {
                                imagesData.push({ url: '', caption: '' });
                                renderRepeater();
                            }

                            function removeImageRow(index) {
                                if (imagesData.length > 1) {
                                    imagesData.splice(index, 1);
                                    renderRepeater();
                                }
                            }

                            function updateData(index, field, value) {
                                imagesData[index][field] = value;
                                updateFinalValue();
                                renderPreview();
                            }

                            function updateFinalValue() {
                                const finalStr = imagesData
                                    .filter(d => d.url.trim() !== '')
                                    .map(d => `${d.url.trim()}|${d.caption.trim()}`)
                                    .join(',');
                                document.getElementById('final_image_url').value = finalStr;
                            }

                            function renderPreview() {
                                const preview = document.getElementById('images-preview');
                                preview.innerHTML = '';
                                imagesData.forEach(data => {
                                    if(!data.url) return;
                                    const card = document.createElement('div');
                                    card.className = 'aspect-video rounded-lg overflow-hidden bg-gray-100 border border-gray-200 relative group';
                                    card.innerHTML = `
                                        <img src="${data.url}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/300x200?text=Lien+Invalide'">
                                        <div class="absolute inset-0 bg-black/40 flex items-end p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <p class="text-[8px] text-white leading-tight">${data.caption || 'Pas de légende'}</p>
                                        </div>
                                    `;
                                    preview.appendChild(card);
                                });
                            }

                            // --- Gestion de la Stack Technique (Badges) ---
                            let techStack = [];
                            const techInput = document.getElementById('tech-input');
                            const finalTechInput = document.getElementById('final_technologies');
                            const badgeContainer = document.getElementById('badge-container');

                            // Initialisation
                            if (finalTechInput.value) {
                                techStack = finalTechInput.value.split(',').map(t => t.trim()).filter(t => t !== '');
                            }

                            function renderBadges() {
                                badgeContainer.innerHTML = '';
                                techStack.forEach((tech, index) => {
                                    const badge = document.createElement('span');
                                    badge.className = 'inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold uppercase tracking-widest border border-blue-100 group';
                                    badge.innerHTML = `
                                        ${tech}
                                        <button type="button" onclick="removeTech(${index})" class="hover:text-red-500 transition-colors">
                                            <i data-feather="x" class="w-3 h-3"></i>
                                        </button>
                                    `;
                                    badgeContainer.appendChild(badge);
                                });
                                feather.replace();
                                finalTechInput.value = techStack.join(', ');
                            }

                            function addTechFromInput() {
                                const val = techInput.value.trim();
                                if (val && !techStack.includes(val)) {
                                    techStack.push(val);
                                    techInput.value = '';
                                    renderBadges();
                                }
                            }

                            function removeTech(index) {
                                techStack.splice(index, 1);
                                renderBadges();
                            }

                            if (techInput) {
                                techInput.addEventListener('keydown', (e) => {
                                    if (e.key === 'Enter') {
                                        e.preventDefault();
                                        addTechFromInput();
                                    }
                                });
                            }

                            // Drag & drop + paste on cover
                            document.addEventListener('DOMContentLoaded', () => {
                                renderRepeater();
                                renderBadges();

                                const coverPreview = document.getElementById('cover-preview');
                                const coverInput = document.getElementById('cover_image_input');

                                coverPreview.addEventListener('dragover', e => { e.preventDefault(); coverPreview.classList.add('border-blue-400', 'bg-blue-50'); });
                                coverPreview.addEventListener('dragleave', () => coverPreview.classList.remove('border-blue-400', 'bg-blue-50'));
                                coverPreview.addEventListener('drop', e => {
                                    e.preventDefault();
                                    coverPreview.classList.remove('border-blue-400', 'bg-blue-50');
                                    const file = e.dataTransfer.files[0];
                                    if (file && file.type.startsWith('image/')) uploadCover(file);
                                });

                                coverInput.addEventListener('paste', e => {
                                    const items = e.clipboardData.items;
                                    for (const item of items) {
                                        if (item.type.startsWith('image/')) {
                                            e.preventDefault();
                                            uploadCover(item.getAsFile());
                                            return;
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="pt-8 text-right">
                    <button type="submit" class="bg-black text-white px-12 py-5 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl">
                        Enregistrer le projet
                    </button>
                </div>
            </div>
        </form>
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
