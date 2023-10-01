-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 sep. 2023 à 19:52
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_de_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `nom_etat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nom_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`nom_etat`) VALUES
('En cours'),
('Non débuté'),
('Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id`,`id_projet`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`id`, `id_projet`) VALUES
('benoit.gueheneux@hotmail.com', 17),
('oscar.werle@hotmail.ocm', 17),
('benoit.gueheneux@hotmail.com', 18),
('herve.crevan@hotmail.com', 18),
('benoit.gueheneux@hotmail.com', 29),
('herve.crevan@hotmail.com', 29);

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

DROP TABLE IF EXISTS `priorite`;
CREATE TABLE IF NOT EXISTS `priorite` (
  `nom_priorite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nom_priorite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `priorite`
--

INSERT INTO `priorite` (`nom_priorite`) VALUES
('Basse'),
('Haute'),
('Moyenne');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id`),
  KEY `projet_ibfk_1` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `description`, `id_utilisateur`) VALUES
(17, 'Gestion de Projet 1', 'Description 1', 'benoit.gueheneux@hotmail.com'),
(18, 'Projet dHerve', 'Elever des choux', 'herve.crevan@hotmail.com'),
(29, 'test', 'test', 'herve.crevan@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nom_priorite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_etat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom_priorite` (`nom_priorite`),
  KEY `nom_etat` (`nom_etat`),
  KEY `id_utilisateur` (`id`),
  KEY `id_projet` (`id`),
  KEY `tache_ibfk_3` (`id_utilisateur`),
  KEY `tache_ibfk_4` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `nom`, `description`, `nom_priorite`, `nom_etat`, `id_utilisateur`, `id_projet`) VALUES
(19, 'Planter des choux', 'Plante des choux', 'Basse', 'Terminé', 'benoit.gueheneux@hotmail.com', 18),
(20, 'Manger des choux', 'ChouxChouxChoux', 'Haute', 'En cours', 'herve.crevan@hotmail.com', 18),
(21, 'Lire le sujet du projet', 'Lire le sujet du projet', 'Basse', 'Non débuté', 'oscar.werle@hotmail.ocm', 17),
(22, 'réaliser une application de gestion de projet.', 'réaliser une application de gestion de projet.', 'Haute', 'En cours', 'benoit.gueheneux@hotmail.com', 17),
(23, 'Les projets sont constitués de tâches avec un ordre de priorité, un titre et une description.', 'Les projets sont constitués de tâches avec un ordre de priorité, un titre et une description.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(24, 'Chaque tâche est attribuée à un utilisateur.', 'Chaque tâche est attribuée à un utilisateur.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(25, 'Rendre le projet', 'Rendre le projet', 'Basse', 'En cours', 'benoit.gueheneux@hotmail.com', 17),
(26, 'Faire un diapo', 'Faire un diapo', 'Basse', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(27, 'Présentation du diapo', 'Présentation du diapo', 'Basse', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(28, 'Le cycle de vie dune tâche est le suivant: Non débuté, en cours, terminé', 'Le cycle de vie dune tâche est le suivant: Non débuté, en cours, terminé', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(29, 'Il y a un utilisateur administrateur par projet.', 'Il y a un utilisateur administrateur par projet.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(31, 'Ladministrateur peut créer des utilisateurs qui seront affectés à son projet, si lutilisateur existe déjà, il sera rattaché au projet sinon il sera créé et rattacher au projet.', 'Ladministrateur peut créer des utilisateurs qui seront affectés à son projet, si lutilisateur existe déjà, il sera rattaché au projet sinon il sera créé et rattacher au projet.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(32, 'Un utilisateur peut donc participer à plusieurs projets.', 'Un utilisateur peut donc participer à plusieurs projets.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(33, 'Nimporte qui peut créer un compte sur le site, ce qui lui permettra de créer des projets.', 'Nimporte qui peut créer un compte sur le site, ce qui lui permettra de créer des projets.', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(34, 'réaliser un MCD puis la BDD correspondante', 'réaliser un MCD puis la BDD correspondante', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(35, 'Réaliser la partie back-end et front end du site qui permet de respecter les règles de gestion', 'Réaliser la partie back-end et front end du site qui permet de respecter les règles de gestion', 'Haute', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(36, 'UX design ne sera faite que si vous en avez le temps.', 'UX design ne sera faite que si vous en avez le temps.', 'Basse', 'Non débuté', 'benoit.gueheneux@hotmail.com', 17),
(38, 'Menu burger fonctionnel', 'Menu burger fonctionnel', 'Basse', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(41, 'Deplacer Securité dans le controller', 'Deplacer Securité dans le controller', 'Moyenne', 'Terminé', 'benoit.gueheneux@hotmail.com', 17),
(44, 'autoriser les apostrophe dans les inserts', 'Youpi \'\'\'\'\'\' \'\' \' \'\' \' \'\'', 'Basse', 'Terminé', 'benoit.gueheneux@hotmail.com', 17);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `password`) VALUES
('benoit.gueheneux@hotmail.com', 'Benoit', '$2y$10$jCz3I18i6PHDTqxh4WyDzeGXMpOx4zwfsbtfMWRe4htoHwEjIimM6'),
('herve.crevan@hotmail.com', 'herve', '$2y$10$/sxtQy3U49UYl118poDiM.ievgakinc3X4FvxScXciHpf0RqlY6NC'),
('oscar.werle@hotmail.ocm', 'oscar', '$2y$10$cIizp2Q7chhKIpmOYBzQuO9j1we6QmBPZied5IiN1zzoOO/O/9QkC');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`nom_priorite`) REFERENCES `priorite` (`nom_priorite`),
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`nom_etat`) REFERENCES `etat` (`nom_etat`),
  ADD CONSTRAINT `tache_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tache_ibfk_4` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
