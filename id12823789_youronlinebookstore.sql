-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 24 avr. 2020 à 20:02
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id12823789_youronlinebookstore`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `id_client` int(25) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num_tel` int(30) NOT NULL,
  `adresse` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`id_client`, `name`, `surname`, `email`, `num_tel`, `adresse`, `password`) VALUES
(25, 'hayat', 'ouh', 'hayatouhmoud74@gmail.com', 528230245, 'agadir', 'hayatouhmoud'),
(46, 'Bouchra ', 'Elasri', 'bouchra@gmail.com', 635647523, 'agadir', 'Bouchra?123'),
(49, 'jgjj', 'gjgjhg', 'laila74@gmail.com', 235689745, 'hjj', 'LAILA?123laila');

-- --------------------------------------------------------

--
-- Structure de la table `Command`
--

CREATE TABLE `Command` (
  `id_client` int(25) NOT NULL,
  `id_product` int(25) NOT NULL,
  `total_price` float NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Command`
--

INSERT INTO `Command` (`id_client`, `id_product`, `total_price`, `quantity`) VALUES
(49, 6, 25, 2),
(49, 7, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Payement`
--

CREATE TABLE `Payement` (
  `id_payement` int(10) NOT NULL,
  `id_client` int(20) NOT NULL,
  `number_card` int(30) NOT NULL,
  `security_code` int(30) NOT NULL,
  `final_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Payement`
--

INSERT INTO `Payement` (`id_payement`, `id_client`, `number_card`, `security_code`, `final_price`) VALUES
(1, 45, 87877, 8787, 40),
(2, 45, 88, 8, 40),
(3, 45, 4545, 454, 110),
(4, 49, 878, 8787, 70);

-- --------------------------------------------------------

--
-- Structure de la table `Product`
--

CREATE TABLE `Product` (
  `id_product` int(25) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `img` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Product`
--

INSERT INTO `Product` (`id_product`, `name`, `price`, `img`) VALUES
(1, 'Creative Brains Startup', 20, 'engb1.jpeg'),
(2, 'Meet The Brain Stormer', 20, 'engb2.jpeg'),
(3, 'Creative Ideas', 25, 'engb3.jpeg'),
(4, 'صاحب الظل الطويل', 20, 'arb1.jpeg'),
(5, 'ثلاثية غرناطة', 20, 'arb2.jpeg'),
(6, 'في قلبي أنثى عبرية', 25, 'arb3.jpeg'),
(7, 'غدق', 20, 'arb4.jpeg'),
(8, 'تحرير الوطن', 25, 'arb5.jpeg'),
(9, 'Les Dernières Heures ', 20, 'frb1.jpeg'),
(10, 'Jack et le Bureau Secret', 20, 'frb2.jpeg'),
(11, 'Mon Cabinet de Culture', 25, 'frb3.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `Suggestions`
--

CREATE TABLE `Suggestions` (
  `id_suggest` int(30) NOT NULL,
  `id_client` int(11) NOT NULL,
  `Suggestions` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Suggestions`
--

INSERT INTO `Suggestions` (`id_suggest`, `id_client`, `Suggestions`) VALUES
(3, 45, 'welcome');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `Command`
--
ALTER TABLE `Command`
  ADD PRIMARY KEY (`id_client`,`id_product`),
  ADD KEY `fk_idproduct` (`id_product`);

--
-- Index pour la table `Payement`
--
ALTER TABLE `Payement`
  ADD PRIMARY KEY (`id_payement`);

--
-- Index pour la table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id_product`);

--
-- Index pour la table `Suggestions`
--
ALTER TABLE `Suggestions`
  ADD PRIMARY KEY (`id_suggest`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `id_client` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `Payement`
--
ALTER TABLE `Payement`
  MODIFY `id_payement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Product`
--
ALTER TABLE `Product`
  MODIFY `id_product` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Suggestions`
--
ALTER TABLE `Suggestions`
  MODIFY `id_suggest` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Command`
--
ALTER TABLE `Command`
  ADD CONSTRAINT `fk_idclient` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idproduct` FOREIGN KEY (`id_product`) REFERENCES `Product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
