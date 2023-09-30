-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : ven. 29 sep. 2023 à 19:16
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
(1, 'Seat', 'Altea', 2007, 90000, 7000, 'Jantes alliages\r\nVitre électriques\r\nLecteur CD MP3\r\nGPS\r\n', '651070d55d6b7-altea2007-png', NULL, '651070d55d8e9-seat-altea-xl-4-jpg', '651070d55dab6-seat-altea-xl-2-jpg', '651070d55dca5-seat-altea-xl-1-jpg'),
(2, 'Ford', 'Focus', 2009, 55000, 9000, 'Vitre électriques\r\nJantes alliages\r\nPeinture métallisée\r\nFermeture centralisée', '65107083d4107-focus2009-png', NULL, '65107083d42d7-ford-focus-2-jpeg', '65107083d790b-ford-focus-3-jpg', '65107083d7c18-ford-focus-1-jpg'),
(4, 'Mini', 'Cooper', 2010, 60000, 10500, 'Peinture métallisée\r\nJantes alliages\r\nVitre électriques\r\nGPS\r\nToit ouvrant', '6510703482e0c-mini2010-png', NULL, '65107034830ef-mini1-jpg', '65107034832b7-mini2-jpg', '65107034834de-mini4-jpg'),
(5, 'BMW', '320 D', 2019, 25000, 28900, 'Pack Luxe\r\nJantes alliages\r\nVitre teintées\r\nGPS\r\nLecteur CD MP3\r\nPeinture métallisée', '65106fe5e2c3c-bmw-320d-2019-jpg', NULL, '65106fe5e3129-bmw-320d-2019-1-jpeg', '65106fe5e3370-bmw-320d-2019-2-jpeg', '65106fe5e357f-bmw-320d-2019-4-jpeg'),
(6, 'Peugeot', '5008', 2020, 18000, 12500, 'Jantes alliages\r\nVitres électriques\r\nPeinture métallisée\r\nGPS', '65106f6d0f73f-peugeot-5008-jpeg', NULL, '65106f6d0fb08-peugeot-5008-1-jpeg', '65106f6d0fd5f-peugeot-5008-2-jpeg', '65106f6d0ff93-peugeot-5008-3-jpeg');

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
