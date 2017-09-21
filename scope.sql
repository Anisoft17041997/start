-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Septembre 2017 à 12:58
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `scope`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `pseudo`, `mdp`) VALUES
(1, 'scope', 'scopescope', 'scope@lafricainedarchitecture.com', 'scope', '999scope999'),
(2, 'AGBONON EDAGBEDJI', 'Yao Anicet', 'lanicet17@gmail.com', 'Anisoft', 'anicet17');

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE `forum_reponses` (
  `ID` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL,
  `correspondance_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `forum_sujets` (
  `ID` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `date_de_poster` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(20) NOT NULL,
  `date_profile` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `U_num` varchar(5) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(12) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nb_kit` int(11) NOT NULL DEFAULT '0',
  `isUser` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `U_num`, `nom`, `prenom`, `pseudo`, `mdp`, `email`, `telephone`, `sexe`, `quartier`, `date_inscription`, `nb_kit`, `isUser`) VALUES
(2, 'U_0', 'AGBONON EDAGBEDJI', 'Yao Anicet', 'Anisoft', 'f7b1dbc2f64402c077344578e68e6d140453bfff', 'lanicet17@gmail.com', '93121675', 'Homme', 'Colas', '2017-09-14 16:38:31', 17, 1),
(8, 'U_1', 'TOTOGAN', 'tata123', 'toto123', '9bb7fb7e7c6e094d00a0031247dee9e70416728d', 'totogan@gmail.com', '98765432', 'Homme', 'totoville', '2017-09-15 12:06:59', 2, 1),
(11, '', '', '', 'sarah', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '', '90887766', '', '', '2017-09-14 17:27:57', 0, 0),
(12, '', '', '', 'coco124', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '', '98725139', '', '', '2017-09-14 17:29:59', 0, 0),
(13, 'U_n', 'TATA', 'tata', 'tata123', '526e6bc36f1b7e82d7bd2d1825fa0deed521e0a1', 'tata@gmail.com', '98765432', 'Homme', 'Klala', '2017-09-18 09:18:19', 4, 1),
(14, '', '', '', 'firmine', '0005474501c70d977655745e72fec6a55b0b133c', 'firmine@gmail.com', '98765432', '', '', '2017-09-15 16:24:32', 0, 0),
(15, '', '', '', 'kodjo', '740204bf1ab09e87a7a0a79dec710b5e949629ff', 'kodjogan@gmail.com', '98765432', '', '', '2017-09-15 16:27:05', 0, 0),
(16, '', '', '', 'husfqdesfef', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'sjzefzerf@gmail.com', '757564646', '', '', '2017-09-15 16:29:38', 0, 0),
(17, '', '', '', 'John123', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'john@gmail.com', '90876543', '', '', '2017-09-18 09:19:09', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
