-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 mars 2024 à 07:29
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `genre` char(1) NOT NULL,
  `fonction` varchar(20) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`cin`, `nom`, `prenom`, `genre`, `fonction`, `code`) VALUES
('05186402', 'Omar', 'Hammami', 'H', 'Ingenieur', 'H4?111'),
('07053218', 'Jallouli', 'Houda', 'F', 'Etudiante', 'H8&101'),
('07053219', 'Ayari', 'Farhat', 'H', 'Employé', 'F5,131');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `cin` varchar(8) NOT NULL,
  `numlivre` int(11) NOT NULL,
  `dateemprunt` date NOT NULL,
  `dateretoure` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`cin`, `numlivre`, `dateemprunt`, `dateretoure`) VALUES
('05186402', 1, '2024-03-06', '2024-03-20'),
('05186402', 3, '2024-03-06', '2024-03-20'),
('05186402', 6, '2024-03-06', '2024-03-20'),
('07053218', 1, '2024-03-06', '2024-03-20'),
('07053218', 3, '2024-03-06', '2024-03-20'),
('07053218', 4, '2024-03-06', '2024-03-20'),
('07053218', 6, '2024-03-06', '2024-03-20'),
('07053219', 1, '2024-03-06', '2024-03-20'),
('07053219', 2, '2024-03-06', '2024-03-20'),
('07053219', 3, '2024-03-06', '2024-03-20');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `numlivre` int(11) NOT NULL,
  `titrelivre` varchar(50) NOT NULL,
  `typelivre` varchar(20) NOT NULL,
  `nbrexp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`numlivre`, `titrelivre`, `typelivre`, `nbrexp`) VALUES
(1, 'Le Sfinx des glaces', 'Aventure', 2),
(2, 'L\'Archipel en feu', 'Aventure', 2),
(3, 'L\'Avare', 'Théâtre', 4),
(4, 'La Ballade De Kassandre', 'Romantique', 0),
(6, 'Avare', 'Amour', 3),
(7, 'Avaree', 'Amour', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`cin`,`numlivre`,`dateemprunt`),
  ADD KEY `numlivre` (`numlivre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`numlivre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `numlivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `abonne` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`numlivre`) REFERENCES `livre` (`numlivre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
