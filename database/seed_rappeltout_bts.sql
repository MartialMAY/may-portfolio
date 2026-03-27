-- ================================================================
-- SEED : Réalisation BTS SIO — RappelTout
-- ================================================================
-- Application web CRUD de suivi des dates d'expiration de matériels
-- et documents, avec envoi automatique de rappels par email (J-1).
-- Réalisée individuellement en contexte pédagogique BTS SIO SLAM.
-- Stack : PHP 7.4 POO + PDO, MySQL, PHPMailer, HTML/CSS/JS, WAMP
-- Dépôt : https://github.com/MartialMAY/RappelTout_App
-- ================================================================

-- 1. Insertion de la réalisation
INSERT INTO bts_realisations (title, periode, type, display_order, project_id, description)
VALUES (
    'RappelTout — Gestion des dates d\'expiration',
    '2024 – 2025',
    'formation',
    4,
    NULL,
    'Application web PHP orientée objet permettant de centraliser et gérer les dates de fin de validation de matériels et documents. Deux classes métier (Materiel, Document) exposent un CRUD complet via PDO préparé. Envoi automatique de mails de rappel J-1 via PHPMailer/SMTP Gmail, orchestré par planificateur CRON/Windows. Authentification sécurisée, recherche temps réel, upload de fichiers, tableau de bord. Déployée sous WAMP avec configuration via .env.'
);

SET @rappeltout_id = LAST_INSERT_ID();

-- ================================================================
-- 2. Compétences principales mobilisées
-- C1 - Gérer le patrimoine informatique
-- C2 - Répondre aux incidents et aux demandes d'assistance et d'évolution
-- C4 - Travailler en mode projet
-- C5 - Mettre à disposition des utilisateurs un service informatique
-- ================================================================
INSERT INTO bts_matrix (realisation_id, competence_id)
SELECT @rappeltout_id, id FROM bts_competences WHERE display_order IN (1, 2, 4, 5);

-- ================================================================
-- 3. Sous-compétences avec justifications
-- ================================================================

-- C1 — SC1 : Recenser et identifier les ressources numériques
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Identification et gestion des ressources du projet : base de données MySQL (3 tables : users, materiels, documents), librairie PHPMailer pour SMTP Gmail, environnement WAMP (Apache + PHP 7.4 + MySQL). Structuration des dépendances via autoloader et fichier .env pour les credentials sensibles (SMTP, BDD).'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 1 AND sc.display_order = 1;

-- C1 — SC3 : Mettre en place et vérifier les niveaux d'habilitation associés à un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Mise en place d''un système d''authentification sécurisé avec gestion de session PHP (login/logout). Accès aux fonctionnalités CRUD et au tableau de bord réservé aux utilisateurs authentifiés. Vérification des droits à chaque requête sensible pour prévenir les accès non autorisés.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 1 AND sc.display_order = 3;

-- C2 — SC3 : Traiter des demandes concernant les applications
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Identification et correction de deux vulnérabilités : injection SQL (remplacement de requêtes dynamiques par des requêtes PDO préparées avec bindParam()) et erreur syntaxique PHP détectée lors des tests. Démarche de debug structurée : reproduction du bug, analyse du code, correction ciblée, vérification du correctif.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 2 AND sc.display_order = 3;

-- C4 — SC1 : Analyser les objectifs et les modalités d'organisation d'un projet
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Analyse du besoin : centraliser le suivi des validations de matériels et documents d''un établissement scolaire, automatiser les alertes d''expiration. Définition de l''architecture (PHP POO, MySQL 3 tables, PHPMailer), modélisation de la base de données, conception des classes métier Materiel et Document avant développement.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 4 AND sc.display_order = 1;

-- C4 — SC2 : Planifier les activités
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Conduite autonome du projet en séquences logiques : modélisation BDD → développement des classes CRUD → interface HTML/CSS/JS → authentification → système de recherche → intégration PHPMailer → planificateur d''envoi → tests et corrections (vulnérabilité SQL, erreur PHP) → déploiement WAMP.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 4 AND sc.display_order = 2;

-- C5 — SC1 : Réaliser les tests d'intégration et d'acceptation d'un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Tests fonctionnels de l''ensemble des opérations CRUD (ajout, modification, suppression, affichage) pour les entités Materiel et Document. Validation du système d''envoi PHPMailer (SMTP Gmail, format HTML du mail, destinataires). Tests de sécurité ayant permis de détecter et corriger la vulnérabilité d''injection SQL. Vérification du planificateur automatique (déclenchement, requête temporelle J-1).'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 5 AND sc.display_order = 1;

-- C5 — SC2 : Déployer un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Déploiement de l''application sur environnement local WAMP (Apache + PHP 7.4 + MySQL). Configuration externalisée via fichier .env (credentials SMTP Gmail, paramètres BDD) pour sécuriser les données sensibles. Mise en place du planificateur automatique (CRON Linux / Planificateur de tâches Windows) pour l''exécution quotidienne du script d''envoi de rappels.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 5 AND sc.display_order = 2;

-- C5 — SC3 : Accompagner les utilisateurs dans la mise en place d'un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @rappeltout_id, sc.id,
    'Interface conçue pour une prise en main intuitive : tableau de bord avec indicateurs visuels, modales de confirmation pour les actions destructives, recherche et filtrage temps réel des matériels et documents. Documentation README complète (installation, configuration .env, démarrage du planificateur) facilitant la prise en main de l''application.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 5 AND sc.display_order = 3;
