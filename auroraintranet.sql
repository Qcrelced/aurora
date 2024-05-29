-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mai 2024 à 15:55
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auroraintranete`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `ID` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`ID`, `titre`, `auteur`, `message`, `image`, `video`) VALUES
(959, 'Bonjour', 'toto toto', 'Ceci est un test', NULL, NULL),
(960, 'Présent', 'toto toto', 'Tout le monde est préent', NULL, NULL),
(961, 'déconnexion', 'DECLERCQ Jimmy', 'Il faut appuyer sur le bouton déconnexion au dessus de la page', NULL, NULL),
(962, 'Logo', 'DECLERCQ Jimmy', 'Ce logo est t-il bien ?', 'imgforum/a7d3300f4b83d7321ae9606bb0b3e6d2.png', NULL),
(963, 'Détendez vous', 'DECLERCQ Jimmy', 'Une petite musique pour vous détendre !', NULL, 'imgforum/c8eb096cecab6ce8dba63bee81736304.mp4'),
(964, 'Musique', 'toto toto', 'La musique ma détendu, c\'est super', NULL, NULL),
(965, 'Dossier m3', 'toto toto', 'Quelqu\'un a le dossier m3 ?', NULL, NULL),
(966, 'Dosier m3', 'DECLERCQ Jimmy', 'Le dossier m3 est dans les archives', NULL, NULL),
(967, 'Intranet', 'DECLERCQ Jimmy', 'Voici ce que permet ce site !', NULL, NULL),
(968, 'Intranet', 'toto toto', 'C\'est un super site !', 'imgforum/5fc9613ef148ae48fb5a918ba1026a13.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL COMMENT 'Clé primaire ID',
  `nom_utilisateur` varchar(100) NOT NULL COMMENT 'nom de l''utilisateur',
  `prenom_utilisateur` varchar(30) NOT NULL COMMENT 'Prénom de l''utilisateur',
  `mail_utilisateur` varchar(128) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL COMMENT 'mot de passe de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `mot_de_passe`) VALUES
(18, 'toto', 'toto', 'toto@toto.toto', '$2y$10$8EywLnkxVTfhG/7f0ZO70ODR/tHVcMHmaZ3EZkdGIphdS6QL1EHUe'),
(20, 'tata', 'tata', 't@t.t', '$2y$10$4uxZkrX1kIXsHE80.yOAGumF1XtCIXn4JMyKFhOEg5JOjuYWr.E4K'),
(22, 'DECLERCQ', 'Jimmy', 'declercq1103@gmail.com', '$2y$10$egRPwF9fWThohiuv6JJ8KuPQRSGV/ZqmA/aPeOnm3fvW09fUILNBO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=969;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire ID', AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
