-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Février 2016 à 15:23
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jsevents`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id_utilisateur` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `choix` varchar(200) NOT NULL,
  `reponse` tinyint(1) NOT NULL,
  KEY `id_utilisateur` (`id_utilisateur`,`id_evenement`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `pk_index` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  PRIMARY KEY (`pk_index`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `pk_index` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `message` varchar(1000) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pk_index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mappingcommentaires`
--

CREATE TABLE IF NOT EXISTS `mappingcommentaires` (
  `id_utilisateur` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  UNIQUE KEY `id_evenement` (`id_evenement`,`id_commentaire`),
  KEY `id_utilisateur` (`id_utilisateur`,`id_evenement`,`id_commentaire`),
  KEY `id_commentaire` (`id_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id_utilisateur` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `role` text NOT NULL,
  KEY `id_utilisateur` (`id_utilisateur`,`id_evenement`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `pk_index` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pk_index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`pk_index`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`pk_index`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mappingcommentaires`
--
ALTER TABLE `mappingcommentaires`
  ADD CONSTRAINT `mappingcommentaires_ibfk_3` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaires` (`pk_index`) ON DELETE CASCADE,
  ADD CONSTRAINT `mappingcommentaires_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`pk_index`) ON DELETE CASCADE,
  ADD CONSTRAINT `mappingcommentaires_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`pk_index`) ON DELETE CASCADE;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `effacementEvenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`pk_index`) ON DELETE CASCADE,
  ADD CONSTRAINT `effacementUtilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`pk_index`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
