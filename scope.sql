-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Novembre 2017 à 15:36
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
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `email`, `content`) VALUES
(1, 'Anisoft', 'lanicet17@gmail.com', 'test de commentaire pour la plate forme de scope'),
(2, 'Sename', 'sename@lafricainedarchitecture.com', 'Moi SÃ©namÃ© AGBODJINOU, je teste pour la premiÃ¨re fois le formulaire de commentaire de la plateforme de scope');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connectes`
--

CREATE TABLE `connectes` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `connectes`
--

INSERT INTO `connectes` (`ip`, `timestamp`) VALUES
('12', 0);

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
(2, '', 'comment creer un site web?', '2017-03-21 18:15:52', 2),
(5, '', 'mon premier test du forum', '2017-10-20 23:32:22', 5);

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
(2, 'roland', 'site', 'comment creer un site web?', '2017-03-21 18:15:52'),
(5, '', 'test', 'mon premier test du forum', '2017-10-20 23:32:22');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `new_pp` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `new_pp`, `title`, `content`, `timestamp`) VALUES
(1, 'IMG_20171007_135517.jpg', 'Lancement du club IOT au Benin', 'Le groupe IOT du WoeLabs s''est rendu Le 07 Octobre 2017 dernier au BÃ©nin pour le lancement du club IOT Club BÃ©nin Ã  BloLab. L''accueil a Ã©tÃ© chaleureuse et la cÃ©rÃ©monie a Ã©tÃ© un vrai succÃ¨s. Tous les participants ce sont donnÃ©s Ã  la chose, une preuve sur l''image ci-dessus. Rendez-vous le 04 DÃ©cembre 2017 en CÃ´te d''Ivoire pour le lancement de IOT Club CÃ´te d''Ivoire Ã  BabyLab.', 0),
(2, '210617-kalanick-uber-m.jpg', 'Parlons d''UBER', 'La plateforme d''UBER malgrÃ¨s les nombreux critiques, continu son aventure dans le monde de l''Uberisation', 1511619353);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `U_num` varchar(5) NOT NULL DEFAULT 'U_n',
  `nom` varchar(60) CHARACTER SET utf8 NOT NULL,
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
(1, 'U_0', 'AGBODJINOU', 'SÃ©namÃ© Koffi', 'sename', '5d4cc4936f5e490e734bbcd70efc20054b74090f', 'sename@lafricainedarchitecture.com', '93540826', 'Homme', 'Klala', '2017-11-20 21:43:33', 4, 1, 'IMG_20171116_144808.jpg'),
(73, 'U_1', 'DIWA', 'Soulena', 'scusoulena', '5706001775deb5f110ef2a32b64709e3dba934a1', '', '91901402', 'Homme', 'AbovÃ©', '2017-09-29 10:36:41', 1, 1, 'default.png'),
(74, 'U_1''', 'LOUKI', 'Fabrice', 'scufabrice', '6f0712c9a364e133c992323bb9e79e97df29125a', '', '92082404', 'Homme', 'AbovÃ©', '2017-09-29 10:37:00', 2, 1, 'default.png'),
(75, 'U_2', 'TCHALLA', 'Charlotte', 'scutchallacharlotte', 'f2c649c7eede40a8c7252c2078425f58c2b6087b', '', '90492443', 'Femme', 'AbovÃ©', '2017-09-29 10:37:14', 2, 1, 'default.png'),
(76, 'U_3', 'SIM', 'Patchos', 'scupatchos', '31a807db2605caa0dec60d55fe23a5f2c7be13d6', '', '92775741', 'Homme', 'AbovÃ©', '2017-10-25 12:17:46', 0, 1, 'default.png'),
(77, 'U_4', 'ADAMOU', 'Mariam', 'scumariam', '6fd4b56c7436e3ae58a971d1f1894e9647fd0542', '', '91588934', 'Femme', 'AbovÃ©', '2017-11-06 10:15:24', 15, 1, 'default.png'),
(78, 'U_5', 'GGG', 'Kekeli', 'scukekeli1', '570fefa0ec8fd863038995e19418cf0a491e961e', '', '92682807', 'Homme', 'AbovÃ©', '2017-09-29 10:38:35', 4, 1, 'default.png'),
(79, 'U_6', 'AMOUZOU', 'Amouzou', 'scuamouzou1', '9ba28487eb27517951ce494cfed339a258eba342', '', '90318547', 'Femme', 'AbovÃ©', '2017-09-29 10:38:47', 8, 1, 'default.png'),
(80, 'U_7', 'POUBI', 'Abra', 'scuabra1', 'e3e63026f29f3c300387fcb391ee284da98dab8c', '', '92351049', 'Femme', 'AbovÃ©', '2017-09-29 10:39:03', 8, 1, 'default.png'),
(81, 'U_8', 'TAIROU', 'Tairou', 'scutairou', 'ddf1c411e8859ff494341961b3643b8f0c844bb9', '', '90241422', 'Femme', 'AbovÃ©', '2017-09-29 10:39:11', 3, 1, 'default.png'),
(82, 'U_9', 'ADADEVI', 'Corneille', 'scucorneille1', '528d28aca59bfb971cd973b3703627c0cbb92a51', '', '90037967', 'Homme', 'AbovÃ©', '2017-10-25 12:26:04', 0, 1, 'default.png'),
(83, 'U_10', 'MAMAN', 'Maurice', 'scumaurice', '3d604a2b8f927610e14d659572097dfce85589e4', '', '99273333', 'Femme', 'AbovÃ©', '2017-09-29 10:40:07', 1, 1, 'default.png'),
(84, 'U_10''', 'ADIZA', 'Adiza', 'scuadiza', '6ebe9f63c91dbaf876237a927ae9debbcad100be', '', '93203930', 'Homme', 'AbovÃ©', '2017-10-25 12:28:27', 0, 1, 'default.png'),
(85, 'U_11', 'ADENYO', 'Eli', 'scueli1', '52ee6649bfc7b219de1883d931d632e58286c047', '', '92175919', 'Homme', 'AbovÃ©', '2017-10-25 12:29:45', 0, 1, 'default.png'),
(86, 'U_11''', 'HOUNKPATI', 'Mawena', 'scumawena', '6a05dd010558ce26e58d4e64f902d1a45dbfa977', '', '91756809', 'Homme', 'AbovÃ©', '2017-11-06 11:53:44', 5, 1, 'default.png'),
(87, 'U_12', 'JACQUES', 'Jacques', 'scujacques1', '7cda0223a816f4e4d8ecb1c88228b16d5bb96254', '', '92658434', 'Homme', 'AbovÃ©', '2017-09-29 10:40:33', 3, 1, 'default.png'),
(88, 'U_12''', 'BAR', 'Lakaza', 'sculakaza', '3c4084e9c468933b0377e68aa5ffdb3a82820053', '', '90286340', 'Homme', 'AbovÃ©', '2017-10-25 12:33:57', 0, 1, 'default.png'),
(89, 'U_13', 'CYRILLE', 'Cyrille', 'scucyrille1', '242250f239aa28186382fdc313f86a3dfc2309e6', '', '90038280', 'Homme', 'AbovÃ©', '2017-09-29 10:40:39', 2, 1, 'default.png'),
(90, 'U_14', 'YACOUBA', 'Yacouba', 'scuyacouba', 'bf2a036f3064c854952917b503aa40bf9c515402', '', '92390338', 'Homme', 'AbovÃ©', '2017-09-29 10:40:56', 1, 1, 'default.png'),
(91, 'U_15', 'TATA', 'Justine', 'scujustine1', 'f0563cbc36a6c425b7007bd15434268988da81dd', '', '92331448', 'Femme', 'AbovÃ©', '2017-11-06 10:18:33', 20, 1, 'default.png'),
(92, 'U_16', 'MAMAN', 'Abigael', 'scuabigael1', '9967e3f8e968f73e32d583d8df349ff4049406bc', '', '92681325', 'Femme', 'AbovÃ©', '2017-09-29 10:41:16', 19, 1, 'default.png'),
(93, 'U_17', 'ROLAND', 'Roland', 'scuroland1', '389f83e7aabd44bf75827b71bbc306749e54ceda', '', '93190994', 'Homme', 'AbovÃ©', '2017-09-29 10:41:21', 11, 1, 'default.png'),
(94, 'U_19', 'BOUTORA', 'Boutora', 'scuboutora', '36b6ad5d72a0729649e347a4e80a33fbfa38ea55', '', '90697068', 'Homme', 'AbovÃ©', '2017-10-25 12:42:06', 0, 1, 'default.png'),
(96, 'U_21', 'PAULINE', 'Pauline', 'scupauline1', '3f3bc650c809e61725f5d346b7ac82a3c55d702f', '', '91784546', 'Femme', 'AbovÃ©', '2017-09-29 10:41:37', 1, 1, 'default.png'),
(97, 'U_22', 'APOUA', 'Apoua', 'scuapoua', 'f7a83f4b2369b3edcdbf334c7981b048fc3ac390', '', '91439901', 'Homme', 'AbovÃ©', '2017-10-25 12:46:44', 0, 1, 'default.png'),
(98, 'U_23', 'ESSE', 'Esse', 'scuesse1', '59e39bb766dc0a3ced447220143dca63cbaa064a', '', '98726320', 'Femme', 'AbovÃ©', '2017-11-06 10:29:20', 7, 1, 'default.png'),
(99, 'U_24', 'RACHIDA', 'Rachida', 'scurachida1', '90ef0151e0db4ed5475bf2650c6163fc5ea2ccbf', '', '97952493', 'Homme', 'AbovÃ©', '2017-11-06 10:30:45', 7, 1, 'default.png'),
(100, 'U_25', 'ROBERT', 'Robert', 'scurobert1', '2e5b9f62a42d9055194986a9716b37de7804ad0e', '', '90145452', 'Homme', 'AbovÃ©', '2017-09-29 10:42:00', 2, 1, 'default.png'),
(101, 'U_26', 'KARIMA', 'Assana', 'scuassana1', '342c92f2f9917ac84ce7e8c116830a82f80b0d91', '', '96160861', 'Homme', 'AbovÃ©', '2017-10-25 12:54:29', 0, 1, 'default.png'),
(102, 'U_27', 'RENE', 'Rene', 'scurene1', 'fa47c966e890c2b4a39e0d9a9d635a8892a78467', '', '92160861', 'Homme', 'AbovÃ©', '2017-09-29 10:42:10', 3, 1, 'default.png'),
(103, 'U_28', 'BOUKARI', 'Boukari', 'scuboukari', '072eddce3d8033de686e203bc5a9697fabce56ed', '', '92338541', 'Homme', 'AbovÃ©', '2017-11-06 10:34:19', 1, 1, 'default.png'),
(104, 'U_29', 'PELEI', 'Joel', 'scujoel1', '57fc1118b1d5fbdd59f516fcb24f520a80938604', '', '93015055', 'Homme', 'AbovÃ©', '2017-09-29 10:42:25', 1, 1, 'default.png'),
(105, 'U_30', 'KOFFA', 'Koffa', 'scukoffa1', '0c1c37cf0bfff60c01611add84ea35182d8c8948', '', '90303521', 'Homme', 'AbovÃ©', '2017-09-29 10:44:41', 0, 1, 'default.png'),
(106, 'U_31', 'PINDRA', 'Ya-hassida', 'scuyahassida', '1d72d13e91155317adc0a8e6a12741c97f5559aa', '', '92498793', 'Homme', 'AbovÃ©', '2017-09-29 10:43:55', 1, 1, 'default.png'),
(107, 'U_32', 'PAULINE', 'Pauline', 'scupauline2', '4cb3eb8433089d414c8177bb83f0a03faf026cbe', '', '93984755', 'Homme', 'AbovÃ©', '2017-09-29 10:42:39', 1, 1, 'default.png'),
(108, 'U_33', 'YAO', 'Yao', 'scuyao1', 'a3f3d9acb38fc5281d47570626423a51647f9872', '', '92515531', 'Homme', 'AbovÃ©', '2017-11-20 21:44:39', 0, 1, 'default.png'),
(109, 'U_35', 'KOUGBLENOU', 'Kossi', 'scukouglenou', '7a96f0e1273ca72255ae28079c25104c1f0bc479', '', '90000000', 'Homme', 'AbovÃ©', '2017-09-29 10:46:46', 6, 1, 'default.png'),
(110, 'U_34', 'TsitsopÃ©/Ketegou', 'TsitsopÃ©/Ketegou', 'scutsitshope', '59e410922777daa9ca5d00281d65eba638e9eb0f', '', '90089438', 'Femme', 'AbovÃ©', '2017-09-29 10:46:29', 2, 1, 'default.png'),
(111, 'U_36', 'GRACE', 'Grace', 'scugrace1', 'f1b2e156c13b7db8f285ba644bc94bc5e0fed5f9', '', '92404564', 'Homme', 'AbovÃ©', '2017-09-29 10:47:36', 2, 1, 'default.png'),
(112, 'U_37', 'KODJONO', 'Kodjono', 'scukodjono1', 'b81abb5a06558c054111df578ea4c491d5cfc28b', '', '91369391', 'Femme', 'AbovÃ©', '2017-09-29 10:47:41', 0, 1, 'default.png'),
(113, 'U_38', 'EL HADJ', 'El Hadj', 'scuelhadj', '70a820f29a33e52db4fa48f5563e6e5d5a1a535c', '', '93247925', 'Homme', 'AbovÃ©', '2017-09-29 10:47:47', 12, 1, 'default.png'),
(114, 'U_39', 'HETEGOU', 'Hetegou', 'scuhetegou', '0332f31813fbbd1a237bfc019cd90fe8262e0f07', '', '92882763', 'Homme', 'AbovÃ©', '2017-09-29 10:25:52', 0, 1, 'default.png'),
(115, 'U_40', 'ROSE', 'Rose', 'scurose1', 'ff7ad1f74eb9cd6558c4b999c1ae2b5a35dca3d2', '', '91930259', 'Femme', 'AbovÃ©', '2017-09-29 10:26:59', 0, 1, 'default.png'),
(116, 'U_41', 'DOETE', 'DoetÃ©', 'scudoete1', 'd6ec324d6454ed0944e63e21e6d0634e7353d2e1', '', '90230259', 'Femme', 'AbovÃ©', '2017-09-29 10:48:25', 0, 1, 'default.png'),
(117, 'U_42', 'DABOU', 'Dabou', 'scudabou', '2739eaa5a01c42cf090ba63192ca6a0f568ecd00', '', '92513683', 'Homme', 'AbovÃ©', '2017-09-29 10:48:38', 4, 1, 'default.png'),
(118, 'U_42''', 'TINA', 'Tina', 'scutina1', 'c55fa55390e8839598f285f7aeb683af698b2807', '', '99519675', 'Homme', 'AbovÃ©', '2017-11-06 10:36:45', 2, 1, 'default.png'),
(119, 'U_43', 'NADEGE', 'NadÃ¨ge', 'scunadege1', '3b2f588fa514a0daf47f92ca78970c68b615aec9', '', '91997603', 'Homme', 'AbovÃ©', '2017-11-06 10:37:20', 0, 1, 'default.png'),
(120, 'U_44', 'ADJO', 'Adjo', 'scuadjo1', '0bb8ff535efe745f62786fc2a0f30f9d1644322d', '', '90245440', 'Homme', 'AbovÃ©', '2017-11-06 10:37:45', 0, 1, 'default.png'),
(121, 'U_20', 'AKOSSIWA', 'Akossiwa', 'scuakossiwa', '28149170e53c978f77fcc8b3a7fc451143f26307', '', '98550830', 'Homme', ' AbovÃ©', '2017-11-06 10:25:52', 1, 1, 'default.png'),
(122, 'U_44''', 'AKAMA', 'DÃ©dÃ©', 'scudÃ©dÃ©', '015f6b600fbdfd42d86416c9aa77eef636a676bd', '', '93373177', 'Homme', 'AbovÃ©', '2017-11-06 10:40:50', 0, 1, 'default.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
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
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
