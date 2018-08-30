-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 08:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_helper`
--
CREATE DATABASE IF NOT EXISTS `lab_helper` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lab_helper`;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_test_menu`
--

CREATE TABLE `laboratory_test_menu` (
  `id` bigint(20) NOT NULL,
  `test` varchar(200) NOT NULL,
  `turn_around_time` bigint(20) NOT NULL,
  `actual_time_to_take` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory_test_menu`
--

INSERT INTO `laboratory_test_menu` (`id`, `test`, `turn_around_time`, `actual_time_to_take`) VALUES
(1, 'Complete Blood Count', 120, '2 hours'),
(2, 'Hb (Haemoglobin) estimation', 30, '30 minutes'),
(3, 'ESR  (erythrocyte sedimentation rate)', 80, '1 hour 20 minutes'),
(4, 'URINE ANALYSIS', 60, '1 hour'),
(5, 'STOOL ANALYSIS', 60, '1 hour'),
(6, 'TB GENEXPERT', 1440, '24 hours'),
(7, 'TB MICROSCOPY', 120, '2 hours'),
(8, 'MALARIA SCREENING RDT', 60, '1 hour'),
(9, 'FILM COMMENT', 60, '1 hour'),
(10, 'LIVER FUNCTION TESTS', 1440, '24 hours'),
(11, 'RENAL FUNCTION TESTS', 1440, '24 hours'),
(12, 'SERUM ELECTROLYTES', 1440, '24 hours'),
(13, 'Hepatitis BsAg screening', 60, '1 hour'),
(14, 'SYPHILIS RDT', 45, '45  minutes'),
(15, 'HIV SCREENING', 60, '1 hour'),
(16, 'ABO and RH TESTING', 30, '30 minutes'),
(17, 'BLOOD CROSSMATCH', 30, '30 minutes'),
(18, 'Serum crag', 60, '1 hour'),
(19, 'CD4', 10080, '7days'),
(20, 'Pregnant test', 60, '1 hour'),
(21, 'Viral Load', 20160, '14 days'),
(22, 'EID(PCR)', 20160, '14 days'),
(23, 'SICKLE CELL TEST', 20160, '14 days'),
(24, 'RBS and FBS', 20, '20 minutes'),
(25, 'RHEUMATOID FACTOR', 60, '1 hour'),
(26, 'BAT', 60, '1 hour'),
(27, 'TBLAM', 60, '1 hour'),
(28, 'SYPHILIS DUO', 60, '1 hour'),
(29, 'MALARIA SCREENING B/S', 60, '1 hr');

-- --------------------------------------------------------

--
-- Table structure for table `performed_tests`
--

CREATE TABLE `performed_tests` (
  `id` bigint(20) NOT NULL,
  `sample_id` varchar(200) NOT NULL,
  `reception_time` datetime NOT NULL,
  `test_id` int(11) NOT NULL,
  `dispatch_time` datetime DEFAULT NULL,
  `elapsed_time` bigint(20) DEFAULT NULL,
  `actual_time` varchar(200) DEFAULT NULL,
  `day_date` date NOT NULL,
  `month` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performed_tests`
--

INSERT INTO `performed_tests` (`id`, `sample_id`, `reception_time`, `test_id`, `dispatch_time`, `elapsed_time`, `actual_time`, `day_date`, `month`) VALUES
(40, 'NK/LS/2018 updated ', '2018-08-29 09:35:39', 5, '2018-08-28 10:00:39', 1415, '0 Days:23 hours:35 minutes:0 seconds', '2018-08-28', 'Aug'),
(41, 'KJ/JL/18', '2018-08-29 10:54:21', 3, '2018-08-29 11:22:33', 28, '0 Days:0 hours:28 minutes:12 seconds', '2018-08-29', 'Aug'),
(42, 'hk/lk/2918', '2018-08-29 11:54:12', 3, '2018-08-30 12:10:25', 1456, '1 Days:0 hours:16 minutes:13 seconds', '2018-08-29', 'Aug'),
(43, 'nelissa', '2018-08-29 11:54:12', 3, '2018-08-30 12:10:25', 1456, '1 Days:0 hours:16 minutes:13 seconds', '2018-08-29', 'Aug'),
(44, 'nelissa', '2018-08-29 11:54:12', 3, '2018-08-30 12:10:25', 1456, '1 Days:0 hours:16 minutes:13 seconds', '2018-08-29', 'Aug');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(3, 'Nelissa Nantumbwe', 'neli updated', '5e9795e3f3ab55e7790a6283507c085db0d764fc'),
(4, 'francis kiryowa Felix', 'kiryowa22', 'xavierfe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratory_test_menu`
--
ALTER TABLE `laboratory_test_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performed_tests`
--
ALTER TABLE `performed_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laboratory_test_menu`
--
ALTER TABLE `laboratory_test_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `performed_tests`
--
ALTER TABLE `performed_tests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
