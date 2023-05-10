-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 10 mai 2023 à 13:53
-- Version du serveur : 10.5.12-MariaDB-0+deb11u1
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zfl2-zle_braer_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_actualite_act`
--

CREATE TABLE `t_actualite_act` (
  `act_id` int(11) NOT NULL,
  `act_titre` varchar(100) NOT NULL,
  `act_texte` varchar(500) NOT NULL,
  `act_date` date NOT NULL,
  `act_etat` char(1) NOT NULL,
  `cpt_pseudo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_actualite_act`
--

INSERT INTO `t_actualite_act` (`act_id`, `act_titre`, `act_texte`, `act_date`, `act_etat`, `cpt_pseudo`) VALUES
(8, 'Competition cadets', 'Les compétitions de course à pied sont l\'occasion idéale pour les coureurs cadets de se mesurer à leurs pairs et de prouver leur détermination et leur endurance. C\'est pourquoi nous sommes heureux d\'annoncer notre prochaine compétition de course à pied pour les cadets !', '2022-12-11', 'P', 'f_jodion@gmail.com'),
(9, 'Nouvelle année 2023', 'En cette nouvelle année 2023, recevez tous nos voeux de bonheur, de santé et de réussite. Que l\'année qui commence soit pleine de joie et de sérénité.', '2023-01-01', 'P', 'bernard_LN@gmail.com'),
(10, 'UTMB', 'L\'UTMB à été déplacé d\'une semaine, voir leurs sites web pour des informations suplémentaires.', '2022-05-02', 'P', 'emmanuel_menard45@gmail.com'),
(11, 'Nouveau inscrit', 'Ce mois ci les inscriptions ont été nombreuses, bienvenue à tous !', '2022-03-11', 'P', 'bernard_LN@gmail.com'),
(12, '10 ans du club', 'Une réunion est prévue pour les 10 ans.', '2022-09-18', 'P', 'emmanuel_menard45@gmail.com'),
(13, 'Merci!', 'Bravo pour l\'organisation de la course de notre club qui a été un succès.', '2022-11-15', 'P', 'bernard_LN@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `t_animation_an`
--

CREATE TABLE `t_animation_an` (
  `cpt_pseudo` varchar(200) NOT NULL,
  `pad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_animation_an`
--

INSERT INTO `t_animation_an` (`cpt_pseudo`, `pad_id`) VALUES
('anton@orange.fr', 1),
('bernard_LN@gmail.com', 1),
('emmanuel_menard45@gmail.com', 2),
('SybilaJ@gmail.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_atelier_at`
--

