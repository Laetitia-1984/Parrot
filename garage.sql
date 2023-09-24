-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : dim. 24 sep. 2023 à 15:00
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
(1, 'Seat', 'Altea', 2007, 90000, 7000, 'Jantes alliages\r\nVitre électriques\r\nLecteur CD MP3\r\nGPS\r\n', '650c909bdc957-altea2007-png', NULL, '650c909bdcbb0-64ef3809c0b1a-seat-altea-xl-1-jpg', '650c909bdcd6b-64f1ff5910399-seat-altea-xl-2-jpg', '650c909bdcf4b-64f2052ed9ac4-seat-altea-xl-3-jpg'),
(2, 'Ford', 'Focus', 2009, 55000, 9000, 'Vitre électriques\r\nJantes alliages\r\nPeinture métallisée\r\nFermeture centralisée', '650c90ecec569-64f209d6a77aa-focus2009-png', NULL, '650c90ecec7a7-64f209d6a7cf8-ford-focus-1-jpg', '650c90ecec984-64f2099f8b13c-ford-focus-2-jpeg', '650c90ececb43-64f2099f8b428-ford-focus-3-jpg'),
(4, 'Mini', 'Cooper', 2010, 60000, 10500, 'Peinture métallisée\r\nJantes alliages\r\nVitre électriques\r\nGPS\r\nToit ouvrant', '650c91a780502-64f1e9f43487e-mini2010-png', NULL, '650c91a78099c-64f200e30e4eb-mini2-jpg', '650c91a780c67-64f200e30e4ed-mini3-jpg', '650c91a780ec5-64f2083d410cc-mini4-jpg'),
(5, 'BMW', '320 D', 2019, 25000, 28900, 'Pack Luxe\r\nJantes alliages\r\nVitre teintées\r\nGPS\r\nLecteur CD MP3\r\nPeinture métallisée', '650c91f2b8f96-64f20eab555fd-bmw-320d-2019-jpg', NULL, '650c91f2b9163-64f20eab559a8-bmw-320d-2019-1-jpeg', '650c91f2b92f0-64f20eab55bf5-bmw-320d-2019-2-jpeg', '650c91f2b94b7-64f20ef33526f-bmw-320d-2019-3-jpeg'),
(6, 'Peugeot', '5008', 2020, 18000, 12500, 'Jantes alliages\r\nVitres électriques\r\nPeinture métallisée\r\nGPS', '650d1c1250ef5-peugeot-5008-jpeg', NULL, '650d1c12510c8-peugeot-5008-1-jpeg', '650d1c1251278-peugeot-5008-2-jpeg', '650d1c125155b-peugeot-5008-3-jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nameClient` varchar(255) NOT NULL,
  `note` int(1) DEFAULT NULL,
  `content` text NOT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `nameClient`, `note`, `content`, `id_users`) VALUES
(1, 'Titi', 4, 'Super garage', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `category`, `title`, `description`, `price`, `id_users`) VALUES
(1, 'Vidange et révision', 'Vidange Eco', 'Vidange huile moteur / Remplacement filtre à huile', 69, NULL),
(2, 'Vidange et révision', 'Vidange Pro', 'Vidange huile moteur / Remplacement filtre à huile / Mise à niveau des liquides', 79, NULL),
(3, 'Entretien et réparation', 'Amortisseurs', 'Changement amortisseurs', 90, NULL),
(4, 'Vidange et révision', 'Courroie distribution', 'Changement courroie de distribution  / Pompe à eau', 350, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `password`, `role`) VALUES
(1, 'parrot', 'vincent', 'v.parrot@gmail.com', '$2y$10$lBj1OmyVCn783YVSzPmL.etIalaZsy8Xv2L6wnsQQzEUruBcwky/2', 'admin'),
(2, 'Grans', 'Alain', 'a.grans@gmail.com', '$2y$10$L/wH6HbpmD8rp0.vcAixJui6Wnu6xAurHICjYZV9G6axfWJCM6he.', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
