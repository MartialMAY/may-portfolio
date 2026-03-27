# GUIDE DE PRÉPARATION À L'ORAL — E5
## BTS SIO SLAM | Durée : 40 minutes (10 min présentation + 30 min jury)
### Réalisation : Portfolio professionnel dynamique (may-portfolio)

---

## STRUCTURE DE L'ÉPREUVE (rappel officiel)

| Phase | Durée | Ce qui est attendu |
|---|---|---|
| **Présentation** | 10 min max | Présenter le parcours de professionnalisation et justifier les compétences du bloc E5 |
| **Échange avec le jury** | 30 min | Le jury approfondit une ou plusieurs réalisations, vérifie la maîtrise technique, évalue la contribution personnelle |

> ⚠️ **Important** : Tu dois avoir ton ordinateur avec toi. Tu peux montrer le site en direct, le code, la BDD. Prépare tout à l'avance pour que ça fonctionne sans connexion internet si nécessaire.

---

## SCRIPT DE PRÉSENTATION (10 minutes)

> Parle naturellement, ne lis pas. Ce script est un guide, pas un texte à réciter.
> Vise environ **150 mots par minute** → 10 min ≈ 1500 mots → adapte le niveau de détail.

---

### INTRO — Accroche (30 secondes)

> *"Bonjour, je m'appelle Martial MAYAMOU, je suis en BTS SIO option SLAM au Lycée Janetti de Saint-Maximin. Pour l'épreuve E5, je vais vous présenter mon portfolio professionnel : une application web dynamique que j'ai conçue, développée et déployée seul, de A à Z, sur une période de 18 mois."*

---

### PARTIE 1 — Contexte et besoin (1 min 30)

> *"Le constat était simple : en tant qu'étudiant en BTS SIO SLAM, j'avais besoin d'une vitrine numérique professionnelle pour valoriser mon parcours auprès de futurs employeurs. Plutôt que d'utiliser un outil existant comme WordPress ou Wix, j'ai choisi de tout développer moi-même. C'était à la fois un défi technique et une démonstration concrète de mes compétences.*
>
> *L'objectif : créer une application web complète, administrable en temps réel, sécurisée, déployée en production sur un hébergement cloud, avec une base de données distante."*

---

### PARTIE 2 — Architecture technique (2 min)

> *"Techniquement, j'ai choisi de construire une architecture MVC personnalisée en PHP — sans framework — pour bien comprendre les mécanismes fondamentaux.*
>
> *L'application s'articule autour de 4 couches :*
> - *Les Contrôleurs : HomeController pour le site public, AdminController pour l'administration*
> - *Les Modèles : accès aux données via PDO avec requêtes préparées*
> - *Les Vues : composants PHP réutilisables (partials)*
> - *Un cœur applicatif : router HTTP, gestionnaire de base de données, middleware d'authentification*
>
> *Pour la base de données, j'ai conçu un schéma de 9 tables incluant notamment un système de compétences BTS SIO avec sous-compétences, pour présenter mon tableau de synthèse E4 directement dans le portfolio."*

