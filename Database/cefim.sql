-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2020 at 12:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cefim`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
CREATE TABLE IF NOT EXISTS `adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_number` varchar(45) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `adress_title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` varchar(45) DEFAULT NULL,
  `file_type` varchar(100) NOT NULL,
  `upload_date` date NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `upload_time` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `file_name`, `file_size`, `file_type`, `upload_date`, `user_name`, `upload_time`) VALUES
(1, 'test', '1600177', 'pdf', '2020-11-23', 'sam', '21:14:09'),
(2, 'test', '1600177', 'pdf', '2020-11-23', 'sam', '21:17:53'),
(3, 'DWWM2019-2_ELGHAIED_ESLAM_02-06-2020', '243842', 'pdf', '2020-11-25', 'sam', '19:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

DROP TABLE IF EXISTS `signature`;
CREATE TABLE IF NOT EXISTS `signature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sign_name` varchar(255) DEFAULT NULL,
  `created_on` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`) VALUES
(1, 'sam', '7a2ec40ff8a1247c532309355f798a779e00acff579c63eec3636ffb2902c1ac', 'elghaied.eslam@gmail.com', 'Eslam', 'zzzz'),
(3, 'eslam', '7a2ec40ff8a1247c532309355f798a779e00acff579c63eec3636ffb2902c1ac', 'islam18mx@gmail.com', 'cool', ''),
(4, 'xxx', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'test@test.com', NULL, NULL),
(5, 'test', '6460662e217c7a9f899208dd70a2c28abdea42f128666a9b78e6c0c064846493', 'jwjwj@jwjw.com', NULL, NULL),
(6, 'test2', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11@jdd.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_adress`
--

DROP TABLE IF EXISTS `user_adress`;
CREATE TABLE IF NOT EXISTS `user_adress` (
  `user_id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  KEY `user_user_adress` (`user_id`),
  KEY `adress_user_adress` (`adress_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

DROP TABLE IF EXISTS `user_contact`;
CREATE TABLE IF NOT EXISTS `user_contact` (
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  KEY `user_user_contact` (`user_id`),
  KEY `contact_user_contact` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_signature`
--

DROP TABLE IF EXISTS `user_signature`;
CREATE TABLE IF NOT EXISTS `user_signature` (
  `user_id` int(11) NOT NULL,
  `signature_id` int(11) NOT NULL,
  KEY `user_user_signature` (`user_id`),
  KEY `signature_user_signature` (`signature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_adress`
--
ALTER TABLE `user_adress`
  ADD CONSTRAINT `adress_user_adress` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_user_adress` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD CONSTRAINT `contact_user_contact` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_user_contact` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_signature`
--
ALTER TABLE `user_signature`
  ADD CONSTRAINT `signature_user_signature` FOREIGN KEY (`signature_id`) REFERENCES `signature` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_user_signature` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
