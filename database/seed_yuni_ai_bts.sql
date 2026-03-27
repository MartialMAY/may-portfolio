-- ================================================================
-- SEED : Réalisation BTS SIO — Yuni AI
-- ================================================================
-- Application conversationnelle IA développée en stage 2ème année
-- Stack : Next.js 16, Gemini Live API (WebSocket), Supabase/PostGIS,
--         React-Leaflet, Tailwind CSS v4, proxy WebSocket Node.js
-- Dépôt : https://github.com/MartialMAY/yuni_ai_app (core-v1.2)
-- ================================================================

-- 1. Insertion de la réalisation
INSERT INTO bts_realisations (title, periode, type, display_order, project_id, description)
VALUES (
    'Yuni AI — Application conversationnelle IA',
    'Fév 2025 – Juin 2025',
    'pro_2',
    2,
    NULL,
    'Application web Next.js 16 intégrant Gemini Live API (WebSocket) pour la conversation vocale temps réel et Gemini 1.5 Pro pour le mode textuel. Recommandations géolocalisées de lieux (bars, restaurants, culture) via Supabase/PostGIS et OpenStreetMap. Historique conversationnel automatique, cartographie interactive React-Leaflet, proxy WebSocket Node.js sécurisé. Déployé sur Vercel.'
);

SET @yuni_id = LAST_INSERT_ID();

-- ================================================================
-- 2. Compétences principales mobilisées
-- C1 - Gérer le patrimoine informatique
-- C3 - Développer la présence en ligne de l'organisation
-- C4 - Travailler en mode projet
-- C5 - Mettre à disposition des utilisateurs un service informatique
-- C6 - Organiser son développement professionnel
-- ================================================================
INSERT INTO bts_matrix (realisation_id, competence_id)
SELECT @yuni_id, id FROM bts_competences WHERE display_order IN (1, 3, 4, 5, 6);

-- ================================================================
-- 3. Sous-compétences avec justifications
-- ================================================================

-- C1 — SC1 : Recenser et identifier les ressources numériques
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Identification et cartographie des ressources externes du projet : Gemini Live API v1beta (WebSocket), Gemini 1.5 Pro/Flash (REST), Supabase/PostgreSQL+PostGIS, OSM Nominatim et Overpass API, Web Audio API (AudioWorklet). Structuration des dépendances dans le projet Next.js (package.json, variables d''environnement sécurisées).'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 1 AND sc.display_order = 1;

-- C1 — SC2 : Exploiter des référentiels, normes et standards
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Exploitation des standards WebSocket (RFC 6455) pour la connexion Gemini Live, de l''API Web Audio (AudioWorklet PCM 24kHz) pour la capture et lecture audio en temps réel, et des normes PostGIS pour les requêtes géospatiales (ST_DWithin, coordonnées WGS84). Respect des conventions Next.js App Router et des bonnes pratiques de sécurisation des clés API.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 1 AND sc.display_order = 2;

-- C3 — SC3 : Participer à l'évolution d'un site Web exploitant les données de l'organisation
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Développement complet de l''application Next.js 16 (App Router, React 19) exploitant les données Supabase : routes API REST (/api/gemini) et WebSocket (proxy Node.js), composants React modulaires (chat, orbe animé, carte Leaflet, suggestions). Interface en français, animations Framer Motion, design Tailwind CSS v4 responsive. Déploiement continu sur Vercel.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 3 AND sc.display_order = 3;

-- C4 — SC1 : Analyser les objectifs et les modalités d'organisation d'un projet
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Analyse des besoins : assistant vocal et textuel géolocalisé pour explorer Reims — définition des cas d''usage (mode vocal temps réel, mode textuel streaming, historique, cartographie), choix architectural (proxy WebSocket pour sécuriser les clés API, services découplés lieux/OSM/events), sélection des technologies IA (Gemini Live vs REST).'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 4 AND sc.display_order = 1;

-- C4 — SC2 : Planifier les activités
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Développement itératif organisé en branches versionnées (core-v1.0, v1.1, v1.2) avec progression fonctionnelle planifiée : intégration IA textuelle → mode vocal WebSocket → cartographie interactive → sauvegarde historique Supabase. Gestion du dépôt GitHub avec commits atomiques par fonctionnalité.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 4 AND sc.display_order = 2;

-- C5 — SC1 : Réaliser les tests d'intégration et d'acceptation d'un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Tests d''intégration des connexions WebSocket Gemini Live (handshake, flux PCM audio, fermeture propre), validation des appels de fonction IA (function calling : recommendations, events, markers), vérification des requêtes géospatiales Supabase/PostGIS et du fallback OpenStreetMap Overpass. Tests de l''authentification Supabase SSR middleware.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 5 AND sc.display_order = 1;

-- C5 — SC2 : Déployer un service
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Déploiement de l''application sur Vercel avec configuration des variables d''environnement sécurisées (GEMINI_API_KEY, NEXT_PUBLIC_SUPABASE_URL, SUPABASE_SERVICE_ROLE_KEY). Mise en place du proxy WebSocket Node.js pour sécuriser les communications temps réel sans exposer les clés API côté client. Déploiement continu via GitHub.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 5 AND sc.display_order = 2;

-- C6 — SC2 : Mettre en œuvre des outils et stratégies de veille informationnelle
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Veille active sur les LLMs multimodaux et l''API Gemini Live (v1beta) — suivi des évolutions Google AI Studio, intégration des dernières capacités vocales temps réel (WebSocket, AudioWorklet PCM 24kHz) dès leur disponibilité. Application immédiate des nouvelles fonctionnalités IA (function calling, streaming token, transcription française) dans le projet.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 6 AND sc.display_order = 2;

-- C6 — SC4 : Développer son projet professionnel
INSERT INTO bts_matrix_sous (realisation_id, sous_competence_id, justification)
SELECT @yuni_id, sc.id,
    'Développement d''une expertise fullstack IA en autonomie : maîtrise de Next.js 16 App Router, React 19, Supabase/PostGIS, et des APIs Gemini (REST + WebSocket). Projet démonstratif d''une application IA conversationnelle vocale complète, constituant une référence concrète de compétences en développement d''applications IA modernes pour le portfolio professionnel.'
FROM bts_sous_competences sc
JOIN bts_competences c ON sc.competence_id = c.id
WHERE c.display_order = 6 AND sc.display_order = 4;
