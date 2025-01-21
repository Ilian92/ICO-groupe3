-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 jan. 2025 à 16:21
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ico`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_id_id` int NOT NULL,
  `type_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C258FDCDB01426` (`pack_id_id`),
  KEY `IDX_4C258FD714819A0` (`type_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `card_type`
--

DROP TABLE IF EXISTS `card_type`;
CREATE TABLE IF NOT EXISTS `card_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250121141055', '2025-01-21 15:46:34', 83),
('DoctrineMigrations\\Version20250121141114', '2025-01-21 14:11:22', 35),
('DoctrineMigrations\\Version20250121142731', '2025-01-21 14:27:54', 35),
('DoctrineMigrations\\Version20250121145646', '2025-01-21 14:56:54', 16),
('DoctrineMigrations\\Version20250121154618', '2025-01-21 15:46:34', 59),
('DoctrineMigrations\\Version20250121161808', '2025-01-21 16:18:14', 504),
('DoctrineMigrations\\Version20250121162039', '2025-01-21 16:20:44', 54);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `end_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1DD39950881ECFA7` (`status_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news_status`
--

DROP TABLE IF EXISTS `news_status`;
CREATE TABLE IF NOT EXISTS `news_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_price` decimal(5,2) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status_id_id` int NOT NULL,
  `user_id_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE881ECFA7` (`status_id_id`),
  KEY `IDX_E52FFDEE9D86650F` (`user_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `order_id_id` int NOT NULL,
  `pack_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_62809DB0FCDAEAAA` (`order_id_id`),
  KEY `IDX_62809DB0CDB01426` (`pack_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

DROP TABLE IF EXISTS `packs`;
CREATE TABLE IF NOT EXISTS `packs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_899A993CCDB01426` (`pack_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `role_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1483A5E988987678` (`role_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `FK_4C258FD714819A0` FOREIGN KEY (`type_id_id`) REFERENCES `card_type` (`id`),
  ADD CONSTRAINT `FK_4C258FDCDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD39950881ECFA7` FOREIGN KEY (`status_id_id`) REFERENCES `news_status` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE881ECFA7` FOREIGN KEY (`status_id_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `FK_E52FFDEE9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `FK_62809DB0CDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`),
  ADD CONSTRAINT `FK_62809DB0FCDAEAAA` FOREIGN KEY (`order_id_id`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `FK_899A993CCDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E988987678` FOREIGN KEY (`role_id_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
