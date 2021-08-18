-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 avr. 2021 à 13:38
-- Version du serveur :  5.7.26
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `carcare`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_nom` varchar(25) NOT NULL,
  `client_prenom` varchar(20) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_adresse` varchar(50) NOT NULL,
  `client_username` varchar(25) NOT NULL,
  `client_password` varchar(50) NOT NULL,
  `client_confirm_password` varchar(50) NOT NULL,
  `client_reponse1` varchar(25) NOT NULL,
  `client_reponse2` varchar(25) NOT NULL,
  `client_reponse3` varchar(25) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `garage_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_nom` varchar(25) NOT NULL,
  `garage_contact` varchar(25) NOT NULL,
  `garage_adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`garage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `garage`
--

INSERT INTO `garage` (`garage_id`, `garage_nom`, `garage_contact`, `garage_adresse`) VALUES
(1, 'paix', '50662052', '287 pleoa street');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`, `role_libelle`) VALUES
(1, 'Admin'),
(2, 'Secretaire'),
(3, 'Boss');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_libelle` varchar(25) NOT NULL,
  `service_cout` varchar(25) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`service_id`, `service_libelle`, `service_cout`) VALUES
(1, 'reparation', 'hgy');

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

DROP TABLE IF EXISTS `travaux`;
CREATE TABLE IF NOT EXISTS `travaux` (
  `travaux_id` int(11) NOT NULL AUTO_INCREMENT,
  `travaux_libelle` varchar(25) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `travaux_date` date NOT NULL,
  `travaux_prochain` date NOT NULL,
  `travaux_info` varchar(200) NOT NULL,
  PRIMARY KEY (`travaux_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `role_id`) VALUES
(2, 'superadmin', 'superadmin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `vehicule_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicule_nom` varchar(25) NOT NULL,
  `vehicule_marque` varchar(25) NOT NULL,
  `vehicule_modele` varchar(25) NOT NULL,
  `vehicule_annee` varchar(25) NOT NULL,
  PRIMARY KEY (`vehicule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`vehicule_id`, `vehicule_nom`, `vehicule_marque`, `vehicule_modele`, `vehicule_annee`) VALUES
(1, 'Honda', 'honda', 'crv1', '2015'),
(2, 'chevrolet', 'chevrolet', 'crv', '2010');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
