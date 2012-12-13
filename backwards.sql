-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 13 Décembre 2012 à 16:08
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `backwards`
--

-- --------------------------------------------------------

--
-- Structure de la table `boite`
--

CREATE TABLE IF NOT EXISTS `boite` (
  `idBoite` int(11) NOT NULL AUTO_INCREMENT,
  `nomBoite` varchar(50) DEFAULT NULL,
  `coordX` double NOT NULL,
  `coordY` double NOT NULL,
  `description` text,
  `idOwner` int(11) DEFAULT NULL,
  `idReceiver` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `targetDate` date NOT NULL,
  PRIMARY KEY (`idBoite`),
  KEY `idOwner` (`idOwner`),
  KEY `idReceiver` (`idReceiver`),
  KEY `idReceiver_2` (`idReceiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs`
--

CREATE TABLE IF NOT EXISTS `contributeurs` (
  `idBoite` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBoite`,`idUser`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `actif` int(1) NOT NULL DEFAULT '0',
  `firstVisit` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `password`, `prenom`, `nom`, `email`, `actif`, `firstVisit`) VALUES
(3, '4b76e078e9df24d2da36e4e288ce36a8', 'Charles', 'ZBOUBI', 'c@gmail.com', 0, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `boite`
--
ALTER TABLE `boite`
  ADD CONSTRAINT `boite_ibfk_1` FOREIGN KEY (`idOwner`) REFERENCES `user` (`idUser`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `boite_ibfk_2` FOREIGN KEY (`idReceiver`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contributeurs`
--
ALTER TABLE `contributeurs`
  ADD CONSTRAINT `contributeurs_ibfk_1` FOREIGN KEY (`idBoite`) REFERENCES `boite` (`idBoite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contributeurs_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
