-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Décembre 2012 à 15:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `boite`
--

INSERT INTO `boite` (`idBoite`, `nomBoite`, `coordX`, `coordY`, `description`, `idOwner`, `idOwnerFB`, `idReceiver`, `adresse`, `ville`, `codePostal`, `statut`, `targetDate`, `isBoiteBrand`) VALUES
(6, 'compteur', 48.8518602, 2.420284400000014, 'bibi', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00', 0),
(7, 'a', 48.8518602, 2.420284400000014, 'a', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00', 0),
(8, 'b', 48.8518602, 2.420284400000014, 'b', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '0000-00-00', 0),
(9, 'a', 48.8518602, 2.420284400000014, 'za', 3, NULL, 5, '10 rue des vergers', 'quincey', 70000, 0, '2012-12-20', 0),
(10, 'c', 48.85153192465786, 2.4206009006637714, 'mkab', 5, NULL, 5, '10 rue des vergers', 'quincey', 70000, 2, '2012-12-20', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `boitebrand`
--

INSERT INTO `boitebrand` (`idBoiteBrand`, `nomBoite`, `coordX`, `coordY`, `description`, `idOwner`, `statut`, `targetDate`, `isBoiteBrand`) VALUES
(1, 'brand bas de combatup23', 48.851595461988836, 2.420960316671767, 'ça te stimule vraiment', 9, 2, '2012-12-20', 1),
(2, 'boite de test', 48.8518602, 2.420284400000014, 'first boite brand', 5, 0, '2012-12-20', 1),
(3, 'boite de test', 48.8518602, 2.420284400000014, 'zvqgbvqoz', 5, 0, '2012-12-19', 1),
(4, 'boite de test', 48.8518602, 2.420284400000014, 'lùvamzknvd', 9, 0, '2012-12-20', 1);

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
(6, 5),
(6, 9);

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

--
-- Contenu de la table `depotbrand`
--

INSERT INTO `depotbrand` (`idBoiteBrand`, `idFile`, `idDepositeur`) VALUES
(1, 34, 9),
(1, 35, 9);

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

--
-- Contenu de la table `file`
--

INSERT INTO `file` (`idFile`, `nom`, `titre`, `type`, `taille`) VALUES
(1, 'Koala.jpg', 'Koala', 'image/jpeg', 763),
(2, 'Koala.jpg', 'Koala', 'image/jpeg', 763),
(3, 'Koala1.jpg', 'Koala', 'image/jpeg', 763),
(4, 'Manchot.jpg', 'Manchot', 'image/jpeg', 760),
(5, 'Manchot1.jpg', 'Manchot', 'image/jpeg', 760),
(6, 'Manchot2.jpg', 'Manchot', 'image/jpeg', 760),
(7, 'Manchot3.jpg', 'Manchot', 'image/jpeg', 760),
(8, 'Manchot4.jpg', 'Manchot', 'image/jpeg', 760),
(9, 'Manch.jpg', 'Manch', 'image/jpeg', 760),
(10, 'Manch1.jpg', 'Manch', 'image/jpeg', 760),
(11, 'Manchot5.jpg', 'Manchot', 'image/jpeg', 760),
(12, 'Manchot6.jpg', 'Manchot', 'image/jpeg', 760),
(13, 'Manchot7.jpg', 'Manchot', 'image/jpeg', 760),
(14, 'Manchot8.jpg', 'Manchot', 'image/jpeg', 760),
(15, 'Manchot9.jpg', 'Manchot', 'image/jpeg', 760),
(16, 'Mancbhot.jpg', 'Mancbhot', 'image/jpeg', 760),
(17, 'Mancbhot1.jpg', 'Mancbhot', 'image/jpeg', 760),
(18, 'Mancbhot.jpg', 'Mancbhot', 'image/jpeg', 760),
(19, 'Mancbhot2.jpg', 'Mancbhot', 'image/jpeg', 760),
(20, 'Mancbhot3.jpg', 'Mancbhot', 'image/jpeg', 760),
(21, 'manchot10.jpg', 'manchot', 'image/jpeg', 760),
(22, 'manchot11.jpg', 'manchot', 'image/jpeg', 760),
(31, 'poule.jpg', 'poule', 'image/jpeg', 81),
(32, 'pji.jpg', 'pji', 'image/jpeg', 42),
(33, 'manchot.jpg', 'manchot', 'image/jpeg', 760),
(34, 'poule.jpg', 'poule', 'image/jpeg', 81),
(35, 'koala.jpg', 'koala', 'image/jpeg', 763);

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
(1, 1, 'je1', 0),
(1, 2, 'cl2', 0);

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
(3, 'ab4f63f9ac65152575886860dde480a1', 'Carlos', 'ZBOUBA', 'c@gmail.com', 0, 0),
(5, '4b76e078e9df24d2da36e4e288ce36a8', 'Clément', 'Procureur', 'procureur.clement@gmail.com', 0, 0),
(6, '4b76e078e9df24d2da36e4e288ce36a8', 'Henry', 'ZBOUB', 'h@gmail.com', 0, 0),
(8, '58e6d4fe0ae53eecc7d221419c12ccb3', 'Bastien', 'Penalba', 'bastien.penalba@gmail.com', 0, 0),
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
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `userbrand`
--

INSERT INTO `userbrand` (`idUser`, `prenom`, `nom`, `email`) VALUES
(1, 'jean', 'Jean', 'j@gmail.com'),
(2, 'clément', 'procureur', 'procureur.clement@gmail.com');

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
