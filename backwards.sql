-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 19 Décembre 2012 à 21:59
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
  PRIMARY KEY (`idBoite`),
  KEY `idOwner` (`idOwner`),
  KEY `idReceiver` (`idReceiver`),
  KEY `idReceiver_2` (`idReceiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `boite`
--

INSERT INTO `boite` (`idBoite`, `nomBoite`, `coordX`, `coordY`, `description`, `idOwner`, `idOwnerFB`, `idReceiver`, `adresse`, `ville`, `codePostal`, `statut`, `targetDate`) VALUES
(6, 'compteur', 48.8518602, 2.420284400000014, 'bibi', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00'),
(7, 'a', 48.8518602, 2.420284400000014, 'a', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00'),
(8, 'b', 48.8518602, 2.420284400000014, 'b', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00'),
(9, 'a', 48.8518602, 2.420284400000014, 'za', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '2012-12-20'),
(10, 'c', 48.85153192465786, 2.4206009006637714, 'mkab', 5, NULL, 5, '10 rue des vergers', 'quincey', 70000, 2, '2012-12-20');

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
  PRIMARY KEY (`idBoiteBrand`),
  KEY `idOwner` (`idOwner`),
  KEY `idOwner_2` (`idOwner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `boitebrand`
--

INSERT INTO `boitebrand` (`idBoiteBrand`, `nomBoite`, `coordX`, `coordY`, `description`, `idOwner`, `statut`, `targetDate`) VALUES
(1, 'brand bas de combat', 50, 3, 'ça te stimule', 9, 0, '2012-12-20'),
(2, 'boite de test', 48.8518602, 2.420284400000014, 'first boite brand', 5, 0, '2012-12-20'),
(3, 'boite de test', 48.8518602, 2.420284400000014, 'zvqgbvqoz', 5, 0, '2012-12-19');

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

--
-- Contenu de la table `contributeurs`
--

INSERT INTO `contributeurs` (`idBoite`, `idUser`) VALUES
(6, 5);

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

--
-- Contenu de la table `depot`
--

INSERT INTO `depot` (`idBoite`, `idFile`, `idDepositeur`) VALUES
(6, 1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `file`
--

INSERT INTO `file` (`idFile`, `nom`, `titre`, `type`, `taille`) VALUES
(1, 'Koala.jpg', 'Koala', 'image/jpeg', 763);

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

--
-- Contenu de la table `pool`
--

INSERT INTO `pool` (`idBoiteBrand`, `idUserBrand`, `code`, `statut`) VALUES
(1, 1, 'zboub', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `password`, `prenom`, `nom`, `email`, `actif`, `isBrand`) VALUES
(3, 'ab4f63f9ac65152575886860dde480a1', 'Carlos', 'ZBOUBA', 'c@gmail.com', 0, 1),
(5, '4b76e078e9df24d2da36e4e288ce36a8', 'Clément', 'Procureur', 'procureur.clement@gmail.com', 0, 1),
(6, '4b76e078e9df24d2da36e4e288ce36a8', 'Henry', 'ZBOUB', 'h@gmail.com', 0, 1),
(8, '58e6d4fe0ae53eecc7d221419c12ccb3', 'Bastien', 'Penalba', 'bastien.penalba@gmail.com', 0, 1),
(9, '4b76e078e9df24d2da36e4e288ce36a8', 'digitik', 'tacboom', 'd@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `userbrand`
--

CREATE TABLE IF NOT EXISTS `userbrand` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `userbrand`
--

INSERT INTO `userbrand` (`idUser`, `prenom`, `nom`, `email`) VALUES
(1, 'jean', 'Jean', 'j@gmail.com');

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
-- Contraintes pour la table `pool`
--
ALTER TABLE `pool`
  ADD CONSTRAINT `pool_ibfk_2` FOREIGN KEY (`idUserBrand`) REFERENCES `userbrand` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pool_ibfk_1` FOREIGN KEY (`idBoiteBrand`) REFERENCES `boitebrand` (`idBoiteBrand`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
