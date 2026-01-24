<!-- 
    Section de contact 
    Formulaire de prise de contact avec validation AJAX et envoi sécurisé.
-->
<div class="section-border">
    <section id="contact" class="py-24 md:py-40 bg-black/90 backdrop-blur-md text-white">
        <div class="container-main">
            <div class="grid lg:grid-cols-12 gap-y-20">
                
                <!-- Informations de contact -->
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

                <!-- Formulaire de contact -->
                <div class="lg:col-span-8">
                    <form id="contact-form" class="space-y-12">
                        <?php echo \App\Core\Security::csrfField(); ?>
                        
                        <div class="grid md:grid-cols-2 gap-12">
                            <div class="space-y-4">
                                <label class="label-caps text-gray-500">Nom complet</label>
                                <input required name="name" type="text" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light" placeholder="John Doe" />
                            </div>
                            <div class="space-y-4">
                                <label class="label-caps text-gray-500">Email professionnel</label>
                                <input required name="email" type="email" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light" placeholder="john@company.com" />
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <label class="label-caps text-gray-500">Votre message</label>
                            <textarea required name="message" rows="4" class="w-full bg-transparent border-b border-white/20 py-4 outline-none focus:border-blue-400 transition-colors text-xl font-light resize-none" placeholder="Décrivez votre projet..."></textarea>
                        </div>
                        
                        <!-- Zone de feedback (messages de succès/erreur) -->
                        <div id="contact-feedback" class="hidden p-4 rounded-xl text-sm font-bold uppercase tracking-widest"></div>
                        
                        <button type="submit" id="contact-submit" class="w-full md:w-auto px-16 py-6 bg-white text-black rounded-full label-caps hover:bg-blue-500 hover:text-white transition-all font-bold shadow-xl shadow-white/10">
                            Envoyer la demande
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
