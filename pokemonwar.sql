-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 19 Juillet 2019 à 15:49
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokemonwar`
--

-- --------------------------------------------------------

--
-- Structure de la table `attaques`
--

CREATE TABLE `attaques` (
  `id_attaque` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intensite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `attaques`
--

INSERT INTO `attaques` (`id_attaque`, `nom`, `intensite`) VALUES
(1, 'gust', NULL),
(2, 'wing-attack', NULL),
(3, 'whirlwind', NULL),
(4, 'fly', NULL),
(5, 'headbutt', NULL),
(6, 'tackle', NULL),
(7, 'body-slam', NULL),
(8, 'take-down', NULL),
(9, 'cut', NULL),
(10, 'fury-attack', NULL),
(11, 'slam', NULL),
(12, 'wrap', NULL),
(13, 'pay-day', NULL),
(14, 'thunder-punch', NULL),
(15, 'mega-kick', NULL),
(16, 'swords-dance', NULL),
(17, 'sand-attack', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id_pokemon` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `point_vie` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `nom`, `experience`, `point_vie`, `defense`) VALUES
(1, 'pidgey', 50, 40, NULL),
(2, 'pidgeotto', 122, 63, NULL),
(3, 'pidgeot', 216, 83, NULL),
(4, 'rattata', 51, 30, NULL),
(5, 'raticate', 145, 55, NULL),
(6, 'spearow', 52, 40, NULL),
(7, 'fearow', 155, 65, NULL),
(8, 'ekans', 58, 35, NULL),
(9, 'arbok', 157, 60, NULL),
(10, 'pikachu', 112, 35, NULL),
(11, 'raichu', 218, 60, NULL),
(12, 'sandshrew', 60, 50, NULL),
(13, 'sandslash', 158, 75, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pokemonattaque`
--

CREATE TABLE `pokemonattaque` (
  `id` int(11) NOT NULL,
  `fk_id_pokemon` int(11) NOT NULL,
  `fk_id_attaque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pokemonattaque`
--

INSERT INTO `pokemonattaque` (`id`, `fk_id_pokemon`, `fk_id_attaque`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 5),
(14, 4, 6),
(15, 4, 7),
(16, 4, 8),
(17, 5, 9),
(18, 5, 5),
(19, 5, 6),
(20, 5, 7),
(21, 6, 3),
(22, 6, 4),
(23, 6, 10),
(24, 6, 8),
(25, 7, 3),
(26, 7, 4),
(27, 7, 10),
(28, 7, 8),
(29, 8, 11),
(30, 8, 5),
(31, 8, 7),
(32, 8, 12),
(33, 9, 5),
(34, 9, 7),
(35, 9, 12),
(36, 9, 8),
(37, 10, 13),
(38, 10, 14),
(39, 10, 11),
(40, 10, 15),
(41, 11, 13),
(42, 11, 14),
(43, 11, 15),
(44, 11, 5),
(45, 12, 16),
(46, 12, 9),
(47, 12, 17),
(48, 12, 5),
(49, 13, 16),
(50, 13, 9),
(51, 13, 17),
(52, 13, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attaques`
--
ALTER TABLE `attaques`
  ADD PRIMARY KEY (`id_attaque`);

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id_pokemon`);

--
-- Index pour la table `pokemonattaque`
--
ALTER TABLE `pokemonattaque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pokemon` (`fk_id_pokemon`),
  ADD KEY `fk_id_attaque` (`fk_id_attaque`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attaques`
--
ALTER TABLE `attaques`
  MODIFY `id_attaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `pokemonattaque`
--
ALTER TABLE `pokemonattaque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pokemonattaque`
--
ALTER TABLE `pokemonattaque`
  ADD CONSTRAINT `fk_id_attaque` FOREIGN KEY (`fk_id_attaque`) REFERENCES `attaques` (`id_attaque`),
  ADD CONSTRAINT `fk_id_pokemon` FOREIGN KEY (`fk_id_pokemon`) REFERENCES `pokemon` (`id_pokemon`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
