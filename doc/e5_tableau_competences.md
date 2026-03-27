# TABLEAU DE COMPÉTENCES — E5
## BTS SIO SLAM | Bloc "Support et mise à disposition de services informatiques"
### Réalisation : Portfolio professionnel dynamique (may-portfolio)

---

> **Comment lire ce tableau :**
> - ✅ = Sous-compétence clairement mobilisée dans ce projet
> - ⚠️ = Mobilisée partiellement (à étoffer si possible avec une 2ème réalisation)
> - ❌ = Non couverte par ce projet

---

## COMPÉTENCE 1 — Gérer le patrimoine informatique

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Recenser et identifier les ressources numériques | ✅ | Inventaire des tables BDD (9 tables), des fichiers (architecture MVC documentée), des dépendances (librairies JS/PHP) |
| Exploiter des référentiels, normes et standards | ✅ | Respect des conventions REST (routing), standards OWASP (sécurité), HTML5/CSS3, PSR (PHP) |
| Mettre en place et vérifier les niveaux d'habilitation | ✅ | Système auth admin (bcrypt + sessions), middleware de contrôle d'accès, séparation public/admin |
| Vérifier les conditions de continuité d'un service | ✅ | Déploiement Railway (haute disponibilité), BDD cloud managée, pas de SPOF local |
| Gérer les sauvegardes | ⚠️ | BDD Railway avec sauvegardes automatiques ; scripts SQL de migration versionnés sur GitHub |
| Vérifier le respect des règles d'utilisation des ressources | ✅ | Validation des uploads (type MIME, taille max), protection contre les abus (CSRF, validation formulaires) |

**Exemple de question jury sur cette compétence :**
> *"Comment avez-vous géré la sécurité des accès à votre administration ?"*
> → Réponse : authentification par session PHP avec hash bcrypt, middleware qui vérifie la session à chaque requête admin, token CSRF sur tous les formulaires POST.

---

## COMPÉTENCE 2 — Répondre aux incidents et aux demandes d'assistance et d'évolution

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Collecter, suivre et orienter des demandes | ✅ | Formulaire de contact (collecte), table `messages` en BDD, logs d'audit pour traçabilité |
| Traiter des demandes concernant les services réseau et système, applicatifs | ⚠️ | Résolution incidents déploiement Railway (erreur charset BDD, ENGINE MyISAM), debug migrations SQL |
| Traiter des demandes concernant les applications | ✅ | Corrections bugs (dropdown inline sous-compétences, positionnement popover), évolutions fonctionnelles (ajout système sous-compétences), table `audit_logs` |

**Exemple concret à développer à l'oral :**
> Lors de la migration vers Railway, j'ai rencontré un incident : les tables s'appuyaient sur des clés étrangères (InnoDB) mais la BDD Railway utilisait MyISAM qui ne les supporte pas. J'ai diagnostiqué l'erreur `ERROR 1824 (HY000): Failed to open the referenced table`, identifié la cause (moteur de table), et adapté le script de migration en remplaçant les FK par des index simples et en forçant ENGINE=MyISAM.

---

## COMPÉTENCE 3 — Développer la présence en ligne de l'organisation

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Participer à la valorisation de l'image de l'organisation sur les médias numériques (cadre juridique, enjeux économiques) | ✅ | Le portfolio valorise l'identité professionnelle : design soigné, contenu structuré, mise en avant des compétences techniques et du cursus |
| Référencer les services en ligne et mesurer leur visibilité | ✅ | Structure HTML sémantique (SEO), balises meta, URL propres (routing REST), domaine personnalisé |
| Participer à l'évolution d'un site Web exploitant les données de l'organisation | ✅ | Site 100% dynamique : données en BDD, admin pour mise à jour en temps réel, section veille, projets, timeline — tout est évolutif sans toucher au code |

**Point fort à valoriser :**
> Ce projet EST une démonstration directe de cette compétence : j'ai conçu, développé et déployé un site web professionnel exploitant une base de données, accessible publiquement, et administrable en temps réel. C'est la compétence la plus naturellement couverte.

