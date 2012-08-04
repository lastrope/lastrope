-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 04 Août 2012 à 17:19
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
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idActus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `actus`
--

INSERT INTO `actus` (`idActus`, `title`, `body`, `date`, `lang`) VALUES
(1, 'Il y a du changement dans l''air.', 'Comme le dit le titre, il y a du changement dans l''air. L''été nous a tous inspiré cette année pour une vague de changement. Ainsi, voici un site tout beau tout propre refait de A à Z pour vous présenter le groupe.<br/>\nNous avons beaucoup évolué depuis la création de Dust Of Shadows. Et notre musique aussi. De ce fait, le besoin de changer de nom, d''apparence et d''identité est venu assez naturellement.<br/>\nRépondant à présent au nom de Lastrope, nous prévoyons la sortie de notre nouvel EP "Eighteen" de quatre titres fin décembre.<br/>\nEn plus de cela, et toujours pour répondre à ce besoin de changement d''identité, nous avons réalisé - avec l''aide d''une photographe accomplie ;) - des photos reflétant le plus possible l''image souhaité du groupe et surtout de sa musique. Pour suivre ce mouvement général une vidéo de présentation est en cours de réalisation/montage.<br/><br/>\nS''inscrivant dans l''air de la musique moderne et complexe, Lastrope est bien décidé à franchir une nouvelle étape. La sortie de ce futur EP sera l''élément attendu pour pouvoir - enfin - élargir notre horizon.<br/>\nNe perdez pas de temps et allez explorer ce site qui sera quotidiennement maintenu à jour pour être constamment exhaustif de toutes nos informations.<br/><br/>\nMusicalement,<br/>\n\nLastrope.', 20120737, 'fr'),
(2, 'There is change in the air.', 'As the title says, there is a change in the air. Summer inspired us all this year for the wave of change. So here is a new clean and nice website to introduce the band. <br/>\r\nWe have evolved considerably since the creation of Dust Of Shadows. And our music too. Therefore, the need to change our name, our appearance and our identity came pretty naturally. <br/>\r\nResponding to the name of Lastrope, we expect the release of our new four titles EP "Eighteen" in late December. <br/>\r\nIn addition to this and always to meet this need of changing, we have made - with the help of an accomplished photographer ;) - photos reflecting the desired image of the band and especially its music. To follow this general trend, we are also making a video presentation (in progress / editing). <br/>\r\nAs part of the air of modern and complex music, Lastrope is determined to pass the next step. The release of this future EP will be the element expected to be able - finally - to expand our horizon. <br/>\r\nDo not waste time and go explore this website which will be daily maintained to be constantly updated exhaustive of all our information. <br/>\r\nMusically, <br/>\r\n\r\nLastrope.', 20120737, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` smallint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`idEvent`, `title`, `short_desc`, `date`, `type`, `lang`) VALUES
(1, 'Concert Epinay-sur-Orge !', 'On vous donne rdv le 30 Juin 2012 à Epinay sur orge pour un concert des Lastrope.', '30/06/2012', 'co', 'fr'),
(2, 'Gig in Epinay-sur-Orge', 'We look forward to seeing you on June the 30th 2012 in Epinay-sur-Orge for a Lastrope gig.', '30/06/2012', 'co', 'en');

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
(1, 'Actualites', 'news', 'fr'),
(2, 'News', 'news', 'en'),
(3, 'Bio', 'bio', 'fr'),
(4, 'Bio', 'bio', 'en'),
(5, 'Media', 'media', 'fr'),
(6, 'Media', 'media', 'en'),
(7, 'Son', 'sound', 'fr'),
(8, 'Sound', 'sound', 'en'),
(9, 'Contact', 'contact', 'fr'),
(10, 'Contact', 'contact', 'en');

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
  `instrument` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `influences` text COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idMembers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`idMembers`, `name`, `firstname`, `surname`, `picture`, `birthday`, `instrument`, `influences`, `short_desc`, `lang`) VALUES
(1, 'Dulon', 'Thibault', 'Titi', '', '28/02/1992', 'Guitariste Soliste', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Lord of Mushrooms, Periphery, Arjen Lucassen, Nightwish', 'Après plusieurs expériences de groupe non sérieuse, j''ai décidé, avec un ami, de fonder Dust of shadows, un groupe de heavy progressif où l''on pourrait enfin exprimer notre âme heavy et prog.\r\nEn parallèle, je continue mes projets solo qui me permettent d''exprimer mon autre moi musical et d''apprendre toutes les ficelles du mixage. http://soundcloud.com/fitz_lucassen', 'fr'),
(2, 'Gautier', 'Franck', 'Kyky', '', '27/07/1990', 'Guitariste Rythmique', '', '', 'fr'),
(3, 'De Lima', 'Paco', 'Pakpak', '', '26/07/1991', 'Bassiste', '', '', 'fr'),
(4, 'Ramos', 'Camille', 'Boulette', '', '31/07/1992', 'Batteur', '', '', 'fr'),
(5, 'Spenato', 'Romain', 'Rominou', '', '06/08/1990', 'Chanteur', '', '', 'fr'),
(6, 'Dulon', 'Thibault', 'Titi', '', '28/02/1992', 'Lead Guitarist', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Lord of Mushrooms, Periphery, Arjen Lucassen, Nightwish', 'After several not serious band experiences, I''ve decided, with a friend, to found Dust of Shadows, a heavy progressive band where we could finally express our heavy soul.\r\n Meanwhile, I continue my solo projects that allow me to express my other musical self and learn all mix tricks. http://soundcloud.com/fitz_lucassen', 'en'),
(7, 'Gautier', 'Franck', 'Kyky', '', '27/07/1990', 'Rythm Guitarist', '', '', 'en'),
(8, 'De Lima', 'Paco', 'Pakpak', '', '26/07/1991', 'Bassist', '', '', 'en'),
(9, 'Ramos', 'Camille', 'Boulette', '', '31/07/1992', 'Drummer', '', '', 'en'),
(10, 'Spenato', 'Romain', 'Rominou', '', '06/08/1990', 'Singer', '', '', 'en');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
