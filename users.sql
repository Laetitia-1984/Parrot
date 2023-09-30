-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 30 sep. 2023 à 20:42
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id21330133_garage`
--

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
(1, 'parrot', 'vincent', 'v.parrot@gmail.com', '$2y$10$T4MSyH9UmPdAVp2OYMZo6OD6kWrKaBuBpl.HgeOxjUD1j009lX9gu', 'admin'),
(2, 'Grans', 'Alain', 'a.grans@gmail.com', '$2y$10$L/wH6HbpmD8rp0.vcAixJui6Wnu6xAurHICjYZV9G6axfWJCM6he.', 'user'),
(3, 'gros', 'pierre', 'p.gros@gmail.com', '$2y$10$p73Dl9SRtp8wPVZvXI4/.OjcWSvfQl7M2nF9QMiQbXlPCb9inWceG', 'user'),
(4, 'grad', 'bernard', 'b.grad@gmail.com', '$2y$10$.mLTo27mGuuRoWNbRX0ejeHPJE2fhPrWYO4o6hm2izBaSdZaGfP.e', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
