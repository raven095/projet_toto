-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Mai 2016 à 08:55
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `cit_id` int(10) UNSIGNED NOT NULL,
  `cou_id` int(10) UNSIGNED NOT NULL,
  `cit_name` varchar(128) DEFAULT NULL,
  `cit_inserted` datetime DEFAULT NULL,
  `cit_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`cit_id`, `cou_id`, `cit_name`, `cit_inserted`, `cit_updated`) VALUES
(1, 2, 'Luxembourg', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(2, 1, 'Longwy', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(3, 2, 'Esch-sur-Alzette', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(4, 1, 'Verdun', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(5, 3, 'Arlon', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(6, 2, 'Leudelange', '2016-05-06 00:00:00', '2016-05-06 00:00:00'),
(7, 0, 'Pissange', NULL, NULL),
(8, 0, 'Metz', NULL, NULL),
(9, 0, 'Bruxelles', NULL, NULL),
(10, 2, 'Rodange', NULL, NULL),
(11, 2, 'Petange', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `cou_id` int(10) UNSIGNED NOT NULL,
  `cou_name` varchar(80) DEFAULT NULL,
  `cou_inserted` datetime DEFAULT NULL,
  `cou_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`cou_id`, `cou_name`, `cou_inserted`, `cou_updated`) VALUES
