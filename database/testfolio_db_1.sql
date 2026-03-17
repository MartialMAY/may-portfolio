-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 17 mars 2026 à 07:56
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testfolio_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Guest',
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `idx_audit_created` (`created_at`),
  KEY `idx_audit_action` (`action`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `username`, `action`, `module`, `details`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'admin', 'DELETE_MESSAGE', 'MESSAGES', 'ID: 2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 16:22:41'),
(2, 1, 'admin', 'LOGOUT', 'AUTH', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 16:34:07'),
(3, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 16:34:24'),
(4, 1, 'admin', 'CONTACT_MESSAGE_SENT', 'CONTACT', 'From: john (john@gmail.com)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 17:13:50'),
(5, 1, 'admin', 'CONTACT_MESSAGE_SENT', 'CONTACT', 'From: momo (momo@gmail.com)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 17:24:58'),
(6, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/messages', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 18:03:42'),
(7, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-24 18:03:53'),
(8, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:17:57'),
(9, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:23:20'),
(10, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:01:40'),
(11, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:01:42'),
(12, 1, 'admin', 'UPDATE_CV_PDF', 'CV', 'Uploaded new PDF', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:02:33'),
(13, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/timeline/edit?id=1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:10:48'),
(14, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:10:58'),
(15, 1, 'admin', 'CREATE_TIMELINE', 'TIMELINE', 'Title: BTS SIO - Option SLAM (2ème année)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:15:56'),
(16, 1, 'admin', 'CREATE_TIMELINE', 'TIMELINE', 'Title: BTS SIO - Option SLAM', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:16:30'),
(17, 1, 'admin', 'CREATE_TIMELINE', 'TIMELINE', 'Title: Stage développeur web', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:17:20'),
(18, 1, 'admin', 'CREATE_TIMELINE', 'TIMELINE', 'Title: Stage développeur web', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:18:11'),
(19, 1, 'admin', 'CREATE_TIMELINE', 'TIMELINE', 'Title: Référencement de site web (SEO), Stage', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:19:06'),
(20, 1, 'admin', 'DELETE_TIMELINE', 'TIMELINE', 'ID: 1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:21:10'),
(21, 1, 'admin', 'DELETE_TIMELINE', 'TIMELINE', 'ID: 2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:21:15'),
(22, 1, 'admin', 'DELETE_TIMELINE', 'TIMELINE', 'ID: 4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:21:23'),
(23, 1, 'admin', 'UPDATE_TIMELINE', 'TIMELINE', 'Title: BTS SIO - Option SLAM (2ème année)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:22:10'),
(24, 1, 'admin', 'UPDATE_TIMELINE', 'TIMELINE', 'Title: BTS SIO - Option SLAM', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:22:43'),
(25, 1, 'admin', 'UPDATE_TIMELINE', 'TIMELINE', 'Title: Stage développeur web', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:23:34'),
(26, 1, 'admin', 'UPDATE_TIMELINE', 'TIMELINE', 'Title: Stage développeur web', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:23:43'),
(27, 1, 'admin', 'UPDATE_TIMELINE', 'TIMELINE', 'Title: Référencement de site web (SEO), Stage', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 11:23:54'),
(28, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 16:08:05'),
(29, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-05 16:08:19'),
(30, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-06 19:22:59'),
(31, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/timeline', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 13:59:33'),
(32, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 13:59:36'),
(33, NULL, 'Guest', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:26:02'),
(34, NULL, 'Guest', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:26:16'),
(35, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:26:20'),
(36, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:26:22'),
(37, 1, 'admin', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:35:48'),
(38, 1, 'admin', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:36:15'),
(39, 1, 'admin', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:37:33'),
(40, 1, 'admin', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:44:46'),
(41, 1, 'admin', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-10 16:45:07'),
(42, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:16:56'),
(43, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:17:00'),
(44, 1, 'admin', 'CREATE_PROJECT', 'PROJECTS', 'Title: YUNI AI — Assistant vocal urbain pour la ville de Reims', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:24:28'),
(45, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI — Assistant vocal urbain pour la ville de Reims', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:25:47'),
(46, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI — Assistant vocal urbain pour la ville de Reims', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:26:25'),
(47, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:29:26'),
(48, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:34:31'),
(49, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:39:16'),
(50, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 09:42:51'),
(51, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:44:16'),
(52, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:44:20'),
(53, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:44:56'),
(54, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:46:07'),
(55, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:46:57'),
(56, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 10:53:07'),
(57, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 15:09:47'),
(58, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 15:09:49'),
(59, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 15:54:28'),
(60, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 19:10:41'),
(61, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 19:10:43'),
(62, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 21:18:56'),
(63, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 21:18:57'),
(64, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 21:34:18'),
(65, NULL, 'Guest', 'CSRF_INVALID_TOKEN', 'SECURITY', 'Referer: http://localhost/may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 22:19:13'),
(66, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 22:19:19'),
(67, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 22:19:21'),
(68, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 22:31:48'),
(69, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 22:51:15'),
(70, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-11 23:11:44'),
(71, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:07'),
(72, NULL, 'Guest', 'LOGIN_FAILURE', 'AUTH', 'Username: admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:14'),
(73, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:24'),
(74, 1, 'admin', 'DELETE_PROJECT', 'PROJECTS', 'ID: 1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:49'),
(75, 1, 'admin', 'DELETE_PROJECT', 'PROJECTS', 'ID: 2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:52'),
(76, 1, 'admin', 'DELETE_PROJECT', 'PROJECTS', 'ID: 3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:56'),
(77, 1, 'admin', 'DELETE_PROJECT', 'PROJECTS', 'ID: 4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 08:22:59'),
(78, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /may-portfolio/public/admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:02:35'),
(79, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:02:37'),
(80, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /admin/projects/edit?id=5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:03:38'),
(81, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:03:43'),
(82, 1, 'admin', 'UPDATE_PROJECT', 'PROJECTS', 'Title: YUNI AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:05:03'),
(83, 1, 'admin', 'UPDATE_BTS', 'BTS_SIO', 'Title: Développement de l\'application Yuni AI', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 11:12:29'),
(84, NULL, 'Guest', 'UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', 'URI: /admin/timeline', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 16:04:49'),
(85, 1, 'admin', 'LOGIN_SUCCESS', 'AUTH', 'Admin logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-12 16:04:56');

-- --------------------------------------------------------

--
-- Structure de la table `bts_competences`
--

DROP TABLE IF EXISTS `bts_competences`;
CREATE TABLE IF NOT EXISTS `bts_competences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `display_order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bts_competences`
--

INSERT INTO `bts_competences` (`id`, `label`, `description`, `display_order`) VALUES
(1, 'Gérer le patrimoine informatique', '• Recenser et identifier les ressources numériques • Exploiter des référentiels, normes et standards adoptés par le prestataire informatique • Mettre en place et vérifier les niveaux d’habilitation associés à un service • Vérifier les conditions de la continuité d’un service informatique • Gérer des sauvegardes • Vérifier le respect des règles d\'utilisation des ressources', 1),
(2, 'Répondre aux incidents et aux demandes d\'assistance et d\'évolution', '• Collecter, suivre et orienter des demandes • Traiter des demandes concernant les services réseau et système, applicatifs • Traiter des demandes concernant les applications', 2),
(3, 'Développer la présence en ligne de l\'organisation', '• Participer à la valorisation de l’image de l’organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques • Référencer les services en ligne de l’organisation et mesurer leur visibilité • Participer à l’évolution d’un site Web exploitant les données de l’organisation', 3),
(4, 'Travailler en mode projet', '• Analyser les objectifs et les modalités d’organisation d’un projet • Planifier les activités • Évaluer les indicateurs de suivi d’un projet et analyser les écarts', 4),
(5, 'Mettre à disposition des utilisateurs un service informatique', '• Réaliser les tests d’intégration et d’acceptation d’un service • Déployer un service • Accompagner les utilisateurs dans la mise en place d’un service', 5),
(6, 'Organiser son développement professionnel', '• Mettre en place son environnement d’apprentissage personnel • Mettre en œuvre des outils et stratégies de veille informationnelle • Gérer son identité professionnelle • Développer son projet professionnel', 6);

-- --------------------------------------------------------

--
-- Structure de la table `bts_matrix`
--

DROP TABLE IF EXISTS `bts_matrix`;
CREATE TABLE IF NOT EXISTS `bts_matrix` (
  `realisation_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`realisation_id`,`competence_id`),
  KEY `competence_id` (`competence_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bts_matrix`
--

INSERT INTO `bts_matrix` (`realisation_id`, `competence_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 5),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `bts_realisations`
--

DROP TABLE IF EXISTS `bts_realisations`;
CREATE TABLE IF NOT EXISTS `bts_realisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('formation','pro_1','pro_2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT '0',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bts_project` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bts_realisations`
--

INSERT INTO `bts_realisations` (`id`, `title`, `periode`, `type`, `display_order`, `project_id`) VALUES
(1, 'Développement de l\'application Yuni AI', 'Jan. - Fév. 2025', 'pro_2', 1, 5),
(2, 'Optimisation du référencement SEO', 'Nov 2023', 'formation', 2, NULL),
(4, 'Stage 1 - Maintenance Evolutive', 'Mai - Juin 2024', 'pro_1', 1, NULL),
(5, 'Stage 2 - Refonte Backend Symfony', 'Jan - Fév 2025', 'pro_2', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'may', 'may@gmail.com', 'Bonjour', '2026-01-23 22:03:22'),
(3, 'john', 'john@gmail.com', 'Bonjour j\'aimerais bien travailler avec vous', '2026-01-24 17:13:50'),
(4, 'momo', 'momo@gmail.com', 'Super ton portfolio', '2026-01-24 17:24:58');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `technologies` text COLLATE utf8mb4_unicode_ci,
  `cover_image` text COLLATE utf8mb4_unicode_ci,
  `project_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_snippets` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `category`, `image_url`, `description`, `technologies`, `cover_image`, `project_url`, `code_snippets`, `created_at`) VALUES
(5, 'YUNI AI', 'Application Web', 'http://localhost/may-portfolio/public/uploads/projects/8d7b07871651fde7a34e512c4f0c7d06.png|,http://localhost/may-portfolio/public/uploads/projects/545e2ee934ca3209784503cb3cfebf6e.png|Base de données (1/2),http://localhost/may-portfolio/public/uploads/projects/fe24fb3f97099ab68aa92dc279a4e482.png|Base de données (2/2),http://localhost/may-portfolio/public/uploads/projects/57ea8cd440ca20d4a81b6348fefbb8dd.png|Architecture des dossiers (extrait),http://localhost/may-portfolio/public/uploads/projects/3e326127c8c7f906ca3b541668e96d59.png|La table \' lieux \' (1/2),http://localhost/may-portfolio/public/uploads/projects/059a85db3ada719006bec0d10cc5d728.png|La table \' lieux \' (2/2),http://localhost/may-portfolio/public/uploads/projects/5c68c3954d90360e4dc697b2ceb32dcc.png|Historique des conversations (BDD) - `services/yuni.service.ts` (extrait),http://localhost/may-portfolio/public/uploads/projects/096e6200288515c4aaf772c1fb6643e9.png|Les outils de l\'IA (Function Calling) — `config/tools.js`,http://localhost/may-portfolio/public/uploads/projects/ba389a519f77d94822628c8112a71ae8.png|Le proxy WebSocket — `proxy-local.js`', 'YUNI AI est une application web qui permet aux habitants de Reims de découvrir des lieux et événements locaux via une conversation vocale ou textuelle avec une IA.', 'Next.js, TypeScript, Supabase (PostgreSQL + PostGIS), Google Gemini Live, WebSocket', 'http://localhost/may-portfolio/public/uploads/projects/8b536ec50a7baa76cfba6760bf205b96.png', 'https://github.com/MartialMAY/yuni_ai_app', NULL, '2026-03-11 09:24:28');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_svg` text COLLATE utf8mb4_unicode_ci,
  `display_order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stats`
--

INSERT INTO `stats` (`id`, `label`, `value`, `display_order`) VALUES
(1, 'Expertise', '12+', 1),
(2, 'Projets Réalisés', '15', 2),
(3, 'Satisfaction Client', '100%', 3);

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

DROP TABLE IF EXISTS `timeline`;
CREATE TABLE IF NOT EXISTS `timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` enum('formation','experience','certification') COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `timeline`
--

INSERT INTO `timeline` (`id`, `title`, `organization`, `period`, `description`, `category`, `display_order`, `created_at`) VALUES
(1, 'BTS SIO - Option SLAM', 'Lycée Janetti - St-Maximin', '2023 - Présent', 'Services Informatiques aux Organisations. Spécialité Solutions Logicielles et Applications Métiers.', 'formation', 1, '2026-03-05 15:56:25'),
(2, 'Stage Développeur Fullstack', 'CCI du Var', 'Mai 2024 - Juin 2024', 'Développement de nouvelles fonctionnalités sur une plateforme SaaS existante. Refonte de composants UI et optimisation des requêtes SQL.', 'experience', 1, '2026-03-05 15:56:25'),
(3, 'Certification Oracle Database', 'Oracle Academy', '2024', 'Database Programming with SQL.', 'certification', 1, '2026-03-05 15:56:25'),
(4, 'Baccalauréat Général', 'Lycée Janetti', '2020 - 2023', 'Spécialités Mathématiques et Numérique & Sciences Informatiques (NSI).', 'formation', 2, '2026-03-05 15:56:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$YZvpYwufMbm9WVrJIw7OmuLSCLBo7O0sMGkPEGMmXIFx8sJBEap56', 'admin@example.com', '2026-01-08 14:17:43');

-- --------------------------------------------------------

--
-- Structure de la table `veille`
--

DROP TABLE IF EXISTS `veille`;
CREATE TABLE IF NOT EXISTS `veille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `article_url` text COLLATE utf8mb4_unicode_ci,
  `published_at` datetime DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opinion` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `veille`
--

INSERT INTO `veille` (`id`, `title`, `category`, `source_name`, `summary`, `article_url`, `published_at`, `image_url`, `opinion`) VALUES
(4, 'Les assistants de codage IA sont-ils en train de rendre le code plus rapide à écrire... mais plus lent et plus coûteux à maintenir ? Un data scientist note une stagnation, voire une dégradation de performance', 'IA, DEV', 'Flux général Developpez.com', 'Les assistants de codage IA sont-ils en train de rendre le code plus rapide à écrire mais plus lent et plus coûteux à maintenir ?\r\nUn data scientist note une stagnation, voire une dégradation de leurs performancesDepuis deux ans, les assistants de codage dopés à l\'intelligence artificielle sont devenus des compagnons quasi permanents pour de nombreux développeurs. Complétion de code, génération de fonctions, refactoring automatique, explication de bases de code héritées : la promesse était simple...', 'https://intelligence-artificielle.developpez.com/actu/379074/Les-assistants-de-codage-IA-sont-ils-en-train-de-rendre-le-code-plus-rapide-a-ecrire-mais-plus-lent-et-plus-couteux-a-maintenir-Un-data-scientist-note-une-stagnation-voire-une-degradation-de-performance/', '2026-01-09 10:37:00', '', 'j\'aime bien'),
(5, 'Une affaire de meurtre-suicide révèle qu\'OpenAI cache certaines données après le décès d\'un utilisateur de ChatGPT, l\'entreprise est accusée de « dissimulation systématique » visant à protéger son image', 'TECH', 'Flux général Developpez.com', 'Une affaire de meurtre-suicide révèle qu\'OpenAI cache certaines données après le décès d\'un utilisateur de ChatGPT\r\nl\'entreprise est accusée de « dissimulation systématique » visant à protéger son imageOpenAI est accusé de rétention d\'informations dans le cas d\'un incident impliquant son chatbot ChatGPT. Selon la plainte, OpenAI partage les données de manière sélective dans le cadre d\'une affaire de meurtre-suicide liée à ChatGPT. OpenAI a refusé de préciser ce qu\'il advient exactement des journaux...', 'https://intelligence-artificielle.developpez.com/actu/379082/Une-affaire-de-meurtre-suicide-revele-qu-OpenAI-cache-certaines-donnees-apres-le-deces-d-un-utilisateur-de-ChatGPT-l-entreprise-est-accusee-de-dissimulation-systematique-visant-a-proteger-son-image/', '2026-01-09 13:24:00', 'https://www.developpez.com/images/logos/openai.png', ''),
(6, 'Anthropic, la start-up IA à l\'origine de Claude, est sur le point de lever 10 milliards $, ce qui la valorise à 350 milliards $ avant financement, quelques mois seulement après avoir levé 13 milliards $', 'TECH', 'Flux général Developpez.com', 'Anthropic, la start-up IA à l\'origine de Claude, est sur le point de lever 10 milliards $, ce qui la valorise à 350 milliards $ avant financement, quelques mois seulement après avoir levé 13 milliards $Anthropic, la start-up d\'IA à l\'origine de Claude, s\'approche d\'un tour de table de 10 milliards de dollars mené par GIC et Coatue, qui la valorise à 350 milliards de dollars avant financement, quelques mois seulement après une levée de fonds de 13 milliards de dollars à 183 milliards de dollars....', 'https://intelligence-artificielle.developpez.com/actu/379078/Anthropic-la-start-up-IA-a-l-origine-de-Claude-est-sur-le-point-de-lever-10-milliards-ce-qui-la-valorise-a-350-milliards-avant-financement-quelques-mois-seulement-apres-avoir-leve-13-milliards/', '2026-01-09 13:26:00', 'https://www.developpez.com/images/logos/antropic.png', ''),
(7, 'Le groupe de hackers chinois Salt Typhoon a piraté les comptes de messagerie électronique des membres du personnel de puissantes commissions de la Chambre des représentants des États-Unis', 'TECH', 'Flux général Developpez.com', 'Le groupe de hackers chinois Salt Typhoon a piraté les comptes de messagerie électronique de membres du personnel de puissantes commissions de la Chambre des représentants des États-UnisSelon un récent rapport du Financial Times, le groupe de pirates informatiques chinois connu sous le nom de Salt Typhoon aurait compromis les comptes de messagerie électronique de membres du personnel de plusieurs commissions clés de la Chambre des représentants, notamment celles chargées de la Chine, des affaires...', 'https://securite.developpez.com/actu/379073/Le-groupe-de-hackers-chinois-Salt-Typhoon-a-pirate-les-comptes-de-messagerie-electronique-des-membres-du-personnel-de-puissantes-commissions-de-la-Chambre-des-representants-des-Etats-Unis/', '2026-01-09 13:24:00', 'https://www.developpez.com/images/logos/securite2.png', ''),
(8, 'Un rapport de police généré par l\'IA affirme qu\'un policier de l\'Utah s\'est transformé en grenouille, l\'outil d\'IA aurait pu capter des bavardages en arrière-plan, selon le département', 'TECH', 'Flux général Developpez.com', 'Un rapport de police généré par l\'IA affirme qu\'un policier de l\'Utah s\'est transformé en grenouille, l\'outil d\'IA aurait pu capter des bavardages en arrière-plan, selon le départementUn rapport de police généré par l\'IA affirme qu\'un policier s\'est transformé en grenouille, le département publie une clarification. Selon le sergent Rick Keel, l\'outil d\'IA aurait pu capter des bavardages en arrière-plan sans rapport avec l\'affaire pour inventer cette tournure mythique au rapport. Keel faisait référence...', 'https://intelligence-artificielle.developpez.com/actu/379072/Un-rapport-de-police-genere-par-l-IA-affirme-qu-un-policier-de-l-Utah-s-est-transforme-en-grenouille-l-outil-d-IA-aurait-pu-capter-des-bavardages-en-arriere-plan-selon-le-departement/', '2026-01-09 13:35:00', 'https://www.developpez.com/images/logos/police.png', ''),
(9, 'Google dépasse Apple en termes de capitalisation boursière pour la première fois depuis 2019 : l\'IA Gemini 3 et les puces TPU ont stimulé une forte croissance menaçant OpenAI et Nvidia', 'TECH', 'Flux général Developpez.com', 'Google dépasse Apple en termes de capitalisation boursière pour la première fois depuis 2019 : l\'IA Gemini 3 et les puces TPU ont stimulé une forte croissance menaçant OpenAI et NvidiaLa société mère de Google, Alphabet, a vu sa capitalisation boursière dépasser celle du fabricant d\'iPhone Apple pour la première fois depuis 2019. Selon un rapport, la capitalisation boursière d\'Alphabet a clôturé à 3 880 milliards de dollars le mercredi 7 janvier. L\'action Alphabet a augmenté de plus de 2 %, clôturant...', 'https://intelligence-artificielle.developpez.com/actu/379071/Google-depasse-Apple-en-termes-de-capitalisation-boursiere-pour-la-premiere-fois-depuis-2019-l-IA-Gemini-3-et-les-puces-TPU-ont-stimule-une-forte-croissance-menacant-OpenAI-et-Nvidia/', '2026-01-09 13:27:00', 'https://www.developpez.com/images/logos/google.png', ''),
(10, 'Threads de Meta dépasse désormais le réseau social X (ex-Twitter) d\'Elon Musk en matière de nombre d\'utilisateurs quotidiens sur les appareils mobiles. X subit également la pression de Bluesky', 'TECH', 'Flux général Developpez.com', 'Threads de Meta dépasse désormais le réseau social X (ex-Twitter) d\'Elon Musk en matière de nombre d\'utilisateurs quotidiens sur les appareils mobiles\r\nX subit également la pression de BlueskyThreads a connu une croissance accélérée depuis son lancement en juillet 2023. Le clone de Twitter développé par Meta a ajouté 20 millions de nouveaux utilisateurs en janvier 2025. Un an plus tard, de nouvelles données ont révélé que Threads dépasse désormais le réseau social X (ex-Twitter) d\'Elon Musk en matière...', 'https://web.developpez.com/actu/379351/Threads-de-Meta-depasse-desormais-le-reseau-social-X-ex-Twitter-d-Elon-Musk-en-matiere-de-nombre-d-utilisateurs-quotidiens-sur-les-appareils-mobiles-X-subit-egalement-la-pression-de-Bluesky/', '2026-01-19 18:03:00', 'https://www.developpez.com/images/logos/threads.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `veille_sources`
--

DROP TABLE IF EXISTS `veille_sources`;
CREATE TABLE IF NOT EXISTS `veille_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `veille_sources`
--

INSERT INTO `veille_sources` (`id`, `name`, `url`) VALUES
(1, 'developpez.com', 'http://www.developpez.com/rss.php');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