[**Montrer l'architecture de dossiers en direct si possible**]

---

### PARTIE 3 — Fonctionnalités et compétences mobilisées (4 min)

> *"Concrètement, voici les fonctionnalités principales et les compétences qu'elles couvrent :*"

**C3 — Présence en ligne :**
> *"Le cœur du projet : un site web dynamique qui valorise mon identité professionnelle. Toutes les données viennent de la base de données — projets, timeline, veille technologique — et l'administrateur peut tout modifier sans toucher au code."*
[Montrer le site en live]

**C1 — Patrimoine informatique :**
> *"J'ai mis en place un système d'authentification sécurisé avec hash bcrypt et un middleware de contrôle d'accès. Tout le code est versionné sur GitHub. La BDD est hébergée sur Railway avec sauvegardes automatiques."*

**C5 — Mise à disposition :**
> *"J'ai déployé l'application sur Railway : configuration du serveur PHP, migration de la base de données, tests d'intégration complets, puis mise en ligne sur domaine personnalisé."*
[Mentionner l'incident Railway : ENGINE MyISAM]

**C2 — Incidents et évolutions :**
> *"Lors de la mise en production, j'ai rencontré un incident : erreur de clés étrangères incompatibles avec le moteur MyISAM de Railway. J'ai diagnostiqué, adapté le script de migration, et résolu le problème. Depuis, j'ai ajouté plusieurs évolutions : le système de sous-compétences BTS, les logs d'audit, le drag & drop..."*

**C4 — Mode projet :**
> *"J'ai organisé le développement en 5 phases : conception, cœur applicatif, fonctionnalités métier, interface admin, déploiement. L'historique Git montre cette progression avec des commits réguliers sur 18 mois."*

**C6 — Développement professionnel :**
> *"Ce projet en lui-même est une démonstration de ma démarche de développement professionnel : section veille technologique, mise en valeur du tableau de synthèse BTS, et utilisation active du portfolio dans ma recherche de stage."*

---

### CONCLUSION (1 min)

> *"Pour résumer, ce projet couvre l'ensemble des 6 compétences du bloc E5. Il m'a permis de maîtriser le cycle complet d'un projet web — de l'analyse au déploiement — et d'approfondir des sujets essentiels comme la sécurité web, l'architecture MVC et le déploiement cloud.*
>
> *Je suis disponible pour approfondir n'importe quel aspect technique avec vous."*

---

## QUESTIONS PROBABLES DU JURY — RÉPONSES PRÉPARÉES

### 🔐 Sécurité

**Q : Comment avez-vous sécurisé votre administration ?**
> Plusieurs niveaux :
> 1. **Authentification** : mot de passe hashé bcrypt (irréversible), stocké en BDD
> 2. **Sessions PHP** : vérification de la session à chaque requête via middleware
> 3. **CSRF** : token unique par formulaire, vérifié côté serveur avant tout traitement
> 4. **Validation des entrées** : `htmlspecialchars()` en sortie, requêtes préparées PDO contre SQL injection
> 5. **Uploads** : validation du type MIME réel (pas seulement l'extension), limite de taille, renommage du fichier

**Q : C'est quoi une injection SQL ? Comment vous protégez-vous ?**
> Une injection SQL consiste à insérer du code SQL malveillant dans un champ de formulaire pour manipuler les requêtes. Protection : j'utilise **PDO avec requêtes préparées** — les paramètres utilisateur sont toujours passés comme `bindParam()`, jamais concaténés directement dans la requête.

**Q : C'est quoi le CSRF ?**
> Cross-Site Request Forgery : un attaquant peut faire exécuter une requête à votre place (ex: supprimer un projet) depuis un site malveillant. Protection : chaque formulaire contient un token aléatoire généré côté serveur, stocké en session. Si le token soumis ne correspond pas, la requête est rejetée.

---

### 🏗️ Architecture

**Q : Pourquoi avoir fait un MVC maison plutôt qu'utiliser Laravel ou Symfony ?**
> Deux raisons : 1) comprendre les fondamentaux (comment fonctionne vraiment un router, un modèle PDO, un middleware) avant d'utiliser un framework. 2) Légèreté — un projet de portfolio ne nécessite pas la complexité de Laravel. En cas de besoin de montée en charge, je pourrais migrer.

**Q : Expliquez votre router HTTP.**
> Le router lit l'URL via `$_SERVER['REQUEST_URI']`, compare avec un tableau de routes définies (route → contrôleur + méthode), et instancie le bon contrôleur. Il gère aussi les paramètres GET et les redirections 404.

**Q : Qu'est-ce qu'un modèle dans votre MVC ?**
> C'est la couche d'accès aux données. Chaque modèle correspond à une entité (ProjectModel, BtsModel…). Il contient les méthodes de lecture/écriture en BDD via PDO. Les contrôleurs n'écrivent jamais de SQL directement.

---

### 🚀 Déploiement

**Q : Comment vous avez déployé l'application ?**
> Railway est une plateforme PaaS. J'ai créé un projet avec un serveur PHP et une instance MySQL. La connexion BDD est configurée via des variables d'environnement (pas de credentials en dur dans le code). J'ai migré les données avec un script SQL exécuté via le client MySQL en CLI distant. Ensuite, j'ai pointé mon nom de domaine vers l'URL Railway via les DNS.

**Q : Quel incident avez-vous rencontré lors du déploiement ?**
> La migration SQL a échoué avec l'erreur `ERROR 1824: Failed to open the referenced table`. En analysant, j'ai découvert que la BDD Railway utilise le moteur MyISAM qui ne supporte pas les clés étrangères (contrairement à InnoDB en local). J'ai adapté le script : remplacement des `FOREIGN KEY` par des `INDEX` simples, et ajout de `ENGINE=MyISAM`. Résultat : migration réussie en 30 secondes.

---

### 📊 Base de données

**Q : Décrivez votre modèle de données pour les compétences BTS.**
> Trois tables liées : `bts_competences` (6 compétences principales), `bts_sous_competences` (22 sous-compétences avec FK vers la compétence parente), `bts_realisations` (projets). Deux tables de liaison : `bts_matrix` (réalisation × compétence) et `bts_matrix_sous` (réalisation × sous-compétence). Ça permet d'afficher dans le tableau de synthèse non seulement quelles compétences sont couvertes, mais aussi quelles sous-compétences précisément.

---

### 🎨 Front-end

**Q : Vous avez utilisé Tailwind, c'est quoi ?**
> Tailwind CSS est un framework utility-first : au lieu de classes CSS sémantiques (`.button`, `.card`), on compose directement les styles dans le HTML avec des utilitaires atomiques (`p-4`, `bg-blue-600`, `rounded-xl`). Avantages : rapidité de développement, cohérence visuelle, aucun CSS inutilisé en production.

**Q : Votre JavaScript est vanilla, pourquoi pas React ?**
> Pour un site portfolio principalement statique côté rendu (PHP génère le HTML), React apporterait de la complexité inutile. Le JS vanilla suffit pour les interactions : ouverture des modals, animations, drag & drop admin. Chaque fonctionnalité est légère et ciblée.

---

### 🔄 Évolutions

**Q : Si vous deviez améliorer ce projet, que feriez-vous ?**
> Plusieurs pistes : 1) Ajouter des tests unitaires PHP (PHPUnit) pour sécuriser les évolutions. 2) Mettre en place un pipeline CI/CD (GitHub Actions → Railway) pour le déploiement automatique. 3) Implémenter un cache (Redis) pour les pages les plus consultées. 4) Ajouter une API REST pour éventuellement dissocier le front-end.

