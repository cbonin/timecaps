-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 14 Décembre 2012 à 11:14
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `boite`
--

INSERT INTO `boite` (`idBoite`, `nomBoite`, `coordX`, `coordY`, `description`, `idOwner`, `idReceiver`, `adresse`, `ville`, `codePostal`, `statut`, `targetDate`) VALUES
(2, 'papa', 48.8516396, 2.4204794, 'coucou du zboub', 3, 3, '10 rue du cul', 'ZboubVille', 66666, 2, '2012-12-01'),
(3, 'zbouboite', 50, 500, 'bonjour ', 3, 3, '10 rue de la corre', 'vesoul', 70000, 0, '2012-12-25'),
(4, 'zbouboite2', 50, 50, NULL, 3, 3, '', '', 0, 1, '2012-12-24');

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
(1, 'photo.jpg', 'anniversaire', 'photo', 50);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

--
-- Contraintes pour la table `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_4` FOREIGN KEY (`idDepositeur`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`idBoite`) REFERENCES `boite` (`idBoite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depot_ibfk_2` FOREIGN KEY (`idFile`) REFERENCES `file` (`idFile`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
