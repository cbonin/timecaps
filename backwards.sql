-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Décembre 2012 à 18:16
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
  `idOwnerFB` int(11) DEFAULT NULL,
  `idReceiver` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `targetDate` date NOT NULL,
  `isBoiteBrand` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBoite`),
  KEY `idOwner` (`idOwner`),
  KEY `idReceiver` (`idReceiver`),
  KEY `idReceiver_2` (`idReceiver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `boitebrand`
--

CREATE TABLE IF NOT EXISTS `boitebrand` (
  `idBoiteBrand` int(11) NOT NULL AUTO_INCREMENT,
  `nomBoite` varchar(50) DEFAULT NULL,
  `coordX` double NOT NULL,
  `coordY` double NOT NULL,
  `description` text NOT NULL,
  `idOwner` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  `targetDate` date NOT NULL,
  `isBoiteBrand` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idBoiteBrand`),
  KEY `idOwner` (`idOwner`),
  KEY `idOwner_2` (`idOwner`),
  KEY `code` (`isBoiteBrand`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Structure de la table `depot`
--

CREATE TABLE IF NOT EXISTS `depot` (
  `idBoite` int(11) NOT NULL,
  `idFile` int(11) NOT NULL,
  `idDepositeur` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBoite`,`idFile`,`idDepositeur`),
  KEY `idFile` (`idFile`),
  KEY `idDepositeur` (`idDepositeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `depotbrand`
--

CREATE TABLE IF NOT EXISTS `depotbrand` (
  `idBoiteBrand` int(11) NOT NULL,
  `idFile` int(11) NOT NULL,
  `idDepositeur` int(11) NOT NULL,
  PRIMARY KEY (`idBoiteBrand`,`idFile`,`idDepositeur`),
  KEY `idFile` (`idFile`),
  KEY `idDepositeur` (`idDepositeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `idFile` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `taille` int(11) NOT NULL,
  PRIMARY KEY (`idFile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Structure de la table `pool`
--

CREATE TABLE IF NOT EXISTS `pool` (
  `idBoiteBrand` int(11) NOT NULL,
  `idUserBrand` int(11) NOT NULL,
  `code` varchar(40) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBoiteBrand`,`idUserBrand`,`code`),
  KEY `idUserBrand` (`idUserBrand`)
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
  `isBrand` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `userbrand`
--

CREATE TABLE IF NOT EXISTS `userbrand` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Contraintes pour la table `boitebrand`
--
ALTER TABLE `boitebrand`
  ADD CONSTRAINT `boitebrand_ibfk_1` FOREIGN KEY (`idOwner`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contributeurs`
--
ALTER TABLE `contributeurs`
  ADD CONSTRAINT `contributeurs_ibfk_1` FOREIGN KEY (`idBoite`) REFERENCES `boite` (`idBoite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contributeurs_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`idBoite`) REFERENCES `boite` (`idBoite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depot_ibfk_2` FOREIGN KEY (`idFile`) REFERENCES `file` (`idFile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depot_ibfk_4` FOREIGN KEY (`idDepositeur`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `depotbrand`
--
ALTER TABLE `depotbrand`
  ADD CONSTRAINT `depotbrand_ibfk_1` FOREIGN KEY (`idBoiteBrand`) REFERENCES `boitebrand` (`idBoiteBrand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depotbrand_ibfk_2` FOREIGN KEY (`idFile`) REFERENCES `file` (`idFile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depotbrand_ibfk_3` FOREIGN KEY (`idDepositeur`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pool`
--
ALTER TABLE `pool`
  ADD CONSTRAINT `pool_ibfk_1` FOREIGN KEY (`idBoiteBrand`) REFERENCES `boitebrand` (`idBoiteBrand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pool_ibfk_2` FOREIGN KEY (`idUserBrand`) REFERENCES `userbrand` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
