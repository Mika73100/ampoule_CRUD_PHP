-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 sep. 2022 à 16:03
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ampoule`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usernameadmin` varchar(200) NOT NULL,
  `passwordadmin` varchar(200) NOT NULL,
  `mailadmin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exo`
--

CREATE TABLE `exo` (
  `date` varchar(19) NOT NULL,
  `id` int(11) NOT NULL,
  `etage` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `position` varchar(10) NOT NULL,
  `message` text CHARACTER SET utf8mb4,
  `users_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exo`
--

INSERT INTO `exo` (`date`, `id`, `etage`, `prix`, `position`, `message`, `users_id`) VALUES
('28/03/2022 14:31:33', 49, '4', 20000, 'aufond', 'Changement du lit, rÃ©paration de l\'armoire.', 271),
('07/04/2022 08:52:30', 50, '1', 2, 'droit', 'Changement du lit, rÃ©paration de l\'armoire.', 272),
('05/09/2022 06:42:11', 51, '6', 2, 'fond', NULL, 271),
('05/09/2022 06:43:22', 52, '1', 1991, 'fond', NULL, 271),
('05/09/2022 11:42:27', 53, '5', 5092022, 'droit', 'coucou ici mika', 272),
('05/09/2022 14:26:54', 54, '4', 2, 'fond', NULL, 274),
('05/09/2022 14:27:15', 55, '6', 2, 'gauche', NULL, 274),
('05/09/2022 14:30:34', 56, '5', 2, 'fond', NULL, 274),
('05/09/2022 14:30:42', 57, '1', 666, 'droite', NULL, 274),
('06/09/2022 10:43:06', 58, '5', 2, 'gauche', NULL, 235),
('07/09/2022 13:07:00', 59, '4', 2, 'fond', NULL, 235);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE `position` (
  `id` int(2) NOT NULL,
  `gauche` varchar(255) NOT NULL,
  `fond` varchar(255) NOT NULL,
  `droite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `position`
--

INSERT INTO `position` (`id`, `gauche`, `fond`, `droite`) VALUES
(10, '0', '1', '1'),
(11, '0', '0', '0'),
(12, '0', '0', '0'),
(13, '1', '0', '1'),
(14, '0', '0', '0'),
(15, '0', '0', '0'),
(16, '0', '0', '0'),
(17, '1', '0', '0'),
(18, '0', '0', '0'),
(19, '1', '0', '1'),
(20, '1', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `portable` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `portable`, `nom`, `prenom`) VALUES
(233, 'LOLO', '$2y$10$cvU4iUpYo4ROjejZzIaFLeR9YZBDLqnrBhzsbcGbxonMZwj653Xke', 'michael-73@live.fr', ' 0600000000', 'michael-73@live.fr', 'Michael'),
(234, 'Michael', '$2y$10$cUkcOO9j6ZX6PMH0RiLjO.JcAISo0dOocx6m037yWJLte7psfobzC', 'michael-73@live.fr', '', '', ''),
(235, 'mimi', '$2y$10$de/.D3RoazZeMa7cg0sCbuGDHy75Hkt5Pk1eGvizKU4KXfB89a7Fe', 'michael-73@live.fr', '', '', ''),
(271, 'MichaelB73', '$2y$10$edIiYupnEMNg4NSi5IsOaO2qKgmMNXL67KZJ.TiIL0nJh1i3TxiwG', 'michael-73@live.fr', '', '', ''),
(272, 'Michael', '$2y$10$SZqnppcMx.eAl/7bODA2lu1H4cWlE.qqUHSFF80mJeHJkY2jBCQKG', 'michael-73@live.fr', '', '', ''),
(273, 'Michael', '$2y$10$Q/SPyYucA/0lBA5PHwqiTe32U2tSDz//CE/GiMjLAe8Z/s4n//ka.', 'michael-73@live.fr', '', '', ''),
(274, 'Toto', '$2y$10$I3jVBYR3Zuslxh0CK6dGkOoDT1/RPN5hnNYJfjxOeFmB3vheJHC0i', 'michael-73@live.fr', '', '', ''),
(277, 'Michael', '$2y$10$T7iPfplNmNyXJYcG8VwReuxBfUljOumri696smKeGH6FddU7231Jq', 'michael-73@live.fr', '', '', ''),
(282, '1', '$2y$10$km51j9VzZ9WwDB611LYl/OhHBBhw8hyyykqlYa0NwlsacWecoSy2a', 'michael-73@live.fr', '0607535627', 'BARRECA', 'Michael'),
(283, '1', '$2y$10$eFMqTIz.aEGX4CfHAK/UVeMHB0C9nX98FuS/jGcWaDznAGoytJXkO', 'michael-73@live.fr', '060000000666', 'BARRECA', 'Michael'),
(284, '1', '$2y$10$Pl9Se.A8n07x/mirKmge2.RBUPPOWXnpAvWoX54lMoMebS74NvZKK', 'michael-73@live.fr', '0607535627', 'BARRECA', 'Michael');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exo`
--
ALTER TABLE `exo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `position`
--
ALTER TABLE `position`
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
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exo`
--
ALTER TABLE `exo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
