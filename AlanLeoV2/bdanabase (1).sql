-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 nov. 2022 à 16:28
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdanabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `NUM_ACTIVITE` int(2) NOT NULL,
  `NOM_ACTIVITE` char(32) DEFAULT NULL,
  `DATE_ACTIVITE` date DEFAULT NULL,
  `HEURE_ACTIVITE` time DEFAULT NULL,
  `PRIX_ACTIVITE` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUM_ACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `congressiste`
--

DROP TABLE IF EXISTS `congressiste`;
CREATE TABLE IF NOT EXISTS `congressiste` (
  `NUM_CONGRESSISTE` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_ORGANISME` int(2) DEFAULT NULL,
  `NUM_HOTEL` int(2) DEFAULT NULL,
  `NOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `PRENOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `ADRESSE_CONGRESSISTE` char(50) DEFAULT NULL,
  `TEL_CONGRESSISTE` char(10) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `CODE_ACCOMPAGNATEUR` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`),
  KEY `I_FK_CONGRESSISTE_ORGANISME_PAYEUR` (`NUM_ORGANISME`),
  KEY `I_FK_CONGRESSISTE_HOTEL` (`NUM_HOTEL`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `congressiste`
--

INSERT INTO `congressiste` (`NUM_CONGRESSISTE`, `NUM_ORGANISME`, `NUM_HOTEL`, `NOM_CONGRESSISTE`, `PRENOM_CONGRESSISTE`, `ADRESSE_CONGRESSISTE`, `TEL_CONGRESSISTE`, `DATE_INSCRIPTION`, `CODE_ACCOMPAGNATEUR`) VALUES
(14, 1, 1, 'De oliveira', 'Alan', 'Orage', '0628766152', '2010-11-22', 1),
(15, 1, 1, 'erfe', 'btr', 'gbythnf', '954825841', '2010-11-22', 1),
(16, 1, NULL, 'gtr', 'btntbdfv', 'tbegv', 'brtbf', '2010-11-22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `NUM_FACTURE` int(2) NOT NULL,
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `DATE_FACTURE` date DEFAULT NULL,
  `CODE_REGLEMENT` tinyint(1) DEFAULT NULL,
  `MONTANT_FACTURE` bigint(4) DEFAULT NULL,
  PRIMARY KEY (`NUM_FACTURE`),
  UNIQUE KEY `I_FK_FACTURE_CONGRESSISTE` (`NUM_CONGRESSISTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `NUM_HOTEL` int(2) NOT NULL,
  `NOM_HOTEL` char(32) DEFAULT NULL,
  `ADRESSE_HOTEL` char(50) DEFAULT NULL,
  `NOMBRE_ETOILES` smallint(1) DEFAULT NULL,
  `PRIX_PARTICIPANT` int(2) DEFAULT NULL,
  `PRIX_SUPPL` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUM_HOTEL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`NUM_HOTEL`, `NOM_HOTEL`, `ADRESSE_HOTEL`, `NOMBRE_ETOILES`, `PRIX_PARTICIPANT`, `PRIX_SUPPL`) VALUES
(1, 'Ritz', '15 place vendôme', 5, 2408, 200),
(2, 'Faucon millenium', 'une galaxy far far away', 4, 13, 52);

-- --------------------------------------------------------

--
-- Structure de la table `organisme_payeur`
--

DROP TABLE IF EXISTS `organisme_payeur`;
CREATE TABLE IF NOT EXISTS `organisme_payeur` (
  `NUM_ORGANISME` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_ORGANISME` char(32) DEFAULT NULL,
  `ADRESSE_ORGANISME` char(50) DEFAULT NULL,
  PRIMARY KEY (`NUM_ORGANISME`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organisme_payeur`
--

INSERT INTO `organisme_payeur` (`NUM_ORGANISME`, `NOM_ORGANISME`, `ADRESSE_ORGANISME`) VALUES
(1, 'Le Vers Luisant', '35 au fond dans ton jardin'),
(2, 'La république galactique', '38 rue de naboo');

-- --------------------------------------------------------

--
-- Structure de la table `participation_session`
--

DROP TABLE IF EXISTS `participation_session`;
CREATE TABLE IF NOT EXISTS `participation_session` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_SESSION` int(2) NOT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_SESSION`),
  KEY `I_FK_PARTICIPATION_SESSION_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  KEY `I_FK_PARTICIPATION_SESSION_SESSION` (`NUM_SESSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rel_1`
--

DROP TABLE IF EXISTS `rel_1`;
CREATE TABLE IF NOT EXISTS `rel_1` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_ACTIVITE` int(2) NOT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_ACTIVITE`),
  KEY `I_FK_REL_1_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  KEY `I_FK_REL_1_ACTIVITE` (`NUM_ACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `NUM_SESSION` int(2) NOT NULL,
  `DATE_SESSION` date DEFAULT NULL,
  `HEURE_SESSION` time DEFAULT NULL,
  `PRIX_SESSION` int(2) DEFAULT NULL,
  `NOM_SESSION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_SESSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
