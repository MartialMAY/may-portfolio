<!-- 
    Script de gestion du formulaire de contact 
    Envoie les données à la fois vers le backend local et vers Formspree.
    Affiche un feedback visuel avec disparition automatique.
-->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contactForm = document.getElementById('contact-form');
        const feedback = document.getElementById('contact-feedback');
        const submitBtn = document.getElementById('contact-submit');

        if (contactForm) {
            contactForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                // Désactivation du bouton pendant l'envoi
                submitBtn.disabled = true;
                submitBtn.textContent = 'Envoi en cours...';
                feedback.classList.add('hidden');

                const formData = new FormData(contactForm);

                try {
                    console.log("Tentative d'envoi...");

                    // 1. Enregistrement local dans la base de données (pour l'admin panel)
                    const localPromise = fetch('contact', {
                        method: 'POST',
                        body: formData
                    }).then(r => r.text());

                    // 2. Envoi vers Formspree pour notification par e-mail
                    const formspreePromise = fetch('https://formspree.io/f/mjgyayjo', {
                        method: 'POST',
                        body: formData,
                        headers: { 'Accept': 'application/json' }
                    }).then(r => r.json());

                    // Attente de la résolution des deux requêtes en parallèle
                    const [localRaw, formspreeResult] = await Promise.all([localPromise, formspreePromise]);
                    
                    console.log("Local Response:", localRaw);
                    console.log("Formspree Response:", formspreeResult);

                    // Parsing de la réponse locale
                    let localResult;
                    try {
                        localResult = JSON.parse(localRaw);
                    } catch (e) {
                        console.error("Erreur Parse JSON:", localRaw);
                        throw new Error("Erreur serveur : " + localRaw.substring(0, 50));
                    }

                    // Affichage du message de feedback
                    feedback.classList.remove('hidden');
                    if (localResult.success) {
                        feedback.textContent = "Votre message a bien été transmis. Je reviendrai vers vous dans les meilleurs délais.";
                        feedback.className = 'p-6 rounded-2xl text-[10px] font-bold uppercase tracking-[0.2em] bg-green-500/5 text-green-400 border border-green-500/10 mt-10 feedback-pro transition-all duration-1000 opacity-100 flex items-center gap-3';
                        feedback.innerHTML = '<i data-feather="check-circle" class="w-4 h-4"></i>' + feedback.textContent;
                        feather.replace();
                        contactForm.reset();
                        
                        // Disparition progressive après 6 secondes
                        setTimeout(() => {
                            feedback.style.opacity = '0';
                            feedback.style.transform = 'translateY(-10px)';
                            setTimeout(() => feedback.classList.add('hidden'), 1000);
                        }, 6000);
                    } else {
                        feedback.textContent = localResult.message;
                        feedback.className = 'p-6 rounded-2xl text-[10px] font-bold uppercase tracking-[0.2em] bg-red-500/5 text-red-400 border border-red-500/10 mt-10 feedback-pro flex items-center gap-3';
                        feedback.innerHTML = '<i data-feather="alert-circle" class="w-4 h-4"></i>' + feedback.textContent;
                        feather.replace();
                    }
                } catch (error) {
                    console.error("Fetch Error:", error);
                    feedback.classList.remove('hidden');
                    feedback.textContent = "Une erreur technique est survenue. Veuillez réessayer ultérieurement.";
                    feedback.className = 'p-6 rounded-2xl text-[10px] font-bold uppercase tracking-[0.2em] bg-red-500/5 text-red-400 border border-red-500/10 mt-10 feedback-pro flex items-center gap-3';
                    feedback.innerHTML = '<i data-feather="alert-triangle" class="w-4 h-4"></i>' + feedback.textContent;
                    feather.replace();
                } finally {
                    // Réactivation du bouton
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Envoyer la demande';
                }
            });
        }
    });
</script>
