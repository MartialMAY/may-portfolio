-- Migration: Ajout des sous-compétences BTS SIO
-- Exécuter une seule fois sur la base de données existante

-- USE testfolio_db; -- Railway: la base s'appelle 'railway'

-- Table des sous-compétences (liées à une compétence principale)
-- ENGINE=MyISAM pour compatibilité avec la BDD Railway (pas de FK)
CREATE TABLE IF NOT EXISTS bts_sous_competences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    competence_id INT NOT NULL,
    label VARCHAR(500) NOT NULL,
    display_order INT DEFAULT 0,
    INDEX idx_competence_id (competence_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table de liaison : réalisation ↔ sous-compétence
CREATE TABLE IF NOT EXISTS bts_matrix_sous (
    realisation_id INT NOT NULL,
    sous_competence_id INT NOT NULL,
    PRIMARY KEY (realisation_id, sous_competence_id),
    INDEX idx_realisation_id (realisation_id),
    INDEX idx_sous_competence_id (sous_competence_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion des sous-compétences officielles du référentiel BTS SIO
-- (correspond aux compétences insérées avec display_order 1 à 6)

-- Compétence 1 : Gérer le patrimoine informatique
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Recenser et identifier les ressources numériques', 1 FROM bts_competences WHERE display_order = 1;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Exploiter des référentiels, normes et standards adoptés par le prestataire informatique', 2 FROM bts_competences WHERE display_order = 1;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Mettre en place et vérifier les niveaux d\'habilitation associés à un service', 3 FROM bts_competences WHERE display_order = 1;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Vérifier les conditions de la continuité d\'un service informatique', 4 FROM bts_competences WHERE display_order = 1;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Gérer les sauvegardes', 5 FROM bts_competences WHERE display_order = 1;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Vérifier le respect des règles d\'utilisation des ressources', 6 FROM bts_competences WHERE display_order = 1;

-- Compétence 2 : Répondre aux incidents et aux demandes d'assistance et d'évolution
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Collecter, suivre et orienter des demandes', 1 FROM bts_competences WHERE display_order = 2;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Traiter des demandes concernant les services réseau et système, applicatifs', 2 FROM bts_competences WHERE display_order = 2;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Traiter des demandes concernant les applications', 3 FROM bts_competences WHERE display_order = 2;

-- Compétence 3 : Développer la présence en ligne de l'organisation
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Participer à la valorisation de l\'image de l\'organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques', 1 FROM bts_competences WHERE display_order = 3;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Référencer les services en ligne de l\'organisation et mesurer leur visibilité', 2 FROM bts_competences WHERE display_order = 3;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Participer à l\'évolution d\'un site Web exploitant les données de l\'organisation', 3 FROM bts_competences WHERE display_order = 3;

-- Compétence 4 : Travailler en mode projet
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Analyser les objectifs et les modalités d\'organisation d\'un projet', 1 FROM bts_competences WHERE display_order = 4;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Planifier les activités', 2 FROM bts_competences WHERE display_order = 4;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Évaluer les indicateurs de suivi d\'un projet et analyser les écarts', 3 FROM bts_competences WHERE display_order = 4;

-- Compétence 5 : Mettre à disposition des utilisateurs un service informatique
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Réaliser les tests d\'intégration et d\'acceptation d\'un service', 1 FROM bts_competences WHERE display_order = 5;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Déployer un service', 2 FROM bts_competences WHERE display_order = 5;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Accompagner les utilisateurs dans la mise en place d\'un service', 3 FROM bts_competences WHERE display_order = 5;

-- Compétence 6 : Organiser son développement professionnel
INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Mettre en place son environnement d\'apprentissage personnel', 1 FROM bts_competences WHERE display_order = 6;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Mettre en œuvre des outils et stratégies de veille informationnelle', 2 FROM bts_competences WHERE display_order = 6;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Gérer son identité professionnelle', 3 FROM bts_competences WHERE display_order = 6;

INSERT INTO bts_sous_competences (competence_id, label, display_order)
SELECT id, 'Développer son projet professionnel', 4 FROM bts_competences WHERE display_order = 6;
