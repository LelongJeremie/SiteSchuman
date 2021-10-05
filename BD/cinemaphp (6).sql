-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 05 oct. 2021 à 06:32
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cinemaphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `commentaireid` smallint(6) NOT NULL AUTO_INCREMENT,
  `commentairepseudo` varchar(30) NOT NULL,
  `commentairetext` text NOT NULL,
  `idsalle` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`commentaireid`),
  KEY `fk_commentaireidsalle` (`idsalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `RESid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `RESnombre` smallint(5) UNSIGNED NOT NULL,
  `idsalle` smallint(5) UNSIGNED DEFAULT NULL,
  `REStarif` smallint(5) UNSIGNED NOT NULL,
  `utilisateurid` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`RESid`),
  KEY `fk_salleid` (`idsalle`),
  KEY `fk_reservationidutilisateur` (`utilisateurid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`RESid`, `RESnombre`, `idsalle`, `REStarif`, `utilisateurid`) VALUES
(1, 34, 2, 214, 13),
(2, 1, 2, 6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `salleid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SALLENomfilm` varchar(30) NOT NULL,
  `salleplace` smallint(5) UNSIGNED NOT NULL,
  `3D` varchar(1) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `lienfilm` text,
  `theme` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`salleid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`salleid`, `SALLENomfilm`, `salleplace`, `3D`, `description`, `image`, `lienfilm`, `theme`, `date`) VALUES
(1, 'Thor: Ragnarok', 81, '0', 'marteau bonk', 'style/images/products/thor-ragnarok.jpg', 'singlethorragnarok.php', 'action', NULL),
(2, 'The Flash', 33, '0', 'vif écair', 'style/images/products/flash.jpg', 'singleflash.php', 'science aventure', NULL),
(3, 'Iron Man', 69, '1', 'homme de fer', 'style/images/products/ironman.jpg', 'singleironman.php', 'aventure', NULL),
(4, 'Avenger', 60, '0', 'Les vengeurs', 'style/images/products/avenger.jpg', 'singleavenger.php', 'combat', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(1) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `username`, `mail`, `password`, `role`, `date_naissance`) VALUES
(2, 'bi', 'bi', 'bi', 'a@gmail.com', 'rlNafhEmBQY.I', '2', NULL),
(3, 'jerem', 'jerem', 'jerem', 'jerem@jerem.com', 'jerem', '2', NULL),
(4, 'ga', 'R32R3', 'gari', 'gari@jerem.com', 'gari', '2', NULL),
(5, 'aze', 'aze', 'aze', 'aze@gmail.com', 'aze', '2', NULL),
(7, 'lelong', 'lelong', 'lelong', 'jeremie.lelong77@gmail.com', 'lelong', '2', NULL),
(8, 'ed', 'ad', 'ed', 'ed@gmail.com', 'rl4sxPW7HPLmc', '2', NULL),
(9, 'yacine', 'dzadza', 'zadazssssssss', 'dddddddddddd@gmil.cd', 'rl9KyTv533eps', '2', NULL),
(12, 'tabti', 'yacine', 'crypto', 'Y.TABTI@LPRS.FR', 'rlAwrzznCTytM', '1', NULL),
(13, 'CRY', 'Yacine', 'AZ', 'AZ@GMAIL.COM', 'rlNafhEmBQY.I', '1', NULL),
(14, 'az', 'az', 'Aaz', 'AzZ@GMAIL.COM', 'rl7HypOhTM4Uo', '2', NULL),
(15, 'eazeaz', 'eaze', 'ez', 'AzzZ@GMAIL.COM', 'rlZNSNL8xuV4M', '2', NULL),
(16, 'yacine', 'dzadz', 'aez', 'azdzadzad@gmail.com', 'rlP1Vdw/jvaRY', '2', NULL),
(17, 'xsqsq', 'xsqxsxsq', '', 'DZDZDAxsxsZDAZ@GMAIL.COME', 'rlXBcUK3Wa6ks', '2', '2021-05-05'),
(18, 'aaaezzaa', 'aaaezzaa', 'aaaezzaasss', 'aaaezzaa@GMAIL.COME', 'rlf6fKh1Sm71U', '2', '2021-04-29'),
(19, 'yacine', 'TARCADAZ', 'DAZDR', 'jejesuisjeje@gmail.com', 'rlqA31.eZB8zU', '2', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaireidsalle` FOREIGN KEY (`idsalle`) REFERENCES `salle` (`salleid`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservationidutilisateur` FOREIGN KEY (`utilisateurid`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_salleid` FOREIGN KEY (`idsalle`) REFERENCES `salle` (`salleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