CREATE TABLE `t_atelier_at` (
  `at_id` int(11) NOT NULL,
  `at_intitule` varchar(100) NOT NULL,
  `at_date` date NOT NULL,
  `at_texte` varchar(500) NOT NULL,
  `at_etat` char(1) NOT NULL,
  `pad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_atelier_at`
--

INSERT INTO `t_atelier_at` (`at_id`, `at_intitule`, `at_date`, `at_texte`, `at_etat`, `pad_id`) VALUES
(2, 'Endurance fondamentale', '2022-08-01', 'L\'endurance fondamentale se définit comme courir lentement, sans effort, sans essoufflement, en aisance respiratoire, en total contrôle de son rythme. La fréquence cardiaque reste basse, inférieure à 75% de la Fréquence Cardiaque Maximale (FCM)', 'P', 1),
(3, 'Entrainement débutant', '2022-08-01', 'L\'activité entrainement débutant est faite pour les personnes voulant débuter ou reprendre la course à pied.', 'P', 1),
(4, 'Fartlek', '2022-09-12', 'Le fartlek une méthode d\'entraînement en fractionné beaucoup moins rigide et normée qui se déroule en milieu naturel sur des terrains et reliefs variés (terre, pierrier, boue, côte, pente). La durée de la fraction peut se faire soit au temps soit avec à des repères visuels (franchissement d\'un coté , de deux bosses ou d\'un champ)', 'P', 2),
(5, 'Renforcement musculaire', '2022-09-12', 'Le trail étant une activité traumatisante(choc répété, descente, terrain accidenté), le renforcement musculaire permet de limiter les blessures.', 'P', 2),
(7, 'Entraînement demi-fond', '2022-10-15', 'Les entraînements de demi-fond sont des entrainments de courte durée à forte intensité.', 'P', 3),
(8, 'Steeple', '2022-10-15', ' le steeple est une course de demi-fond avec obstacles(barrière, rivière).', 'P', 3),
(9, 'Compétition demi-fond', '2022-10-15', 'Entrainement et meeting de demi-fond.', 'P', 3),
(19, 'Entraînement en côte', '2022-09-12', 'Les séances de côte font travailler la force, la foulée et le cardio.', 'P', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(200) NOT NULL,
  `cpt_mot_de_passe` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_de_passe`) VALUES
('anton@orange.fr', 'f18f33e6dcce1424d95576c865e1c542'),
('bernard_LN@gmail.com', 'c2a04a8865960c7ae461cdc5ec7795b4'),
('Camille_R@orange.fr', '4f224227463f8d8a3d49bbee816cc25a'),
('contact.responsable@bcap.fr', 'c42e7b6fab5710120033b28db3ce0fac'),
('emmanuel_menard45@gmail.com', '0a8e84640679bde5cf271f06cba0da62'),
('f_jodion@gmail.com', '21c132b307467c4858953e719da84aeb'),
('paige_barteaux@orange.fr', 'aa21975e4af9e61a0127b5dc69981b40'),
('SybilaJ@gmail.com', '81f2ea2842a0d90d824b498d4ba6baf2'),
('vm455@fr', '686c821a80914aef822465b48019cd34'),
('vm@vm.fr', '686c821a80914aef822465b48019cd34'),
('yve@gmail.com', '9f8db03929bb854c738ffcb151fc78ba');

-- --------------------------------------------------------

--
-- Structure de la table `t_configuration_conf`
--

CREATE TABLE `t_configuration_conf` (
  `conf_id` int(11) NOT NULL,
  `conf_nom` varchar(60) NOT NULL,
  `conf_description` varchar(500) NOT NULL,
  `conf_mot` varchar(500) NOT NULL,
  `conf_adresse_postale` varchar(150) NOT NULL,
  `conf_mail` varchar(200) NOT NULL,
  `conf_numero_telephone` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_configuration_conf`
--

INSERT INTO `t_configuration_conf` (`conf_id`, `conf_nom`, `conf_description`, `conf_mot`, `conf_adresse_postale`, `conf_mail`, `conf_numero_telephone`) VALUES
(2, 'Course à pied Brest', 'L\'association accueille tous les coureurs sans distinction d\'âge et de niveau, du débutant au coureur confirmé. Des groupes de différents niveaux se feront naturellement. Hommes, femmes, jeunes, moins jeunes, rapides, moins rapides, chacun peut trouver sa place. Il y a de nombreux entrainements adaptés aux différentes pratiques de la course À pied, allant du demi-fond au trail.', 'L\'association sportive BACP transmet des valeurs sportives et humanistes depuis plus de 20 ans dans une ambiance conviviale. Ces valeurs sont celles de la performance, individuelle ou collective, en amenant chacune et chacun à son meilleur niveau, mais aussi celles de l’épanouissement et du respect. Le club développe également l’activité Athlé loisir dont le but n’est pas la performance mais la santé et le bien-être. Alors, n‘attendez plus, rejoignez-nous !', '7 rue des Fleurs 29019 Brest', 'contact.responsable@cap_brest.fr', '033219257845');

-- --------------------------------------------------------

--
-- Structure de la table `t_pad_pad`
--

CREATE TABLE `t_pad_pad` (
  `pad_id` int(11) NOT NULL,
  `pad_code` char(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pad_intitule` varchar(100) NOT NULL,
  `pad_date` date NOT NULL,
  `pad_description` varchar(500) NOT NULL,
  `pad_fichier_image` varchar(300) NOT NULL,
  `pad_etat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_pad_pad`
--

INSERT INTO `t_pad_pad` (`pad_id`, `pad_code`, `pad_intitule`, `pad_date`, `pad_description`, `pad_fichier_image`, `pad_etat`) VALUES
(1, 'XXDRx83ac5z37fU', 'Course sur route', '2022-08-01', 'La course sur route est un ensemble de disciplines de l\'athlétisme, faisant partie de la catégorie des courses hors-stade. Il s\'agit de courses de fond ou d\'ultrafond, du 5km au marathon.', 'images/cap7.jpg', 'P'),
(2, 'fxM2G532jqMN4Fm', 'Trail', '2022-09-03', 'Le trail consiste à avaler les dénivelés de sentiers en courant, sur des terrains variés et des distances plus ou moins longues', 'images/cap3.jpg', 'P'),
(3, 'F45jcu37S4ZiADs', 'Demi-fond', '2022-09-15', 'Les courses de demi-fond sont des épreuves d\'athlétisme d\'une distance comprise entre 800 et 3 000 mètres. Plus longues que les sprints et plus courtes que les courses de fond, ces courses sont comprises entre 800 et 3000m', 'images/cap2.jpg', 'P'),
(5, '///////////////', '/', '2023-03-19', '/', 'images/under_construction.jpg', 'P'),
(6, '///////////////', '/', '2023-03-19', '/', 'images/under_construction.jpg', 'C'),
(7, '///////////////', '/', '2023-03-19', '/', 'images/under_construction.jpg', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `pfl_prenom` varchar(60) NOT NULL,
  `pfl_nom` varchar(60) NOT NULL,
  `pfl_validite` char(1) NOT NULL,
  `pfl_role` char(1) NOT NULL,
  `pfl_date_creation` date NOT NULL,
  `cpt_pseudo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_prenom`, `pfl_nom`, `pfl_validite`, `pfl_role`, `pfl_date_creation`, `cpt_pseudo`) VALUES
('Anton', 'Quinn', 'A', 'A', '2023-02-02', 'anton@orange.fr'),
('Bernard', 'Le Normand', 'A', 'A', '0202-01-02', 'Bernard_LN@gmail.com'),
('Camille', 'Riou', 'A', 'A', '2022-12-14', 'Camille_R@orange.fr'),
('Erwan', 'Le Bras', 'A', 'R', '2023-04-09', 'contact.responsable@bcap.fr'),
('Emmanuel', 'Ménard', 'A', 'A', '2022-09-18', 'emmanuel_menard45@gmail.com'),
('Françoise', 'Jodion', 'A', 'R', '2022-05-05', 'f_jodion@gmail.com'),
('Paige', 'Barteaux', 'A', 'R', '2022-01-24', 'paige_barteaux@orange.fr'),
('Sibyla', 'Jardine', 'A', 'A', '2023-01-15', 'SybilaJ@gmail.com'),
('vm455', 'O\'brady', 'A', 'A', '2023-04-12', 'vm455@fr'),
('vm', 'l\'hir', 'D', 'A', '2023-03-31', 'vm@vm.fr'),
('yve\'', 'yve\'', 'A', 'A', '2023-03-17', 'yve@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `t_ressource_rsc`
--

CREATE TABLE `t_ressource_rsc` (
  `rsc_id` int(11) NOT NULL,
  `rsc_titre` varchar(100) NOT NULL,
  `rsc_descriptif` varchar(500) NOT NULL,
  `rsc_type` tinyint(4) NOT NULL,
  `rsc_chemin` varchar(300) NOT NULL,
  `at_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_ressource_rsc`
--

INSERT INTO `t_ressource_rsc` (`rsc_id`, `rsc_titre`, `rsc_descriptif`, `rsc_type`, `rsc_chemin`, `at_id`) VALUES
(4, 'Endurance fondamental', 'PDF sur le concept de l\'endurance fondamentale et son importance', 3, 'http://www.ajpc-chaumont.fr/wp-content/uploads/2011/10/Lendurance-fondamentale.pdf', 2),
(5, 'Endurance fondamental 1er parcours', 'Parcours d\'endurance fondamental de 11km', 1, 'images/ef_parcours_1.jpg', 2),
(6, 'Endurance fondamental 2ème parcours', 'Parcours d\'endurance fondamental de 7km', 1, 'images/ef_parcours_2.jpg', 2),
(7, 'Débutant en course à pied initiation', 'Présentation de la course à pied, initiation entrainement', 2, 'images/cap_debutant.pdf', 3),
(8, 'Débutant photo', 'photo de groupe pour la première séance', 1, 'images/d_photo.jpg', 3),
(9, 'Débutant importance de la progressivité', 'Respecter le principe de progressivité, c\'est respecter le rythme de son corps, diminuer fortement les risques de blessures', 2, 'https://42km195.fr/le-principe-de-progressivite-en-course-a-pied/#:~:text=Respecter%20le%20principe%20de%20progressivit%C3%A9,courir%20durant%20de%20nombreuses%20ann%C3%A9es.', 3),
(10, 'Fartlek', 'Présentation du concepte de fartlek.', 2, 'https://www2.u-trail.com/tour-savoir-sur-le-fartlek/', 4),
(11, 'Fartlek 1er parcours', '1er parcours d\'entrainement fartlek', 1, 'images/f_parcours_1.jpg', 4),
(12, 'Fartlek 2ème parcours', '2ème parcours d\'entrainement fartlek', 1, 'images/f_parcours_2.jpg', 4),
(13, 'Renforcement musculaire présentation', 'Présentation de l\'importance du renforcement musculaire pour le trail', 3, 'http://acraon.e-monsite.com/medias/files/trail-quel-renforcement-musculaire.pdf', 5),
(14, 'Renforcement musculaire plan', 'Exercice de renforcement musculaire et planification.', 2, 'https://toutpourmasante.fr/renforcement-musculaire-trail-running/', 5),
(15, 'Renforcement musculaire graphique blessure', 'Etude sur les blessures et le renforcement musculaire', 3, 'images/trail_renforcement_musculaire.pdf', 5),
(19, 'Demi-fond presentation', 'slide sur la presentation demi-fond', 3, 'https://slideplayer.fr/slide/514171', 7),
(20, 'Demi-fond entrainement 1', 'plan entrainement 3000m', 1, 'images/demi_fond_plan_1.pdf', 7),
(21, 'Demi-fond entrainement 2', 'plan entrainement 800m', 1, 'images/demi_fond_plan_2.pdf', 7),
(22, 'Passage de barrière et rivière', 'Tutoriel de passage d\'une barrière et d\'une rivière.', 4, 'https://youtu.be/-hjq6YVLE3s', 8),
(23, 'Entrainement steeple', 'Plan d\'entrainement steeple', 1, 'images/steeple_plan.pdf', 8),
(24, 'Steeple photo 1', 'Steeple photo de groupe', 1, 'images/steeple_photo_1.jpg', 8),
(25, 'Photo groupe compétition', 'Photo de groupe sur le lieu de la compétiton à landerneau', 1, 'images/competition_photo_1', 9),
(26, 'séance avant compétition', 'fichier contenant des séances a éffectuer avant une compétition.', 3, 'images/seance_av_competition_1.pdf', 9),
(27, 'Participant meeting du 08-01-2023', 'Liste des participants du meeting de demi-fond du 08-01-2023', 1, 'images/liste_meeting_2023-01-08.jpg', 9),
(31, 'Etude entrainement en côte', 'Etude sur les bénéfices de l\'entrainements en côte', 3, 'rsc/fichier/etude_côte.pdf', 19),
(32, 'Côte répertorier', 'les côtes répertorié dans le coin.', 3, 'rsc/fichier/liste_côte.gpx', 19),
(33, 'Photo de groupe', 'Photo de groupe après une séance de côte.', 1, 'rsc/image/seance_cote_photo_1.jpg', 19);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `FK_cpt_pseudo_act_cpt` (`cpt_pseudo`);

--
-- Index pour la table `t_animation_an`
--
ALTER TABLE `t_animation_an`
  ADD PRIMARY KEY (`cpt_pseudo`,`pad_id`),
  ADD KEY `FK_t_pad_an_pad` (`pad_id`);

--
-- Index pour la table `t_atelier_at`
--
ALTER TABLE `t_atelier_at`
  ADD PRIMARY KEY (`at_id`),
  ADD KEY `FK_pad_id_at_pad` (`pad_id`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_configuration_conf`
--
ALTER TABLE `t_configuration_conf`
  ADD PRIMARY KEY (`conf_id`);

--
-- Index pour la table `t_pad_pad`
--
ALTER TABLE `t_pad_pad`
  ADD PRIMARY KEY (`pad_id`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  ADD PRIMARY KEY (`rsc_id`),
  ADD KEY `FK_at_id_rsc_at` (`at_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_atelier_at`
--
ALTER TABLE `t_atelier_at`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `t_configuration_conf`
--
ALTER TABLE `t_configuration_conf`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_pad_pad`
--
ALTER TABLE `t_pad_pad`
  MODIFY `pad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  MODIFY `rsc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD CONSTRAINT `FK_cpt_pseudo_act_cpt` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_animation_an`
--
ALTER TABLE `t_animation_an`
  ADD CONSTRAINT `FK_cpt_pseudo_an_cpt` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`),
  ADD CONSTRAINT `FK_t_pad_an_pad` FOREIGN KEY (`pad_id`) REFERENCES `t_pad_pad` (`pad_id`);

--
-- Contraintes pour la table `t_atelier_at`
--
ALTER TABLE `t_atelier_at`
  ADD CONSTRAINT `FK_pad_id_at_pad` FOREIGN KEY (`pad_id`) REFERENCES `t_pad_pad` (`pad_id`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `FK_cpt_pseudo_pfl_cpt` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  ADD CONSTRAINT `FK_at_id_rsc_at` FOREIGN KEY (`at_id`) REFERENCES `t_atelier_at` (`at_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
