-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 15 Mai 2018 à 12:25
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
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `idDevis` int(20) NOT NULL AUTO_INCREMENT,
  `numeroDevis` int(20) unsigned NOT NULL,
  `dateDevis` date NOT NULL,
  `urlDevis` varchar(30) NOT NULL,
  `idClient` int(20) NOT NULL,
  PRIMARY KEY (`idDevis`),
  KEY `fk_devis_client` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `idFacture` int(25) NOT NULL AUTO_INCREMENT,
  `idClient` int(20) NOT NULL,
  `numeroFacture` int(30) NOT NULL,
  `dateFacture` date NOT NULL,
  `urlFacture` varchar(30) NOT NULL,
  `idDevis` int(20) NOT NULL,
  PRIMARY KEY (`idFacture`),
  KEY `fk_client_facture` (`idClient`),
  KEY `fk_factures_devis` (`idDevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_devis_lignedevis` (`idDevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE IF NOT EXISTS `proprietaire` (
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `adresse` text NOT NULL,
  `numeroFixe` varchar(10) NOT NULL,
  `numeroPortable` varchar(10) NOT NULL,
  `adresseMail` varchar(30) NOT NULL,
  `Siret` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`prenom`, `nom`, `adresse`, `numeroFixe`, `numeroPortable`, `adresseMail`, `Siret`) VALUES
('Sylvain', 'ARD', 'appt 26 Bâtiment A \r\nRésidence Le Patio\r\n83 rue de la Bugellerie\r\n86000 Poitiers ', '0549507724', '0778380991', 'sylvain.ard@gmail.com', '80079243400022');

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
  ADD CONSTRAINT `fk_factures_devis` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`),
  ADD CONSTRAINT `fk_client_facture` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `lignedevis`
--
ALTER TABLE `lignedevis`
  ADD CONSTRAINT `fk_devis_lignedevis` FOREIGN KEY (`idDevis`) REFERENCES `devis` (`idDevis`);

--
-- Contraintes pour la table `lignefacture`
--
ALTER TABLE `lignefacture`
  ADD CONSTRAINT `fk_facture_lignefacture` FOREIGN KEY (`idFacture`) REFERENCES `factures` (`idFacture`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
