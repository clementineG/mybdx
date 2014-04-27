<?php
	include 'dbconnect.php';
	$requete = 
"CREATE TABLE IF NOT EXISTS `category` (
  `CA_ID` int(2) NOT NULL,
  `CA_NOM` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `category` (`CA_ID`, `CA_NOM`) VALUES
(1, 'Informations'),
(2, 'Sports'),
(3, 'Sorties'),
(4, 'Economies'),
(5, 'Entreprises');

CREATE TABLE IF NOT EXISTS `comment` (
  `CO_ID` int(5) NOT NULL,
  `CO_COID` int(5) NOT NULL,
  `CO_UID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `compte` (
  `ID` int(5) NOT NULL,
  `NOM` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(140) NOT NULL,
  `CATEGORIE` varchar(12) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `NOM` (`NOM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `compte` (`ID`, `NOM`, `DESCRIPTION`, `CATEGORIE`) VALUES
(1, '@girondins', 'rugby bordeaux', 'Sport'),
(2, '@lionsbordeaux', 'rugby bordeaux', 'Sport'),
(3, '@boxersbordeaux ', 'rugby bordeaux', 'Sport'),
(4, '@UBBrugby', 'rugby bordeaux', 'Sport'),
(5, '@Bordeaux', '', 'Information'),
(6, '@tbc', '', 'Information'),
(7, '@ActuBordeaux', '', 'Information'),
(8, '@RTL2_Bordeaux', '', 'Information'),
(9, '@alainjuppe', '', 'Information'),
(10, '@Bordeauxgazette', '', 'Information'),
(11, '@univbordeaux', '', 'Information'),
(12, '@acbordeaux', '', 'Information'),
(13, '@BDX_Culture', '', 'Information'),
(14, '@BordeauxLive', '', 'Information'),
(15, '@TURBOMECA', '', 'Entreprise'),
(16, '@BordeauxEmploi', '', 'Entreprise'),
(17, '@BxGames', '', 'Entreprise'),
(18, '@SWBordeaux', '', 'Entreprise'),
(19, '@MDEBORDEAUX', '', 'Entreprise'),
(20, '@bxnode', '', 'Entreprise'),
(21, '@alienornet', '', 'Entreprise'),
(22, '@ALVEA_Services', '', 'Entreprise'),
(23, '@VinsdeBordeaux', '', 'Economie'),
(24, '@autour2Bordeaux', '', 'Sortie'),
(25, '@METBordeaux', '', 'Sortie'),
(26, '@rubybdx', '', 'Sortie'),
(27, '@PoleDanceBdx', '', 'Sortie'),
(28, '@PontTournant', '', 'Sortie');

CREATE TABLE IF NOT EXISTS `user` (
  `U_ID` int(5) NOT NULL,
  `U_NOM` varchar(25) NOT NULL,
  `U_PRE` varchar(25) NOT NULL,
  `U_CT` varchar(25) NOT NULL,
  `U_PTS` int(5) NOT NULL,
  PRIMARY KEY (`U_ID`),
  UNIQUE KEY `U_CT` (`U_CT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
	
	$dbh->query($requete);
?>