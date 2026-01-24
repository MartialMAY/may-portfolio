<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
        .sidebar-link.active { background: black; color: white; }
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow-x: hidden; overflow-y: hidden !important; }
    </style>
</head>
<body class="bg-[#f8f8f8]">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center fixed top-0 w-full z-50">
        <h1 class="display-title text-2xl font-bold uppercase tracking-tighter">Admin Panel</h1>
        <div class="flex items-center gap-6">
            <span class="text-xs font-bold uppercase tracking-widest text-gray-400"><?php echo $_SESSION['admin']; ?></span>
            <a href="<?php echo url('/logout'); ?>" class="text-red-500 hover:text-red-700 transition-colors">
                <i data-feather="log-out" class="w-5 h-5"></i>
            </a>
        </div>
    </nav>

    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-100 h-[calc(100vh-80px)] fixed left-0 overflow-y-auto p-6 space-y-2">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 block">Navigation</span>
            <a href="<?php echo url('/admin'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="home" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="<?php echo url('/admin/bts'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="grid" class="w-4 h-4"></i> BTS SIO (E4)
            </a>
            <a href="<?php echo url('/admin/projects'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="layers" class="w-4 h-4"></i> Projets
            </a>
            <a href="<?php echo url('/admin/veille'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="eye" class="w-4 h-4"></i> Veille Tech
            </a>
            <a href="<?php echo url('/admin/timeline'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="calendar" class="w-4 h-4"></i> Parcours
            </a>
            <a href="<?php echo url('/admin/cv'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="file-text" class="w-4 h-4"></i> Mon CV
            </a>
            <a href="<?php echo url('/admin/messages'); ?>" class="sidebar-link active flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="mail" class="w-4 h-4"></i> Messages
            </a>
            <a href="<?php echo url('/admin/logs'); ?>" class="sidebar-link flex items-center gap-3 p-3 rounded-xl text-sm font-medium transition-all hover:bg-gray-50">
                <i data-feather="activity" class="w-4 h-4"></i> Journal (Logs)
            </a>
            <div class="pt-6">
                <a href="<?php echo url('/'); ?>" target="_blank" class="flex items-center gap-3 p-3 text-blue-600 rounded-xl text-sm font-medium hover:bg-blue-50 transition-all">
                    <i data-feather="external-link" class="w-4 h-4"></i> Voir le site
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-12">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Communication</span>
                    <h2 class="display-title text-5xl font-extrabold uppercase tracking-tighter">Messages Reçus</h2>
                </div>
            </div>

            <?php if (isset($_GET['replied'])): ?>
                <div class="mb-8 p-6 bg-green-50 text-green-600 border border-green-100 rounded-[2rem] flex items-center gap-4">
                    <i data-feather="send" class="w-6 h-6"></i>
                    <span class="font-bold uppercase tracking-widest text-xs">Réponse envoyée avec succès !</span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="mb-8 p-6 bg-red-50 text-red-600 border border-red-100 rounded-[2rem] flex items-center gap-4">
                    <i data-feather="alert-circle" class="w-6 h-6"></i>
                    <span class="font-bold uppercase tracking-widest text-xs">Erreur lors de l'envoi du message.</span>
                </div>
            <?php endif; ?>

            <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Date</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Expéditeur</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Email</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400">Aperçu</th>
                            <th class="p-6 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        <?php if (empty($messages)): ?>
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 italic">Aucun message pour le moment.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($messages as $msg): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="p-6 text-[10px] font-bold text-gray-400 whitespace-nowrap">
                                        <?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?>
                                    </td>
                                    <td class="p-6 font-bold"><?php echo htmlspecialchars($msg['name']); ?></td>
                                    <td class="p-6 text-blue-600 font-medium whitespace-nowrap">
                                        <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" class="hover:underline">
                                            <?php echo htmlspecialchars($msg['email']); ?>
                                        </a>
                                    </td>
                                    <td class="p-6 text-gray-600">
                                        <div class="max-w-[200px] truncate">
                                            <?php echo htmlspecialchars(htmlspecialchars_decode($msg['message'])); ?>
                                        </div>
                                    </td>
                                    <td class="p-6 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button onclick="openMessageModal(<?php echo htmlspecialchars(json_encode(htmlspecialchars_decode($msg['name']))); ?>, <?php echo htmlspecialchars(json_encode(htmlspecialchars_decode($msg['email']))); ?>, <?php echo htmlspecialchars(json_encode(htmlspecialchars_decode($msg['message']))); ?>, <?php echo htmlspecialchars(json_encode(date('d/m/Y H:i', strtotime($msg['created_at'])))); ?>)" class="p-2 bg-gray-50 rounded-full hover:bg-black hover:text-white transition-all text-gray-400" title="Lire">
                                                <i data-feather="eye" class="w-4 h-4"></i>
                                            </button>
                                            <button onclick="openReplyModal(<?php echo htmlspecialchars(json_encode(htmlspecialchars_decode($msg['email']))); ?>, <?php echo htmlspecialchars(json_encode(htmlspecialchars_decode($msg['name']))); ?>)" class="p-2 bg-blue-50 rounded-full hover:bg-blue-600 hover:text-white transition-all text-blue-600" title="Répondre">
                                                <i data-feather="message-circle" class="w-4 h-4"></i>
                                            </button>
                                            <a href="<?php echo url('/admin/messages/delete?id=' . $msg['id']); ?>" onclick="return confirm('Supprimer ce message ?')" class="p-2 bg-gray-50 rounded-full hover:bg-red-500 hover:text-white transition-all text-red-500" title="Supprimer">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal View Message -->
    <div id="messageModal" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-[100]">
        <div class="modal-overlay absolute w-full h-full bg-black/60 backdrop-blur-sm" onclick="closeModal('messageModal')"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded-[2.5rem] shadow-2xl z-50 overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="p-8 md:p-12">
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <span id="modalDate" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-1">Date</span>
                        <h3 id="modalName" class="display-title text-3xl font-extrabold uppercase tracking-tighter">Nom Expéditeur</h3>
                        <a id="modalEmail" href="#" class="text-blue-600 text-sm font-medium hover:underline mt-1 block tracking-tight">email@example.com</a>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 mb-10">
                    <p id="modalBody" class="text-gray-700 leading-relaxed whitespace-pre-wrap text-sm italic"></p>
                </div>
                <div class="flex justify-between items-center">
                    <button onclick="closeModal('messageModal')" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-black">Fermer</button>
                    <button id="replyFromView" class="bg-black text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-blue-600 transition-all shadow-xl">
                        Répondre au message
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reply -->
    <div id="replyModal" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-[100]">
        <div class="modal-overlay absolute w-full h-full bg-black/60 backdrop-blur-sm" onclick="closeModal('replyModal')"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded-[2.5rem] shadow-2xl z-50 overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="p-8 md:p-12">
                <div class="mb-10 text-center">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-[0.3em] mb-2 block">Communication</span>
                    <h3 class="display-title text-3xl font-extrabold uppercase tracking-tighter">Répondre à <span id="replyToName">Contact</span></h3>
                </div>

                <form action="<?php echo url('/admin/messages/reply'); ?>" method="POST" class="space-y-6">
                    <?php echo \App\Core\Security::csrfField(); ?>
                    <input type="hidden" name="email" id="replyToEmail">
                    
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Sujet du mail</label>
                        <input type="text" name="subject" value="Réponse de Martial MAYAMOU - Portfolio" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors text-sm font-medium">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400">Votre réponse</label>
                        <textarea name="message" required rows="8" placeholder="Ecrivez votre message ici..." class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors text-sm"></textarea>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <button type="button" onclick="closeModal('replyModal')" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-black">Annuler</button>
                        <button type="submit" class="bg-blue-600 text-white px-12 py-4 rounded-full font-bold uppercase tracking-widest text-[10px] hover:bg-black transition-all shadow-xl flex items-center gap-3">
                            <i data-feather="send" class="w-4 h-4"></i>
                            Envoyer la réponse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        feather.replace();

        function openMessageModal(name, email, message, date) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalEmail').href = 'mailto:' + email;
            document.getElementById('modalBody').textContent = message;
            document.getElementById('modalDate').textContent = date;
            
            document.getElementById('replyFromView').onclick = () => {
                closeModal('messageModal');
                setTimeout(() => openReplyModal(email, name), 300);
            };

            showModal('messageModal');
        }

        function openReplyModal(email, name) {
            document.getElementById('replyToName').textContent = name;
            document.getElementById('replyToEmail').value = email;
            showModal('replyModal');
        }

        function showModal(id) {
            const modal = document.getElementById(id);
            const container = modal.querySelector('.modal-container');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            container.classList.remove('scale-95');
            container.classList.add('scale-100');
            document.body.classList.add('modal-active');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            const container = modal.querySelector('.modal-container');
            modal.classList.add('opacity-0', 'pointer-events-none');
            container.classList.remove('scale-100');
            container.classList.add('scale-95');
            document.body.classList.remove('modal-active');
        }
    </script>
</body>
</html>
