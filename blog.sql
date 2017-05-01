-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Mars 2017 à 18:01
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
`id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
`id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE IF NOT EXISTS `forum_reponses` (
`ID` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL,
  `correspondance_sujet` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`ID`, `auteur`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(1, '', 'hhjckjclkc', '2017-03-21 18:14:56', 1),
(2, '', 'comment creer un site web?', '2017-03-21 18:15:52', 2),
(3, '', 'kjugykwde', '2017-03-21 18:18:19', 3),
(4, '', 'fghh', '2017-03-22 12:12:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

CREATE TABLE IF NOT EXISTS `forum_sujets` (
`ID` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `date_de_poster` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`ID`, `auteur`, `titre`, `message`, `date_de_poster`) VALUES
(1, 'roland', 'vooi', 'hhjckjclkc', '2017-03-21 18:14:56'),
(2, 'roland', 'site', 'comment creer un site web?', '2017-03-21 18:15:52'),
(3, 'roland', 'ijufd', 'kjugykwde', '2017-03-21 18:18:19'),
(4, 'roland', 'fg', 'fghh', '2017-03-22 12:12:00');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`ID` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(20) NOT NULL,
  `date_profile` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `profile`
--

INSERT INTO `profile` (`ID`, `pseudo`, `mot_de_passe`, `email`, `telephone`, `date_profile`) VALUES
(1, 'roland', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ketoglokomivi@gmail.com', 0, '0000-00-00 00:00:00'),
(11, 'verdo', '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', 'ketoglkomivi@gmail.com', 0, '0000-00-00 00:00:00'),
(33, 'ds', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'n@gmail.com', 0, '0000-00-00 00:00:00'),
(37, 'fg', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'njhu@gmail.com', 0, '0000-00-00 00:00:00'),
(38, 'rolandos', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'k@gmail.cokm', 0, '2017-03-23 09:41:27'),
(39, 'sa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jh@gmail.com', 98553064, '2017-03-23 10:01:34'),
(40, 'rfr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'x@gmail.com', 98553064, '2017-03-23 10:14:45'),
(41, 'th', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cv@gmail.com', 98553064, '2017-03-23 10:24:04');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`ID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `ID_profile` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `prenom`, `quartier`, `date_inscription`, `ID_profile`) VALUES
(1, 'hjhhd', 'komivi', 'agoe', '2017-03-23 10:16:54', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
