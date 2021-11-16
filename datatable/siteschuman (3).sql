-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 nov. 2021 à 09:40
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
-- Base de données :  `siteschuman`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `id_recepteur` smallint(11) NOT NULL,
  `id_envoyeur` smallint(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_envoyeurchat` (`id_envoyeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `date_event` date NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `createur` smallint(6) NOT NULL,
  `resume` text NOT NULL,
  `nb_participant` int(11) NOT NULL,
  `nb_parti_max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idutilisateureve` (`createur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `date_event`, `lieu`, `createur`, `resume`, `nb_participant`, `nb_parti_max`) VALUES
(1, 'test', '2021-11-03', 'test', 7, 'test', 11, 11);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_participant` smallint(6) NOT NULL,
  `id_organisateur` smallint(6) NOT NULL,
  `id_evenement` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_participanteve` (`id_participant`),
  KEY `fk_organisateureve` (`id_organisateur`),
  KEY `fk_evenement` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `id_participant`, `id_organisateur`, `id_evenement`) VALUES
(36, 7, 7, 1),
(37, 7, 7, 1),
(38, 7, 7, 1),
(39, 7, 7, 1),
(40, 7, 7, 1),
(41, 7, 7, 1),
(42, 7, 7, 1),
(43, 7, 7, 1),
(44, 7, 7, 1),
(45, 7, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `date_rdv` date NOT NULL,
  `id_participant` smallint(6) NOT NULL,
  `id_organisateur` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_participantrdv` (`id_participant`),
  KEY `fk_organisateurrdv` (`id_organisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `date_naissance` varchar(15) NOT NULL,
  `role` varchar(1) NOT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `id_famille` smallint(6) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `validation` varchar(1) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `role`, `classe`, `id_famille`, `mail`, `username`, `password`, `validation`, `token`) VALUES
(4, 'Yacine', 'Yacinee', '2021-10-20', '1', NULL, NULL, 'yacine_tabti@hotmail.com', 'Yacine', 'daz', '1', 'rza'),
(7, 'AZ', 'azz', '2021-10-24', '1', NULL, NULL, 'y.tabti@lprs.frd', 'AZ', 'rlNafhEmBQY.I', '1', 'rza'),
(8, 'yacine', 'tabti', '2021-11-17', '3', NULL, NULL, 'jejesuisjeje@gmail.com', 'ZZZ', 'daz', '0', 'rza'),
(9, 'yacine', 'AZ', '2021-11-03', '2', NULL, NULL, 'y.tabti@lprs.fr', 'usernamee', 'rlNafhEmBQY.I', '0', 'rlkaGm7H9J.82');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_envoyeurchat` FOREIGN KEY (`id_envoyeur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_idutilisateureve` FOREIGN KEY (`createur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `fk_organisateureve` FOREIGN KEY (`id_organisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_participanteve` FOREIGN KEY (`id_participant`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_organisateurrdv` FOREIGN KEY (`id_organisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_participantrdv` FOREIGN KEY (`id_participant`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
