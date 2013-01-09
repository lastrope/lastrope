-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 09 Janvier 2013 à 14:26
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.1

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
  `nom_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idActus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `actus`
--

INSERT INTO `actus` (`idActus`, `nom_table`, `title`, `body`, `date`, `lang`) VALUES
(1, '', 'Il y a du changement dans l''air.', 'Comme le dit le titre, il y a du changement dans l''air. L''été nous a tous inspiré cette année pour une vague de changement. Ainsi, voici un site tout beau tout propre refait de A à Z pour vous présenter le groupe.\r\nNous avons beaucoup évolué depuis la création de Dust Of Shadows. Et notre musique aussi. De ce fait, le besoin de changer de nom, d''apparence et d''identité est venu assez naturellement.\r\nRépondant à présent au nom de Passanger, nous prévoyons la sortie de notre nouvel EP "Eighteen" de quatre titres fin décembre.\r\n\r\nEn plus de cela, et toujours pour répondre à ce besoin de changement d''identité, nous avons réalisé - avec l''aide d''une photographe accomplie ;) - des photos reflétant le plus possible l''image souhaité du groupe et surtout de sa musique. Pour suivre ce mouvement général une vidéo de présentation est en cours de réalisation/montage.\r\nS''inscrivant dans l''air de la musique moderne et complexe, Passanger est bien décidé à franchir une nouvelle étape. La sortie de ce futur EP sera l''élément attendu pour pouvoir - enfin - élargir notre horizon.\r\nNe perdez pas de temps et allez explorer ce site qui sera quotidiennement maintenu à jour pour être constamment exhaustif de toutes nos informations.\r\n\r\nMusicalement,\r\nPassanger.', 1344757674, 'fr'),
(2, '', 'There is change in the air.', 'As the title says, there is a change in the air. Summer inspired us all this year for the wave of change. So here is a new clean and nice website to introduce the band.\r\nWe have evolved considerably since the creation of Dust Of Shadows. And our music too. Therefore, the need to change our name, our appearance and our identity came pretty naturally.\r\nResponding to the name of Passanger, we expect the release of our new four titles EP "Eighteen" in late December.\r\n\r\nIn addition to this and always to meet this need of changing, we have made - with the help of an accomplished photographer ;) - photos reflecting the desired image of the band and especially its music. To follow this general trend, we are also making a video presentation (in progress / editing).\r\nAs part of the air of modern and complex music, Passanger is determined to pass the next step. The release of this future EP will be the element expected to be able - finally - to expand our horizon.\r\nDo not waste time and go explore this website which will be daily maintained to be constantly updated exhaustive of all our information.\r\n\r\nMusically,\r\nPassanger.', 1344757674, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `idAlbums` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idAlbums`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `albums_song`
--