---

## COMPÉTENCE 4 — Travailler en mode projet

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Analyser les objectifs et les modalités d'organisation d'un projet | ✅ | Analyse des besoins (visiteur vs admin), définition des fonctionnalités, conception de l'architecture avant développement |
| Planifier les activités | ✅ | Développement par phases (conception → core → fonctionnalités → admin → déploiement), gestion via commits Git comme jalons |
| Évaluer les indicateurs de suivi d'un projet et analyser les écarts | ⚠️ | Suivi via l'historique Git (commits datés), ajustements en cours de projet (ex: refonte table BTS après retour visuel) |

**Preuve concrète :**
> L'historique Git du projet montre la progression chronologique : des commits de mise en place de l'architecture jusqu'aux dernières évolutions (sous-compétences BTS). Chaque fonctionnalité a été développée en branche dédiée (`audit1`, etc.).

---

## COMPÉTENCE 5 — Mettre à disposition des utilisateurs un service informatique

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Réaliser les tests d'intégration et d'acceptation d'un service | ✅ | Tests manuels complets après chaque déploiement : formulaires, authentification, CRUD, upload, affichage cross-browser |
| Déployer un service | ✅ | Déploiement complet sur Railway : configuration serveur PHP, connexion BDD distante, migration des données, mise en ligne sur domaine personnalisé |
| Accompagner les utilisateurs dans la mise en place d'un service | ⚠️ | Interface admin intuitive (dashboard, UX soignée), conçue pour être utilisable sans formation technique approfondie |

**Détail technique du déploiement :**
> - Serveur : Railway (PHP natif)
> - BDD : MySQL Railway (connexion via variables d'environnement)
> - Migration : exécution manuelle du script SQL via client MySQL CLI distant
> - Domaine : configuration DNS vers Railway
> - Tests post-déploiement : vérification de chaque fonctionnalité en production

---

## COMPÉTENCE 6 — Organiser son développement professionnel

| Sous-compétence | Couverture | Justification / Preuve dans le projet |
|---|---|---|
| Mettre en place son environnement d'apprentissage personnel | ✅ | Ce portfolio EST l'environnement d'apprentissage : chaque fonctionnalité a nécessité l'acquisition de nouvelles compétences (Railway, CSRF, upload sécurisé, MVC custom...) |
| Mettre en œuvre des outils et stratégies de veille informationnelle | ✅ | Section "Veille technologique" intégrée au portfolio : articles catégorisés, sources, résumés, opinions personnelles sur les sujets IT |
| Gérer son identité professionnelle | ✅ | Portfolio = outil d'identité professionnelle : photo, bio, compétences, projets, contact — utilisé activement pour la recherche de stage |
| Développer son projet professionnel | ✅ | Timeline du parcours, mise en valeur du BTS SIO SLAM, section compétences, démonstration des capacités techniques à des employeurs potentiels |

---

## SYNTHÈSE DES COUVERTURES

| Compétence | Sous-compétences couvertes | Niveau de couverture |
|---|---|---|
| C1 — Patrimoine informatique | 5/6 ✅ + 1 ⚠️ | **Très bien couvert** |
| C2 — Incidents et évolutions | 2/3 ✅ + 1 ⚠️ | **Bien couvert** |
| C3 — Présence en ligne | 3/3 ✅ | **Excellente couverture** |
| C4 — Mode projet | 2/3 ✅ + 1 ⚠️ | **Bien couvert** |
| C5 — Mise à disposition | 2/3 ✅ + 1 ⚠️ | **Bien couvert** |
| C6 — Développement professionnel | 4/4 ✅ | **Excellente couverture** |

> **Recommandation** : Les compétences ⚠️ (sauvegardes C1, réseau C2, planification C4, accompagnement C5) peuvent être renforcées en ajoutant une 2ème réalisation (projet de stage) qui les couvrirait plus explicitement.

---

*Document de préparation E5 — BTS SIO SLAM — Session 2025*
*Martial MAYAMOU — Lycée Janetti, Saint-Maximin*
