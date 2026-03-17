-- Migration: Add settings table
SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;
CREATE TABLE IF NOT EXISTS settings (
    `key` VARCHAR(100) NOT NULL PRIMARY KEY,
    `value` TEXT
);

INSERT IGNORE INTO settings (`key`, `value`) VALUES
('hero_name', 'Martial MAYAMOU'),
('hero_title_line1', 'Développeur'),
('hero_title_line2', 'Web'),
('hero_description', 'Étudiant en BTS SIO SLAM, je vous présente mon portfolio, un espace où vous allez découvrir mon parcours scolaire et les différents projets que j\'ai réalisés au cours de ma formation.'),
('linkedin_url', 'https://linkedin.com'),
('github_url', 'https://github.com'),
('about_paragraph1', 'Je m\'appelle **MAYAMOU BATETANA Martial** ! Actuellement étudiant en deuxième année de **BTS SIO** (Services Informatiques aux Organisations), avec une spécialité **SLAM** (Solutions Logicielles et Applications Métier), je suis en voie de formation dans le secteur du développement, des bases de données ainsi que des systèmes d\'information.'),
('about_paragraph2', 'Étudiant au lycée **Paul Claudel à Laon**, l\'établissement me permet de me former afin de répondre au mieux aux besoins des entreprises en concevant des solutions logicielles adaptées.');