---

## CHECKLIST JOUR J

### Avant l'épreuve
- [ ] Site fonctionnel en production (vérifier la veille)
- [ ] Panneau admin accessible
- [ ] Code source ouvert dans VS Code (prêt à montrer)
- [ ] Schéma BDD ou diagramme UML imprimé ou disponible
- [ ] Historique Git visible (GitHub ou VS Code)
- [ ] Cette fiche de réalisation disponible
- [ ] Connexion internet (optionnelle — avoir une version hors-ligne si possible)
- [ ] Chargeur PC branché

### Pendant la présentation
- [ ] Parler lentement et clairement
- [ ] Montrer en live les éléments clés (site, code, BDD)
- [ ] Relier chaque fonctionnalité à une compétence du bloc
- [ ] Ne pas hésiter à dire "je ne sais pas" si une question dépasse tes connaissances — proposer une hypothèse

### Mots-clés à placer
- MVC, Router, PDO, requêtes préparées
- CSRF, bcrypt, injection SQL, XSS
- Railway, déploiement, variables d'environnement
- Versioning Git, commits, branches
- Responsive design, Tailwind CSS
- Veille technologique, identité numérique

---

*Document de préparation E5 — BTS SIO SLAM — Session 2025*
*Martial MAYAMOU — Lycée Janetti, Saint-Maximin*
