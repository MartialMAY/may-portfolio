-- Migration: Add settings table
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
('github_url', 'https://github.com');
