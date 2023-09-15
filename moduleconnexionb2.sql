-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 sep. 2023 à 12:11
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexionb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(319) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `role`, `avatar`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john.doe@gmail.com', '$2y$10$fewh80jIC7izL0J6TzJ.OuxmBKaxoz7xCYTld.PD7GYWcmT8vJy8m', 'John', 'Doe', 'user', '263df4-John.png', NULL, '2023-09-12 11:30:19', NULL),
(2, 'Jules', 'jules@gmail.com', '$2y$10$8OGD84J.OXIaECVP0TN/f.nzU2oNmZfE0tD17yZMzuvaJZjAHa982', 'Jules', 'JuL', 'admin', '5bafe2-Jules.png', NULL, '2023-09-12 14:02:38', NULL),
(3, 'Toto', 'toto1@gmail.com', '$2y$10$LhyT1621ZbWwPkNIVO8/o.2db.NwIOzk5mx8XNSinXEaSpnc2LEY.', 'Toto', 'Toto', 'user', 'e7e079-Toto.png', NULL, '2023-09-12 14:05:07', NULL),
(4, 'Gasbb', 'gasgas@gmail.com', '$2y$10$Z.117UcvXoovkz0koBwCFOYKn4q3oovNKaCRs0CoFmfYpcKJ3x6o.', 'Gas', 'Par', 'user', '8e495b-Gas.png', NULL, '2023-09-13 09:07:19', '2023-09-13 12:22:31'),
(5, 'Physalis', 'Physalis@gmail.com', '$2y$10$Uni2eCeQ7Vp70/B1t6K9O.kNk5e1X2rtWR7MGKHkkalSWVN1hGPfG', 'Phy', 'salis', 'user', 'a6f1b7-Physalis.png', NULL, '2023-09-14 21:38:06', NULL),
(6, 'Carambole', 'carambole@gmail.com', '$2y$10$q6YMnFnnH1LDRuOavt8qCeaH2.wsDAo1Xv4ry3CpV9aR5AITV1ieu', 'Caramboles', 'Bob', 'user', '8e050a-Carambole.png', NULL, '2023-09-15 08:18:49', '2023-09-15 08:31:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
