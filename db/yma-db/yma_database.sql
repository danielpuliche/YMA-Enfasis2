-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2022 at 06:55 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yma_database`
--

DROP SCHEMA IF EXISTS yma_database;
CREATE SCHEMA yma_database;
USE yma_database;

-- --------------------------------------------------------

--
-- Table structure for table `tramite`
--



DROP TABLE IF EXISTS `tramite`;
CREATE TABLE `tramite` (
  `tramite_id` smallint(5) UNSIGNED NOT NULL,
  `solicitante_id` smallint(5) UNSIGNED NOT NULL,
  `tramitador_id` smallint(5) UNSIGNED DEFAULT NULL,
  `eps` varchar(20) DEFAULT NULL,
  `regimen` enum('Contributivo','Subsidiado') DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `estado_tramite` enum('Espera','Negociacion','Proceso','Finalizado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramite`
--

INSERT INTO `tramite` (`tramite_id`, `solicitante_id`, `tramitador_id`, `eps`, `regimen`, `precio`, `estado_tramite`) VALUES
(1, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Negociacion'),
(2, 4, 3, 'Nueva EPS', 'Contributivo', 8000, 'Proceso'),
(3, 4, 1, 'Sanitas', 'Subsidiado', 5000, 'Finalizado'),
(4, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(5, 2, 3, 'Sanitas', 'Contributivo', 9000, 'Finalizado'),
(6, 7, 1, 'Emmsanar', 'Subsidiado', 5000, 'Finalizado'),
(7, 7, 1, 'Sanitas', 'Contributivo', 10000, 'Finalizado'),
(8, 7, 3, 'Emmsanar', 'Contributivo', 5000, 'Finalizado'),
(9, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(10, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Negociacion'),
(11, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(12, 4, 3, 'Nueva EPS', 'Contributivo', 8000, 'Proceso'),
(13, 4, 1, 'Sanitas', 'Subsidiado', 5000, 'Proceso'),
(14, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(15, 2, 3, 'Sanitas', 'Contributivo', 9000, 'Finalizado'),
(16, 7, 1, 'Emmsanar', 'Subsidiado', 5000, 'Finalizado'),
(17, 7, 1, 'Sanitas', 'Contributivo', 10000, 'Finalizado'),
(18, 7, 3, 'Emmsanar', 'Contributivo', 8000, 'Negociacion'),
(19, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(20, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(21, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Finalizado'),
(22, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(23, 4, 3, 'Nueva EPS', 'Contributivo', 8000, 'Negociacion'),
(24, 4, 1, 'Sanitas', 'Subsidiado', 5000, 'Proceso'),
(25, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Negociacion'),
(26, 2, 3, 'Sanitas', 'Contributivo', 9000, 'Negociacion'),
(27, 7, 1, 'Emmsanar', 'Subsidiado', 5000, 'Finalizado'),
(28, 7, 1, 'Sanitas', 'Contributivo', 10000, 'Finalizado'),
(29, 7, 3, 'Emmsanar', 'Contributivo', 5000, 'Finalizado'),
(30, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(31, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Finalizado'),
(32, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(33, 4, 3, 'Nueva EPS', 'Contributivo', 8000, 'Negociacion'),
(34, 4, 1, 'Sanitas', 'Subsidiado', 5000, 'Proceso'),
(35, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Finalizado'),
(36, 2, 3, 'Sanitas', 'Contributivo', 9000, 'Finalizado'),
(37, 7, 1, 'Emmsanar', 'Subsidiado', 5000, 'Finalizado'),
(38, 7, 1, 'Sanitas', 'Contributivo', 10000, 'Finalizado'),
(39, 7, 3, 'Emmsanar', 'Contributivo', 5000, 'Finalizado'),
(40, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(41, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(42, 2, 3, 'Sanitas', 'Contributivo', 5000, 'Proceso'),
(44, 4, 3, 'Sanitas', 'Contributivo', 12000, 'Negociacion'),
(55, 4, 3, 'Su papito', 'Subsidiado', 7000, 'Negociacion'),
(58, 4, 3, 'Chancla', 'Subsidiado', 15000, 'Negociacion'),
(59, 4, NULL, 'Chancla', 'Contributivo', 15000, 'Espera'),
(60, 4, NULL, 'Sanitas', 'Contributivo', 12000, 'Espera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`tramite_id`),
  ADD KEY `solicitante_id` (`solicitante_id`),
  ADD KEY `tramitador_id` (`tramitador_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tramite`
--
ALTER TABLE `tramite`
  MODIFY `tramite_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tramite`
--
ALTER TABLE `tramite`
  ADD CONSTRAINT `tramite_ibfk_1` FOREIGN KEY (`solicitante_id`) REFERENCES `solicitante` (`solicitante_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tramite_ibfk_2` FOREIGN KEY (`tramitador_id`) REFERENCES `tramitador` (`tramitador_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
