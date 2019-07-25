-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 25 Juillet 2019 à 15:47
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
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
(1, 'gust', 40),
(2, 'wing-attack', 60),
(3, 'whirlwind', 70),
(4, 'fly', 90),
(5, 'headbutt', 70),
(6, 'tackle', 50),
(7, 'body-slam', 85),
(8, 'take-down', 90),
(9, 'cut', 50),
(10, 'fury-attack', 15),
(11, 'slam', 80),
(12, 'wrap', 15),
(13, 'pay-day', 40),
(14, 'thunder-punch', 75),
(15, 'mega-kick', 120),
(16, 'swords-dance', 75),
(17, 'sand-attack', 90);

-- --------------------------------------------------------

--
-- Structure de la table `dresseur`
--

CREATE TABLE `dresseur` (
  `id_dresseur` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dresseur`
--

INSERT INTO `dresseur` (`id_dresseur`, `nom`, `url_image`) VALUES
(1, 'Sacha', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/images/sacha.png'),
(2, 'Barbara', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/images/barbara.png');

-- --------------------------------------------------------

--
-- Structure de la table `dresseurpokemon`
--

CREATE TABLE `dresseurpokemon` (
  `id` int(11) NOT NULL,
  `fk_pokemon_id` int(11) DEFAULT NULL,
  `fk_id_dresseur` int(11) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dresseurpokemon`
--

INSERT INTO `dresseurpokemon` (`id`, `fk_pokemon_id`, `fk_id_dresseur`, `exp`) VALUES
(1, 1, 1, NULL),
(2, 4, 1, NULL),
(3, 10, 1, NULL),
(4, 6, 2, NULL),
(5, 8, 2, NULL),
(6, 12, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id_pokemon` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `point_vie` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `niveau` float DEFAULT NULL,
  `image_devant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_derriere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `nom`, `experience`, `point_vie`, `defense`, `niveau`, `image_devant`, `image_derriere`) VALUES
(1, 'pidgey', 50, 40, 40, 1, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/pidgeyface.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/pidgey.gif'),
(2, 'pidgeotto', 122, 63, 55, 1.5, NULL, NULL),
(3, 'pidgeot', 216, 83, 75, 2, NULL, NULL),
(4, 'rattata', 51, 30, 35, 1.25, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/rattataface.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/rattata.gif'),
(5, 'raticate', 145, 55, 60, 1.75, NULL, NULL),
(6, 'spearow', 52, 40, 30, 1.5, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/spearowface.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/spearow.gif'),
(7, 'fearow', 155, 65, 65, 2, NULL, NULL),
(8, 'ekans', 58, 35, 40, 1, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/ekans.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/ekansback.gif'),
(9, 'arbok', 157, 60, 69, 2, NULL, NULL),
(10, 'pikachu', 112, 35, 40, 1.5, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/pikachuface.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/pikachu.gif'),
(11, 'raichu', 218, 60, 55, 2, NULL, NULL),
(12, 'sandshrew', 60, 50, 85, 1.5, 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/sandshrewface.gif', 'https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/Pokegif/sandshrew.gif'),
(13, 'sandslash', 158, 75, 110, 2.25, NULL, NULL);

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
-- Index pour la table `dresseur`
--
ALTER TABLE `dresseur`
  ADD PRIMARY KEY (`id_dresseur`);

--
-- Index pour la table `dresseurpokemon`
--
ALTER TABLE `dresseurpokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pokemon_id` (`fk_pokemon_id`),
  ADD KEY `fk_id_dresseur` (`fk_id_dresseur`);

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
  MODIFY `id_attaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `dresseur`
--
ALTER TABLE `dresseur`
  MODIFY `id_dresseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `dresseurpokemon`
--
ALTER TABLE `dresseurpokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `pokemonattaque`
--
ALTER TABLE `pokemonattaque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dresseurpokemon`
--
ALTER TABLE `dresseurpokemon`
  ADD CONSTRAINT `fk_id_dresseur` FOREIGN KEY (`fk_id_dresseur`) REFERENCES `dresseur` (`id_dresseur`),
  ADD CONSTRAINT `fk_pokemon_id` FOREIGN KEY (`fk_pokemon_id`) REFERENCES `pokemon` (`id_pokemon`);

--
-- Contraintes pour la table `pokemonattaque`
--
ALTER TABLE `pokemonattaque`
  ADD CONSTRAINT `fk_id_attaque` FOREIGN KEY (`fk_id_attaque`) REFERENCES `attaques` (`id_attaque`),
  ADD CONSTRAINT `fk_id_pokemon` FOREIGN KEY (`fk_id_pokemon`) REFERENCES `pokemon` (`id_pokemon`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
