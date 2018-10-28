-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 08:40 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `password`, `img`, `created_at`, `updated_at`) VALUES
(48, 'mouad2', 'moad', 'mouad@gmail.com', '123456', 'October_28_2018_7_01_47_pm_logo.png', '2018-10-26 06:17:14', '2018-10-26 06:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'logo_pdf.png',
  `adresse` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `logo`, `adresse`, `telephone`, `email`) VALUES
(1, 'October_28_2018_5_36_30_pm_logo_pdf.png', 'adresse 1 rue 12 cartie 15 no 33', '065498745869', 'company@gmail.com');

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
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `password`, `note1`, `note2`, `moyenne`, `date_de_naissance`, `img`, `created_at`, `updated_at`) VALUES
(37, 'said', 'nablssi', 'saidnablssi@gmail.com', '123456', 18, 9, 14, '2018-10-12', 'etudiant.png', '2018-10-25 03:30:56', '2018-10-25 03:30:56'),
(39, 'nadir', 'chouaib', 'nadir@gmail.com', '123456', 6, 10, 8, '2018-10-18', 'October_25_2018_6_53_41_am_syria.jpg', '2018-10-25 04:53:41', '2018-10-25 04:53:41'),
(40, 'nadir', 'chouaib', 'nadir@gmail.com', '123456', 6, 10, 8, '2018-10-18', 'October_25_2018_6_55_01_am_syria.jpg', '2018-10-25 04:55:01', '2018-10-25 04:55:01'),
(45, 'khalid', 'saidi', 'khalidsaidi@gmail.com', '123456', 15, 12, 14, '2018-10-18', 'October_25_2018_4_05_27_pm_22539683_158726134717045_3337096034638220612_n.jpg', '2018-10-25 14:05:27', '2018-10-25 14:05:27'),
(46, 'nom2233', 'prenom22', 'nom@gmail.com', '123456', 11, 18, 15, '2018-10-23', 'October_25_2018_4_13_09_pm_bridge succfuly.png', '2018-10-25 14:13:09', '2018-10-25 14:13:52'),
(47, 'nomhhhhh', 'prenom3', 'jihg@gmail.com', '2654789', 12, 20, 16, '2018-10-24', 'etudiant.png', '2018-10-25 15:55:17', '2018-10-28 12:24:24'),
(50, 'nom3', 'chouaib', 'khalidnadir@gmail.com', '2654789', 15, 12, 14, '2018-10-12', 'October_28_2018_8_19_42_pm_bulma.jpg', '2018-10-28 19:19:42', '2018-10-28 19:19:42'),
(51, 'nom3', 'prenom4', 'mouad3@gmail.com', '123456', 8, 12, 10, '2018-10-17', 'October_28_2018_8_24_55_pm_e4e4b03283bf499065359319e5936b67.jpg', '2018-10-28 19:24:55', '2018-10-28 19:24:55');

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
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`id`, `nom`, `prenom`, `email`, `password`, `note1`, `note2`, `moyenne`, `date_de_naissance`, `img`, `created_at`, `updated_at`) VALUES
(1, 'nadia', 'yazidi', 'nadiaya@gmail.com', '2654789', 6, 3, 5, '2018-10-16', 'October_25_2018_6_58_53_am_120.png', '2018-10-25 14:03:14', '2018-10-25 14:03:14'),
(2, 'moad1', 'prenom3', 'khalidnadir@gmail.com', 'password', 12, 12, 12, '2018-10-19', 'etudiant.png', '2018-10-25 14:03:23', '2018-10-25 14:03:23'),
(3, 'Hello', 'prenom2', 'mmm@gmail.com', 'password', 12, 11, 12, '2018-10-11', 'October_28_2018_7_24_22_pm_October_28_2018_2_14_15_pm_bridge succfuly.png', '2018-10-28 18:24:37', '2018-10-28 18:24:37');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
