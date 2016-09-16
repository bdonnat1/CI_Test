-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Septembre 2016 à 12:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `auto_ecole_nassibou`
--
CREATE DATABASE IF NOT EXISTS `auto_ecole_nassibou` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auto_ecole_nassibou`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` text NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `categorie`) VALUES
(1, 'Menu haut'),
(2, 'Menu bas colonne 1'),
(3, 'Menu bas colonne 2'),
(4, 'Menu bas colonne 3'),
(5, 'Menu gauche');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` text NOT NULL,
  `idPage` int(11) NOT NULL,
  `hyperlien` text NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `menus`
--

INSERT INTO `menus` (`idMenu`, `menu`, `idPage`, `hyperlien`, `idCategorie`) VALUES
(2, 'A propos', 2, '', 1),
(3, 'Pré-inscription', 3, 'preinscription', 1),
(4, 'Contact', 4, 'contact', 1),
(5, 'Auto Ecole', 5, '', 2),
(7, 'Conduite accompagnées', 7, '', 3),
(8, 'Conduite supervisées', 8, '', 3),
(9, 'A propos de nous', 2, '', 4),
(10, 'Permis moto', 9, '', 3),
(11, 'Permis voiture', 10, '', 3),
(12, 'Formation BSR et Formation 125 Cm3', 11, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `menus_has_categories`
--

DROP TABLE IF EXISTS `menus_has_categories`;
CREATE TABLE IF NOT EXISTS `menus_has_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `menus_has_categories`
--

INSERT INTO `menus_has_categories` (`id`, `idMenu`, `idCategorie`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 5, 2),
(5, 6, 3),
(6, 7, 3),
(7, 8, 3),
(8, 9, 4),
(9, 6, 5),
(10, 7, 5),
(11, 8, 5),
(12, 10, 4),
(13, 11, 4),
(14, 12, 4),
(15, 10, 5),
(16, 11, 5),
(17, 12, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `idPage` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `mot_cle` text NOT NULL,
  PRIMARY KEY (`idPage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`idPage`, `titre`, `contenu`, `mot_cle`) VALUES
(2, 'A propos de nous', '<p>Contenu de a propos de nous</p><p><img alt="" data-cke-saved-src="http://autoecoles.groupelarger.fr/uploads/images/piste-moto-2-auto-ecole-larger-munchhouse.jpg" src="http://autoecoles.groupelarger.fr/uploads/images/piste-moto-2-auto-ecole-larger-munchhouse.jpg" style="height:244px; width:400px"></p>', ''),
(3, 'Pré-inscription', '<p>Contenu pré-inscription</p>', ''),
(4, 'Contact', '<p>Contenu contact</p>', ''),
(5, 'Auto école', '<p>Contenu auto ecole</p>', ''),
(7, 'Conduite accompagnées', '<p>Conduite accompagnées&nbsp;</p>', ''),
(8, 'Conduite supervisées', '<p>Conduite supervisées</p><p><br></p><p><br></p>', ''),
(9, 'Permis moto', '<p><br></p><ol><li>PERMIS MOTO EN 4 SEMAINES 2 FORMULES AUX CHOIX&nbsp;</li><li>FORMULE N°1 LA FORMATION 460€ COURS ILLIMITÉ</li><li>FORMULE N°2 LA FORMATION 600€ COURS ILLIMITÉ + TOUTES LES PREMIERES PRESENTATION OFFERTE</li></ol><p><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/006.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/006.jpg" style="margin: 10px; width: 250px; height: 200px;"><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/002.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/002.jpg" style="margin: 10px; width: 250px; height: 200px;"><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/001.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/001.jpg" style="margin: 10px; width: 250px; height: 200px;"><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/007.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/007.jpg" style="margin: 10px; width: 250px; height: 200px;"></p><p><br></p>', ''),
(10, 'Permis voiture', '<p>Formation 7h A2 vers A</p><p><br></p><p>Vous avez le permis A2 depuis plus de 2 ans ? Une formation de 7h vous permet d''accéder au permis A<br>&nbsp;et conduire une motocyclette avec ou sans side-car d’une puissance supérieure à 35 kW !</p><p>La formation 7h permis A2 vers permis A permet aux titulaires du permis de conduire A2<br>&nbsp;depuis au moins deux ans d’obtenir le permis A.</p><p><br></p><p><strong>NB </strong>: <em>La formation peut être suivie dans un délai de 3 mois avant la date d’anniversaire des 2 ans d’obtention&nbsp;</em>de la catégorie A2 du permis de conduire.</p><p><br></p><p><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/016.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/016.jpg" style="height:200px; margin:10px; width:250px"><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/017.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/017.jpg" style="height:200px; width:250px"><img alt="" data-cke-saved-src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/017.jpg" src="http://donnat-project.com/Nassibou_Auto_ecole/assets/images-site/017.jpg" style="height:200px; margin:10px; width:250px">​</p><p><br></p>', ''),
(11, 'Formation BSR et Formation 125 Cm3', '<p>Pour le bsr ( permis am ) depuis le 19 janvier 2013, le bsr (ou la catégorie am du permis de conduire)&nbsp;est obligatoire pour conduire un cyclomoteur&nbsp;</p><p><br></p><p><strong>Définition :</strong>&nbsp;</p><p><br></p><ol><li>2 roues ou 3 roues à moteur,&nbsp;</li><li>cylindrée = 50 cm3&nbsp;</li><li>puissance = 4 kw&nbsp;</li><li>vitesse maxi 45 km/h</li></ol><p><br></p><p><strong>conditions requises :&nbsp;</strong></p><p><strong>​</strong></p><ol><li>Avoir minimum 14 ans et etre titulaire de l’assr 1 ou de 2 ou asr</li></ol><p><br></p><p><strong>Attention : </strong>Les assr de 1er niveau ou de 2ème niveau ou asr sont obligatoires&nbsp;pour pouvoir s\\''inscrire à la formation pratique du bsret n\\''autorisent pas le jeune à conduire un véhicule à moteur.</p><p><br><em><strong>La formation pratique d\\''une durée de 7 heures , est assurée par l auto école</strong></em></p>', '');

-- --------------------------------------------------------

--
-- Structure de la table `site_meta`
--

DROP TABLE IF EXISTS `site_meta`;
CREATE TABLE IF NOT EXISTS `site_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `site_meta`
--

INSERT INTO `site_meta` (`id`, `meta_key`, `meta_value`) VALUES
(1, 'email', 'bdonnat1@yahoo.fr'),
(2, 'telephone', '0262270631'),
(3, 'contactleft', '<p><strong><big>NUMERO DE TELEPHONE</big></strong></p><div style="background:#eee; border:1px solid #ccc; padding:5px 10px">&nbsp; &nbsp;- <span class="marker">0262270631&nbsp;</span>|&nbsp; <span class="marker">0692020102</span></div><p><strong><big>HEURES DE BUREAU</big></strong></p><div style="background:#eee; border:1px solid #ccc; padding:5px 10px">&nbsp;<span class="marker"> &nbsp;- 9H00 - 12H00 | 14H00 - 17H00</span>​</div>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `login`, `password`) VALUES
(1, 'donnat', 'donnat'),
(2, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
