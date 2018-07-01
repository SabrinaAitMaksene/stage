-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 01 Juillet 2018 à 18:33
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sylvainard`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(25) NOT NULL AUTO_INCREMENT,
  `numero` int(25) NOT NULL,
  `nomClient` varchar(30) NOT NULL,
  `prenomClient` varchar(25) NOT NULL,
  `adresseClient` text NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `numero_2` (`numero`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `numero`, `nomClient`, `prenomClient`, `adresseClient`) VALUES
(1, 1, 'ARD', 'marie-ange', '12 place des carmes dechaux'),
(3, 2, 'Ait Maksène', 'Samy', 'clermont ferrand');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `idDevis` int(20) NOT NULL AUTO_INCREMENT,
  `numeroDevis` int(20) unsigned NOT NULL,
  `nomDevis` varchar(255) DEFAULT NULL,
  `dateDevis` date NOT NULL,
  `numeroCL` int(25) NOT NULL,
  `idClient` int(20) NOT NULL,
  PRIMARY KEY (`idDevis`),
  UNIQUE KEY `numeroDevis` (`numeroDevis`),
  UNIQUE KEY `nomDevis` (`nomDevis`),
  KEY `fk_devis_client` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`idDevis`, `numeroDevis`, `nomDevis`, `dateDevis`, `numeroCL`, `idClient`) VALUES
(22, 4, 'devis sabrina', '2018-06-01', 2, 3),
(24, 5, NULL, '2018-05-08', 6, 1),
(26, 2, NULL, '2014-12-01', 22, 1),
(27, 1992, NULL, '2018-05-03', 29, 1),
(28, 1993, NULL, '2018-04-13', 5, 1),
(30, 2000, NULL, '2018-05-02', 12, 1),
(32, 10, NULL, '2018-06-29', 2, 1),
(43, 2503, NULL, '2018-06-14', 666, 1),
(46, 30018, NULL, '2018-06-06', 13, 1),
(49, 2702, NULL, '2018-05-15', 12, 1),
(50, 24865, NULL, '2018-05-31', 2, 3),
(51, 32489, 'devis veolia', '2018-06-13', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `idFacture` int(25) NOT NULL AUTO_INCREMENT,
  `idClient` int(20) NOT NULL,
  `numeroCL` int(11) NOT NULL,
  `numeroFacture` int(30) NOT NULL,
  `nomFacture` varchar(330) NOT NULL,
  `dateFacture` date NOT NULL,
  `idDevis` int(20) NOT NULL,
  `numeroD` int(11) NOT NULL,
  PRIMARY KEY (`idFacture`),
  UNIQUE KEY `numeroFacture` (`numeroFacture`),
  KEY `fk_client_facture` (`idClient`),
  KEY `fk_factures_devis` (`idDevis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`idFacture`, `idClient`, `numeroCL`, `numeroFacture`, `nomFacture`, `dateFacture`, `idDevis`, `numeroD`) VALUES
(1, 3, 2, 1, 'facture 1', '2018-07-01', 51, 32489),
(2, 1, 1, 2, 'facture 2', '2018-07-01', 43, 2503);

-- --------------------------------------------------------

--
-- Structure de la table `lignedevis`
--

CREATE TABLE IF NOT EXISTS `lignedevis` (
  `idLdevis` int(20) NOT NULL AUTO_INCREMENT,
  `referenceD` int(20) NOT NULL,
  `descriptionD` text NOT NULL,
  `quantiteD` int(20) unsigned NOT NULL,
  `prixUnitaireD` float unsigned NOT NULL,
  `idDevis` int(20) NOT NULL,
  PRIMARY KEY (`idLdevis`),
  UNIQUE KEY `idLdevis` (`idLdevis`),
  KEY `fk_devis_ld` (`idDevis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `lignedevis`
--

INSERT INTO `lignedevis` (`idLdevis`, `referenceD`, `descriptionD`, `quantiteD`, `prixUnitaireD`, `idDevis`) VALUES
(10, 2000, 'mplikujyh', 2, 2, 30),
(16, 12, 'maxime', 2, 2, 43),
(19, 20135, 'maxime', 45, 10, 46),
(20, 20136, 'maxime', 45, 10, 46),
(21, 20136, 'maxime', 2, 7, 46),
(22, 20136, 'jaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaajjjjjjjjjjjxncoeehffffffffff', 2, 7, 46),
(23, 1255, 'hkqjshli du', 0, 0, 46),
(25, 40, 'logiciel', 1, 100, 49),
(26, 41, 'maintenance', 1, 200, 49),
(27, 42, 'appli', 1, 200, 49),
(28, 42, 'appli', 1, 200, 49),
(29, 147, 'maxime', 2, 4, 51),
(30, 1255, 'ghytrrfd', 1, 4, 51);

-- --------------------------------------------------------

--
-- Structure de la table `lignefacture`
--

CREATE TABLE IF NOT EXISTS `lignefacture` (
  `idLfacture` int(20) NOT NULL AUTO_INCREMENT,
  `referenceF` int(20) NOT NULL,
  `descriptionF` text NOT NULL,
  `quantiteF` int(5) unsigned NOT NULL,
  `prixUnitaireF` float unsigned NOT NULL,
  `idFacture` int(20) NOT NULL,
  PRIMARY KEY (`idLfacture`),
  KEY `fk_facture_lignefacture` (`idFacture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `lignefacture`
--

INSERT INTO `lignefacture` (`idLfacture`, `referenceF`, `descriptionF`, `quantiteF`, `prixUnitaireF`, `idFacture`) VALUES
(1, 111, 'mlp', 1, 30, 2);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE IF NOT EXISTS `proprietaire` (
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `numMaison` text NOT NULL,
  `Residence` varchar(25) NOT NULL,
  `rue` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `numeroFixe` varchar(10) NOT NULL,
  `numeroPortable` varchar(10) NOT NULL,
  `adresseMail` varchar(30) NOT NULL,
  `Siret` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`prenom`, `nom`, `numMaison`, `Residence`, `rue`, `ville`, `numeroFixe`, `numeroPortable`, `adresseMail`, `Siret`) VALUES
('sylvain', 'ard', 'Appt26 Batiment A', 'Residence le patio', '83 rue de la bugellerie', '86000 poitiers', '0549507724', '0778380991', 'sylvain.ard@gmail.com', '80079243400022');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `fk_devis_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `fk_client_facture` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_factures_devis` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`);

--
-- Contraintes pour la table `lignedevis`
--
ALTER TABLE `lignedevis`
  ADD CONSTRAINT `fk_devis_ld` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`) ON DELETE CASCADE;

--
-- Contraintes pour la table `lignefacture`
--
ALTER TABLE `lignefacture`
  ADD CONSTRAINT `fk_facture_lignefacture` FOREIGN KEY (`idFacture`) REFERENCES `factures` (`idFacture`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
