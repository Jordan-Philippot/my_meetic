-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 02 Février 2020 à 22:37
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(10) UNSIGNED NOT NULL,
  `loisir1` varchar(10) NOT NULL,
  `loisir2` varchar(10) NOT NULL,
  `loisir3` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `date_naissance` date NOT NULL,
  `genre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `loisir1`, `loisir2`, `loisir3`, `ville`, `nom`, `prenom`, `date_naissance`, `genre`, `email`, `password`, `date_inscription`, `etat`) VALUES
(44, 'manger', 'boire', 'dormir', 'Lyon', 'Philippot', 'Jordan', '1993-06-23', 'homme', 'jordan.philippot@epitech.eu', '$2y$10$NZdRSAnTbXVYbJj6uEyGjOHhPR2Sp2XfR6FPkx1jspV.Lg5aaBH3q', '2020-01-29 00:03:57', 1),
(46, 'aaaaa', 'ooooo', 'eeeeeee', 'lyon', 'belinda', 'boudra', '1980-01-08', 'autre', 'beli@beli.com', '$2y$10$Yz6TIvZNlHkQNHdQ/Gxo1OrVdX/jAK9xrgdkiE2Nx9eFMfjGiuRV.', '2020-01-29 13:54:35', 0),
(48, 'sexe', 'jeux video', '', 'lyon', 'Jonas', 'nasnasnas', '1991-01-09', 'homme', 'jonas@jonas.fr', '$2y$10$kcg7vHrA5qXAtzFvS47Sf.6sWzr7oCvsR.Duea1vhb3it76lMULZS', '2020-01-31 13:11:35', 1),
(49, 'Coder', 'Troller', 'Tester', 'Lyon', 'Maisonas', 'Maxime', '1996-02-14', 'homme', 'maxime.maisonnas@epitech.eu', '$2y$10$eiPsASvCuGeH2btw2aeWK.NPRq37vQ6D9ASCYCsoHUYGMD7NObkj2', '2020-02-01 01:10:44', 1),
(50, 'Débattre', 'Voisines', 'Javascript', 'Lyon', 'Fitte', 'Tom', '1995-02-15', 'homme', 'tom.fitte@epitech.eu', '$2y$10$z2x9sqA/su46YbkSCmFA0.KhWxNioehOKm.lyVeoQM16q7FQSqo7m', '2020-02-01 01:12:10', 1),
(53, 'Tupac', '', '', 'Lyon', 'Roth', 'Aurelie', '1997-07-17', 'femme', 'aurelie.roth@epitech.eu', '$2y$10$5I8y0RIpXc0iTdZN3bcymehJ3fVG67wZnDiAH2UvXPRiDsO4sHT7K', '2020-02-01 15:44:46', 1),
(54, 'Manga', 'Cuisine', '', 'Lyon', 'Durand', 'Matthew', '1996-11-04', 'homme', 'matthew.durand@epitech.eu', '$2y$10$1CsJVASbIYocKhGVLkizyOTrDQ5pGkTWrEYQSaUkZeJMtcUobAXra', '2020-02-01 15:46:34', 1),
(55, 'Musique', 'Social', 'Spirituel', 'Nine', 'Marley', 'Bob', '1945-02-06', 'homme', 'bob.robert.nesta@marley.com', '$2y$10$V6ycwgjHDnb7N87k9LPSje4NdyWzhpy7tpl9ZzutdzQ/oBnpQF.Uq', '2020-02-01 15:52:12', 1),
(56, 'Vin', 'Jouer', 'Actrice', 'Corpus', 'Longoria', 'Eva', '1975-03-15', 'femme', 'eva.longoria@epitech.eu', '$2y$10$TaZa1N.kRoIQZ9uPg2lpL.rP62gpxqIXUkDlVi8YWIhkEU7M.JvOK', '2020-02-01 15:55:15', 1),
(57, 'Chanter', 'Danser', 'Tortura', 'Barranquilla', 'Ripoll', 'Shakira', '1977-02-02', 'femme', 'shakira@whenever.eu', '$2y$10$nFfspkx7VQOZu59uInVMy.H0f.16TTmf0TE6odAm3abkHugcAO.6W', '2020-02-01 15:57:30', 1),
(58, 'Chanter', 'Maquillage', 'Poney', 'Barbade', 'Fenty', 'Rihanna', '1988-02-20', 'femme', 'rihanna@fenty.com', '$2y$10$03r/cAoshYrDjW17RWhyo.cp6tNUt0/1oyivEyV0/YW7eXnmpxI6S', '2020-02-01 16:00:04', 1),
(59, 'Cuisine', 'Poney', 'Fighter', 'Oklahoma', 'Pitt', 'Brad', '1963-12-18', 'homme', 'brad@pitt.com', '$2y$10$XB.yDbAJ9cDi0309Ur/Pvu389.NoAXVUxTfDc/RvVbprORppdL5qG', '2020-02-01 16:05:48', 1),
(60, 'Rap', 'Feminisme', 'Lifestyle', 'Paris', 'Shakur', 'Tupac', '1971-06-16', 'homme', 'tupac@shakur.com', '$2y$10$jjIkFO6Oe3o1DP9blKfNe.tlI9oeDgsph5LwuJJzCDrgBh.U0VylG', '2020-02-01 16:17:45', 1),
(61, 'Danser', 'Films', 'Cuisiner', 'Miami', 'Mendes', 'Eva', '1974-03-05', 'femme', 'eva@mendes.com', '$2y$10$EemmdsvSTGbm3fOlf7XERuyQZ9y7E0Grdg5bNUTsNJKTgkSqahhTS', '2020-02-01 17:27:30', 1),
(62, 'Poney', 'Lire', 'Films', 'Pomona', 'Alba', 'Jessica', '1980-02-28', 'femme', 'jessica@alba.com', '$2y$10$tpabRhzuyPut4cg4ojd0l.mlY5W.rCqz02iD5lo5nl6LrxmJe0k1q', '2020-02-01 17:28:47', 1),
(63, 'Rire', 'Fumer', 'Films', 'Washington', 'Chappelle', 'Dave', '1974-08-24', 'homme', 'Dave@chappelle.com', '$2y$10$22ohTJLuqpJo8xJec7ivBOALGsp/nMqeefyWNaiLpE84u7nejHeeO', '2020-02-02 22:31:22', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
