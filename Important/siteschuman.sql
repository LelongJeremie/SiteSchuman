-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 déc. 2021 à 20:41
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteschuman`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
CREATE TABLE IF NOT EXISTS `chat_message` (
  `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `validationevent` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idutilisateureve` (`createur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `date_event`, `lieu`, `createur`, `resume`, `nb_participant`, `nb_parti_max`, `validationevent`) VALUES
(1, 'Aucun evenement', '2021-12-07', '', 4, 'aucun evenement', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organisateur`
--

DROP TABLE IF EXISTS `organisateur`;
CREATE TABLE IF NOT EXISTS `organisateur` (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_utilisateur` smallint(6) NOT NULL,
  `id_event` smallint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organisateur`
--

INSERT INTO `organisateur` (`id`, `id_utilisateur`, `id_event`) VALUES
(17, 4, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `id_participant`, `id_organisateur`, `id_evenement`) VALUES
(58, 4, 4, 1);

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
  `validationrdv` int(1) NOT NULL,
  `compterendu` text,
  PRIMARY KEY (`id`),
  KEY `fk_participantrdv` (`id_participant`),
  KEY `fk_organisateurrdv` (`id_organisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `date_rdv`, `id_participant`, `id_organisateur`, `validationrdv`, `compterendu`) VALUES
(1, '2021-11-02', 4, 4, 0, NULL);

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
  `id_famille` varchar(30) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `validation` varchar(1) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `role`, `classe`, `id_famille`, `mail`, `username`, `password`, `validation`, `token`) VALUES
(1, 'admin', 'admin', '2021-12-07', '1', NULL, NULL, 'admin@lprs.fr', 'admin', 'rloYdHi6P0DDs', '1', NULL),
(2, 'prof', 'prof', '2021-12-07', '2', NULL, NULL, 'prof@lprs.fr', 'prof', 'rl2AywpC6kXeg', '1', NULL),
(3, 'eleve', 'eleve', '2021-12-07', '4', NULL, NULL, 'eleve@lprs.com', 'eleve', 'rl82WIilKGnoo', '1', NULL),
(4, 'Vide', 'Vide', '', '4', NULL, NULL, 'vide@vide.com', 'vide', 'vide', '0', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_idutilisateureve` FOREIGN KEY (`createur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `organisateur`
--
ALTER TABLE `organisateur`
  ADD CONSTRAINT `organisateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `organisateur_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

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
