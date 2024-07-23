-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2023 at 12:37 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_db 5`
--

-- --------------------------------------------------------

--
-- Table structure for table `conftable`
--

DROP TABLE IF EXISTS `conftable`;
CREATE TABLE IF NOT EXISTS `conftable` (
  `ConfId` int NOT NULL AUTO_INCREMENT,
  `ConfName` varchar(45) NOT NULL,
  `ConfDate` date NOT NULL,
  `ConfLoc` varchar(45) NOT NULL,
  `ConfFee` int NOT NULL,
  PRIMARY KEY (`ConfId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `conftable`
--

INSERT INTO `conftable` (`ConfId`, `ConfName`, `ConfDate`, `ConfLoc`, `ConfFee`) VALUES
(1, 'AI and Robotics Expo', '2023-08-15', 'Manila Hotel', 3500),
(2, 'E-commerce Summit', '2023-09-20', 'SMX Convention Center', 4500),
(3, 'Tech Innovations 2023', '2023-09-30', 'World Trade Center', 5000),
(4, 'Health and Wellness', '2023-11-29', 'BGC High Street', 3000),
(5, 'Green Energy Forum', '2024-01-12', 'UP Diliman', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `reg_table`
--

DROP TABLE IF EXISTS `reg_table`;
CREATE TABLE IF NOT EXISTS `reg_table` (
  `reg_id` int NOT NULL AUTO_INCREMENT,
  `reg_date` date NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Zipcode` int NOT NULL,
  `Contact` char(11) NOT NULL,
  `Payment` varchar(45) NOT NULL,
  `ConfId` int NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `reg_table`
--

INSERT INTO `reg_table` (`reg_id`, `reg_date`, `Firstname`, `Lastname`, `Address`, `City`, `Zipcode`, `Contact`, `Payment`, `ConfId`) VALUES
(1, '2023-07-05', 'Juan', 'Dela Cruz', '123 Mabini St.', 'Quezon City', 1101, '09123456789', 'Credit Card', 1),
(2, '2023-07-06', 'Maria', 'Santos', '456 Bonifacio St.	', 'Makati City', 1226, '09187654321', 'Bank Transfer', 1),
(3, '2023-12-13', 'Manuel', 'Reyes', '789 Rizal St.', 'Pasig City', 1600, '09171234567', 'Paypal', 2),
(4, '2022-08-16', 'Sofia', 'Hernandez', '101 Quirino Ave.', 'Caloocan City', 1400, '09209876543', 'Credit Card', 3),
(5, '2023-01-02', 'Isabela', 'Aquino', '222 Roxas Blvd.', 'Manila City', 1000, '09165437890', 'Paypal', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `SessCode` int NOT NULL AUTO_INCREMENT,
  `SessName` varchar(45) NOT NULL,
  `SpeakerName` varchar(45) NOT NULL,
  `SessDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `ConfId` int NOT NULL,
  PRIMARY KEY (`SessCode`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`SessCode`, `SessName`, `SpeakerName`, `SessDate`, `StartTime`, `EndTime`, `ConfId`) VALUES
(1, 'Introduction to AI', 'Dr. Maria Santos', '2023-08-15', '09:00:00', '12:30:00', 1),
(2, 'Machine Learning', 'Dr. Maria Santos', '2023-08-15', '14:00:00', '17:00:00', 1),
(3, 'E-commerce Strategies', 'Prof. Sofia Hernandez', '2023-09-20', '12:00:00', '15:00:00', 2),
(4, 'Data-Driven Marketing Decisions', 'Prof. Sofia Hernandez', '2023-09-20', '15:30:00', '17:30:00', 2),
(5, 'Tech Innovations Showcase', 'Dr. Manuel Reyes', '2024-09-30', '11:30:00', '14:00:00', 3),
(6, 'The Future of Quantum Computing', 'Dr. Manuel Reyes', '2023-09-30', '14:00:00', '17:00:00', 3),
(7, 'Mindfulness and Wellness', 'Ana Reyes', '2023-11-29', '10:30:00', '13:00:00', 4),
(8, 'Holistic Approach to Health and Happiness', 'Ana Reyes', '2023-11-29', '14:00:00', '15:30:00', 4),
(9, 'Green Energy Solution', 'Dr. Rafael Reyes', '2024-01-12', '14:00:00', '17:00:00', 5),
(10, 'Innovations in Solar Power Technology', 'Dr. Rafael Reyes', '2024-01-12', '17:00:00', '19:00:00', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
