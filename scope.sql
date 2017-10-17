-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Octobre 2017 à 10:24
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
  `U_num` varchar(5) NOT NULL DEFAULT 'U_n',
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
  `isUser` int(1) NOT NULL DEFAULT '0',
  `pp` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `U_num`, `nom`, `prenom`, `pseudo`, `mdp`, `email`, `telephone`, `sexe`, `quartier`, `date_inscription`, `nb_kit`, `isUser`, `pp`) VALUES
(1, 'U_0', 'AGBODJINOU', 'SÃ©namÃ© Koffi', 'sename', '5d4cc4936f5e490e734bbcd70efc20054b74090f', 'sename@lafricainedarchitecture.com', '93540826', 'Homme', 'Klala', '2017-10-15 22:27:38', 10, 1, 'default.png'),
(2, '', '', '', 'soulena', '591641edc7b1351f2211c7dae18fae93edf240da', '', '90987654', '', '', '2017-09-21 13:57:34', 0, 0, 'default.png'),
(3, '', '', '', 'charlotte', '351429ca27f6e4bff2dbb77adb5046c88cd12fae', '', '90000000', '', '', '2017-09-21 13:58:44', 0, 0, 'default.png'),
(4, '', '', '', 'patchos', 'ecd27876f75658f2007de8bf66b4d13af1d5bf7d', '', '90000000', '', '', '2017-09-21 13:59:13', 0, 0, 'default.png'),
(5, '', '', '', 'adamou', '5b65ffc1b3609a34125fa8e48af8fe08828e2af7', '', '90000000', '', '', '2017-09-21 13:59:35', 0, 0, 'default.png'),
(6, '', '', '', 'kekeli', 'd8874072bd3039920affce029dbb67cdf0dd1775', '', '90000000', '', '', '2017-09-21 13:59:56', 0, 0, 'default.png'),
(7, '', '', '', 'amouzou', 'd15e9a8c8ee358261c166c65faeef96d685d40e9', '', '90000000', '', '', '2017-09-21 14:00:18', 0, 0, 'default.png'),
(8, '', '', '', 'poubiAbra', 'c687ecdfbc33bedd5ccaf541b726e2586b158037', '', '90000000', '', '', '2017-09-21 14:00:50', 0, 0, 'default.png'),
(9, '', '', '', 'tairou', '45dd90d9baa9c36644ec836eb239c0bc2d020dec', '', '90000000', '', '', '2017-09-21 14:01:16', 0, 0, 'default.png'),
(10, '', '', '', 'adadevi', '5ec3ac16f319b444bac25913638175b3cee4ec22', '', '90000000', '', '', '2017-09-21 14:02:22', 0, 0, 'default.png'),
(11, '', '', '', 'mmaurice', 'a8f4690d4a0a50a342d8017dd1a3e0731cb06bfc', '', '90000000', '', '', '2017-09-21 14:02:46', 0, 0, 'default.png'),
(12, '', '', '', 'uadiza', 'ea2a9b1d967f98044890b051ea5f6055611a5e11', '', '90000000', '', '', '2017-09-21 14:03:15', 0, 0, 'default.png'),
(13, '', '', '', 'adenyo', 'b66cbcbbf97f062eae487406a346824911076584', '', '90000000', '', '', '2017-09-21 14:03:45', 0, 0, 'default.png'),
(14, '', '', '', 'mawuena', 'b91a14eb2d390308908f1ec52280a32a4f20fd07', '', '90000000', '', '', '2017-09-21 14:05:00', 0, 0, 'default.png'),
(15, '', '', '', 'ujacques', 'e5280b8391af25c63cca36a4e07d8186e97b44c5', '', '90000000', '', '', '2017-09-21 14:05:33', 0, 0, 'default.png'),
(16, '', '', '', 'bLakaza', 'ca613e4a796d6670f20e8eee1887031a81eb425f', '', '90000000', '', '', '2017-09-21 14:06:22', 0, 0, 'default.png'),
(17, '', '', '', 'cyrille', 'b8b8a5a44de2e124f2128b362aa03cc874d90f3a', '', '90000000', '', '', '2017-09-21 14:06:55', 0, 0, 'default.png'),
(18, '', '', '', 'yacouba', 'e0adf13bc4e6b3ba457b988f97d9910e6c1e0f90', '', '90000000', '', '', '2017-09-21 14:07:13', 0, 0, 'default.png'),
(19, '', '', '', 'tjustine', '7bf0324f8436df16d02a1162077bd998eb115175', '', '90000000', '', '', '2017-09-21 14:07:38', 0, 0, 'default.png'),
(20, '', '', '', 'mAbigael', '2cd8b037a16a61567f73804b8a6a3b09786984ab', '', '90000000', '', '', '2017-09-21 14:08:10', 0, 0, 'default.png'),
(21, '', '', '', 'uRoland', 'b3822da95b54f914a57f72772a41dd8df178af54', '', '90000000', '', '', '2017-09-21 14:08:48', 0, 0, 'default.png'),
(22, '', '', '', 'boutora', 'e63fa62c814c8776b38b3f8a7f46a20663016eeb', '', '90000000', '', '', '2017-09-21 14:09:11', 0, 0, 'default.png'),
(23, '', '', '', 'uAkossiwa', '1db7a91cc48c251fb8e5ece69eb2a1f726c9d65e', '', '90000000', '', '', '2017-09-21 14:09:45', 0, 0, 'default.png'),
(24, '', '', '', 'uPauline', '76fb2d78a72026d79760a01901f4b6fc3ae5bafe', '', '90000000', '', '', '2017-09-21 14:10:04', 0, 0, 'default.png'),
(25, '', '', '', 'uApoua', '6ef20574442045976876b96e30baab88af23711b', '', '90000000', '', '', '2017-09-21 14:10:43', 0, 0, 'default.png'),
(26, '', '', '', 'uMEsse', '063867af0d4cd1b6dea547c999267af49fcfa381', '', '90000000', '', '', '2017-09-21 14:11:04', 0, 0, 'default.png'),
(27, '', '', '', 'rachida', 'a2e6e8a721bd21b05d3cd4b22149ca4055cba782', '', '90000000', '', '', '2017-09-21 14:11:22', 0, 0, 'default.png'),
(28, '', '', '', 'robert', '12e9293ec6b30c7fa8a0926af42807e929c1684f', '', '90000000', '', '', '2017-09-21 14:11:44', 0, 0, 'default.png'),
(29, '', '', '', 'karimaAssana', 'c8704e69113607495194656ac11ddcf1d7434657', '', '90000000', '', '', '2017-09-21 14:12:09', 0, 0, 'default.png'),
(30, '', '', '', 'uRene123', '57ba875dab35c71277f057cd0424345547ce505e', '', '90000000', '', '', '2017-09-21 14:12:43', 0, 0, 'default.png'),
(31, '', '', '', 'uBoukari', '79c7bc7554f3219ed7ae55ecb3153e73c4970517', '', '90000000', '', '', '2017-09-21 14:13:02', 0, 0, 'default.png'),
(32, '', '', '', 'pelieJoel', '6f44d4fd601234ad956d3f5c1b98660b399f0595', '', '90000000', '', '', '2017-09-21 14:13:23', 0, 0, 'default.png'),
(33, '', '', '', 'uKoffa', '2caea7516706905c26e89872da831bc37fd96dec', '', '90000000', '', '', '2017-09-21 14:13:47', 0, 0, 'default.png'),
(34, '', '', '', 'uPindra', '5ddd4e24788c47c0b9ed47bf06036a3ac701cd5a', '', '90000000', '', '', '2017-09-21 14:14:04', 0, 0, 'default.png'),
(35, '', '', '', 'u32Pauline', 'c561991f1c366cbc078e5a943caf644dd133087f', '', '90000000', '', '', '2017-09-21 14:15:00', 0, 0, 'default.png'),
(36, '', '', '', 'u33Yao', 'e087bdb6efd846cb4d4a67148e86e277c17a3bac', '', '90000000', '', '', '2017-09-21 14:15:23', 0, 0, 'default.png'),
(37, '', '', '', 'u34tsitsope', '357056399e1f6ca7d9a0cdbb720a539daa38f957', '', '90000000', '', '', '2017-09-21 14:15:59', 0, 0, 'default.png'),
(38, '', '', '', 'u35ougblenou', '8b530b8c6bc46f85845ff08b6e413adb25a70e9b', '', '90000000', '', '', '2017-09-21 14:16:27', 0, 0, 'default.png'),
(39, '', '', '', 'u36grace', '25c34eee14f540d657e3922fa4b9eb6a83edb92c', '', '90000000', '', '', '2017-09-21 14:16:48', 0, 0, 'default.png'),
(40, '', '', '', 'u37kodjono', '363bc205289cdb0111983591e31be223f1e3b32a', '', '90000000', '', '', '2017-09-21 14:17:10', 0, 0, 'default.png'),
(41, '', '', '', 'u38elHadj', '319c268ef72007e234d7921ff785257fe953be13', '', '90000000', '', '', '2017-09-21 14:17:37', 0, 0, 'default.png'),
(42, '', '', '', 'u39hetegou', '9cd9b20691668a5c8a05fc3ecc78839f094b70af', '', '90000000', '', '', '2017-09-21 14:18:05', 0, 0, 'default.png'),
(43, '', '', '', 'u40rose', 'e8959e8ec83d9880f6e706cd53985ae861d80f90', '', '90000000', '', '', '2017-09-21 14:18:25', 0, 0, 'default.png'),
(44, '', '', '', 'u41doete', '50d31abd9855823e9fef0eb4a44ba98ae955b441', '', '90000000', '', '', '2017-09-21 14:18:48', 0, 0, 'default.png'),
(45, '', '', '', 'u42dabou', '0ad551b45676ce194882bca3b6525b987921db58', '', '90000000', '', '', '2017-09-21 14:19:24', 0, 0, 'default.png'),
(46, '', '', '', 'u42''tina', 'da81c89c330a09ff979b5d955c25ef36d9038bef', '', '90000000', '', '', '2017-09-21 14:20:06', 0, 0, 'default.png'),
(47, '', '', '', 'u43nadege', 'ce1e8c84403d31829442f2c935970df26caabd51', '', '90000000', '', '', '2017-09-21 14:20:26', 0, 0, 'default.png'),
(48, '', '', '', 'u44adjo', '8f256e8dfb62f6e1b3c2e71c4122965a8332a357', '', '90000000', '', '', '2017-09-21 14:20:44', 0, 0, 'default.png'),
(49, '', '', '', 'u44''akamaDede', '2fc47eddef79e3e75c76b65d50a3d24f30f1f1bd', '', '90000000', '', '', '2017-09-21 14:21:10', 0, 0, 'default.png'),
(50, '', '', '', 'b0francoine', '297f227bd6ef3d19580fdaf978d6e5013335cbee', '', '90000000', '', '', '2017-09-21 14:43:46', 0, 0, 'default.png'),
(51, '', '', '', 'b1cindy', '5c54261bdece08a42ee98baddc3d8ee2104c96a5', '', '90000000', '', '', '2017-09-21 14:44:08', 0, 0, 'default.png'),
(52, '', '', '', 'b2chantale', 'f5d9afd75530e7d22b033adc75da0c8d030dd119', '', '90000000', '', '', '2017-09-21 14:44:30', 0, 0, 'default.png'),
(53, '', '', '', 'b3marie', 'e11f8bc9cdcd3201dfe2fcefa0e2e3fd7da4bd53', '', '90000000', '', '', '2017-09-21 14:44:59', 0, 0, 'default.png'),
(55, 'U_n', 'TRIUGERIU', 'ufehiu', 'b5folikoue', '4eba99a9731bf79ff0913b803ede7d9af51ea3b4', '', '90000000', 'Femme', 'lskofesoer', '2017-10-17 08:22:43', 0, 1, 'default.png'),
(56, 'U_1', 'BIDASSA', 'bidassa', 'b6bidassa', 'f1decc952727e6c424f5b083071ab9ca47076c50', 'bisassa@gmail.com', '91872666', 'Femme', 'AgoÃ¨', '2017-10-16 23:17:41', 6, 1, 'default.png'),
(57, 'U_2', 'TOTOGAN', 'tatavi', 'toto123', '9bb7fb7e7c6e094d00a0031247dee9e70416728d', 'toto@gmail.com', '98765327', 'Homme', 'totoville', '2017-10-15 22:27:43', 4, 1, 'default.png'),
(58, 'U_3', 'moi', 'encore moi', 'moi123', '421d4ba1a4f61ea28e4b693b273dc1eca6869b54', 'moi@gmail.com', '98675423', 'Femme', 'moiVillage', '2017-10-15 22:28:16', 4, 1, 'default.png'),
(59, 'U_4', 'elle', 'elle encore', 'elle123', 'bf60b373cea11662037bb36d4470c9df97c5b9c3', 'elle@gmail.com', '98765423', 'Homme', 'elleville', '2017-10-17 08:21:52', 0, 1, 'default.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
