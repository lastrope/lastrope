-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 29 Juillet 2012 à 20:01
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
(1, 'Actualités', 'news.php', 'fr'),
(2, 'News', 'news.php', 'en'),
(3, 'Bio', 'bio.php', 'fr'),
(4, 'Bio', 'bio.php', 'en'),
(5, 'Media', 'media.php', 'fr'),
(6, 'Media', 'media.php', 'en'),
(7, 'Son', 'son.php', 'fr'),
(8, 'Sound', 'son.php', 'en'),
(9, 'Contacte', 'contact.php', 'fr'),
(10, 'Contact', 'contact.php', 'en');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
