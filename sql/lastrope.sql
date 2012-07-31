-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 31 Juillet 2012 à 19:04
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lastrope`
--

-- --------------------------------------------------------

--
-- Structure de la table `actus`
--

CREATE TABLE IF NOT EXISTS `actus` (
  `idActus` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`idActus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `actus`
--

INSERT INTO `actus` (`idActus`, `title`, `body`, `date`) VALUES
(1, 'Il y a du changement dans l''air.', 'Comme le dit le titre, il y a du changement dans l''air. L''été nous a tous inspiré cette année pour une vague de changement. Ainsi, voici un site tout beau tout propre refait de A à Z pour vous présenter le groupe.\r\nNous avons beaucoup évolué depuis la création de Dust Of Shadows. Et notre musique aussi. De ce fait, le besoin de changer de nom, d''apparence et d''identité est venu assez naturellement.\r\nRépondant à présent au nom de Lastrope, nous prévoyons la sortie de notre nouvel EP "Eighteen" de quatre titres fin décembre.\r\nEn plus de cela, et toujours pour répondre à ce besoin de changement d''identité, nous avons réalisé - avec l''aide d''une photographe accomplie ;) - des photos reflétant le plus possible l''image souhaité du groupe et surtout de sa musique. Pour suivre ce mouvement général une vidéo de présentation est en cours de réalisation/montage.\r\n\r\nS''inscrivant dans l''air de la musique moderne et complexe, Lastrope est bien décidé à franchir une nouvelle étape. La sortie de ce futur EP sera l''élément attendu pour pouvoir - enfin - élargir notre horizon.\r\n\r\nNe perdez pas de temps et allez explorer ce site qui sera quotidiennement maintenu à jour pour être constamment exhaustif de toutes nos informations.\r\n\r\nMusicalement,\r\n\r\nLastrope.', 20120737);

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `idHeader` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idHeader`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `header`
--

INSERT INTO `header` (`idHeader`, `title`, `meta_description`, `meta_keywords`, `lang`) VALUES
(1, 'Lastrope', 'Le site du groupe de heavy métal progressif Lastrope', 'lastrope,heavy metal, progressif, iron maiden, dream theater,guitare, solo,batterie,php,html,css,mysql,css3,html5,jquery,javascript', 'fr'),
(2, 'Lastrope', 'The website of the heavy metal progressif band Lastrope', 'lastrope,heavy metal, progressif, iron maiden, dream theater,guitar, solo,drum,php,html,css,mysql,css3,html5,jquery,javascript', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `idLinks` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `href` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idLinks`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `links`
--

INSERT INTO `links` (`idLinks`, `text`, `href`, `lang`) VALUES
(1, 'Actualites', 'news.php', 'fr'),
(2, 'News', 'news.php', 'en'),
(3, 'Bio', 'bio.php', 'fr'),
(4, 'Bio', 'bio.php', 'en'),
(5, 'Media', 'media.php', 'fr'),
(6, 'Media', 'media.php', 'en'),
(7, 'Son', 'son.php', 'fr'),
(8, 'Sound', 'son.php', 'en'),
(9, 'Contacte', 'contact.php', 'fr'),
(10, 'Contact', 'contact.php', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `idMembers` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idMembers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`idMembers`, `name`, `firstname`, `surname`, `picture`, `birthday`) VALUES
(1, 'Dulon', 'Thibault', 'Titi', '', '28/02/1992'),
(2, 'Gautier', 'Franck', 'Kyky', '', '27/07/1990'),
(3, 'De Lima', 'Paco', 'Pakpak', '', '26/07/1991'),
(4, 'Ramos', 'Camille', 'Boulette', '', '31/07/1992'),
(5, 'Spenato', 'Romain', 'Rominou', '', '06/08/1990');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
