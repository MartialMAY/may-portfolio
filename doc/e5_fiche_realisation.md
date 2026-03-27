# FICHE DE RÉALISATION PROFESSIONNELLE — E5
## BTS SIO Option SLAM | Épreuve E5 — Support et mise à disposition de services informatiques

---

## INFORMATIONS GÉNÉRALES

| Champ | Valeur |
|---|---|
| **Candidat** | Martial MAYAMOU |
| **Établissement** | Lycée Janetti — Saint-Maximin-la-Sainte-Baume |
| **Option** | SLAM — Solutions Logicielles et Applications Métiers |
| **Année** | 2023 — 2025 |
| **Intitulé de la réalisation** | Conception et développement d'un portfolio professionnel dynamique |
| **Période de réalisation** | Novembre 2023 — Juin 2025 |
| **Contexte** | Projet personnel — initiative propre hors cadre scolaire |
| **Environnement** | Individuel (réalisation seul, de bout en bout) |

---

## 1. CONTEXTE ET OBJECTIFS

### Présentation de l'organisation / contexte
Dans le cadre de mon BTS SIO option SLAM, j'ai identifié le besoin de me constituer une **identité numérique professionnelle** permettant de présenter mon parcours, mes compétences et mes réalisations de manière dynamique et administrable.

J'ai conçu et développé **from scratch** un portfolio web complet, hébergé en production, qui remplit plusieurs fonctions :
- Vitrine professionnelle accessible en ligne 24h/24
- Outil de démonstration de mes compétences techniques (SLAM)
- Documentation vivante de mon parcours BTS (tableau de synthèse E4)
- Espace de veille technologique

### Problématique
> *Comment concevoir une application web dynamique, sécurisée et administrable, permettant de valoriser un parcours professionnel et de le maintenir à jour en temps réel ?*

### Objectifs de la réalisation
- Développer une architecture MVC personnalisée en PHP
- Implémenter un panneau d'administration sécurisé (authentification, CSRF)
- Déployer l'application sur un hébergement cloud avec base de données distante
- Intégrer un tableau de synthèse BTS SIO avec gestion des sous-compétences
- Mettre en place une section de veille technologique dynamique

---

## 2. ENVIRONNEMENT TECHNIQUE

### Technologies et langages utilisés

| Couche | Technologies |
|---|---|
| **Back-end** | PHP 8+ (architecture MVC custom), PDO |
| **Base de données** | MySQL 8 (hébergée sur Railway) |
| **Front-end** | HTML5, CSS3, Tailwind CSS, JavaScript Vanilla |
| **Bibliothèques** | Feather Icons, Lenis (smooth scroll) |
| **Outils de développement** | Git, GitHub, WAMP (local), VS Code |
| **Hébergement / Déploiement** | Railway (serveur + BDD), nom de domaine personnalisé |
| **Sécurité** | Sessions PHP, tokens CSRF, validation des entrées, protection XSS |

### Architecture de l'application
```
may-portfolio/
├── app/
│   ├── Controllers/    → Logique applicative (HomeController, AdminController)
│   ├── Models/         → Accès données (ProjectModel, BtsModel, VeilleModel...)
│   ├── Core/           → Router, Database, Security, Middleware
│   └── Services/       → UploadService, LoggerService, EmailService
├── views/
│   ├── admin/          → Interface d'administration
│   └── partials/       → Composants réutilisables (modals, sections)
├── public/
│   └── assets/         → CSS, JS, images
└── database/           → Scripts SQL, migrations
```

### Schéma de la base de données (tables principales)
- `projects` — projets du portfolio
- `bts_competences` — 6 compétences BTS SIO
- `bts_sous_competences` — 22 sous-compétences du référentiel
- `bts_realisations` — réalisations professionnelles
- `bts_matrix` + `bts_matrix_sous` — liaisons compétences/réalisations
- `veille` — articles de veille technologique
- `timeline` — parcours formation/expérience
- `users` — compte administrateur
- `audit_logs` — traçabilité des actions

---

## 3. DESCRIPTION DES TRAVAUX RÉALISÉS

### Phase 1 — Analyse et conception
- Définition des besoins utilisateur (visiteur + administrateur)
- Conception de l'architecture MVC (routing, contrôleurs, modèles)
- Modélisation de la base de données (MCD → MLD)
- Maquettage des interfaces (wireframes)