CREATE TABLE IF NOT EXISTS `albums_song` (
  `idAlbums` smallint(5) unsigned NOT NULL,
  `idSong` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idAlbums`,`idSong`),
  KEY `idSong` (`idSong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bio`
--

CREATE TABLE IF NOT EXISTS `bio` (
  `idPeriod` smallint(5) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`idPeriod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `bio`
--

INSERT INTO `bio` (`idPeriod`, `year`, `description`, `lang`) VALUES
(1, 2012, 'Après un premier semestre remplis de répétitions pour les musiques du dernier album et de quelques concerts dans la région, le groupe se met en quette d''une nouvelle identité musicale et graphique.\n\nL''enregistrement du nouvel EP "Eighteen part 1" commença en aout.\n\nLa sortie prévu début 2013 donne naissance à la nouvel vie du groupe.', 'fr'),
(2, 2011, 'Fort de cet album enfin sur CD, le groupe décide de s''inscrire à la SACEM pour officialiser ses droits d''auteurs.\n\nCette étape franchie, la groupe jongle entre répète, concert (Etrechy, Roinville, Sermaise, Dourdan), et composition du nouvel E.P "Eighteen part 1".', 'fr'),
(3, 2010, 'Tout en enchaînant les concerts à Roinville, Dourdan, Sermaise...etc,\nle groupe termine la composition de l''album et commence aussitôt son enregistrement chez Thibault afin de sortir dans la fin de l''année cet Album de 12 titres fait main.', 'fr'),
(4, 2009, 'Naissant d''une envie commune, Dust of Shadows voit le jour grâce à Thibault et Kenny, désireux de fonder un groupe de Heavy-métal sérieux.\n\nAprès une recherche intensive, chaque nouveaux membre trouva la pièce manquante. Ainsi Franck rejoignit le groupe comme second guitariste puis amena Paco le bassiste, qui lui même nous présenta Camille la batteuse, remplaçante de Kenny qui nous quitta pour une vie meilleure.\n\nAprès quelques ébauche, le groupe s''attela à la composition du premier Album "Ultimate Attempt".\n\nEt c''est le 12 décembre 2009 qu''ils celèrent leurs line-up en se produisant pour la première fois ensemble sur scène à Janville.', 'fr'),
(5, 2012, 'After a first semester filled with rehearsals for the new album and some gigs in our region, the group goes in search of a new musical and graphic identity. The recording of the new EP "Eighteen Part 1" began in August and the release in the beginning of 2013 means a new life for the band.', 'en'),
(6, 2011, '', 'en'),
(7, 2010, '', 'en'),
(8, 2009, '', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom_table` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `type` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`idEvent`, `nom_table`, `title`, `body`, `date`, `type`, `lang`) VALUES
(1, '', 'Concert Epinay-sur-Orge !', 'On vous donne rdv le 30 Juin 2012 à Epinay sur orge pour un concert des Passanger.', 1344757700, 'co', 'fr'),
(2, '', 'Gig in Epinay-sur-Orge', 'We look forward to seeing you on June the 30th 2012 in Epinay-sur-Orge for a Passanger gig.', 1344757700, 'co', 'en'),
(3, '', 'Concert Roinville !', 'On vous donne rdv le 23 Juin 2012 à Roinville pour un concert des Passanger.', 1344757743, 'co', 'fr'),
(4, '', 'Gig in Roinville', 'We look forward to seeing you on June the 23rd 2012 in Roinville for a Passanger gig.', 1344757743, 'co', 'en');

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
(1, 'Passanger', 'Le site du groupe de heavy métal progressif Passanger', 'Passanger,heavy metal, progressif, iron maiden, dream theater,guitare, solo,batterie,php,html,css,mysql,css3,html5,jquery,javascript', 'fr'),
(2, 'Passanger', 'The website of the heavy metal progressif band Lastrope', 'lastrope,heavy metal, progressif, iron maiden, dream theater,guitar, solo,drum,php,html,css,mysql,css3,html5,jquery,javascript', 'en');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(10, 'Contact', 'contact', 'en'),
(11, 'Accueil', 'home', 'fr'),
(12, 'Home', 'home', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `idMembers` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `members` (`idMembers`, `nom_table`, `name`, `firstname`, `surname`, `picture`, `birthday`, `instrument`, `influences`, `short_desc`, `lang`) VALUES
(1, '', 'Dulon', 'Thibault', 'Titi', 'titou.png', '28/02/1992', 'Guitariste Soliste', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Periphery, Tesseract, Nightwish', 'Après plusieurs expériences de groupe non sérieuse, j''ai décidé, avec un ami, de fonder Dust of shadows, un groupe de heavy progressif où l''on pourrait enfin exprimer notre âme heavy et prog.\r\nEn parallèle, je continue mes projets solo qui me permettent d''exprimer mon autre moi musical et d''apprendre toutes les ficelles du mixage. http://soundcloud.com/fitz_lucassen', 'fr'),
(2, '', 'Gautier', 'Franck', 'Kyky', 'kyky.png', '27/07/1990', 'Guitariste Rythmique', '', '', 'fr'),
(3, '', 'De Lima', 'Paco', 'Squid', 'pakpak.png', '26/07/1991', 'Bassiste', 'Rage Against The Machine, Periphery, Marcus Miller, Le peuple de l''herbe, Dream Theater, Massive Attack, Victor Wooten', '', 'fr'),
(4, '', 'Ramos', 'Camille', 'Boulette', 'cams.png', '31/07/1992', 'Batteur', 'Devin Townsend, Rage Against The Machine, Tool, Tesseract, Iron Maiden, Steve Gad, Billy Cohbam', '', 'fr'),
(5, '', 'Spenato', 'Romain', 'Rominou', 'rominou.png', '06/08/1990', 'Chanteur', '', '', 'fr'),
(6, '', 'Dulon', 'Thibault', 'Titi', 'titou.png', '28/02/1992', 'Lead Guitarist', 'Ayreon, Iron Maiden, Dream Theater, Circus Maximus, Periphery, Tesseract, Nightwish', 'After several not serious band experiences, I''ve decided, with a friend, to found Dust of Shadows, a heavy progressive band where we could finally express our heavy soul.\r\n Meanwhile, I continue my solo projects that allow me to express my other musical self and learn all mix tricks. http://soundcloud.com/fitz_lucassen', 'en'),
(7, '', 'Gautier', 'Franck', 'Kyky', 'kyky.png', '27/07/1990', 'Rythm Guitarist', '', '', 'en'),
(8, '', 'De Lima', 'Paco', 'Pakpak', 'pakpak.png', '26/07/1991', 'Bassist', 'Rage Against The Machine, Periphery, Marcus Miller, Le peuple de l''herbe, Dream Theater, Massive Attack, Victor Wooten', '', 'en'),
(9, '', 'Ramos', 'Camille', 'Boulette', 'cams.png', '31/07/1992', 'Drummer', 'Devin Townsend, Rage Against The Machine, Tool, Tesseract, Iron Maiden, Steve Gad, Billy Cohbam', '', 'en'),
(10, '', 'Spenato', 'Romain', 'Rominou', 'rominou.png', '06/08/1990', 'Singer', '', '', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `idSong` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSong`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `song`
--

INSERT INTO `song` (`idSong`, `name`, `filename`, `title`, `description`, `lang`) VALUES
(1, '', 'lastrope', 'lastrope', 'lastrope', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `idVideo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idVideo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`idVideo`, `nom_table`, `url`, `title`, `description`, `thumb`, `lang`) VALUES
(1, '', 'http%3A%2F%2Fwww.youtube.com%2Fembed%2FFDXU3pREfbE', 'Passanger - Revolution ', 'Video prise lors d''un concert spécial métal à Etréchy dans l''essonne (91)', 'none', 'fr');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `albums_song`
--
ALTER TABLE `albums_song`
  ADD CONSTRAINT `albums_song_ibfk_2` FOREIGN KEY (`idSong`) REFERENCES `song` (`idSong`),
  ADD CONSTRAINT `albums_song_ibfk_1` FOREIGN KEY (`idAlbums`) REFERENCES `albums` (`idAlbums`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
