-- Database Initialization Script

CREATE DATABASE IF NOT EXISTS testfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE testfolio_db;

-- Users table for admin access
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

TRUNCATE TABLE users;
INSERT INTO users (username, password, email) VALUES 
('admin', '$2y$10$YZvpYwufMbm9WVrJIw7OmuLSCLBo7O0sMGkPEGMmXIFx8sJBEap56', 'admin@example.com'); -- Password: admin123 (hashed)

-- Projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    image_url TEXT NOT NULL,
    description TEXT NOT NULL,
    technologies TEXT,
    project_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Timeline table (Formation / Expérience)
CREATE TABLE IF NOT EXISTS timeline (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    organization VARCHAR(100) NOT NULL,
    period VARCHAR(50) NOT NULL,
    description TEXT,
    category ENUM('formation', 'experience', 'certification') NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

TRUNCATE TABLE timeline;
INSERT INTO timeline (title, organization, period, description, category, display_order) VALUES 
('BTS SIO - Option SLAM', 'Lycée Janetti - St-Maximin', '2023 - Présent', 'Services Informatiques aux Organisations. Spécialité Solutions Logicielles et Applications Métiers.', 'formation', 1),
('Stage Développeur Fullstack', 'CCI du Var', 'Mai 2024 - Juin 2024', 'Développement de nouvelles fonctionnalités sur une plateforme SaaS existante. Refonte de composants UI et optimisation des requêtes SQL.', 'experience', 1),
('Certification Oracle Database', 'Oracle Academy', '2024', 'Database Programming with SQL.', 'certification', 1),
('Baccalauréat Général', 'Lycée Janetti', '2020 - 2023', 'Spécialités Mathématiques et Numérique & Sciences Informatiques (NSI).', 'formation', 2);


-- Skills table
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL, -- e.g., 'Front-end', 'Back-end', 'Design'
    icon_svg TEXT, -- Optional: inline SVG code
    display_order INT DEFAULT 0
);

-- Veille Technologique (Tech Watch) table
CREATE TABLE IF NOT EXISTS veille (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    source_name VARCHAR(255),
    summary TEXT,
    article_url TEXT,
    opinion TEXT,
    published_at DATETIME,
    image_url VARCHAR(255)
);

CREATE TABLE veille_sources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL
);

-- Statistics / Profil stats
CREATE TABLE IF NOT EXISTS stats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL,
    value VARCHAR(20) NOT NULL, -- Stored as string to allow "12+" or "100%"
    display_order INT DEFAULT 0
);

-- BTS SIO Competences (Columns)
CREATE TABLE IF NOT EXISTS bts_competences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description TEXT,
    display_order INT DEFAULT 0
);

-- BTS SIO Realisations (Rows)
CREATE TABLE IF NOT EXISTS bts_realisations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    periode VARCHAR(50),
    type ENUM('formation', 'pro_1', 'pro_2') NOT NULL,
    display_order INT DEFAULT 0
);

-- Matrix linking realisations to competences
CREATE TABLE IF NOT EXISTS bts_matrix (
    realisation_id INT NOT NULL,
    competence_id INT NOT NULL,
    PRIMARY KEY (realisation_id, competence_id),
    FOREIGN KEY (realisation_id) REFERENCES bts_realisations(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES bts_competences(id) ON DELETE CASCADE
);

-- Insert Demo Data (Optional but helpful for testing)
TRUNCATE TABLE stats;
INSERT INTO stats (label, value, display_order) VALUES 
('Expertise', '12+', 1),
('Projets Réalisés', '15', 2),
('Satisfaction Client', '100%', 3);

TRUNCATE TABLE projects;
INSERT INTO projects (title, category, image_url, description) VALUES 
('GESTIONNAIRE DE TÂCHES', 'WEB DESIGN', 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&q=80|Tableau de Bord Principal & Visualisation,https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1200&q=80|Détail du Workflow et Gestion des Tâches,https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&q=80|Interface responsive sur poste de travail', 'Un outil complet de gestion de tâches.'),
('API E-COMMERCE', 'BACK-END', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80', 'Une API robuste pour plateforme e-commerce.'),
('APPLICATION FITNESS', 'MOBILE', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&q=80', 'Une app compagnon pour le sport.'),
('PORTFOLIO MINIMALISTE', 'UI/UX', 'https://images.unsplash.com/photo-1551650975-87deedd944c3?w=800&q=80', 'Un design épuré et moderne.');

TRUNCATE TABLE veille;
INSERT INTO veille (title, category, summary, article_url, published_date) VALUES 
('L\'impact de l\'IA sur le code', 'IA GENERATIVE', 'Analyse de l\'impact des LLMs sur le flux de travail des développeurs modernes.', '#', '2024-01-15'),
('Éco-conception web', 'GREEN IT', 'Pourquoi les standards du web reviennent au premier plan pour la réutilisabilité.', '#', '2024-02-10'),
('L\'avenir de React Server Components', 'FRAMEWORKS', 'Exploration des nouvelles architectures SSR et Hydratation.', '#', '2024-03-05');

-- BTS Data
TRUNCATE TABLE bts_competences;
INSERT INTO bts_competences (label, description, display_order) VALUES 
('Gérer le patrimoine informatique', '• Recenser et identifier les ressources numériques • Exploiter des référentiels, normes et standards adoptés par le prestataire informatique • Mettre en place et vérifier les niveaux d’habilitation associés à un service • Vérifier les conditions de la continuité d’un service informatique • Gérer des sauvegardes • Vérifier le respect des règles d''utilisation des ressources', 1),
('Répondre aux incidents et aux demandes d\'assistance et d\'évolution', '• Collecter, suivre et orienter des demandes • Traiter des demandes concernant les services réseau et système, applicatifs • Traiter des demandes concernant les applications', 2),
('Développer la présence en ligne de l\'organisation', '• Participer à la valorisation de l’image de l’organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques • Référencer les services en ligne de l’organisation et mesurer leur visibilité • Participer à l’évolution d’un site Web exploitant les données de l’organisation', 3),
('Travailler en mode projet', '• Analyser les objectifs et les modalités d’organisation d’un projet • Planifier les activités • Évaluer les indicateurs de suivi d’un projet et analyser les écarts', 4),
('Mettre à disposition des utilisateurs un service informatique', '• Réaliser les tests d’intégration et d’acceptation d’un service • Déployer un service • Accompagner les utilisateurs dans la mise en place d’un service', 5),
('Organiser son développement professionnel', '• Mettre en place son environnement d’apprentissage personnel • Mettre en œuvre des outils et stratégies de veille informationnelle • Gérer son identité professionnelle • Développer son projet professionnel', 6);

TRUNCATE TABLE bts_realisations;
INSERT INTO bts_realisations (id, title, periode, type, display_order) VALUES 
(1, 'Développement d''un module GLPI', 'Sept - Oct 2023', 'formation', 1),
(2, 'Optimisation du référencement SEO', 'Nov 2023', 'formation', 2),
(3, 'Migration de base de données', 'Dec 2023', 'formation', 3),
(4, 'Stage 1 - Maintenance Evolutive', 'Mai - Juin 2024', 'pro_1', 1),
(5, 'Stage 2 - Refonte Backend Symfony', 'Jan - Fév 2025', 'pro_2', 1);

TRUNCATE TABLE bts_matrix;
INSERT INTO bts_matrix (realisation_id, competence_id) VALUES 
(1, 1), (1, 2), (1, 4),
(2, 3), (2, 4), (2, 6),
(3, 1), (3, 5),
(4, 1), (4, 2), (4, 4),
(5, 1), (5, 4), (5, 5);

