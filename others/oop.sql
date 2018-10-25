-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 06:00 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `note1` int(11) NOT NULL,
  `note2` int(11) NOT NULL,
  `moyenne` int(11) NOT NULL,
  `date_de_naissance` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `password`, `note1`, `note2`, `moyenne`, `date_de_naissance`, `created_at`, `updated_at`) VALUES
(33, 'nom3', 'prenom4', 'mouad@gmail.com', '123456', 12, 10, 11, '2018-10-19', '2018-10-24 14:16:39', '2018-10-24 14:16:39'),
(35, 'abdsammad', 'recruteur_p', 'hello@gmail.com', 'P@$$word2', 18, 10, 14, '2018-10-13', '2018-10-24 14:40:58', '2018-10-24 14:40:58'),
(36, 'moad1', 'prenom3', 'khalidnadir@gmail.com', 'password', 12, 12, 12, '2018-10-19', '2018-10-24 15:05:48', '2018-10-24 15:06:02'),
(37, 'said', 'nablssi', 'saidnablssi@gmail.com', '123456', 18, 9, 14, '2018-10-12', '2018-10-25 03:30:56', '2018-10-25 03:30:56');

-- --------------------------------------------------------

--
-- Stand-in structure for view `etudiant_view`
-- (See below for the actual view)
--
CREATE TABLE `etudiant_view` (
`id` int(11)
,`nom` varchar(100)
,`prenom` varchar(150)
,`email` varchar(100)
,`password` varchar(255)
,`note1` int(11)
,`note2` int(11)
,`moyenne` int(11)
,`date_de_naissance` varchar(20)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `note1` int(11) NOT NULL,
  `note2` int(11) NOT NULL,
  `moyenne` int(11) NOT NULL,
  `date_de_naissance` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`id`, `nom`, `prenom`, `email`, `password`, `note1`, `note2`, `moyenne`, `date_de_naissance`, `created_at`, `updated_at`) VALUES
(1, 'fouad', 'Moad', 'recruteur222@gmail.com', '123', 12, 10, 11, '2018-10-19', '2018-10-24 14:16:58', '2018-10-24 14:16:58');

-- --------------------------------------------------------

--
-- Structure for view `etudiant_view`
--
DROP TABLE IF EXISTS `etudiant_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `etudiant_view`  AS  select `etudiant`.`id` AS `id`,`etudiant`.`nom` AS `nom`,`etudiant`.`prenom` AS `prenom`,`etudiant`.`email` AS `email`,`etudiant`.`password` AS `password`,`etudiant`.`note1` AS `note1`,`etudiant`.`note2` AS `note2`,`etudiant`.`moyenne` AS `moyenne`,`etudiant`.`date_de_naissance` AS `date_de_naissance`,`etudiant`.`created_at` AS `created_at`,`etudiant`.`updated_at` AS `updated_at` from `etudiant` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