(1, 'France', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(2, 'Luxembourg', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(3, 'Belgique', '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(4, 'chine', '2016-05-06 14:28:06', '2016-05-06 14:28:06'),
(6, 'Allemagne', '2016-05-09 11:21:38', '2016-05-09 11:21:38');

-- --------------------------------------------------------

--
-- Structure de la table `marital_status`
--

CREATE TABLE `marital_status` (
  `mar_id` int(10) UNSIGNED NOT NULL,
  `mar_name` varchar(20) DEFAULT NULL,
  `mar_inserted` datetime DEFAULT NULL,
  `mar_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marital_status`
--

INSERT INTO `marital_status` (`mar_id`, `mar_name`, `mar_inserted`, `mar_updated`) VALUES
(1, 'Célibataire', NULL, NULL),
(2, 'Marié', NULL, NULL),
(3, 'Divorcé', NULL, NULL),
(4, 'Veuf/veuve', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ses_id` int(10) UNSIGNED NOT NULL,
  `tra_id` int(10) UNSIGNED NOT NULL,
  `ses_opening` date DEFAULT NULL,
  `ses_ending` date DEFAULT NULL,
  `ses_nb_students` tinyint(3) UNSIGNED DEFAULT NULL,
  `ses_nb_trainers` tinyint(3) UNSIGNED DEFAULT NULL,
  `ses_inserted` datetime DEFAULT NULL,
  `ses_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`ses_id`, `tra_id`, `ses_opening`, `ses_ending`, `ses_nb_students`, `ses_nb_trainers`, `ses_inserted`, `ses_updated`) VALUES
(1, 1, '2015-11-30', '2016-03-29', 17, 4, '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(2, 1, '2016-04-04', '2016-07-29', 18, 4, '2016-05-04 00:00:00', '2016-05-04 00:00:00'),
(3, 1, '2016-09-05', '2016-12-30', 18, 4, '2016-05-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `mar_id` int(10) UNSIGNED NOT NULL,
  `cit_id` int(10) UNSIGNED NOT NULL,
  `cou_id` int(10) UNSIGNED NOT NULL,
  `ses_id` int(10) UNSIGNED NOT NULL,
  `stu_name` varchar(80) DEFAULT NULL,
  `stu_firstname` varchar(40) DEFAULT NULL,
  `stu_birthdate` date DEFAULT NULL,
  `stu_email` varchar(255) DEFAULT NULL,
  `stu_sex` char(1) DEFAULT NULL,
  `stu_with_experience` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `stu_is_leader` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `stu_inserted` datetime DEFAULT NULL,
  `stu_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `student`
--

INSERT INTO `student` (`stu_id`, `mar_id`, `cit_id`, `cou_id`, `ses_id`, `stu_name`, `stu_firstname`, `stu_birthdate`, `stu_email`, `stu_sex`, `stu_with_experience`, `stu_is_leader`, `stu_inserted`, `stu_updated`) VALUES
(1, 1, 1, 1, 1, 'KAPP', 'Jerry', '1990-12-01', 'toto@toto.fr', 'M', 1, 0, '2016-05-04 00:00:00', '2016-05-06 14:37:41'),
(2, 2, 1, 2, 2, 'CAVRO', 'Michel', '1969-05-02', 'michel.cavro@toto.fr', 'M', 0, 1, '2016-05-04 00:00:00', '2016-05-06 14:35:11'),
(3, 2, 1, 2, 2, 'SCHUMTZ', 'Anne', '1978-05-03', 'anne.truc@toto.fr', 'F', 1, 0, '2016-05-04 00:00:00', '2016-05-06 14:35:11'),
(4, 2, 2, 1, 2, 'rolland', 'Marie', '1980-07-22', 'marie.rolland@toto.fr', 'F', 0, 0, '2016-05-09 09:31:43', '2016-05-06 14:35:11'),
(5, 2, 5, 2, 2, 'WAGEMANS', 'Charlotte', '1990-02-07', 'chacha@toto.fr', 'F', 0, 0, '2016-05-04 00:00:00', '2016-05-06 14:37:41'),
(6, 2, 2, 1, 2, 'tasch', 'Philippe', '2015-04-01', 'fifi@toto.fr', 'M', 1, 0, '2016-05-09 09:31:43', '2016-05-06 14:37:41'),
(7, 2, 1, 2, 2, 'LABIDI', 'Mondher', '1978-01-20', 'apolearn@labidi.lu', 'M', 0, 0, '2016-05-09 09:31:43', '2016-05-06 14:35:11'),
(8, 1, 6, 2, 2, 'REUTER', 'Marc', '1985-05-29', 'marc@reuters.com', 'M', 1, 0, '2016-05-09 09:31:43', '2016-05-06 14:35:11'),
(9, 1, 2, 1, 1, 'deltgen', 'David', '1980-05-20', 'david@deltgen.fr', 'M', 1, 0, '2016-05-04 00:00:00', '2016-05-06 14:35:11'),
(10, 1, 1, 1, 2, 'DESWARTE', 'Fabrice', '1982-07-08', 'fab@toto.fr', 'M', 1, 0, '2016-05-06 00:00:00', '2016-05-06 14:35:11'),
(11, 3, 2, 2, 3, 'Ramos', 'Patrick', '2016-05-12', 'ramos@wf3.com', '1', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(64) DEFAULT NULL,
  `sub_duration` tinyint(3) UNSIGNED DEFAULT NULL,
  `sub_inserted` datetime DEFAULT NULL,
  `sub_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `training`
--

CREATE TABLE `training` (
  `tra_id` int(10) UNSIGNED NOT NULL,
  `tra_name` varchar(128) DEFAULT NULL,
  `tra_location` varchar(128) DEFAULT NULL,
  `tra_room` varchar(32) DEFAULT NULL,
  `tra_inserted` datetime DEFAULT NULL,
  `tra_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `training`
--

INSERT INTO `training` (`tra_id`, `tra_name`, `tra_location`, `tra_room`, `tra_inserted`, `tra_updated`) VALUES
(1, 'Formation WebForce3 / Fit4Coding', 'Technoport Esch/Belval', 'Red Bridge', '2016-05-04 00:00:00', '2016-05-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `training_has_subject`
--

CREATE TABLE `training_has_subject` (
  `tra_id` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cit_id`),
  ADD KEY `city_FKIndex1` (`cou_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cou_id`);

--
-- Index pour la table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`mar_id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ses_id`),
  ADD KEY `session_FKIndex2` (`tra_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `student_FKIndex1` (`ses_id`),
  ADD KEY `student_FKIndex2` (`cou_id`),
  ADD KEY `student_FKIndex3` (`cit_id`),
  ADD KEY `student_FKIndex4` (`mar_id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Index pour la table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`tra_id`);

--
-- Index pour la table `training_has_subject`
--
ALTER TABLE `training_has_subject`
  ADD PRIMARY KEY (`tra_id`,`sub_id`),
  ADD KEY `training_has_subject_FKIndex1` (`tra_id`),
  ADD KEY `training_has_subject_FKIndex2` (`sub_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `cit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `cou_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `mar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ses_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `training`
--
ALTER TABLE `training`
  MODIFY `tra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