### Phase 2 — Développement du cœur applicatif
- Mise en place du **router HTTP** personnalisé (routes GET/POST)
- Développement du **système d'authentification** administrateur (hash bcrypt, sessions sécurisées)
- Implémentation de la **protection CSRF** sur tous les formulaires
- Création des **modèles PDO** (requêtes préparées, protection injection SQL)
- Middleware de vérification d'accès admin

### Phase 3 — Développement des fonctionnalités métier
- **Gestion de projets** : CRUD complet avec upload d'images (validation, optimisation)
- **Tableau BTS E4** : matrice réalisations × compétences avec gestion des sous-compétences
- **Veille technologique** : articles avec catégories, sources, avis personnel
- **Timeline** : parcours formation/expérience/certifications
- **Formulaire de contact** : envoi d'email avec validation et protection spam

### Phase 4 — Interface d'administration
- Dashboard admin avec statistiques et logs d'activité récents
- CRUD pour tous les contenus (projets, veille, BTS, timeline, stats)
- Drag & drop pour réordonner les projets
- Upload sécurisé d'images avec redimensionnement automatique
- Logs d'audit (traçabilité de toutes les actions admin)

### Phase 5 — Déploiement et mise en production
- Configuration de l'environnement Railway (serveur PHP + MySQL)
- Migration de la base de données locale vers Railway
- Exécution des scripts de migration (nouvelles fonctionnalités)
- Tests d'intégration (formulaires, authentification, CRUD)
- Mise en ligne sur domaine personnalisé

---

## 4. LIVRABLES

| Livrable | Description |
|---|---|
| Application web en production | Site portfolio accessible publiquement |
| Code source versionné | Dépôt GitHub avec historique de commits |
| Base de données Railway | BDD MySQL distante avec données réelles |
| Panneau d'administration | Interface sécurisée de gestion des contenus |
| Scripts SQL | Script d'initialisation + migrations |
| Documentation technique | Architecture, commentaires de code |

---

## 5. COMPÉTENCES DU BLOC MOBILISÉES

| # | Compétence | Justification dans ce projet |
|---|---|---|
| C1 | Gérer le patrimoine informatique | Versioning Git, gestion BDD (scripts SQL, migrations), gestion des accès admin (authentification) |
| C2 | Répondre aux incidents et aux demandes d'assistance et d'évolution | Corrections de bugs, évolutions fonctionnelles (ajout sous-compétences), logs d'audit |
| C3 | Développer la présence en ligne de l'organisation | Le portfolio EST une présence en ligne, SEO, identité numérique, site dynamique avec données |
| C4 | Travailler en mode projet | Planification par phases, gestion Git (branches, commits), suivi d'avancement |
| C5 | Mettre à disposition des utilisateurs un service informatique | Déploiement Railway, tests d'intégration, mise en production avec BDD distante |
| C6 | Organiser son développement professionnel | Portfolio documente le parcours, section veille, mise en valeur des compétences BTS |

---

## 6. DIFFICULTÉS RENCONTRÉES ET SOLUTIONS APPORTÉES

| Difficulté | Solution apportée |
|---|---|
| Architecture MVC sans framework — routing custom | Création d'un router PHP léger inspiré des conventions REST |
| Sécurisation des uploads fichiers | Service dédié (UploadService) avec validation MIME, taille, extension + optimisation GD |
| Déploiement BDD Railway (charset, encodage) | Script de migration adapté (ENGINE=MyISAM, charset utf8mb4) |
| Gestion des sous-compétences (table layout fixe) | Refonte CSS (table-layout: auto, min-width, dropdown inline) |
| Performance JS sur page lourde | Délégation d'événements, chargement différé des modals |

---

## 7. BILAN ET APPORTS PROFESSIONNELS

Ce projet m'a permis de :
- Maîtriser une **architecture MVC complète** sans framework (compréhension profonde du pattern)
- Approfondir la **sécurité web** (OWASP : XSS, CSRF, injection SQL, upload sécurisé)
- Expérimenter le **cycle complet** d'un projet web : analyse → développement → test → déploiement
- Travailler avec un **environnement cloud** (Railway) pour la mise en production
- Développer une **vraie valeur professionnelle** : le portfolio est utilisé activement pour ma recherche de stage

---

*Document généré dans le cadre de la préparation à l'épreuve E5 — BTS SIO SLAM*
*Session 2025*
