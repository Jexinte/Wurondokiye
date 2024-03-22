-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 jan. 2024 à 08:07
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wurondokiye`
--

-- --------------------------------------------------------

--
-- Structure de la table `calorie`
--

CREATE TABLE `calorie` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total_calories` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `calorie`
--

INSERT INTO `calorie` (`id`, `date`, `total_calories`) VALUES
(1, '2023-12-27 16:17:00', 606),
(2, '2023-12-28 16:17:00', 640),
(3, '2023-12-29 16:17:00', 788),
(4, '2023-12-30 16:17:00', 510),
(5, '2023-12-31 07:18:00', 474),
(6, '2024-01-01 01:14:00', 875),
(7, '2024-01-02 20:58:00', 236),
(8, '2024-01-03 21:42:00', 534),
(9, '2024-01-04 07:49:00', 546),
(10, '2024-01-05 08:14:00', 548),
(11, '2024-01-06 21:20:00', 636),
(12, '2024-01-07 09:15:00', 594),
(13, '2024-01-08 08:47:00', 958),
(14, '2024-01-09 08:28:00', 594),
(15, '2024-01-10 08:52:00', 594),
(16, '2024-01-11 08:36:00', 594),
(17, '2024-01-12 21:24:00', 807),
(18, '2024-01-13 08:45:00', 1181),
(19, '2024-01-14 20:59:00', 1460),
(20, '2024-01-15 09:26:00', 797),
(21, '2024-01-16 08:39:00', 884),
(22, '2024-01-17 09:04:00', 1500),
(23, '2024-01-18 08:39:00', 842),
(24, '2024-01-19 23:28:00', 1364),
(25, '2024-01-20 09:26:00', 1000),
(26, '2024-01-21 08:03:00', 1000),
(27, '2024-01-22 08:56:00', 1000),
(28, '2024-01-23 14:42:00', 1000),
(29, '2024-01-24 09:45:00', 1200),
(30, '2024-01-25 09:45:00', 1200),
(31, '2024-01-26 09:37:00', 1300),
(32, '2024-01-27 07:19:00', 1200),
(33, '2024-01-28 10:10:00', 494),
(34, '2024-01-29 08:03:00', 714);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231229154426', '2023-12-29 16:44:36', 137);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `roles`) VALUES
(1, 'Yokke', 'mdembelepro@gmail.com', '$2y$13$xJ4Nl5eUUStoRzxx2ui4h.4AO/MGzF3vzLQRiN4v1ll.XPf.2zh8O', '[\"ROLE_ADMIN\"]');

-- --------------------------------------------------------

--
-- Structure de la table `weight`
--

CREATE TABLE `weight` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `weight` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weight`
--

INSERT INTO `weight` (`id`, `date`, `weight`) VALUES
(3, '2023-12-27 09:30:00', 120.2),
(4, '2023-12-28 09:30:00', 119.9),
(5, '2023-12-29 09:30:00', 119.1),
(6, '2023-12-30 09:30:00', 119.1),
(7, '2023-12-31 09:30:00', 118.2),
(8, '2024-01-01 09:30:00', 117.7),
(9, '2024-01-02 09:30:00', 116.9),
(10, '2024-01-03 09:30:00', 117.4),
(11, '2024-01-04 07:23:00', 118.2),
(12, '2024-01-05 07:48:00', 117.2),
(13, '2024-01-06 08:14:00', 116.7),
(14, '2024-01-07 08:33:00', 116.3),
(15, '2024-01-08 09:15:00', 116.1),
(16, '2024-01-09 08:48:00', 115.8),
(17, '2024-01-10 08:21:00', 116.6),
(18, '2024-01-11 08:52:00', 115.7),
(19, '2024-01-12 08:37:00', 115.5),
(20, '2024-01-13 07:50:00', 116.2),
(21, '2024-01-14 08:45:00', 116.3),
(22, '2024-01-15 09:56:00', 117.8),
(23, '2024-01-16 09:27:00', 118.1),
(24, '2024-01-17 08:39:00', 118.5),
(25, '2024-01-18 09:04:00', 119.5),
(26, '2024-01-19 08:39:00', 119.2),
(27, '2024-01-20 09:18:00', 119.7),
(28, '2024-01-21 09:27:00', 120.5),
(29, '2024-01-22 08:04:00', 121.9),
(30, '2024-01-23 08:57:00', 121.4),
(31, '2024-01-24 14:43:00', 121.3),
(32, '2024-01-25 09:45:00', 121.9),
(33, '2024-01-26 09:46:00', 122.8),
(34, '2024-01-27 09:37:00', 123.2),
(35, '2024-01-28 07:19:00', 122.9),
(36, '2024-01-29 10:11:00', 122.2),
(37, '2024-01-30 08:04:00', 121.6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calorie`
--
ALTER TABLE `calorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `calorie`
--
ALTER TABLE `calorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `weight`
--
ALTER TABLE `weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
