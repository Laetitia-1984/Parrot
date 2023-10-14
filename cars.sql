-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : sam. 14 oct. 2023 à 19:50
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `km` int(6) NOT NULL,
  `price` int(5) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `mark`, `model`, `year`, `km`, `price`, `description`, `image`, `id_users`, `image2`, `image3`, `image4`) VALUES
(1, 'Seat', 'Altea', 2007, 90000, 7000, 'Jantes alliages\r\nVitre électriques\r\nLecteur CD MP3\r\nGPS\r\n', '652ac59b43c58-seat-ibiza-jpg', NULL, '652ac59b443bb-seat-ibiza-2-jpg', '652ac59b44ebe-seat-ibiza-3-jpg', '652ac59b452ee-seat-ibiza-4-jpg'),
(2, 'Ford', 'Focus', 2009, 55000, 9000, 'Vitre électriques\r\nJantes alliages\r\nPeinture métallisée\r\nFermeture centralisée', '652ac57e3e4bd-focus2009-png', NULL, '652ac57e3ea01-ford-focus-1-jpg', '652ac57e3eebc-ford-focus-2-jpeg', '652ac57e3f369-ford-focus-3-jpg'),
(4, 'Mini', 'Cooper', 2010, 60000, 10500, 'Peinture métallisée\r\nJantes alliages\r\nVitre électriques\r\nGPS\r\nToit ouvrant', '652ac55df4097-mini1-jpg', NULL, '652ac55e0056e-mini2-jpg', '652ac55e00aef-mini3-jpg', '652ac55e00f65-mini4-jpg'),
(5, 'BMW', '320 D', 2019, 25000, 28900, 'Pack Luxe\r\nJantes alliages\r\nVitre teintées\r\nGPS\r\nLecteur CD MP3\r\nPeinture métallisée', '652ac541cd61a-bmw-320d-2019-jpg', NULL, '652ac541cdada-bmw-320d-2019-1-jpeg', '652ac541cdf4a-bmw-320d-2019-2-jpeg', '652ac541ce37f-bmw-320d-2019-3-jpeg'),
(6, 'Peugeot', '3008', 2020, 18000, 12500, 'Jantes alliages\r\nVitres électriques\r\nPeinture métallisée\r\nGPS', '652ac521f0540-peugeot-3008-jpg', NULL, '652ac521f0bcf-peugeot-3008-2-jpg', '652ac521f0ff3-peugeot-3008-3-jpg', '652ac521f13db-peugeot-3008-4-jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
